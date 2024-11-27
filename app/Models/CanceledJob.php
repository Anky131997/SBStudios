<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CanceledJob extends Model
{
    protected $fillable =[
        "job_id",
        "canceled_by_id",
        "remarks",
    ];
    
    public function requestedjob()
    {
        return $this->belongsTo(RequestedJob::class, 'job_id');
    }
    public function canceledBy()
    {
        return $this->belongsTo(User::class, 'canceled_by_id');
    }
}
