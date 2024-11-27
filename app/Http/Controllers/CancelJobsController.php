<?php

namespace App\Http\Controllers;

use App\Models\CanceledJob;
use App\Models\Customer;
use App\Models\RequestedJob;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CancelJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canceledjobs = CanceledJob::all();
        $requestedjobs = RequestedJob::where('status', 'canceled')->get();

        $uniqueCustomer = $requestedjobs->pluck('customer_id')->unique();
        $requestedCustomer = Customer::whereIn('id', $uniqueCustomer)->get();

        $uniqueService = $requestedjobs->pluck('service_id')->unique();
        $requestedService = Service::whereIn('id', $uniqueService)->get();

        $uniqueCanceledBy = $canceledjobs->pluck('canceled_by_id')->unique();
        $requestedCanceledBy = User::whereIn('id', $uniqueCanceledBy)->get();

        return view("canceledjob.index", ["canceledjobs"=> $canceledjobs, 'requestedcustomers' => $requestedCustomer, 'requestedservices' => $requestedService, 'requestedcanceledbys' => $requestedCanceledBy]);
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
        CanceledJob::create(
            ['job_id' => $request->requestedJobCancel,
        'canceled_by_id' => Auth::id(),
        'remarks' => $request->remarks,],
        );

        $requestjobchange = RequestedJob::findOrFail($request->requestedJobCancel);

        $requestjobchange['status'] = 'canceled';

        $requestjobchange->save();

        return redirect()->route('canceledjobs.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(CanceledJob $canceledJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CanceledJob $canceledJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CanceledJob $canceledJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CanceledJob $canceledjob)
    {
        $canceledjob->delete();

        $canceledjobchange = RequestedJob::findOrFail($canceledjob->job_id);

        $canceledjobchange['status'] = 'pending';

        $canceledjobchange->save();


        return redirect()->route('requestedjob.index')->with('success','');
    }
}
