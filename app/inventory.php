<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $table = "inventory";
    protected $fillable = ['product_code','outlet_id','qty'];
}
