<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
        //table name
        protected $table = 'order_products';
        // Primary key
        public $primaryKey = 'id';
        // Timestamps
        public $timestamps = true;

        public function order()
        {
            return $this->belongsTo('App\Order');
        }
        public function product()
        {
            return $this->belongsTo('App\Product');
        }
}
