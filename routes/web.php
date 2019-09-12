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
Route::get('/debit/makepayment','PosController@makepayment')->middleware('ceklogin' , 'response');

//sales
Route::get('/todaysales', 'PosController@todaysales')->middleware('ceklogin' , 'response');
Route::get('/openedbil', 'PosController@openedbil')->middleware('ceklogin' , 'response');

//reports
Route::get('/salesreports', 'PosController@salesreports')->middleware('ceklogin' , 'response');
Route::get('/soldbyproduct', 'PosController@soldbyproduct')->middleware('ceklogin' , 'response');

//expenses
Route::get('/expenses', 'PosController@expenses')->middleware('ceklogin' , 'response');
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
Route::post('/addCustomerposstore','PosController@addCustomerposstore')->middleware('ceklogin' , 'response');
Route::post('/posadd/orderadd/{id}', 'PosController@orderadd');


// Return Order
Route::get('/returnorder/CreateReturn','PosController@createreturn')->middleware('ceklogin' , 'response');
Route::get('/returnorder/ReportReturn','PosController@reportreturn')->middleware('ceklogin' , 'response');

// Inventory
Route::get('/inventory','inventorycontroller@inventory')->middleware('ceklogin' , 'response');
Route::get('/inventory/editinventory/{code}','inventorycontroller@editinventory')->middleware('ceklogin' , 'response');
Route::post('/inventory/editinventoryupdate/','inventorycontroller@editinventoryupdate')->middleware('ceklogin' , 'response');

// Products
Route::get('/product/ListProduct','ProductController@listproduct');
Route::get('/product/ListProduct/addProduct','ProductController@addProduct');
Route::post('/product/ListProduct/addProductstore','ProductController@addProductstore');
Route::get('/product/ListProduct/editproduct/{id_product}','ProductController@editproduct')->middleware('ceklogin' , 'response');
Route::put('/product/ListProduct/editproductupdate/{id_product}','ProductController@editproductupdate')->middleware('ceklogin' , 'response');
Route::get('/product/ListProduct/editproductdelete/{id_product}','ProductController@editproductdelete')->middleware('ceklogin' , 'response');
Route::get('/product/ProductCategory','PosController@productcategory');
Route::get('/product/ProductCategory/addProductCategory','PosController@addcategory');
Route::post('/product/ProductCategory/addProductCategorystore','PosController@addProductCategorystore');
Route::get('/product/ProductCategory/editProductCategory/{id}','PosController@editcategory');
Route::put('/product/ProductCategory/editProductCategoryupdate/{id}','PosController@editProductCategoryupdate');


// Purchase Order ojo di middleware sek
Route::get('/purchase_order/recivepurchaseorder/{id}','PurchaseorderController@recivepurchaseorder');
Route::put('/purchase_order/updatepurchaseorder/{id}', 'PurchaseorderController@updatepurchaseorder' , 'response');
Route::get('/purchase_order/editpurchaseorder/{id}','PurchaseorderController@editpurchaseorder' , 'response');
Route::get('/purchase_order','PurchaseorderController@purchase');
Route::get('/purchase_order/CreatePurchaseOrder','PurchaseorderController@createpurchase' , 'response');
Route::post('/purchase_order/CreatePurchaseOrderstore','PurchaseorderController@createpurchasestore' , 'response');

// Setting 
Route::get('/setting/payment_method', 'PosController@payment')->middleware('ceklogin' , 'response');
Route::get('/setting/payment_method/AddPaymentMethod', 'PosController@addpayment')->middleware('ceklogin' , 'response');
Route::post('/setting/addpayment', 'PosController@addpaymentstore');

// outlet ojo di maddleware sek
Route::get('/setting/outlets', 'OutletsController@outlets');
Route::get('/setting/outlets/addoutlet','OutletsController@addoutlet');
Route::post('/setting/outlets/addoutletstore','OutletsController@addoutletstore');  
Route::get('/setting/editoutlet/{id}', 'OutletsController@editoutlet');
Route::put('/setting/editoutletupdate/{id}', 'OutletsController@editoutletupdate');
Route::get('/setting/editoutletdelete/{id}', 'OutletsController@editoutletdelete');


//supllier
Route::get('/setting/suppliers', 'PosController@suppliers');
Route::get('/setting/suppliersadd', 'PosController@suppliersadd');
Route::post('/setting/supllierstore','PosController@supllierstore');
Route::get('/setting/editsupplier/{id}', 'PosController@editsupplier');
Route::get('/setting/editsupplierdelete/{id}','PosController@editsupplierdelete');
Route::post('/setting/editsupplierupdate/{id}', 'PosController@editsupplierupdate');

Route::get('/setting/system_setting', 'PosController@system');
Route::get('/setting/users/adduser', 'UserController@adduser');
Route::get('/setting/edituser', 'UserController@edituser');
Route::get('/setting/ChangePassword', 'UserController@changepassword');

Route::get('/setting/editpayment', 'PosController@editpayment');
Route::get('/postuser', 'UserController@postuser');
Route::get('/role', 'PosController@role');
Route::get('/addrole', 'PosController@addrole');

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