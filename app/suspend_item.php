<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suspend_item extends Model
{
    protected $table = 'suspend_items';
    protected $fillable = ['suspend_id', 'product_code', 'product_name', 'cost', 'price', 'qty'];
}
