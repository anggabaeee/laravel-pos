<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\users;
use App\UserRoles;

class AuthController extends Controller
{
    public function login(){
        if(!Session::get('login')){
            return view('login');
        } else{
            return redirect('/dashboard');
        }
    }

    public function loginpost(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = users::where('email', $email)->first();
        if($data){
            if(Hash::check($password, $data->password)){
                Session::put('name', $data->fullname);
                Session::put('email', $data->email);
                Session::put('id', $data->id);
                Session::put('role', $data->role_id);
                Session::put('outlets', $data->outlet_id);
                Session::put('login', TRUE);
                return redirect('/dashboard');
            }
            else{
                return redirect('/')->with(['failed' => 'Invalid Password!']);
            }
        }
        else{
        Session::flash('failed', 'Invalid Email and Password!');
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: text/html');
        return redirect('/');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('alert', 'You are Log Out');
    }
}
