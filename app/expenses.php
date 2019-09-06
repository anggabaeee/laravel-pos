<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    //
    protected $table = "expenses";
    protected $fillable = ['expenses_number','expense_category','outlet_id', 'date', 'amount', 'reason', 'file_name', 'status'];
}
