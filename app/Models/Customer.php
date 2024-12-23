<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'number'
    ];

    public function requestedjob()
    {
        return $this->hasMany(RequestedJob::class);
    }

    public function finishedjob()
    {
        return $this->hasMany(FinishedJob::class);
    }
}
