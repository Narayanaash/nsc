<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'street_address', 'city', 'zip', 'landmark'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'user_id', 'id');
    }
}
