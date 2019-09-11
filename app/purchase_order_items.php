<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase_order_items extends Model
{
    protected $table = "purchase_order_items";
    protected $fillable = ['id_po','product_code','product_name','ordered_qty'];
    public function purchase_order()
    {
        return $this->belongsTo(purchase_order::class);
    }
}
