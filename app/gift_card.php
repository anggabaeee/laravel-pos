<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gift_card extends Model
{
    protected $table = "giftcard";
    protected $fillable = ['fullname','email','mobile'];
}
