<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function login(){
        return view('login');    
    }
    public function dashboard(){
        return view('pages.dashboard');    
    }
    public function customer(){
        return view('pages.customer');    
    }
    public function addCustomer(){
        return view('tambah.addCustomer');    
    }
    public function debit(){
        return view('pages.debit');    
    }
    public function inventory(){
        return view('pages.inventory');    
    }
    public function addgift(){
        return view('tambah.addgift');    
    }
    public function pos(){
        return view('pages.pos');    
    }    
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

    public function expenses(){
        return view('pages.expenses.expenses');    
    }

    public function expenenses_category(){
        return view('pages.expenses.expenses_category');    
    }
}
