<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    protected $table = 'users';
    protected $fillable = ['fullname','email','password','role_id','status'];
    protected $hidden = ['password','remember_token'];
}
