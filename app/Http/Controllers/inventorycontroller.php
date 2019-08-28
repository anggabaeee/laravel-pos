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
        for ($i = 1; $i < 2; $i++) {
            $answers[] = [
                'product_code' => $request->product_code,
                'outlet_id' => $request->outlet_id[$i],
                'qty' => $request->qty[$i]
            ];
        }
        // inventory::insert($answers);
        dd($answers);
        // return redirect('/inventory')->with('status', 'Your answers successfully submitted');
    }  
    
    // comment
        // public function editinventoryupdate(Request $request)
        // {
        //     for ($i = 1; $i < count($request->outlet_id); $i++) {
        //         $answers[] = [
        //             'product_code' => $request->product_code,
        //             'outlet_id' => $request->outlet_id[$i],
        //             'qty' => $request->qty[$i]
        //         ];
        //     }
        //     // inventory::insert($answers);
        //     dd($answers);
        //     // return redirect('/inventory')->with('status', 'Your answers successfully submitted');
        // }  
        // public function editinventoryupdate(Request $request)
        // {
        //     $inventory = DB::table('inventory')->get();
        //     $this->validate($request,[
        //         'product_code' => 'required',
        //         'outlet_id' => 'required',
        //         'qty' => 'required'
        //     ]);
        //     foreach ($inventory as $i){
        //         inventory::create([
        //             'product_code' => $request->product_code,
        //             'outlet_id' => $request->outlet_id[$i],
        //             'qty' => $request->qty[$i]
        //         ]);
        //     }
        //     dd($inventory);
        //     // inventory::create();
        //     return redirect('/inventory')->with('status', 'Your answers successfully submitted');
        // }  
        // public function editinventoryupdate(Request $request)
        // {
        //     $inventory = DB::table('inventory')->get();
        //     $data = [];
        //     foreach ($inventory as $i => $value){
        //         $data = ['product_code' => $value];
        //         $data = ['outlet_id' => $value];
        //         $data = ['qty' => $value];
        //     }
        //     dd($data);
        //     // DB::table('inventory')->insert($data);
        //     return redirect('/inventory')->with('status', 'Your answers successfully submitted');
        // }  
        // public function editinventoryupdate(Request $request)
        // {
        //     for ($i = 1; $i < count($request->outlet_id); $i++) {
        //         $inventory[] = [
        //             'product_code' => $request->product_code[$i],
        //             'outlet_id' => $request->outlet_id[$i],
        //             'qty' => $request->qty[$i]
        //         ];
        //     }
        //     inventory::create();
        //     return redirect('/inventory')->with('status', 'Your answers successfully submitted');
        // }  
        // public function editinventoryupdate(Request $request){
        //     $this->validate($request,[
        //         'product_code' => 'required',
        //         'outlet_id' => 'required',
        //         'qty' => 'required'
        // ]);
        // inventory::create([
        //     'product_code' => $request->product_code,
        //     'outlet_id' => $request->outlet_id,
        //     'qty' => $request->qty
        // ]); 
        // }
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
