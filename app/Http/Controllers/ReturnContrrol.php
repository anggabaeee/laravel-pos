<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\supplier;
use App\Customer;
use App\product;
use App\outlets;
use App\payment_method;
use App\orders;
use Validator;
use Response;

class ReturnContrrol extends Controller
{
    
    public function createreturn(){
        $customer=Customer::all();
        $outlets=outlets::all();
        $supplier=supplier::all();
        return view('pages.ReturnOrder.createReturnOrder')->with('supplier', $supplier)->with('outlets', $outlets)->with('customer', $customer); 
    }
    public function reportreturn(){
        return view('pages.ReturnOrder.returnreport'); 
    }   
    public function createstore(Request $request) {
        $customer=Customer::find( $request->customer);
        dd($customer->fullname);
        exit();
        orders::create([ 
                'po_number'=> $request->po_number,
                'grandtotal'=> $request->grandtotal,
                'subtotal'=> $request->subtotal,
                'discount_amount'=> $request->discount_amount,
                'id_outlet'=> $request->id_outlet,
                'id_supplier'=> $request->id_supplier,
                'datenow'=> $request->datenow,
                'note'=> $request->note,
                'status'=> $request->status,
                ]);

        return redirect('/returnorder/CreateReturn')->with('p', 'Create Order Succses');
    }
}