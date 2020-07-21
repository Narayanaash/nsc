<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    protected $fillable = ['category_id', 'file', 'name', 'product_code', 'price', 'date'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
 