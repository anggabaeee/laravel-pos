<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = "supplier";
    protected $fillable = ['supplier_name','email','telephone','fax','supplier_addres','supplier_tax'];
 }
