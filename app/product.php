<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


class product extends Model
{
    protected $table = "product";
    protected $fillable = ['code','name_product','category_name','purchase_price','retail_price','thumbnail','status'];
}
