<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\gift_card;

class PosController extends Controller
{
    public function login(){
        return view('login');    
    }
    public function dashboard(){
        return view('pages.dashboard');
    }
    public function customer(){
        $customer = DB::table('customer')->orderBy('fullname','desc')->paginate(5);
        return view('pages.customer',['customer' => $customer]);    
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
        return redirect('/customer')->with(['success' => 'Data Berhasil Ditambahkan']);
    }
    public function editcustomer($id){
        $customer = customer::find($id);
        return view('pages.edit.editcustomer',['customer'=>$customer]);    
    }
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
    public function editcustomerdelete($id){
        $customer = customer::find($id);
        $customer->delete();
        return redirect('/customer')->with(['success' => 'Data Berhasil Dihapus']);;
    }
    
    public function debit(){
        return view('pages.debit');    
    }
    
    // addgift
    public function addgift(){
        return view('tambah.addgift');    
    }
    public function addgiftstore(Request $request){
        $this->validate($request,[
            'cardnumber' => 'required',
            'value' => 'required',
            'expiry' => 'required',
            'status' => 'required'
        ]);
        gift_card::create([
            'cardnumber' => $request->cardnumber,
            'value' => $request->value,
            'expiry' => $request->expiry,
            'status' => $request->status
        ]);        
        return redirect('/addgift')->with(['success' => 'Data Berhasil Ditambahkan']); 
    }
    public function listgift(){
        $giftcard = DB::table('giftcard')->orderBy('id','desc')->paginate(5);
        return view('tambah.listgift',['giftcard'=>$giftcard]);    
    }


    //pages
    public function inventory(){
        return view('pages.inventory');    
    }
    public function pos(){
        return view('pages.pos');    
    }  
    public function posadd(){
        return view('pages.posadd');    
    }     
    public function purchase(){
        return view('pages.purchase_order');    
    }


    //Settings
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

    //expenses
    public function expenses(){
        return view('pages.expenses.expenses');    
    }
    public function expenses_category(){
        return view('pages.expenses.expenses_category');
    }
    public function addexpenses(){
        return view('tambah.addexpenses'); 
    }
    public function addexpensescategory(){
        return view('tambah.addexpensescategory'); 
    }


    //sales
    public function openedbil(){
        return view('pages.sales.openedbil');    
    }

    public function todaysales(){
        return view('pages.sales.todaysales');
    }


    //report
    public function salesreports(){
        return view('pages.reports.salesreports');
    }

    public function soldbyproduct(){
        return view('pages.reports.soldbyproduct');
    }

    
    //tambah
    public function addoutlet(){
        return view('tambah.addoutlets'); 
    }
    public function adduser(){
        return view('tambah.adduser'); 
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
    public function pnlreport(){
        return view('pages.profitReport'); 
    }
    public function addproduct(){
        return view('tambah.addproduct'); 
    }
    public function addcategory(){
        return view('tambah.addProductCategory'); 
    }
    public function editoutlet(){
        return view('pages.edit.editoutlet'); 
    }
    public function edituser(){
        return view('pages.edit.edituser'); 
    }
}
