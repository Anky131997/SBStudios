<?php

namespace App\Http\Controllers;

use App\Models\ApprovedJob;
use App\Models\Customer;
use App\Models\DailyUpdate;
use App\Models\FinalizeRequest;
use App\Models\RequestedJob;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\JobNotification;

class ApprovedJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($notification_id = null)
    {
        // dd($notification_id);
        if ($notification_id !== null) {
            $notification = auth()->user()->notifications()->find($notification_id);
            
            if ($notification) {
                $notification->markAsRead();
            }
        }
        
        $approvedJobs = ApprovedJob::all();
        $requestedjobs = RequestedJob::where('status', 'approved')->get();

        $uniqueCustomer = $requestedjobs->pluck('customer_id')->unique();
        $requestedCustomer = Customer::whereIn('id', $uniqueCustomer)->get();

        $uniqueService = $requestedjobs->pluck('service_id')->unique();
        $requestedService = Service::whereIn('id', $uniqueService)->get();

        $uniqueAssignedTo = $approvedJobs->pluck('assigned_to_id')->unique();
        $requestedAssignedTo = User::whereIn('id', $uniqueAssignedTo)->get();

        $uniqueApprovedBy = $approvedJobs->pluck('approved_by_id')->unique();
        $requestedApprovedBy = User::whereIn('id', $uniqueApprovedBy)->get();

        return view('approvedjob.index', ['approvedjobs' => $approvedJobs, 'requestedcustomers' => $requestedCustomer, 'requestedservices' => $requestedService, 'requestedassignedtos' => $requestedAssignedTo, 'requestedapprovedbys' => $requestedApprovedBy]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newlyApprovedJob = ApprovedJob::create(
            [
                'job_id' => $request->requestedJob,
                'approved_by_id' => Auth::id(),
                'assigned_to_id' => $request->user,
                'remarks' => $request->remarks,
            ],
        );

        $requestjobchange = RequestedJob::findOrFail($request->requestedJob);

        $requestjobchange['status'] = 'approved';

        $requestjobchange->save();

        $approvedBy = Auth::user()->name;
        $assignedTo = User::where('id', $request->user)->first();
        $badge = 'newApprovedJob';
        $notificationHeader = "[". $requestjobchange->job_code ."] has been assigned to you";
        $notificationMessage = $approvedBy." has assigned you to a job";

        Notification::send($assignedTo, new JobNotification($newlyApprovedJob,$badge,$notificationHeader,$notificationMessage));

        return redirect()->route('approvedjobs.index')->with('success', '');
    }

    /**
     * Display the specified resource.
     */
    public function show(ApprovedJob $approvedjob)
    {
        $dailyUpdates = DailyUpdate::where('job_id', $approvedjob->id)->orderBy('created_at', 'desc')->get();
        $updateCount = count($dailyUpdates);
        $allDeclinedRequests = FinalizeRequest::where('job_id', $approvedjob->id)->where('status', 'declined')->get();
        $latestDeclineRequest = FinalizeRequest::where('job_id', $approvedjob->id)->where('status', 'declined')->orderBy('created_at', 'desc')->first();
        return view('approvedjob.show', ['approvedjob' => $approvedjob, 'dailyUpdates' => $dailyUpdates, 'updateCount' => $updateCount, 'latestDeclineRequest' => $latestDeclineRequest, 'allDeclinedRequests' => $allDeclinedRequests]);
    }

    public function finalize(ApprovedJob $approvedjob)
    {
        $dailyUpdates = DailyUpdate::where('job_id', $approvedjob->id)->orderBy('created_at', 'desc')->get();
        $finalizeRequest = FinalizeRequest::where('job_id', $approvedjob->id)->where('status', 'pending')->first();
        // dd($finalizeRequest);
        return view('approvedjob.finalize',['approvedjob'=> $approvedjob, 'dailyUpdates' => $dailyUpdates, 'finalizeRequest' => $finalizeRequest]); 
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApprovedJob $approvedJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApprovedJob $approvedJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApprovedJob $approvedJob)
    {
        //
    }
}
