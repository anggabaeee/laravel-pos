<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
    public function inventory(){
        $product = DB::table('product')->get();
        $inventory = DB::table('inventory')->get();
        return view('pages.inventory.inventory',['product' => $product,'inventory' => $inventory]);    
    }
    public function editinventory($code){
        $product = DB::table('product')->where('code', $code)->get();
        // $product = product::find($id);
        // $inventory = DB::table('inventory')->get();
        // $outlets = DB::table('outlets')->get();
        $inventory = DB::table('inventory')
        ->join('outlets', 'outlets.id', '=', 'inventory.outlet_id')
        ->where('product_code', $code)
        ->select('inventory.*', 'outlets.name_outlet as name_outlet')
        ->get();
        return view('pages.inventory.editinventory',['inventory' => $inventory,'product' => $product]);
    }

    public function editinventoryupdate(Request $request)
    {
        $outlet = DB::table('outlets')->count();
        for ($i = 0; $i < $outlet; $i++) {
            $answers[] = [
                'product_code' => $request->product_code,
                'outlet_id' => $request->outlet_id[$i],
                'qty' => $request->qty[$i]
            ];
        }
        inventory::insert($answers);
        return redirect('/inventory')->with('status', 'Your answers successfully submitted');
    }  

    public function addinventory($code)
    {
        $product = DB::table('product')->where('code', $code)->get();
        // $outletcount = DB::table('outlets')->get()->count(); //menghitung data outlet
        // $outletproduct = DB::table('inventory')->where('product_code', $code)->get(); //mengambil data yang hanya pcode = code
        // $outletproductcount = $outletproduct->count(); //menghitung outletproduct
        // if (($outletcount > $outletproductcount ) && ( $outletproductcount > 0)) {
        //     $outlet = DB::table('inventory')
        //     ->where('product_code', $code)
        //     ->rightjoin('outlets', 'outlets.id', '=', 'inventory.outlet_id')
        //     ->where('inventory.outlet_id', '=', null)
        //     ->get();
        // } else {
        //     $outlet = DB::table('inventory')
        //     ->rightjoin('outlets', 'outlets.id', '=', 'inventory.outlet_id')
        //     ->where('inventory.outlet_id', '=', null)
        //     ->get();
        // }
        $data = inventory::where('product_code', $code)->first();
        if($data){
            $outlet = DB::table('inventory')
                ->rightjoin('outlets', 'outlets.id', '=', 'inventory.outlet_id')
                ->where('inventory.product_code', '=', $code)
                ->where(function ($query){
                    $query->where('inventory.outlet_id', '=', null);
                })
                ->select('outlets.id as id', 'outlets.name_outlet as name_outlet')
                ->get();
        }
        else {
                $outlet = DB::table('inventory')
                ->rightjoin('outlets', 'outlets.id', '=', 'inventory.outlet_id')
                ->where('inventory.outlet_id', '=', null)
                ->get();
            }
        return view('pages.inventory.addinventory',['outlet' => $outlet,'product' => $product]);
    }
    public function addinventoryupdate(Request $request)
    {
        $outlet = DB::table('outlets')->count();
        for ($i = 0; $i < $outlet; $i++) {
            $answers[] = [
                'product_code' => $request->product_code,
                'outlet_id' => $request->outlet_id[$i],
                'qty' => $request->qty[$i]
            ];
        }
        inventory::insert($answers);
        return redirect('/inventory')->with('status', 'Your answers successfully submitted');
    }
}
