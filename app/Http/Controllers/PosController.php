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
    public function addgift(){
        return view('pages.addgift');    
    }


    public function pos(){
        return view('pages.pos');    
    }    
}
