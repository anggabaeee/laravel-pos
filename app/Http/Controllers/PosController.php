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
        return view('pages.addgift');    
    }
    public function pos(){
        return view('pages.pos');    
    }    
}
