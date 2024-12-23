<?php

namespace App\Http\Controllers;

use App;
use App\Models\ApprovedJob;
use App\Models\DailyUpdate;
use App\Models\FinalizeRequest;
use App\Models\FinishedJob;
use App\Models\RequestedJob;
use App\Models\User;
use App\Notifications\JobNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class FinalizeRequestContoller extends Controller
{
    public function finalizeRequestGenerate(Request $request)
    {
        $data = $request->validate([
            'reportFile' => 'required|file|mimes:pdf|max:2048',
            'remarks' => 'required|string|max:1000',
        ]);

        $approvedJob = ApprovedJob::findOrFail($request->job_id);

        $approvedJob['requestfinalize'] = true;

        $approvedJob->save();

        $path = $data['reportFile']->store('reportFiles');
        $filenameArray = explode('/', $path);
        $filename = $filenameArray[1];

        FinalizeRequest::create([
            'job_id' => $request->job_id,
            'job_report' => $filename,
            'remarks' => $data['remarks'],
            'status' => 'pending',
        ]);

        $requestedJob = RequestedJob::findOrFail($approvedJob->job_id);

        $badge = 'newFinalizeRequest';
        $notificationHeader = 'New Finalize Request has been created for ['.$requestedJob->job_code.']';
        $user = $request->user();
        $notificationMessage = ucfirst($user->name.' Has requested for finalizing this job');
        $manager = User::findOrFail($approvedJob->approved_by_id);
        $admin = User::where('role', 'superadmin')->first();

        Notification::send($admin, new JobNotification($approvedJob,$badge,$notificationHeader,$notificationMessage));
        Notification::send($manager, new JobNotification($approvedJob,$badge,$notificationHeader,$notificationMessage));

        return redirect()->back()->with('success','Successfully Generated The Finalize Request');
    }

    public function showRequest(FinalizeRequest $finalizerequest)
    {
        $approvedjob = ApprovedJob::findOrFail($finalizerequest->job_id);

        return view('approvedjob.showRequest', ['approvedjob' => $approvedjob, 'finalizeRequest' => $finalizerequest]);
    }

    public function finalizeTheJob(FinalizeRequest $finalizerequest, Request $request)
    {
        $data = $request->validate([
            'finalizeRemarks' => 'required',
        ]);
        
        $approvedJob = ApprovedJob::findOrFail($finalizerequest->job_id);

        $assignedTo = User::findOrFail($approvedJob->assigned_to_id);

        $allUsers = User::all();

        $requestedJob = RequestedJob::findOrFail($approvedJob->job_id);

        $allDeclinedFinalizeRequests = FinalizeRequest::where('job_id', $approvedJob->job_id)->where('status','declined')->get();

        $dailyupdates = DailyUpdate::where('job_id', $finalizerequest->job_id)->orderBy('created_at', 'desc')->get();

        $dailyUpdates = ['dailyupdates' => $dailyupdates];

        $pdf = PDF::loadView('makepdf.makepdf', ['dailyUpdates' => $dailyUpdates]);

        $name = 'document-'.$finalizerequest->job_id.'.pdf';

        $pdf->save(public_path('images/dailyupdates/'.$name));

        $job_update = (string)('images/dailyupdates/'.$name);
        
        $job_started = $approvedJob->created_at;
        $now = Carbon::now();

        $timespan = $now->diffForHumans($job_started, [
            'syntax' => Carbon::DIFF_ABSOLUTE,
        ]); 

        $finishedJob = FinishedJob::create([
            'job_code' => $requestedJob->job_code,
            'customer_id' => $requestedJob->customer_id,
            'service_id' => $requestedJob->service_id,
            'assigned_to_id' => $approvedJob->assigned_to_id,
            'approved_by_id' => $approvedJob->approved_by_id,
            'desc' => $requestedJob->desc,
            'timespan' => $timespan,
            'job_report' => $finalizerequest->job_report,
            'job_updates' => $job_update,
            'finalized_by_id' => Auth::user()->id,
            'remarks' => $data['finalizeRemarks'],
        ]);

        $badge = 'newFinishedJob';
        $notificationHeader = 'Congratulation '.$assignedTo->name.', for completing '.$requestedJob->job_code;
        $notificationMessage = 'Finished the job in '.$timespan;

        foreach($allUsers as $user){
            Notification::send($user, new JobNotification($finishedJob,$badge,$notificationHeader,$notificationMessage));
        }

        $finalizerequest->delete();
        foreach($allDeclinedFinalizeRequests as $allDeclinedFinalizeRequest){
            $allDeclinedFinalizeRequest->delete();
        }
        foreach($dailyupdates as $dailyupdate){
            $dailyupdate->delete();
        }
        $approvedJob->delete();
        $requestedJob->delete();

        return view('dashboard')->with('success', 'Job has been finalized');
    }

    public function declineRequest(FinalizeRequest $finalizerequest, Request $request)
    {
        $data = $request->validate([
            'declineRemarks' => 'required',
        ]);
        $approvedJob = ApprovedJob::findOrFail($finalizerequest->job_id);
        $dailyupdates = DailyUpdate::where('job_id', $finalizerequest->job_id)->orderBy('created_at', 'desc')->get();
        $requestedJob = RequestedJob::findOrFail($approvedJob->job_id);
        // dd($approvedJob);
        $approvedJob['requestfinalize'] = false;
        $approvedJob->save();

        $dailyUpdates = ['dailyupdates' => $dailyupdates];

        $pdf = PDF::loadView('makepdf.makepdf', ['dailyUpdates' => $dailyUpdates]);

        $name = $requestedJob->job_code.'-'.$finalizerequest->id.'.pdf';

        $pdf->save(public_path('images/reportFiles/dailyupdates/'.$name));

        $job_update = (string)('images/reportFiles/dailyupdates/'.$name);

        $finalizerequest['status'] = 'declined';
        $finalizerequest['daily_updates'] = $job_update;
        $finalizerequest['declined_by_id'] = Auth::user()->id;
        $finalizerequest['declined_at'] = Carbon::now();
        $finalizerequest['declineRemarks'] = $data['declineRemarks'];
        // dd($finalizerequest);
        $finalizerequest->save();

        

        $badge = 'declinedFinalizeRequest';
        $notificationHeader = 'Finalize Request for ['.$requestedJob->job_code.'] has been Declined';
        $notificationMessage = ucfirst(Auth::user()->name.' has declined your request for Finalizing');
        $requestedUser = User::findOrFail($approvedJob->assigned_to_id);
        // $admin = User::where('role', 'superadmin')->first();

        Notification::send($requestedUser, new JobNotification($approvedJob,$badge,$notificationHeader,$notificationMessage));

        return view('dashboard')->with('success', 'Declined the request');
    }
}
