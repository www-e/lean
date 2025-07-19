<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * This is a security measure to prevent password hashes from ever being
     * accidentally exposed in API responses or logs.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}