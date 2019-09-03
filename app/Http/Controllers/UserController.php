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
use App\outlets;

class UserController extends Controller
{
    public function users(){
        $role = Session::get('role');
        $outlet = Session::get('outlets');
        $id = Session::get('id');

            if($role == "2"){
                $users = DB::table('users')->where('users.role_id', '!=', 3)->where('users.outlet_id', $outlet)
                ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
                ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
                ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
                ->get();
            }
            elseif($role == "1"){
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

    public function adduser(){
        $roleid = Session::get('role');
        $outletid = Session::get('outlets');

        if($roleid == "3"){
            $outlets = outlets::all();
            $role = UserRoles::all();
        }
        if($roleid == "2"){
            $outlets = DB::table('outlets')->where('id', $outletid)->get();
            $role = DB::table('user_roles')->where('id', '!=', 3)->get();
        }
        return view('tambah.adduser',['outlets' => $outlets], ['role' => $role]);
    }
    public function postuser(Request $request){
        $this->validate($request, [
            'name'=>'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
            'role' => 'required',
            'outlets' => 'required',
        ]);
        $data = new users();
        $data->fullname = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role_id = $request->role;
        $data->outlet_id = $request->outlets;
        $data->status = $request->status;
        $data->save();
        return redirect('/setting/users/adduser');
    }

    public function edituser($id){
        $users = DB::table('users')->where('users.id', $id)
        ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
        ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
        ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
        ->get();
        $role = UserRoles::all();
        $outlets = outlets::all();
        return view('pages.edit.edituser')->with('users', $users)->with('role', $role)->with('outlets', $outlets);
    }

    public function edituserupdate($id, Request $request){
        $this->validate($request,[
            'name'=>'required|min:4',
            'email' => 'required|min:4|email|unique:users,email,'.$id,
            'role_id' => 'required',
            'outlet_id' => 'required',
            'status' =>'required'
            ]);

            $users = users::find($id);
            $users->fullname = $request->name;
            $users->email = $request->email;
            $users->role_id = $request->role_id;
            $users->outlet_id = $request->outlet_id;
            $users->status = $request->status;
            $users->save();
            return redirect('/setting/users')->with('success', 'data updated');
    }

    public function changepassword($id){
        $users = users::find($id);
        return view('pages.edit.changepassword', ['users'=>$users]); 
    }


    public function changepasswordupdate($id, Request $request){
        $this->validate($request,[
            'password' => 'required',
            'confirmation' => 'required|same:password',
            ]);

            $users = users::find($id);
            $users->password = bcrypt($request->password);
            $users->save();
            return redirect('/setting/users')->with('success',' Successfully Updated New Password.');
    }
}
