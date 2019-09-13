<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
    //
    protected $table = 'order_items';
    protected $fillable = ['order_id', 'product_code', 'product_name', 'cost', 'price', 'status'];
}
