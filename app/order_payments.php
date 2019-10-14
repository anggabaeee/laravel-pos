<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_payments extends Model
{
    protected $table = 'order_payments';
    protected $fillable = ['order_id', 'payment_method_id', 'payment_amount', 'status'];
}
