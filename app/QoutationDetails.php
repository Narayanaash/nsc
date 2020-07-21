<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QoutationDetails extends Model
{
    protected $table = "qoutation_details";
    protected $fillable = ['qoutation_id', 'product_name', 'product_code', 'product_category', 'price', 'quantity', 'photo'];

    public function qoutations()
    {
        return $this->belongsTo('App\Qoutations', 'qoutation_id', 'id');
    }
}
