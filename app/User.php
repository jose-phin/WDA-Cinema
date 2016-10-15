<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * A single user within our system. Doubles as both an Authenticatable object and a table to hold user info.
 *
 * id (PK)
 * remaining fields are detailed in the $fillable array.
 *
 * @package App
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function wishes()
    {
        return $this->hasMany('App\Wish');
    }
}
