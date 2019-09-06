<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class site_setting extends Model
{
    protected $table = "site_setting";
    protected $fillable = ['site_name','site_logo'];
}
