<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestedJob extends Model
{
    protected $fillable = [
        'job_code',
        'customer_id',
        'service_id',
        'desc',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function approvedjob()
    {
        return $this->hasOne(ApprovedJob::class, 'job_id');
    }

    public function canceledjob()
    {
        return $this->hasOne(CanceledJob::class, 'job_id');
    }
}
