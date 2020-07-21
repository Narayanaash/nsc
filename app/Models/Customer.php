<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    protected $hidden = [
        'password'
    ];

    public function qoutations()
    {
        return $this->hasMany('App\Qoutation');
    }

    public function address()
    {
        return $this->hasMany('App\Address', 'user_id', 'id');
    }
}