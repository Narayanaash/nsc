<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['order_id', 'customer_id', 'cart', 'name', 'email', 'phone', 'address', 'city', 'zip', 'landmark', 'status'];
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    
}
