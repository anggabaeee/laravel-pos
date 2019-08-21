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
Route::get('/dashboard','PosController@dashboard');
Route::get('/customer','PosController@customer');
Route::get('/customer/addCustomer','PosController@addCustomer');
Route::post('/customer/addCustomerstore','PosController@addCustomerstore');
Route::get('/customer/editcustomer','PosController@editcustomer');
Route::get('/addgift','PosController@addgift');
Route::get('/listgift','PosController@listgift');
Route::get('/debit','PosController@debit');
Route::get('/inventory','PosController@inventory');
Route::get('/pos','PosController@pos');
Route::get('/expenses', 'PosController@expenses');
Route::get('/expenses/addexpenses', 'PosController@addexpenses');
Route::get('/expensescategory', 'PosController@expenses_category');
Route::get('/expensescategory/addexpensescategory', 'PosController@addexpensescategory');
Route::get('/salesreports', 'PosController@salesreports');
Route::get('/soldbyproduct', 'PosController@soldbyproduct');
Route::get('/todaysales', 'PosController@todaysales');
Route::get('/openedbil', 'PosController@openedbil');
Route::get('/purchase_order','PosController@purchase');
Route::get('/purchase_order/CreatePurchaseOrder','PosController@createpurchase');
Route::get('/setting/payment_method', 'PosController@payment');
Route::get('/setting/payment_method/AddPaymentMethod', 'PosController@addpayment');
Route::get('/setting/outlets', 'PosController@outlets');
Route::get('/setting/users', 'PosController@users');
Route::get('/setting/suppliers', 'PosController@suppliers');
Route::get('/setting/system_setting', 'PosController@system');
Route::get('/setting/outlets/addoutlet','PosController@addoutlet');
Route::get('/setting/users/adduser', 'PosController@adduser');
Route::get('/product/ListProduct','PosController@listproduct');
Route::get('/product/ProductCategory','PosController@productcategory');
Route::get('/returnorder/CreateReturn','PosController@createreturn');
Route::get('/returnorder/ReportReturn','PosController@reportreturn');

