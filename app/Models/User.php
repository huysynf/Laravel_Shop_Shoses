<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use Hash;

class User extends Authenticatable
{
    use Notifiable,ImageTrait,HasRoles;

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
