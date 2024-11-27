<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovedJob extends Model
{
    protected $table = 'approved_jobs';
    protected $connection = 'mysql';
    protected $fillable = [
        'job_id',
        'approved_by_id',
        'assigned_to_id',
        'remarks',
    ];

    public function requestedjob()
    {
        return $this->belongsTo(RequestedJob::class, 'job_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function dailyUpdates()
    {
        return $this->hasMany(DailyUpdate::class, 'job_id');
    }
}
