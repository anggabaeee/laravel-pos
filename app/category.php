<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class category extends Model
{
        protected $table = "category";
        protected $fillable = ['category_name','status'];

        public function product()
        {
                return $this->belongsTo('App\product');
        }
}
