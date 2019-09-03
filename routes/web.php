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

Route::get('/','PosController@login');
Route::get('/loginpost','PosController@loginpost');
Route::get('/logout','PosController@logout');
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
Route::get('/expenses/editexpenses', 'PosController@editexpenses')->middleware('ceklogin' , 'response');

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
Route::get('/posadd','PosController@posadd')->middleware('ceklogin' , 'response');
Route::post('/addCustomerposstore','PosController@addCustomerposstore')->middleware('ceklogin' , 'response');


// Return Order
Route::get('/returnorder/CreateReturn','PosController@createreturn')->middleware('ceklogin' , 'response');
Route::get('/returnorder/ReportReturn','PosController@reportreturn')->middleware('ceklogin' , 'response');

// Inventory
Route::get('/inventory','inventorycontroller@inventory')->middleware('ceklogin' , 'response');
Route::get('/inventory/editinventory/{code}','inventorycontroller@editinventory')->middleware('ceklogin' , 'response');
Route::post('/inventory/editinventoryupdate/','inventorycontroller@editinventoryupdate')->middleware('ceklogin' , 'response');

// Products
Route::get('/product/ListProduct','ProductController@listproduct')->middleware('ceklogin' , 'response');
Route::get('/product/ListProduct/addProduct','ProductController@addProduct')->middleware('ceklogin' , 'response');
Route::post('/product/ListProduct/addProductstore','ProductController@addProductstore')->middleware('ceklogin' , 'response');
Route::get('/product/ListProduct/editproduct/{id_product}','ProductController@editproduct')->middleware('ceklogin' , 'response');
Route::put('/product/ListProduct/editproductupdate/{id_product}','ProductController@editproductupdate')->middleware('ceklogin' , 'response');
Route::get('/product/ListProduct/editproductdelete/{id_product}','ProductController@editproductdelete')->middleware('ceklogin' , 'response');
Route::get('/product/ProductCategory','PosController@productcategory')->middleware('ceklogin' , 'response');
Route::get('/product/ProductCategory/addProductCategory','PosController@addcategory')->middleware('ceklogin' , 'response');
Route::post('/product/ProductCategory/addProductCategorystore','PosController@addProductCategorystore')->middleware('ceklogin' , 'response');


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

// outlet ojo di maddleware sek
Route::get('/setting/outlets', 'PosController@outlets');
Route::get('/setting/outlets/addoutlet','PosController@addoutlet');
Route::post('/setting/outlets/addoutletstore','PosController@addoutletstore');  
Route::get('/setting/editoutlet/{id}', 'PosController@editoutlet')->middleware('ceklogin' , 'response');
Route::put('/setting/editoutletupdate/{id}', 'PosController@editoutletupdate')->middleware('ceklogin' , 'response');
Route::get('/setting/editoutletdelete/{id}', 'PosController@editoutletdelete')->middleware('ceklogin' , 'response');
Route::get('/setting/users', 'FilterController@users')->middleware('ceklogin' , 'response');

//supllier
Route::get('/setting/suppliers', 'PosController@suppliers');
Route::get('/setting/suppliersadd', 'PosController@suppliersadd');
Route::post('/setting/supllierstore','PosController@supllierstore');
Route::get('/setting/editsupplier/{id}', 'PosController@editsupplier');
Route::get('/setting/editsupplierdelete/{id}','PosController@editsupplierdelete');
Route::post('/setting/editsupplierupdate/{id}', 'PosController@editsupplierupdate');

Route::get('/setting/system_setting', 'PosController@system');
Route::get('/setting/users/adduser', 'PosController@adduser');
Route::get('/setting/edituser', 'PosController@edituser');
Route::get('/setting/ChangePassword', 'PosController@changepassword');

Route::get('/setting/editpayment', 'PosController@editpayment');
Route::get('/postuser', 'PosController@postuser');
Route::get('/role', 'PosController@role');
Route::get('/addrole', 'PosController@addrole');





Route::get('/setting/system_setting', 'PosController@system')->middleware('pnlcek' , 'response');
Route::get('/setting/users/adduser', 'PosController@adduser')->middleware('ceklogin' , 'response');
Route::get('/setting/edituser/{id}', 'PosController@edituser')->middleware('ceklogin' , 'response');
Route::get('/setting/edituserupdate/{id}', 'PosController@edituserupdate')->middleware('ceklogin' , 'response');
Route::get('/setting/ChangePassword/{id}', 'PosController@changepassword')->middleware('ceklogin' , 'response');
Route::get('/changepasswordupdate/{id}', 'PosController@changepasswordupdate')->middleware('ceklogin' , 'response');
Route::get('/setting/editsupplier', 'PosController@editsupplier')->middleware('pnlcek' , 'response');
Route::get('/setting/editpayment', 'PosController@editpayment')->middleware('pnlcek' , 'response');
Route::get('/postuser', 'PosController@postuser')->middleware('ceklogin' , 'response');
Route::get('/role', 'PosController@role')->middleware('pnlcek' , 'response');
Route::get('/addrole', 'PosController@addrole')->middleware('pnlcek' , 'response');