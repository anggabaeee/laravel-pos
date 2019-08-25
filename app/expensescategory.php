<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expensescategory extends Model
{
    protected $table = "expensescategory";
    protected $fillable = ['name','status'];
}
