<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','AuthController@login')->middleware('response');
Route::get('/loginpost','AuthController@loginpost');
Route::get('/logout','AuthController@logout');
// dashboard
Route::get('/dashboard','PosController@dashboard')->middleware('response', 'ceklogin');

//customer
Route::get('/customer','PosController@customer')->middleware('ceklogin' , 'response');
Route::get('customer/export_customer', 'PosController@customerexport');
Route::get('/customer/addCustomer','PosController@addCustomer')->middleware('ceklogin' , 'response');
Route::post('/customer/addCustomerstore','PosController@addCustomerstore')->middleware('ceklogin' , 'response');
Route::get('/customer/editcustomer/{id}','PosController@editcustomer')->middleware('ceklogin' , 'response');
Route::put('/customer/editcustomerupdate/{id}', 'PosController@editcustomerupdate')->middleware('ceklogin' , 'response');
Route::get('/customer/editcustomerdelete/{id}','PosController@editcustomerdelete')->middleware('ceklogin' , 'response');

//gift card
Route::get('/addgift','PosController@addgift')->middleware('ceklogin' , 'response');
Route::post('/addgift/addgiftstore','PosController@addgiftstore')->middleware('ceklogin' , 'response');
Route::get('/listgift','PosController@listgift')->middleware('ceklogin' , 'response');
Route::get('/listgiftdelete/{id}','PosController@listgiftdelete')->middleware('ceklogin' , 'response');

//debit
Route::get('/debit','PosController@debit')->middleware('ceklogin' , 'response');
Route::get('/debit/makepayment/{id}','PosController@makepayment')->middleware('ceklogin' , 'response');
Route::post('/submitmakepayment/{id}','PosController@submitmakepayment')->middleware('ceklogin' , 'response');
Route::get('/debitsearch','PosController@debitsearch')->middleware('response', 'ceklogin');

//sales
Route::get('/todaysales', 'PosController@todaysales')->middleware('ceklogin' , 'response');
Route::get('/openedbil', 'PosController@openedbil')->middleware('ceklogin' , 'response');
Route::get('/todaysales/deletesale/{id}', 'PosController@deletesale')->middleware('response', 'ceklogin');
Route::get('/openedbil/deletebill/{id}', 'PosController@deletebill')->middleware('ceklogin' , 'response');
Route::get('/posadd/suspend/{id}', 'PosController@suspend')->middleware('response', 'ceklogin');

//reports
Route::get('/salesreports', 'PosController@salesreports')->middleware('response', 'ceklogin');
Route::get('/soldbyproduct', 'PosController@soldbyproduct')->middleware('ceklogin' , 'response');

//expenses
Route::get('/expenses', 'PosController@expenses')->middleware('ceklogin' , 'response');
Route::get('/expensessearch', 'PosController@expensessearch')->middleware('ceklogin' , 'response');
Route::get('/expenses/addexpenses', 'PosController@addexpenses')->middleware('ceklogin' , 'response');
Route::post('/expenses/addexpensesstore', 'PosController@addexpensesstore')->middleware('ceklogin' , 'response');
Route::get('/expenses/editexpenses/{id}', 'PosController@editexpenses')->middleware('ceklogin' , 'response');
Route::post('/expenses/updateexpenses/{id}', 'PosController@updateexpenses')->middleware('ceklogin' , 'response');
Route::get('/expenses/deleteexpenses/{id}', 'PosController@deleteexpenses')->middleware('ceklogin' , 'response');

// expenses category
Route::get('/expensescategory', 'PosController@expenses_category')->middleware('ceklogin' , 'response');
Route::get('/expensescategory/addexpensescategory', 'PosController@addexpensescategory')->middleware('ceklogin' , 'response');
Route::post('/expensescategory/addexpensescategorystore', 'PosController@addexpensescategorystore')->middleware('ceklogin' , 'response');
Route::get('/expenses/editexpensescategory/{id}', 'PosController@editexpensescategory')->middleware('ceklogin' , 'response');
Route::put('/expenses/editexpensescategory/update/{id}', 'PosController@editexpensescategoryupdate')->middleware('ceklogin' , 'response');
Route::get('/expenses/editexpensescategory/delete/{id}','PosController@editexpensescategorydelete')->middleware('ceklogin' , 'response');

//profit & loss
Route::get('/pnl/pnlReport','PosController@pnlreport')->middleware('pnlcek', 'response' , 'response');
Route::get('/pnl','PosController@pnl')->middleware('pnlcek', 'response' , 'response');

// POS
Route::get('/pos','PosController@pos')->middleware('ceklogin' , 'response');
Route::get('/posadd/{id}','PosController@posadd')->middleware('ceklogin' , 'response');
Route::get('/load','PosController@load')->middleware('response', 'ceklogin');
Route::post('/addCustomerposstore','PosController@addCustomerposstore')->middleware('ceklogin' , 'response');
Route::post('/posadd/orderadd/{id}', 'PosController@addorder')->middleware('response', 'ceklogin');
Route::get('/view_invoice/{id}', 'PosController@invoice')->middleware('response', 'ceklogin');
Route::get('/view_invoice_a4/{id}', 'PosController@invoice_a4')->middleware('response', 'ceklogin');
Route::get('/todaysale', 'PosController@getsaletoday')->middleware('response', 'ceklogin');
Route::get('/getcustomer', 'PosController@getcustomer')->middleware('response', 'ceklogin');
Route::post('/addBill', 'PosController@addBill')->middleware('response', 'ceklogin');
Route::get('/openedHold', 'PosController@openedHold')->middleware('response', 'ceklogin');
Route::get('/getHold', 'PosController@getHold')->middleware('response', 'ceklogin');
Route::get('/searchHold', 'PosController@searchHold')->middleware('response', 'ceklogin');
Route::get('/checkGift', 'PosController@checkGift')->middleware('response', 'ceklogin');

// Return Order
Route::get('/returnorder/CreateReturn','ReturnContrrol@createreturn')->middleware('ceklogin' , 'response');
Route::get('/returnorder/ViewCreateReturn/{id}','ReturnContrrol@viewcreatereturn')->middleware('ceklogin' , 'response');
Route::get('/returnorder/printCreateReturn/{id}','ReturnContrrol@printCreateReturn')->middleware('ceklogin' , 'response');
Route::get('/returnorder/ReportReturn','ReturnContrrol@reportreturn')->middleware('ceklogin' , 'response');
Route::post('/createstore','ReturnContrrol@createstore')->middleware('ceklogin' , 'response');

// Inventory
Route::get('/inventory','inventorycontroller@inventory')->middleware('ceklogin' , 'response');
Route::get('/inventory/editinventory/{code}','inventorycontroller@editinventory')->middleware('ceklogin' , 'response');
Route::post('/inventory/editinventoryupdate/','inventorycontroller@editinventoryupdate')->middleware('ceklogin' , 'response');

// Products
Route::get('/product/ListProduct','ProductController@listproduct')->middleware('response', 'ceklogin');
Route::get('/product/ListProduct/addProduct','ProductController@addProduct')->middleware('response', 'ceklogin');
Route::post('/product/ListProduct/addProductstore','ProductController@addProductstore')->middleware('response', 'ceklogin');
Route::get('/product/ListProduct/editproduct/{id_product}','ProductController@editproduct')->middleware('ceklogin' , 'response');
Route::put('/product/ListProduct/editproductupdate/{id_product}','ProductController@editproductupdate')->middleware('ceklogin' , 'response');
Route::get('/product/ListProduct/editproductdelete/{id_product}','ProductController@editproductdelete')->middleware('ceklogin' , 'response');
Route::get('/product/ProductCategory','PosController@productcategory')->middleware('response', 'ceklogin');
Route::get('/product/ProductCategory/addProductCategory','PosController@addcategory')->middleware('response', 'ceklogin');
Route::post('/product/ProductCategory/addProductCategorystore','PosController@addProductCategorystore')->middleware('response', 'ceklogin');
Route::get('/product/ProductCategory/editProductCategory/{id}','PosController@editcategory')->middleware('response', 'ceklogin');
Route::put('/product/ProductCategory/editProductCategoryupdate/{id}','PosController@editProductCategoryupdate')->middleware('response', 'ceklogin');


// Purchase Order ojo di middleware sek
Route::get('/purchase_order/recivepurchaseorder/{id}','PurchaseorderController@recivepurchaseorder')->middleware('response', 'ceklogin');
Route::put('/purchase_order/updaterecivepurchaseorder/{id}','PurchaseorderController@updaterecivepurchaseorder')->middleware('response', 'ceklogin');
Route::put('/purchase_order/updatepurchaseorder/{id}', 'PurchaseorderController@updatepurchaseorder' , 'response')->middleware('response', 'ceklogin');
Route::get('/purchase_order/editpurchaseorder/{id}','PurchaseorderController@editpurchaseorder' , 'response')->middleware('response', 'ceklogin');
Route::get('/purchase_order/viewpurchase/{id}','PurchaseorderController@viewpurchase')->middleware('response', 'ceklogin');
Route::get('/purchase_order/delete_order/{id}','PurchaseorderController@delete_order')->middleware('response', 'ceklogin');
Route::get('/purchase_order','PurchaseorderController@purchase')->middleware('response', 'ceklogin');
Route::get('/purchase_order/CreatePurchaseOrder','PurchaseorderController@createpurchase' , 'response')->middleware('response', 'ceklogin');
Route::post('/purchase_order/CreatePurchaseOrderstore','PurchaseorderController@createpurchasestore' , 'response')->middleware('response', 'ceklogin');
Route::get('/purchase_order_pdf/{id}', 'PurchaseorderController@exportPDF')->middleware('response', 'ceklogin');

// Setting 
Route::get('/setting/payment_method', 'PosController@payment')->middleware('ceklogin' , 'response');
Route::get('/setting/payment_method/AddPaymentMethod', 'PosController@addpayment')->middleware('ceklogin' , 'response');
Route::post('/setting/addpayment', 'PosController@addpaymentstore')->middleware('response', 'ceklogin');

// outlet ojo di maddleware sek
Route::get('/setting/outlets', 'OutletsController@outlets')->middleware('response', 'ceklogin');
Route::get('/setting/outlets/addoutlet','OutletsController@addoutlet')->middleware('response', 'ceklogin');
Route::post('/setting/outlets/addoutletstore','OutletsController@addoutletstore')->middleware('response', 'ceklogin');  
Route::get('/setting/editoutlet/{id}', 'OutletsController@editoutlet')->middleware('response', 'ceklogin');
Route::put('/setting/editoutletupdate/{id}', 'OutletsController@editoutletupdate')->middleware('response', 'ceklogin');
Route::get('/setting/editoutletdelete/{id}', 'OutletsController@editoutletdelete')->middleware('response', 'ceklogin');


//supllier
Route::get('/setting/suppliers', 'PosController@suppliers')->middleware('response', 'ceklogin');
Route::get('/setting/suppliersadd', 'PosController@suppliersadd')->middleware('response', 'ceklogin');
Route::post('/setting/supllierstore','PosController@supllierstore')->middleware('response', 'ceklogin');
Route::get('/setting/editsupplier/{id}', 'PosController@editsupplier')->middleware('response', 'ceklogin');
Route::get('/setting/editsupplierdelete/{id}','PosController@editsupplierdelete')->middleware('response', 'ceklogin');
Route::post('/setting/editsupplierupdate/{id}', 'PosController@editsupplierupdate')->middleware('response', 'ceklogin');

// Route::get('/setting/system_setting', 'PosController@system');
Route::get('/setting/users/adduser', 'UserController@adduser')->middleware('response', 'ceklogin');
Route::get('/setting/edituser', 'UserController@edituser')->middleware('response', 'ceklogin');
Route::get('/setting/ChangePassword', 'UserController@changepassword')->middleware('response', 'ceklogin');

Route::get('/setting/editpayment', 'PosController@editpayment')->middleware('response', 'ceklogin');
Route::get('/postuser', 'UserController@postuser')->middleware('response', 'ceklogin');
Route::get('/role', 'PosController@role')->middleware('response', 'ceklogin');
Route::get('/addrole', 'PosController@addrole')->middleware('response', 'ceklogin');

//site setting
Route::get('/getsite', 'site_settingController@getsite')->middleware('response', 'ceklogin');
Route::get('/setting/system_setting', 'site_settingController@system_setting')->middleware('pnlcek' , 'response');
Route::put('/setting/system_settingupdate/{id}', 'site_settingController@system_settingupdate')->middleware('pnlcek' , 'response');
Route::get('/setting/users/adduser', 'UserController@adduser')->middleware('ceklogin' , 'response');
Route::get('/setting/edituser/{id}', 'UserController@edituser')->middleware('ceklogin' , 'response');
Route::get('/setting/edituserupdate/{id}', 'UserController@edituserupdate')->middleware('ceklogin' , 'response');
Route::get('/setting/ChangePassword/{id}', 'UserController@changepassword')->middleware('ceklogin' , 'response');
Route::get('/changepasswordupdate/{id}', 'UserController@changepasswordupdate')->middleware('ceklogin' , 'response');
Route::get('/setting/users', 'UserController@users')->middleware('ceklogin' , 'response');
Route::get('/setting/delete/userid={id}', 'UserController@deleteuser')->middleware('ceklogin' , 'response');

Route::get('/setting/editsupplier', 'PosController@editsupplier')->middleware('pnlcek' , 'response');
Route::get('/setting/editpayment', 'PosController@editpayment')->middleware('pnlcek' , 'response');
Route::get('/postuser', 'UserController@postuser')->middleware('ceklogin' , 'response');
Route::get('/role', 'PosController@role')->middleware('pnlcek' , 'response');
Route::get('/addrole', 'PosController@addrole')->middleware('pnlcek' , 'response');