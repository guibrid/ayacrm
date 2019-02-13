<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //table name
    protected $table = 'customers';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
