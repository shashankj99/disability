<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all the disables created by the user
     */
    public function disables() {
        return $this->hasMany(Disable::class);
    }

    /**
     * Get all the senior citizens created by the user
     */
    public function seniorCitizens() {
        return $this->hasMany(SeniorCitizen::class);
    }

    /**
     * Get all the certifiers created by the user
     */
    public function certifiers() {
        return $this->hasMany(Certifier::class);
    }
}
