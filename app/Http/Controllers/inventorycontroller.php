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
    public function editinventory($id){
        $product = product::find($id);
        $inventory = DB::table('inventory')->get();
        $outlets = DB::table('outlets')->get();
        return view('pages.inventory.editinventory',['outlets' => $outlets,'inventory' => $inventory,'product' => $product]);
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
}
