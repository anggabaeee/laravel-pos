<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase_order extends Model
{
    protected $table = "purchase_order";
    protected $fillable = ['po_number','id_outlet','id_supplier','datenow','note'];
}
