<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyUpdate extends Model
{
    protected $fillable = [
        "job_id",
        "update",
        "status",
        "created_at",
    ];

    public function approvedjob()
    {
        return $this->belongsTo(ApprovedJob::class, 'job_id');
    }
}
