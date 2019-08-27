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
Route::get('/dashboard','PosController@dashboard');

//customer
Route::get('/customer','PosController@customer');
Route::get('/customer/addCustomer','PosController@addCustomer');
Route::post('/customer/addCustomerstore','PosController@addCustomerstore');
Route::get('/customer/editcustomer/{id}','PosController@editcustomer');
Route::put('/customer/editcustomerupdate/{id}', 'PosController@editcustomerupdate');
Route::get('/customer/editcustomerdelete/{id}','PosController@editcustomerdelete');

//gift card
Route::get('/addgift','PosController@addgift');
Route::post('/addgift/addgiftstore','PosController@addgiftstore');
Route::get('/listgift','PosController@listgift');
Route::get('/listgiftdelete/{id}','PosController@listgiftdelete');

//debit
Route::get('/debit','PosController@debit');
Route::get('/debit/makepayment','PosController@makepayment');

//sales
Route::get('/todaysales', 'PosController@todaysales');
Route::get('/openedbil', 'PosController@openedbil');

//reports
Route::get('/salesreports', 'PosController@salesreports');
Route::get('/soldbyproduct', 'PosController@soldbyproduct');

//expenses
Route::get('/expenses', 'PosController@expenses');
Route::get('/expenses/addexpenses', 'PosController@addexpenses');
Route::get('/expenses/editexpenses', 'PosController@editexpenses');
Route::get('/expensescategory', 'PosController@expenses_category');
Route::get('/expensescategory/addexpensescategory', 'PosController@addexpensescategory');
Route::post('/expensescategory/addexpensescategorystore', 'PosController@addexpensescategorystore');
Route::get('/expenses/editexpensescategory', 'PosController@editexpensescategory');

//profit & loss
Route::get('/pnl/pnlReport','PosController@pnlreport');
Route::get('/pnl','PosController@pnl');

// POS
Route::get('/pos','PosController@pos');
Route::get('/posadd','PosController@posadd');
Route::post('/addCustomerposstore','PosController@addCustomerposstore');


// Return Order
Route::get('/returnorder/CreateReturn','PosController@createreturn');
Route::get('/returnorder/ReportReturn','PosController@reportreturn');

// Inventory
Route::get('/inventory','PosController@inventory');

// Products
Route::get('/product/ListProduct','PosController@listproduct');
Route::get('/product/ListProduct/addProduct','PosController@addProduct');
Route::post('/product/ListProduct/addProductstore','PosController@addProductstore');
Route::get('/product/ProductCategory','PosController@productcategory');
Route::get('/product/ProductCategory/addProductCategory','PosController@addcategory');
Route::post('/product/ProductCategory/addProductCategorystore','PosController@addProductCategorystore');


// Purchase Order
Route::get('/purchase_order','PosController@purchase');
Route::get('/purchase_order/CreatePurchaseOrder','PosController@createpurchase');

// Setting
Route::get('/setting/payment_method', 'PosController@payment');
Route::get('/setting/payment_method/AddPaymentMethod', 'PosController@addpayment');

// outlet
Route::get('/setting/outlets', 'PosController@outlets');
Route::get('/setting/outlets/addoutlet','PosController@addoutlet');
Route::post('/setting/outlets/addoutletstore','PosController@addoutletstore');
Route::get('/setting/editoutlet/{id}', 'PosController@editoutlet');
Route::put('/setting/editoutletupdate/{id}', 'PosController@editoutletupdate');
Route::get('/setting/editoutletdelete/{id}', 'PosController@editoutletdelete');

Route::get('/setting/users', 'PosController@users');
Route::get('/setting/suppliers', 'PosController@suppliers');
Route::get('/setting/suppliersadd', 'PosController@suppliersadd');
Route::get('/setting/system_setting', 'PosController@system');
Route::get('/setting/users/adduser', 'PosController@adduser');
Route::get('/setting/edituser', 'PosController@edituser');
Route::get('/setting/ChangePassword', 'PosController@changepassword');
Route::get('/setting/editsupplier', 'PosController@editsupplier');
Route::get('/setting/editpayment', 'PosController@editpayment');
Route::get('/postuser', 'PosController@postuser');
Route::get('/role', 'PosController@role');
Route::get('/addrole', 'PosController@addrole');










