<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'dob',
        'number',
        'address',
        'designation',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    // protected $attributes = [
    //     'dob' => '2024-01-01',
    //     'number' => 123,
    //     'address' => 'abc',
    //     'designation' => 'developer',
    // ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password',
        ];
    }

    public function approvedJobs()
    {
        return $this->hasMany(ApprovedJob::class, 'approved_by_id');
    }

    public function assignedJobs()
    {
        return $this->hasMany(ApprovedJob::class, 'assigned_to_id');
    }

    public function canceledJobs()
    {
        return $this->hasMany(CanceledJob::class, 'canceled_by_id');
    }
}
