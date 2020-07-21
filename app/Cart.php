<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ['user_id', 'name', 'product_code', 'quantity', 'photo', 'category_name'];
}