<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'customer_name', 'outlet_id', 'ordered_datetime', 'subtotal', 'discount_total', 'tax', 'grandtotal', 'total_items', 'payment_method', 'payment_method_name', 'paid_amt', 'return_change', 'vt_status', 'status', 'refund_status'];
}
