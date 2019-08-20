<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class PosController extends Controller
{
    public function login(){
        return view('login');    
    }
    public function dashboard(){
        return view('pages.dashboard');
    }
    public function customer(){
        $customer = customer::all();
        return view('pages.customer');    
    }
    public function addCustomer(){
        return view('tambah.addCustomer');    
    }
    public function addCustomerstore(Request $request){
        $this->validate($request,[
            'fullname' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);
        customer::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'mobile' => $request->mobile
        ]);        
        return redirect('/customer');
    }
    public function debit(){
        return view('pages.debit');    
    }
    public function inventory(){
        return view('pages.inventory');    
    }
    public function addgift(){
        return view('tambah.addgift');    
    }
    public function listgift(){
        return view('tambah.listgift');    
    }
    public function pos(){
        return view('pages.pos');    
    }    
    public function payment(){
        return view('pages.setting.payment_method');    
    }
    public function outlets(){
        return view('pages.setting.outlets');    
    }
    public function users(){
        return view('pages.setting.users');    
    }
    public function suppliers(){
        return view('pages.setting.suppliers');    
    }
    public function system(){
        return view('pages.setting.system_setting');    
    }

    public function expenses(){
        return view('pages.expenses.expenses');    
    }

    public function expenses_category(){
        return view('pages.expenses.expenses_category');
    }

    public function openedbil(){
        return view('pages.sales.openedbil');    
    }

    public function todaysales(){
        return view('pages.sales.todaysales');
    }
        
    public function purchase(){
        return view('pages.purchase_order');    
    }

    public function salesreports(){
        return view('pages.reports.salesreports');
    }

    public function soldbyproduct(){
        return view('pages.reports.soldbyproduct');
    }
 
    public function addoutlet(){
        return view('tambah.addoutlets'); 
    }
    public function adduser(){
        return view('tambah.adduser'); 
    }
    public function addexpenses(){
        return view('tambah.addexpenses'); 
    }
    public function addexpensescategory(){
        return view('tambah.addexpensescategory'); 
    }
    public function createpurchase(){
        return view('tambah.createpurchase'); 
    }
    public function listproduct(){
        return view('pages.product.listproduct'); 
    }
    public function productcategory(){
        return view('pages.product.productcategory'); 
    }
    public function addpayment(){
        return view('tambah.addPaymentMethod'); 
    }
    public function createreturn(){
        return view('pages.ReturnOrder.createReturnOrder'); 
    }
    public function reportreturn(){
        return view('pages.ReturnOrder.returnreport'); 
    }
}
