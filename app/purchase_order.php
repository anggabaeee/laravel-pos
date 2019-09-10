<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase_order extends Model
{
    protected $table = "purchase_order";
    protected $fillable = ['po_number','id_outlet','id_supplier','datenow','note','status'];
    
    public function purchase_order_items()
    {
        return $this->hasOne(purchase_order_items::class,'id_po');
    }
}
