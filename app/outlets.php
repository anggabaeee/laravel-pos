<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class outlets extends Model
{
    protected $table = "outlets";
    protected $fillable = ['name_outlet','address_outlet','contact_number','receipt_header','receipt_footer','status'];}
