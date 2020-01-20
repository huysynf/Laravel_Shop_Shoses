<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable,ImageTrait;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone',
        'gender',
        'address',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
