<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function requestedjob()
    {
        return $this->hasMany(RequestedJob::class);
    }

    public function serviceImages()
    {
        return $this->hasMany(ServiceImage::class);
    }
}
