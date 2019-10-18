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

            if($role == 2){
                $users = DB::table('users')->where('users.role_id', '!=', 3)->where('users.outlet_id', $outlet)
                ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
                ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
                ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
                ->get();
                return view('pages.setting.users', ['users'=>$users]);
            }
            elseif($role == 1){
                $users = DB::table('users')->where('users.id', $id)
                ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
                ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
                ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
                ->get();
                return view('pages.setting.users', ['users'=>$users]);
            }
            else {
                $outlet = DB::table('outlets')->select('id');
                $data = DB::table('users')->whereNOTIn('outlet_id', $outlet)->count();
                $users = DB::table('users')
                    ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
                    ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
                    ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
                    ->get();
                if($data > 0){
                    $user = DB::table('users')->whereNOTIn('outlet_id', $outlet)
                    ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
                    ->select('users.*', 'user_roles.role_name')
                    ->get();
                }
                return view('pages.setting.users', ['users'=>$users], [ 'user' => $user]);
            }             
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
        $role = $request->role;

        if($role == "3"){
            $outlets = 0;
        }
        else{
            $outlets = $request->outlets;
        }
        $this->validate($request, [
            'name'=>'required|min:4',
            'email' => 'required|min:4|email|unique:users,email',
            'password' => 'required',
            'confirmation' => 'required|same:password',
            'role' => 'required',
        ]);
        $data = new users();
        $data->fullname = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role_id = $request->role;
        $data->outlet_id = $outlets;
        $data->status = $request->status;
        $data->save();
        return redirect('/setting/users/adduser');
    }

    public function edituser($id){
        $users = users::find($id);
        $role = UserRoles::all();
        $outlets = outlets::all();
        return view('pages.edit.edituser')->with('users', $users)->with('role', $role)->with('outlets', $outlets);
    }

    public function edituserupdate($id, Request $request){
        $role = $request->role;

        if($role == "3"){
            $outlets = 0;
        } else{
            $outlets = $request->outlets;
        }

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
            $users->outlet_id = $outlets;
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

    public function deleteuser($id){
        users::find($id)->delete();
        return redirect('/setting/users')->with('success', 'Users successfully deleted');
    }
}
