<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qoutation extends Model
{
    protected $table = "qoutations";
    protected $fillable = ['user_id', 'address_id', 'quantity', 'total_price', 'status'];

    public function qoutation_details()
    {
        return $this->hasMany('App\QoutationDetails', 'qoutation_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'user_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address', 'address_id', 'id');
    }
}
