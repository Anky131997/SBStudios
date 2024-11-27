<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Models\RequestedJob;
use App\Models\Customer;
use App\Models\Service;
use App\Models\User;
use App\Notifications\JobNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;

class RequestedJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($notification_id = null)
    {
        if ($notification_id !== null) {
            $notification = auth()->user()->notifications()->find($notification_id);

            if ($notification) {
                $notification->markAsRead();
            }
        }

        $requestedJobs = RequestedJob::all();
        $users = User::all();

        $uniqueCustomers = $requestedJobs->pluck('customer_id')->unique();
        $requestedCustomers = Customer::whereIn('id', $uniqueCustomers)->get();

        $uniqueServices = $requestedJobs->pluck('service_id')->unique();
        $requestedServices = Service::whereIn('id', $uniqueServices)->get();

        // dd($requestedCustomers, $requestedServices);

        return view("requestedjob.index", ['requestedJobs' => $requestedJobs, 'users' => $users, 'requestedServices' => $requestedServices, 'requestedCustomers' => $requestedCustomers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view("contact.contact", ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = User::where('role', 'superadmin')->first();

        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'number' => ['required', 'numeric'],
            'service' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);

        $service = Service::where('id', $data['service'])->first();
        $serviceCode = (string) $service->code;
        $count = (string) RequestedJob::where('service_id', $data['service'])->count() + 1;
        $jobCode = $serviceCode . '-' . $count;

        $customer = Customer::firstOrCreate(
            [
                'email' => $data['email'],
                'number' => $data['number'],
            ],
            [
                'name' => $data['name'],
            ]
        );

        $newRequestedJob = $customer->requestedjob()->create([
            'service_id' => $data['service'],
            'job_code' => $jobCode,
            'desc' => $data['description'],
            'status' => 'pending',
        ]);

        $notificationHeader = "[". $jobCode ."] has been created";
        $notificationMessage = $data['name']." has requested for a new job on ".$service->name;

        Notification::send($admin, new JobNotification($newRequestedJob,$notificationHeader,$notificationMessage));

        $companyEmail = 'springbreakstudio@gmail.com';
        $message1 = (string) $data['name'] . ' has requested for a job on <b>' . $service->name . '</b> <br>';
        $message2 = (string) '<br><b>Job description:</b> <br>' . $data['description'] . '<br>';
        $message3 = (string) '<b>Customer Name : </b>' . $data['name'] . '<br><b>Contact No. : </b>' . $data['number'] . '<br><b>Email ID : </b>' . $data['email'];

        $displayText = (string) $message1 . $message2 . $message3;

        $subject = (string) '[' . $service->name . ']' . ' ' . $data['name'] . ' has requested for a job';

        $customerEmail = $data['email'];
        $customerSubject = (string) 'Thank you for reaching out to us';
        $customerMessage = (string) 'We have recieved your request for a job on <b>' . $service->name . '</b>. We will soon reach out to you.';

        Mail::to($companyEmail)->send(new FeedbackMail($displayText, $subject));
        Mail::to($customerEmail)->send(new FeedbackMail($customerMessage, $customerSubject));

        return redirect()->route('contact')->with('success', 'Thanks for contacting us! We will reach out to you shortly');
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestedJob $requestedJob)
    {
        return 'Hello World';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestedJob $requestedJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestedJob $requestedJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestedJob $requestedJob)
    {
        //
    }
}
