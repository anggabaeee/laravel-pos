<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\purchase_order;
use App\supplier;
use App\Customer;
use App\gift_card;
use App\category;
use App\expensescategory;
use App\product;
use App\outlets;
use App\users;
use App\UserRoles;

class PosController extends Controller
{
    public function login(){
        if(!Session::get('login')){
            return view('login');
        } else{
            return redirect('/dashboard');
        }
    }

    public function loginpost(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = users::where('email', $email)->first();
        if($data){
            if(Hash::check($password, $data->password)){
                Session::put('name', $data->fullname);
                Session::put('email', $data->email);
                Session::put('id', $data->id);
                Session::put('role', $data->role_id);
                Session::put('outlets', $data->outlet_id);
                Session::put('login', TRUE);
                return redirect('/dashboard');
            }
            else{
                return redirect('/')->with(['failed' => 'Invalid Password!']);
            }
        }
        else{
        Session::flash('failed', 'Invalid Email and Password!');
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: text/html');
        return redirect('/');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/')->with('alert', 'You are Log Out');
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

    public function addCustomerposstore(Request $request){
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
        return redirect('/posadd');
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
    public function pos(){
        $outlets = DB::table('outlets')->get();
        return view('pages.pos',['outlets'=>$outlets]);    
    }  
    public function posadd(){
        $product = DB::table('product')->get();
        return view('pages.posadd',['product'=>$product]);    
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
    // outlet
    //supllier
    public function suppliers(){
        $supplier = supplier::all();
        return view('pages.setting.suppliers',['supplier' => $supplier]);    
    }
    public function suppliersadd(){
        return view('tambah.addSupplier');
    }
    public function editsupplier($id){
        $supplier = supplier::find($id);
        return view('pages.edit.editsupplier',['supplier' => $supplier]); 
    }

    public function supllierstore(Request $request){
        $this->validate($request,[
            'supplier_name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'fax' => 'required',
            'supplier_addres' => 'required',
            'supplier_tax' => 'required',
            'status' => 'required',
    ]);
    supplier::create([
        'supplier_name' => $request->supplier_name,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'fax' => $request->fax,
        'supplier_addres' => $request->supplier_addres,
        'supplier_tax' => $request->supplier_tax,
        'status' => $request->status,
    ]);        
    return redirect('/setting/suppliers')->with(['success' => 'Data Berhasil Ditambahkan']); 
    }

    public function editsupplierupdate($id, Request $request){
        $this->validate($request,[
            'supplier_name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'fax' => 'required',
            'supplier_addres' => 'required',
            'supplier_tax' => 'required',
            'status' => 'required',
        ]);
        $supplier = supplier::find($id);
        $supplier->supplier_name  = $request->supplier_name;
        $supplier->email = $request->email;
        $supplier->telephone = $request->telephone;
        $supplier->fax  = $request->fax;
        $supplier->supplier_addres = $request->supplier_addres;
        $supplier->supplier_tax = $request->supplier_tax ;
        $supplier->status = $request->status;
        $supplier->save();
        return redirect('/setting/suppliers');
    }

    public function editsupplierdelete($id){
        $supplier = supplier::find($id);
        $supplier->delete();
        return redirect('/setting/suppliers')->with(['success' => 'Data Berhasil Dihapus']);;
    }



    public function system(){
        return view('pages.setting.system_setting');    
    }

    //expenses
    public function expenses(){
        return view('pages.expenses.expenses');    
    }
    public function addexpenses(){
        $expensescategory = DB::table('expensescategory')->get();
        $outlets = DB::table('outlets')->get();
        return view('tambah.addexpenses',['expensescategory'=> $expensescategory,'outlets'=>$outlets]); 
    }
    public function expenses_category(){
        $expensescategory = DB::table('expensescategory')->get();
        return view('pages.expenses.expenses_category',['expensescategory'=> $expensescategory]);
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
    public function editexpensescategory($id){
        $expensescategory = expensescategory::find($id);
        return view('pages.edit.editexpensescategory',['expensescategory' => $expensescategory]); 
    }
    public function editexpensescategoryupdate($id, Request $request){
        $this->validate($request,[
            'name' => 'required',
            'status' => 'required'
        ]);
        $expensescategory = expensescategory::find($id);
        $expensescategory->name = $request->name;
        $expensescategory->status = $request->status;
        $expensescategory->save();
        return redirect('/expensescategory');
    }
    public function editexpensescategorydelete($id){
        $expensescategory = expensescategory::find($id);
        $expensescategory->delete();
        return redirect('/expensescategory')->with(['success' => 'Data Berhasil Dihapus']);;
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
        $outlets = DB::table('outlets')->get();
        return view('pages.reports.salesreports',['outlets'=>$outlets]);
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
            'category_name' => 'required',
            'status' => 'required'
        ]);
        category::create([
            'category_name' => $request->category_name,
            'status' => $request->status
        ]);        
        return redirect('/product/ProductCategory')->with(['success' => 'Data Berhasil Ditambahkan']); 
    }

    public function listproduct(){
        $product = DB::table('product')
        ->join('category', 'category.id', '=', 'product.category_name')
        ->get();
        return view('pages.product.listproduct',['product' => $product]); 
    }
    public function addProduct(){
        $category = category::all();
        return view('tambah.addproduct',['category' => $category]);
    }
    public function addProductstore(Request $request){
        $this->validate($request, [
            'code' => 'required|unique:product,code',
            'name_product' => 'required',
            'category_name' => 'required',
            'purchase_price' => 'required',
            'retail_price' => 'required',
            'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required'
        ]);

        $thumbnail = $request->file('thumbnail');
        $nama_thumbnail = time()."_".$thumbnail->getClientOriginalName();
        $tujuan_upload = 'product_image';
        $thumbnail->move($tujuan_upload,$nama_thumbnail);

        product::create([
            'code' => $request->code,
            'name_product' => $request->name_product,
            'category_name' => $request->category_name,
            'purchase_price' => $request->purchase_price,
            'retail_price' => $request->retail_price,
            'thumbnail' => $nama_thumbnail,
            'status' => $request->status
        ]);        

        return redirect('/product/ListProduct')->with(['success' => 'Data Berhasil Ditambahkan']); 
    }

    
    //tambah
    public function adduser(){
        $outlets = outlets::all();
        $role = UserRoles::all();
        return view('tambah.adduser',['outlets' => $outlets], ['role' => $role]);
    }
    public function postuser(Request $request){
        $this->validate($request, [
            'name'=>'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
            'role' => 'required',
            'outlets' => 'required',
        ]);
        $data = new users();
        $data->fullname = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role_id = $request->role;
        $data->outlet_id = $request->outlets;
        $data->status = $request->status;
        $data->save();
        return redirect('/setting/users/adduser');
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
    public function edituser($id){
        $users = DB::table('users')->where('users.id', $id)
        ->join('outlets', 'users.outlet_id', '=', 'outlets.id')
        ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
        ->select('users.*', 'outlets.name_outlet', 'user_roles.role_name')
        ->get();
        $role = UserRoles::all();
        $outlets = outlets::all();
        return view('pages.edit.edituser')->with('users', $users)->with('role', $role)->with('outlets', $outlets);
    }

    public function edituserupdate($id, Request $request){
        $this->validate($request,[
            'name'=>'required|min:4',
            'email' => 'required|min:4|email|unique:users,email,'.$id,
            'role_id' => 'required',
            'outlet_id' => 'required',
            'status' =>'required'
            ]);

            $users = users::find($id);
            $users->fullname = $request->name;
            $users->email = $request->email;
            $users->role_id = $request->role_id;
            $users->outlet_id = $request->outlet_id;
            $users->status = $request->status;
            $users->save();
            return redirect('/setting/users')->with('success', 'data updated');
    }

    public function changepassword($id){
        $users = users::find($id);
        return view('pages.edit.changepassword', ['users'=>$users]); 
    }


    public function changepasswordupdate($id, Request $request){
        $this->validate($request,[
            'password' => 'required',
            'confirmation' => 'required|same:password',
            ]);

            $users = users::find($id);
            $users->password = bcrypt($request->password);
            $users->save();
            return redirect('/setting/users')->with('success',' Successfully Updated New Password.');
    }
    
    public function editpayment(){
        return view('pages.edit.editpayment'); 
    }
    public function editexpenses(){
        return view('pages.edit.editexpenses'); 
    }
    public function role(){
        $role = UserRoles::all();
        return view('role', ['role'=>$role]); 
    }
    public function addrole(Request $request){
        $this->validate($request, [
            'role_name'=> 'required',
        ]);
        UserRoles::create([
            'role_name'=> $request->role_name
        ]);
        return redirect('/role');
    }
}
