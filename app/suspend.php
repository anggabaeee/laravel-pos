<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suspend extends Model
{
    protected $table = 'suspends';
    protected $fillable = ['ref_number','customer_id','customer_name','outlet_id','subtotal','discount_total','tax', 'grandtotal', 'total_items', 'status'];
}
