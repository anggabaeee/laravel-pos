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
        $payment_method=payment_method::all();
        return view('pages.ReturnOrder.createReturnOrder')->with('supplier', $supplier)->with('outlets', $outlets)->with('customer', $customer)->with('payment_method', $payment_method); 
    }
    public function reportreturn(){
        return view('pages.ReturnOrder.returnreport'); 
    }   
    public function createstore(Request $request) {
        $customer=Customer::find( $request->customer);
        $payment_method=payment_method::find( $request->refundby);
        $amount = -1 * ($request->amount);
        $tax = -1 * ($request->tax);
        $grandtotal = -1 * ($request->grandtotal);
        $status = 2;
        $vt_status = 1;
        $return = 0.00;
        orders::create([  
            'customer_id'=> $request->customer,
            'customer_name'=> $customer->fullname,
            'outlet_id'=>$request->outlets,
            'remark'=>$request->remark,
            'ordered_datetime'=>DB::raw('now()'),
            'subtotal'=>$amount,
            'paid_amt'=>$amount,
            'vt_status'=>$vt_status,
            'status'=>$status,
            'return_change'=>$return,
            'tax'=>$tax,
            'grandtotal'=>$grandtotal,
            'payment_method'=>$request->refundby,
            'payment_method_name'=>$payment_method->name,
            'refund_status'=>$request->refundmethod
            ]);
        return redirect('/returnorder/CreateReturn')->with('p', 'Refund Order Succses');
    }
}