<?php

namespace App\Http\Controllers;

use App\Models\DailyUpdate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        DailyUpdate::create(
            ['job_id' => $request->jobid,
        'update' => $request->update,
        'status' => 'current',],
        );

        return redirect()->back()->with('success','Work Update Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyUpdate $dailyUpdate)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyUpdate $dailyupdate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyUpdate $dailyupdate)
    {
        $data = $request->all();

        $newUpdate = [
            'job_id' => $dailyupdate->job_id,
            'update' => $data['updateText'],
            'status' => 'current',
        ];

        DailyUpdate::create(
            ['job_id' => $newUpdate['job_id'],
        'update' => $newUpdate['update'],
        'status' => $newUpdate['status'],
        'created_at' => $dailyupdate['created_at']->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),],
        );

        $dailyupdate['status'] = 'edited';

        $dailyupdate->save();
        // dd($update);

        return redirect()->back()->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyUpdate $dailyupdate)
    {
        $dailyupdate['status'] = 'deleted';

        $dailyupdate->save();

        return redirect()->back()->with('success','');
    }
}
