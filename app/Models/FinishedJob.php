<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinishedJob extends Model
{
    protected $fillable = [
        'job_code',
        'customer_id',
        'service_id',
        'assigned_to_id',
        'approved_by_id',
        'desc',
        'timespan',
        'job_report',
        'job_updates',
        'finalized_by_id',
        'remarks',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function finalizedBy()
    {
        return $this->belongsTo(User::class, 'finalized_by_id');
    }
}
