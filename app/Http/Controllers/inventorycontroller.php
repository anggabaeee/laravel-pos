<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\inventory;
use App\product;
use App\outlets;

class inventorycontroller extends Controller
{

    public function editcustomerupdate($id, Request $request){
        $this->validate($request,[
            'fullname' => 'required',
            'email' => 'required',
            'mobile' => 'required'
            ]);

            $customer = customer::find($id);
            $customer->fullname = $request->fullname;
            $customer->email = $request->email;
            $customer->mobile = $request->mobile;
            $customer->save();
            return redirect('/customer');
    }
    public function inventory(Request $request){
        $role = Session::get('role');
        $outletid = Session::get('outlets');

        if($role == 2 || $role == 1){
            $data = DB::table('inventory')->where('outlet_id', $outletid)->select('product_code');
            $product = DB::table('product')->select('*')
            ->where('code', 'like', '%'.$request->product_code.'%')
            ->where('name_product', 'like', '%'.$request->product_name.'%')
            ->whereNOTIn('code', $data)
            ->get();
    
            $inventory = DB::table('inventory')
            ->where('outlet_id', $outletid)
            ->select('inventory.product_code as code', 'product.name_product as name_product', DB::raw('SUM(inventory.qty) as totalqty'))
            ->join('product', 'product.code', '=', 'inventory.product_code')
            ->join('outlets', 'outlets.id', '=', 'inventory.outlet_id')
            ->where('code', 'like', '%'.$request->product_code.'%')
            ->where('name_product', 'like', '%'.$request->product_name.'%')
            ->groupBy('inventory.product_code')
            ->get();
        }
        else{
            $data = DB::table('inventory')->select('product_code');
            $product = DB::table('product')->select('*')
            ->where('code', 'like', '%'.$request->product_code.'%')
            ->where('name_product', 'like', '%'.$request->product_name.'%')
            ->whereNOTIn('code', $data)
            ->get();
    
            $inventory = DB::table('inventory')
            ->select('inventory.product_code as code', 'product.name_product as name_product', DB::raw('SUM(inventory.qty) as totalqty'))
            ->join('product', 'product.code', '=', 'inventory.product_code')
            ->join('outlets', 'outlets.id', '=', 'inventory.outlet_id')
            ->where('code', 'like', '%'.$request->product_code.'%')
            ->where('name_product', 'like', '%'.$request->product_name.'%')
            ->groupBy('inventory.product_code')
            ->get();
        }
        return view('pages.inventory.inventory',['inventory' => $inventory, 'product' => $product]);    
    }
    public function editinventory($code){
        $role = Session::get('role');
        $outletid = Session::get('outlets');
        if($role == 1 || $role == 2){
            $outlets = DB::table('outlets')->where('id', $outletid)->get();
            $inventory = DB::table('inventory')
            ->where('outlet_id', $outletid)
            ->join('outlets', 'outlets.id', '=', 'inventory.outlet_id')
            ->where('inventory.product_code', '=', $code)
            ->select('inventory.*', 'outlets.name_outlet as name_outlet')
            ->orderBy('inventory.outlet_id', 'ASC')
            ->get();
        }
        else{
            $outlets = outlets::all();
            $inventory = DB::table('inventory')
            ->join('outlets', 'outlets.id', '=', 'inventory.outlet_id')
            ->where('inventory.product_code', '=', $code)
            ->select('inventory.*', 'outlets.name_outlet as name_outlet')
            ->orderBy('inventory.outlet_id', 'ASC')
            ->get();
        }
        $product = DB::table('product')->where('code', $code)->get();
        return view('pages.inventory.editinventory')->with('product', $product)->with('outlets', $outlets)->with('inventory', $inventory);
    }

    public function editinventoryupdate(Request $request)
    {
        $role = Session::get('role');
        $outletid = Session::get('outlets');
        $code = $request->product_code;
        $outlet = $request->outlets;
        $cek = DB::table('inventory')
        ->where('product_code', '=', $code)
        ->where('outlet_id', '=', $outlet)
        ->count();

        $this->validate($request, [
            'qty'=> 'required',
            'product_code' => 'required',
            'outlets' => 'required',
        ]);

        if($role == 2 && $outletid != $outlet){
            return redirect('inventory/editinventory/'.$code);
        }
        if($role == 1 && $outletid != $outlet){
            return redirect('inventory/editinventory/'.$code);
        }

        if($cek < 1){
            DB::table('inventory')->insert([
                'outlet_id'=> $outlet,
                'product_code' => $code,
                'qty' => $request->qty
            ]);
        }
        else{
            $qty = $request->qty;
            inventory::where('product_code', '=', $code)->where('outlet_id', '=', $outlet)->increment('qty', $qty);
        }
        return Redirect::to('inventory/editinventory/'.$code)
        ->with('status', 'Your answers successfully submitted');
    }  
}
