<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    protected $table = "return_item";
    protected $fillable = ['order_id','product_code','price','qty','item_condition'];

}
