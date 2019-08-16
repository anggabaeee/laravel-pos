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
Route::get('/addgift','PosController@addgift');
Route::get('/debit','PosController@debit');
Route::get('/inventory','PosController@inventory');
Route::get('/pos','PosController@pos');
Route::get('/setting/payment_method', 'PosController@payment');
Route::get('/setting/outlets', 'PosController@outlets');
Route::get('/setting/users', 'PosController@users');
Route::get('/setting/suppliers', 'PosController@suppliers');
Route::get('/setting/system_setting', 'PosController@system');
Route::get('/expenses', 'PosController@expenses');
Route::get('/expenses_category', 'PosController@expenses_category');
Route::get('/purchase_order','PosController@purchase');

