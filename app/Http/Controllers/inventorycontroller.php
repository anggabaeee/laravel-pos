<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\gift_card;
use App\category;
use App\inventory;
use App\expensescategory;
use App\product;
use App\outlets;
use App\users;
use App\UserRoles;


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
    public function editinventory($id){
        $product = product::find($id);
        $inventory = DB::table('inventory')->get();
        $outlets = DB::table('outlets')->get();
        return view('pages.inventory.editinventory',['outlets' => $outlets,'inventory' => $inventory,'product' => $product]);
    }
    public function editinventoryupdate(Request $request){
        $this->validate($request,[
            'product_code' => 'required',
            'outlet_id' => 'required',
            'qty' => 'required'
    ]);
    inventory::create([
        'product_code' => $request->product_code,
        'outlet_id' => $request->outlet_id,
        'qty' => $request->qty
    ]); 
    }
    // public function editinventoryupdate($id, Request $request){
    //     $this->validate($request,[
    //         'product_code' => 'required',
    //         'outlet_id' => 'required',
    //         'qty' => 'required'
    //     ]);

    //     $inventory = inventory::find($id);
    //     $inventory->outlet_id = $request->outlet_id;
    //     $inventory->product_code = $request->productcode;
    //     $inventory->qty = $request->qty;
    //     $inventory->save();
    //     return redirect('/inventory');
    // }
}
