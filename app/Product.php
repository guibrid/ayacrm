<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //table name
    protected $table = 'products';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
