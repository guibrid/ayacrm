<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //table name
    protected $table = 'orders';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function order_products()
    {
        return $this->hasMany('App\Order_product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
