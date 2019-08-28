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
Route::get('/dashboard','PosController@dashboard')->middleware('ceklogin');

//customer
Route::get('/customer','PosController@customer')->middleware('ceklogin');
Route::get('/customer/addCustomer','PosController@addCustomer')->middleware('ceklogin');
Route::post('/customer/addCustomerstore','PosController@addCustomerstore')->middleware('ceklogin');
Route::get('/customer/editcustomer/{id}','PosController@editcustomer')->middleware('ceklogin');
Route::put('/customer/editcustomerupdate/{id}', 'PosController@editcustomerupdate')->middleware('ceklogin');
Route::get('/customer/editcustomerdelete/{id}','PosController@editcustomerdelete')->middleware('ceklogin');

//gift card
Route::get('/addgift','PosController@addgift')->middleware('ceklogin');
Route::post('/addgift/addgiftstore','PosController@addgiftstore')->middleware('ceklogin');
Route::get('/listgift','PosController@listgift')->middleware('ceklogin');
Route::get('/listgiftdelete/{id}','PosController@listgiftdelete')->middleware('ceklogin');

//debit
Route::get('/debit','PosController@debit')->middleware('ceklogin');
Route::get('/debit/makepayment','PosController@makepayment')->middleware('ceklogin');

//sales
Route::get('/todaysales', 'PosController@todaysales')->middleware('ceklogin');
Route::get('/openedbil', 'PosController@openedbil')->middleware('ceklogin');

//reports
Route::get('/salesreports', 'PosController@salesreports')->middleware('ceklogin');
Route::get('/soldbyproduct', 'PosController@soldbyproduct')->middleware('ceklogin');

//expenses
Route::get('/expenses', 'PosController@expenses')->middleware('ceklogin');
Route::get('/expenses/addexpenses', 'PosController@addexpenses')->middleware('ceklogin');
Route::get('/expenses/editexpenses', 'PosController@editexpenses')->middleware('ceklogin');

// expenses category
Route::get('/expensescategory', 'PosController@expenses_category')->middleware('ceklogin');
Route::get('/expensescategory/addexpensescategory', 'PosController@addexpensescategory')->middleware('ceklogin');
Route::post('/expensescategory/addexpensescategorystore', 'PosController@addexpensescategorystore')->middleware('ceklogin');
Route::get('/expenses/editexpensescategory/{id}', 'PosController@editexpensescategory')->middleware('ceklogin');
Route::put('/expenses/editexpensescategory/update/{id}', 'PosController@editexpensescategoryupdate')->middleware('ceklogin');
Route::get('/expenses/editexpensescategory/delete/{id}','PosController@editexpensescategorydelete')->middleware('ceklogin');

//profit & loss
Route::get('/pnl/pnlReport','PosController@pnlreport')->middleware('ceklogin');
Route::get('/pnl','PosController@pnl')->middleware('ceklogin');

// POS
Route::get('/pos','PosController@pos')->middleware('ceklogin');
Route::get('/posadd','PosController@posadd')->middleware('ceklogin');
Route::post('/addCustomerposstore','PosController@addCustomerposstore')->middleware('ceklogin');


// Return Order
Route::get('/returnorder/CreateReturn','PosController@createreturn')->middleware('ceklogin');
Route::get('/returnorder/ReportReturn','PosController@reportreturn')->middleware('ceklogin');

// Inventory
Route::get('/inventory','inventorycontroller@inventory')->middleware('ceklogin');
Route::get('/inventory/editinventory/{id}','inventorycontroller@editinventory')->middleware('ceklogin');
Route::put('/inventory/editinventoryupdate/{id}','inventorycontroller@editinventoryupdate')->middleware('ceklogin');


// Products
Route::get('/product/ListProduct','PosController@listproduct')->middleware('ceklogin');
Route::get('/product/ListProduct/addProduct','PosController@addProduct')->middleware('ceklogin');
Route::post('/product/ListProduct/addProductstore','PosController@addProductstore')->middleware('ceklogin');
Route::get('/product/ProductCategory','PosController@productcategory')->middleware('ceklogin');
Route::get('/product/ProductCategory/addProductCategory','PosController@addcategory')->middleware('ceklogin');
Route::post('/product/ProductCategory/addProductCategorystore','PosController@addProductCategorystore')->middleware('ceklogin');


// Purchase Order
Route::get('/purchase_order','PosController@purchase')->middleware('ceklogin');
Route::get('/purchase_order/CreatePurchaseOrder','PosController@createpurchase')->middleware('ceklogin');

// Setting
Route::get('/setting/payment_method', 'PosController@payment')->middleware('ceklogin');
Route::get('/setting/payment_method/AddPaymentMethod', 'PosController@addpayment')->middleware('ceklogin');

// outlet
Route::get('/setting/outlets', 'PosController@outlets')->middleware('ceklogin');
Route::get('/setting/outlets/addoutlet','PosController@addoutlet')->middleware('ceklogin');
Route::post('/setting/outlets/addoutletstore','PosController@addoutletstore')->middleware('ceklogin');
Route::get('/setting/editoutlet/{id}', 'PosController@editoutlet')->middleware('ceklogin');
Route::put('/setting/editoutletupdate/{id}', 'PosController@editoutletupdate')->middleware('ceklogin');
Route::get('/setting/editoutletdelete/{id}', 'PosController@editoutletdelete')->middleware('ceklogin');
Route::get('/setting/users', 'PosController@users')->middleware('ceklogin');


//supllier
Route::get('/setting/suppliers', 'PosController@suppliers')->middleware('ceklogin');
Route::get('/setting/suppliersadd', 'PosController@suppliersadd')->middleware('ceklogin');
Route::post('/setting/supllierstore','PosController@supllierstore')->middleware('ceklogin');



Route::get('/setting/system_setting', 'PosController@system')->middleware('ceklogin');
Route::get('/setting/users/adduser', 'PosController@adduser')->middleware('ceklogin');
Route::get('/setting/edituser/{id}', 'PosController@edituser')->middleware('ceklogin');
Route::get('/setting/edituserupdate/{id}', 'PosController@edituserupdate')->middleware('ceklogin');
Route::get('/setting/ChangePassword/{id}', 'PosController@changepassword')->middleware('ceklogin');
Route::get('/changepasswordupdate/{id}', 'PosController@changepasswordupdate')->middleware('ceklogin');
Route::get('/setting/editsupplier', 'PosController@editsupplier')->middleware('ceklogin');
Route::get('/setting/editpayment', 'PosController@editpayment')->middleware('ceklogin');
Route::get('/postuser', 'PosController@postuser')->middleware('ceklogin');
Route::get('/role', 'PosController@role')->middleware('ceklogin');
Route::get('/addrole', 'PosController@addrole')->middleware('ceklogin');










