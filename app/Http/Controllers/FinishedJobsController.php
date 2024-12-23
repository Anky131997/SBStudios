<?php

namespace App\Http\Controllers;

use App\Models\FinishedJob;
use Illuminate\Http\Request;

class FinishedJobsController extends Controller
{
    public function index($notification_id = null)
    {
        if ($notification_id !== null) {
            $notification = auth()->user()->notifications()->find($notification_id);

            if ($notification) {
                $notification->markAsRead();
            }
        }
        
        $finishedJobs = FinishedJob::all();
        return view('finishedjob.index',['finishedJobs'=>$finishedJobs]);
    }

    public function show(FinishedJob $finishedjob)
    {
        return view('finishedjob.show', ['finishedJob'=>$finishedjob]);
    }
}
