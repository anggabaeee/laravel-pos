<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\gift_card;
use App\category;
use App\expensescategory;
use App\product;

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
        $giftcard = DB::table('giftcard')->orderBy('id','desc')->get();
        return view('tambah.listgift',['giftcard'=>$giftcard]);    
    }
    public function listgiftdelete($id){
        $giftcard = gift_card::find($id);
        $giftcard ->delete();
        return redirect('/listgift')->with(['success' => 'Data Berhasil Dihapus']);;
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
    public function pnl(){
        return view('pages.profitnloss'); 
    }
    public function makepayment(){
        return view('pages.makepayment'); 
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
        $expensescategory = DB::table('expensescategory')->get();
        return view('pages.expenses.expenses_category',['expensescategory'=> $expensescategory]);
    }
    public function addexpenses(){
        return view('tambah.addexpenses'); 
    }
    public function addexpensescategory(){
        return view('tambah.addexpensescategory'); 
    }
    public function addexpensescategorystore(Request $request){
        $this->validate($request,[
        'name' => 'required',
        'status' => 'required'
    ]);
    expensescategory::create([
        'name' => $request->name,
        'status' => $request->status
    ]);        
    return redirect('/expensescategory')->with(['success' => 'Data Berhasil Ditambahkan']); 
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

    // product category
    public function productcategory(){
        $category = DB::table('category')->get();
        return view('pages.product.productcategory',['category' => $category]); 
    }
    public function addcategory(){
        return view('tambah.addProductCategory'); 
    }
    public function addProductCategorystore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'status' => 'required'
        ]);
        category::create([
            'name' => $request->name,
            'status' => $request->status
        ]);        
        return redirect('/product/ProductCategory')->with(['success' => 'Data Berhasil Ditambahkan']); 
    }
    public function addProduct(){
        $category = category::all();
        return view('tambah.addproduct',['category' => $category]);
    }

    public function addProductstore(Request $request){
        $this->validate($request,[
            'code' => 'required|unique:product,code',
            'name' => 'required',
            'category' => 'required',
            'purchase_price' => 'required',
            'retail_price' => 'required',
            'thumbnail' => 'required',
            'status' => 'required'
        ]);
        product::create([
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'purchase_price' => $request->purchase_price,
            'retail_price' => $request->retail_price,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status
        ]);        
        return redirect('/product/ProductCategory')->with(['success' => 'Data Berhasil Ditambahkan']); 
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
    //edit
    public function editoutlet(){
        return view('pages.edit.editoutlet'); 
    }
    public function edituser(){
        return view('pages.edit.edituser'); 
    }
    public function changepassword(){
        return view('pages.edit.changepassword'); 
    }
    public function editsupplier(){
        return view('pages.edit.editsupplier'); 
    }
    public function editpayment(){
        return view('pages.edit.editpayment'); 
    }
    public function editexpenses(){
        return view('pages.edit.editexpenses'); 
    }
    public function editexpensescategory(){
        return view('pages.edit.editexpensescategory'); 
    }
}
