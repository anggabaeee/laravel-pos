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
        $data = inventory::where('product_code', $code)->first();
       if($data){
           $inventory = DB::table('inventory')
           ->join('outlets', 'outlets.id', '=', 'inventory.outlet_id')
           ->where('inventory.product_code', '=', $code)
           ->select('inventory.*', 'outlets.name_outlet as name_outlet')
           ->get();
        return view('pages.inventory.editinventory')->with('product', $product)->with('inventory', $inventory);
       }
       else {
        $outlets = DB::table('outlets')->get();
           return view('pages.inventory.addinventory')->with('product', $product)->with('outlets', $outlets);
       }

        // $inventory = DB::table('inventory')->get();
        // $outlets = DB::table('outlets')->get();
    }

    public function editinventoryupdate(Request $request)
    {
        $code = $request->product_code;
        $outlet = DB::table('inventory')
           ->join('outlets', 'outlets.id', '=', 'inventory.outlet_id')
           ->where('inventory.product_code', '=', $code)
           ->count();
        $i = 0;
        while($i < $outlet){
            // $newqty[] =  $request->qty[$i] + $request->oldqty[$i];
            $data[] = array(
                'id' => $request->id[$i],
                'qty' => $request->qty[$i]
            );
            $i++;
        } 
           $j = 0;
           while($j < $outlet){
               DB::table('inventory')->where('id', $data[$j]['id'])->update($data[$j]);
               $j++;
           }
        // $outlet = DB::table('outlets')->count();
        // for ($i = 0; $i < $outlet; $i++) {
        //     $answers[] = [
        //         'product_code' => $request->product_code,
        //         'outlet_id' => $request->id[$i],
        //         'qty' => $request->qty[$i]
        //     ];
        // }
        // inventory::insert($answers);
        return redirect('/inventory')->with('status', 'Your answers successfully submitted');
    }  

    public function addinventory($code)
    {
        $product = DB::table('product')->where('code', $code)->get();
        $data = inventory::where('product_code', $code)->first();
        $query = DB::table('inventory')->where('product_code', $code)->select('outlet_id');
        if($data){
            $outlets = DB::table('outlets')->select('*')
            ->whereNOTIn('id', $query)
            ->select('outlets.id', 'outlets.name_outlet')
            ->get();
        }
        else{
            $outlets = DB::table('outlets')->get();
        }
        return view('pages.inventory.addinventory',['outlets' => $outlets,'product' => $product]);
    }
    public function addinventoryupdate(Request $request)
    {
        $code = $request->product_code;
        $query = DB::table('inventory')->where('product_code', $code)->select('outlet_id');
        $data = inventory::where('product_code', $code)->first();
        if($data){
            $outlet = DB::table('outlets')->select('*')
            ->whereNOTIn('id', $query)
            ->count();
            for ($i = 0; $i < $outlet; $i++) {
                $answers[] = [
                    'product_code' => $request->product_code,
                    'outlet_id' => $request->outlet_id[$i],
                    'qty' => $request->qty[$i]
                ];
            }
        }
        else {
            $outlet = DB::table('outlets')->count();
            for ($i = 0; $i < $outlet; $i++) {
                $answers[] = [
                    'product_code' => $request->product_code,
                    'outlet_id' => $request->outlet_id[$i],
                    'qty' => $request->qty[$i]
                ];
            }
        }
        inventory::insert($answers);
        return redirect('/inventory')->with('status', 'Your answers successfully submitted');
    }
}
