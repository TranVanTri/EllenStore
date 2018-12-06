<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password','provider','provider_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bill()
    {
        return $this->hasMany("App\Bill","idUser",'id');
    }
}
