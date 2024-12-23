<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalizeRequest extends Model
{
    protected $fillable = [
        'job_id',
        'job_report',
        'remarks',
        'status',
    ];

    protected $casts = [
        'declined_at' => 'datetime',
    ];

    public function approvedJob()
    {
        return $this->belongsTo(ApprovedJob::class, 'job_id');
    }

    public function declinedBy()
    {
        return $this->belongsTo(User::class, 'declined_by_id');
    }
}
