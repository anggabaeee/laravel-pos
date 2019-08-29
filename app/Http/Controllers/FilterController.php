<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\supplier;
use App\Customer;
use App\gift_card;
use App\category;
use App\expensescategory;
use App\product;
use App\outlets;
use App\users;
use App\UserRoles;

class FilterController extends Controller
{
    public function users(){
        $role = Session::get('role');
        $outlet = Session::get('outlets');
        $id = Session::get('id');
        if($role=="2"){
            $users = DB::table('users')->where('users.outlet_id', $outlet)
            ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
            ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
            ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
            ->get();
        }
        else if($role=="1"){
            $users = DB::table('users')->where('users.id', $id)
            ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
            ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
            ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
            ->get();
        }
        else {
            $users = DB::table('users')
            ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
            ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
            ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
            ->get();
        }          
        return view('pages.setting.users',['users'=>$users]);   
    }

}
