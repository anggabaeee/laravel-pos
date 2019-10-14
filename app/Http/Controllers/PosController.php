<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
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
use App\expenses;
use App\payment_method ;
use App\order_items;
use App\orders;
use App\suspend;
use App\suspend_item;
use Validator;
use Response;

class PosController extends Controller
{
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

        customer::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'mobile' => $request->mobile
        ]);        
        return redirect('/customer')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function addCustomerposstore(Request $request){
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
        if (count($outlets)>0) {
            return view('pages.pos',['outlets'=>$outlets]);    
        } else {
            return redirect('/setting/outlets')->with(['warning' => 'Tambahkan Outlet Terlebih Dahulu']);;
        }
        
    }  

    public function posadd($id, Request $request){
        $inventory = DB::table('inventory')
        ->select('product_code', 'qty')
        ->where('outlet_id', $id);
        $product = DB::table('product')
        ->leftJoinSub($inventory, 'sub', function($join){
            $join->on('product.code', '=', 'sub.product_code');
        })->select('product.*', 'sub.qty')
        ->get();
        $outlets = outlets::find($id);
        $customer = Customer::all();
        $load = Customer::select('id')->get();
        $payment = payment_method::all();
        return view('pages.posadd',['product'=>$product, 'outlets'=>$outlets, 'payment'=>$payment, 'customer'=>$customer, 'load'=>$load ]);    
    }   

    public function load(){
        $customer = Customer::all();
         return response($customer);
    }   

    public function getsaletoday(Request $request)
    {
        $outlet = $request->outlets;
        $todaysale = DB::select("SELECT t1.cash, t2.nett, t3.visa, t4.master_card, t5.cheque FROM (SELECT Sum(orders.grandtotal) AS cash FROM orders WHERE orders.payment_method = 1 AND DATE(orders.ordered_datetime) = curdate() AND orders.outlet_id = (".$outlet.")) AS t1,(SELECT Sum(orders.grandtotal) AS nett FROM orders WHERE orders.payment_method = 2 AND DATE(orders.ordered_datetime) = curdate() AND orders.outlet_id = (".$outlet.")) AS t2, (SELECT Sum(orders.grandtotal) AS visa FROM orders WHERE orders.payment_method = 3 AND DATE(orders.ordered_datetime) = curdate() AND orders.outlet_id = (".$outlet.")) AS t3, (SELECT Sum(orders.grandtotal) AS master_card FROM orders WHERE orders.payment_method = 4 AND DATE(orders.ordered_datetime) = curdate() AND orders.outlet_id = (".$outlet.")) AS t4, (SELECT Sum(orders.grandtotal) AS cheque FROM orders WHERE orders.payment_method = 5 AND DATE(orders.ordered_datetime) = curdate() AND orders.outlet_id = (".$outlet.")) AS t5");
        return response($todaysale);
    }

    public function addBill(Request $request)
    {

        $customer = DB::table('customer')->where('id', $request->customer_id)->first();
        $discount = $request->discount;
        if($discount == null){
            $discount = 0;
        }

        $suspend = new suspend();
        $suspend->ref_number = $request->ref_number;
        $suspend->customer_id = $request->customer_id;
        $suspend->customer_name = $customer->fullname;
        $suspend->outlet_id = $request->outlet_id;
        $suspend->subtotal = $request->subtotal;
        $suspend->discount_total = $discount;
        $suspend->tax = $request->taxvalue;
        $suspend->grandtotal = $request->grandtotal;
        $suspend->total_items = $request->totalitem;
        $suspend->status = 0;
        $suspend->save();
        
        $length = $request->row_length;
        for($i=0; $i<$length; $i++){
            $answer[] = [
                'suspend_id' => $suspend->id,
                'product_code' => $request->code[$i],
                'product_name' => $request->name[$i],
                'cost' => $request->cost[$i],
                'price' => $request->price[$i],
                'qty' => $request->qty[$i],
            ];
        }
        suspend_item::insert($answer);
        return redirect('/posadd', compact('suspend'));
    }

    public function getcustomer()
    {
        $customer = Customer::all();
        return response($customer);
    }

    public function addorder($id, Request $request){
        $validation = Validator::make($request->all(), [
            'customer' => 'required',
            'outlet_id'  => 'required',
            'ttl_amount'  => 'required',
            'ttl_item'  => 'required',
            'payment_method'  => 'required',
            'paidamount'  => 'required',
            'code[]'  => 'required',
            'name[]'  => 'required',
            'price[]'  => 'required',
            'qty[]'  => 'required',
            'cost[]'  => 'required',
            'discount' => 'required',
            'totalprice' => 'required',
            'return_change' => 'required',
            'taxval' => 'required',
        ]);

        $customer = DB::table('customer')->where('id', $request->customer)->first();
        $payment = DB::table('payment_methods')->where('id', $request->payment_method)->first();
        $discount = $request->discount;
        $id_suspend = $request->id_susp;
        if ($discount == null){
            $discount = 0;
        }
        if($id_suspend != null){
            $suspend = suspend::find($id_suspend);
            $suspend->status = 1;
            $suspend->save();   
        }

        $orders = new orders();
        $orders->customer_id = $request->customer;
        $orders->customer_name = $customer->fullname;
        $orders->outlet_id = $id;
        $orders->ordered_datetime = DB::raw('now()');
        $orders->subtotal = $request->totalprice;
        $orders->discount_total = $discount;
        $orders->tax = $request->taxval;
        $orders->grandtotal = $request->ttl_amount;
        $orders->total_items = $request->ttl_item;
        $orders->payment_method = $request->payment_method;
        $orders->payment_method_name = $payment->name;
        $orders->paid_amt = $request->paidamount;
        $orders->return_change = $request->return_change;
        $orders->vt_status = 1;
        $orders->status = 1;
        $orders->refund_status = 1;
        $orders->save();    

        $length = $request->row_length;
        for($i=0; $i<$length; $i++){
            $answer[] = [
                'order_id' => $orders->id,
                'product_code' => $request->code[$i],
                'product_name' => $request->name[$i],
                'cost' => $request->cost[$i],
                'price' => $request->price[$i],
                'qty' => $request->qty[$i],
                'status' => 1,
            ];
        }
        order_items::insert($answer);
        return redirect('/view_invoice/'.$orders->id);
    }

    public function checkGift(Request $request)
    {
        $giftcard = $request->giftcard;
        $check = gift_card::where('cardnumber', $giftcard)->get();
        return response($check);
    }

    public function openedHold(Request $request)
    {
        $outlet = $request->outlets;
        $suspend = DB::table('suspends')
        ->where('outlet_id', $outlet)
        ->where('status', 0)
        ->get();
        return response($suspend);
    }

    public function searchHold(Request $request)
    {
        $outlet = $request->outlets;
        $ref_number = $request->ref_number;
        $suspend = DB::table('suspends')
        ->where('outlet_id', $outlet)
        ->where('status', 0)
        ->where('ref_number', 'like', '%'.$ref_number.'%')
        ->get();
        return response($suspend);
    }

    public function getHold(Request $request)
    {
        $id = $request->suspend_id;
        $suspends = DB::table('suspend_items')->where('suspend_id', $id)
        ->join('product', 'product.code', '=', 'suspend_items.product_code')
        ->join('suspends', 'suspends.id', '=', 'suspend_items.suspend_id')
        ->select('product.id_product as id_product', 'suspend_items.*', 'suspends.discount_total as discount_total', 'suspends.id as id_susp')
        ->get();
        return response($suspends);
    }

    public function invoice($id){
        $orders = orders::find($id);
        $data = DB::table('orders')->where('id', $id)->first();
        $outlets = outlets::find($data->outlet_id);
        $customer = Customer::find($data->customer_id);
        $items = DB::table('order_items')->where('order_id', $id)
        ->select(DB::raw('(order_items.qty*order_items.price) AS total'), 'order_items.*')
        ->get();
        $total = DB::table('order_items')->where('order_id', $id)
        ->select(DB::raw('sum(order_items.qty*order_items.price) AS totalall'))
        ->get();
        return view('pages.invoice')->with('orders', $orders)->with('outlets', $outlets)->with('customer', $customer)->with('items', $items)->with('total', $total);
    }

    public function invoice_a4($id)
    {
        $orders = orders::find($id);
        $data = DB::table('orders')->where('id', $id)->first();
        $outlets = outlets::find($data->outlet_id);
        $customer = Customer::find($data->customer_id);
        $items = DB::table('order_items')->where('order_id', $id)
        ->select(DB::raw('(order_items.qty*order_items.price) AS total'), 'order_items.*')
        ->get();
        $total = DB::table('order_items')->where('order_id', $id)
        ->select(DB::raw('sum(order_items.qty*order_items.price) AS totalall'))
        ->get();
        return view('pages.invoice_a4')->with('orders', $orders)->with('outlets', $outlets)->with('customer', $customer)->with('items', $items)->with('total', $total);
    }

    public function pnl(){
        return view('pages.profitnloss');
    }

    public function makepayment(){
        return view('pages.makepayment'); 
    }

    //Settings
    public function payment(){
        $payment = payment_method::all();
    return view('pages.setting.payment_method')->with('payment', $payment);    
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
        $expensescategory = DB::table('expensescategory')->get();
        $outlets = DB::table('outlets')->get();
        $expenses = DB::table('expenses')
        ->join('outlets', 'outlets.id', '=', 'expenses.outlet_id')
        ->join('expensescategory', 'expensescategory.id', '=', 'expenses.expense_category')
        ->select('expenses.*', 'outlets.name_outlet as name_outlet', 'expensescategory.name as name_category')
        ->get();
        return view('pages.expenses.expenses', ['expenses' => $expenses,'expensescategory'=> $expensescategory,'outlets'=>$outlets]);    
    }
    public function expensessearch(Request $request){
        $cari = $request->cari;
        $caricategory = $request->caricategory;
        $carioutlet = $request->carioutlet;
        $expensescategory = DB::table('expensescategory')->get();
        $outlets = DB::table('outlets')->get();
        $expenses = DB::table('expenses')
        ->join('outlets', 'outlets.id', '=', 'expenses.outlet_id')
        ->join('expensescategory', 'expensescategory.id', '=', 'expenses.expense_category')
        ->select('expenses.*', 'outlets.name_outlet as name_outlet', 'expensescategory.name as name_category')
        ->Where('expenses_number','like',"%".$cari."%")
        ->Where('expense_category','like',"%".$caricategory."%")
        ->Where('outlet_id','like',"%".$carioutlet."%")
        ->get();
        return view('pages.expenses.expensessearch', ['expenses' => $expenses,'expensescategory'=> $expensescategory,'outlets'=>$outlets]);    
    }
    public function addexpenses(){
        $expensescategory = DB::table('expensescategory')->get();
        $outlets = DB::table('outlets')->get();
        return view('tambah.addexpenses',['expensescategory'=> $expensescategory,'outlets'=>$outlets]); 
    }
    public function addexpensesstore(Request $request){
        $this->validate($request, [
            'number' => 'required|unique:expenses,expenses_number',
            'outlet_id' => 'required',
            'date' => 'required',
            'reason' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('image');
        $image_name = time()."_".$image->getClientOriginalName();
        $folder = 'expenses_image';
        $image->move($folder,$image_name);
        $status = 1;

        expenses::create([
            'expenses_number' => $request->number,
            'expense_category' => $request->category,
            'outlet_id' => $request->outlet_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'reason' => $request->reason,
            'file_name' => $image_name,
            'status' => $status
        ]);

        return redirect ('/expenses')->with('success', 'Expenses Successfully Created');
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
        $sales = DB::table('orders')->whereRaw("DATE(orders.ordered_datetime) = curdate()")
        ->select('orders.*', DB::raw('DATE(orders.ordered_datetime) as date'))
        ->get();
        return view('pages.sales.todaysales')->with('sales', $sales);
    }

    //report
    public function salesreports(Request $request){
        $outlet = $request->outlets;
        $paid = $request->paid;
        $start = $request->startdate;
        $end = $request->enddate;
        
        $outlets = DB::table('outlets')->get();
        $payment = payment_method::all();
        $reportsale = DB::table('orders')->whereBetween(DB::raw('DATE(ordered_datetime)'), [$start, $end])
        ->where('outlet_id', '=', $outlet)
        ->where('payment_method', '=', $paid)
        ->select('orders.*', DB::raw('DATE(ordered_datetime) as date'))
        ->get();
        return view('pages.reports.salesreports')->with('outlets', $outlets)->with('payment', $payment)->with('reportsale', $reportsale);
    }

    public function soldbyproduct(){
        return view('pages.reports.soldbyproduct');
    }

    public function reportsale(Request $request)
    {
        return view('pages.reports.reportajax', compact('reportsale'));
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
    public function editcategory($id){
        $category = category::find($id);
        return view('pages.product.editproductcategory')->with('category',$category);
    }
    public function editProductCategoryupdate($id, Request $request){
        $this->validate($request,[
            'category_name' => 'required',
            'status' => 'required'
            ]);
            $category = category::find($id);
            $category->category_name = $request->category_name;
            $category->status = $request->status;
            $category->save();
            return redirect('/product/ProductCategory')->with(['success' => 'Data Berhasil Dirubah']); 
        }
    //edit
    public function addpayment(){
        return view('tambah.addPaymentMethod'); 
    }

    public function addpaymentstore(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);

        payment_method::create([
            'name' => $request->name,
            'status' => 1
        ]);
        return redirect('/setting/payment_method');
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

    //tambah
    public function editpayment(){
        return view('pages.edit.editpayment'); 
    }
    public function editexpenses($id){
        $expenses = expenses::find($id);
        $outlets = outlets::all();
        $category = expensescategory::all();
        return view('pages.edit.editexpenses')->with('expenses', $expenses)->with('outlets', $outlets)->with('category', $category); 
    }
    public function updateexpenses($id, Request $request){
        
        if($request->hasFile('image')){
            $this->validate($request, [
                'number' => 'required',
                'outlet_id' => 'required',
                'date' => 'required',
                'reason' => 'required',
                'amount' => 'required',
                'category' => 'required',
                'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $filename = $request->filename;
            $filepath = 'expenses_image/'.$filename;
            if(file_exists($filepath)){
                @unlink($filepath);
            } 

            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $folder = 'expenses_image';
            $image->move($folder,$image_name);
            
            $expenses = expenses::find($id);
            $expenses->update([
                'expenses_number' => $request->number,
                'expense_category' => $request->category,
                'outlet_id' => $request->outlet_id,
                'date' => $request->date,
                'amount' => $request->amount,
                'reason' => $request->reason,
                'file_name' => $image_name
            ]);
        }

        else {
            $this->validate($request, [
                'number' => 'required',
                'outlet_id' => 'required',
                'date' => 'required',
                'reason' => 'required',
                'amount' => 'required',
                'category' => 'required',
            ]);
            $expenses = expenses::find($id);
            $expenses->update([
                'expenses_number' => $request->number,
                'expense_category' => $request->category,
                'outlet_id' => $request->outlet_id,
                'date' => $request->date,
                'amount' => $request->amount,
                'reason' => $request->reason
            ]);
        }
        return redirect('/expenses')->with(['success' => 'your data succesfylly updated']);
    }

    public function deleteexpenses($id){
        $data = \DB::table('expenses')->where('id', $id)->first();
        $filename = $data->file_name;
        $filepath = 'expenses_image/'.$filename;
        if(file_exists($filepath)){
            @unlink($filepath);
        } 

        expenses::find($id)->delete();
        return redirect('/expenses')->with('success', 'expenses succesfully deleted');
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
