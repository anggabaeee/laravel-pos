<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "product";
    protected $fillable = ['code','name','category_id','purchase_price','retail_price','thumbnail','status'];

}
