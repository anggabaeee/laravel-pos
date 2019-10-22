<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;
use App\outlets;

class OutletsController extends Controller
{
    //
    public function outlets(){
        $outletid = Session::get('outlets');
        $role = Session::get('role');

        if($role == "3"){
            $outlets = DB::table('outlets')->get();
        }
        else{
            $outlets = DB::table('outlets')->where('id', $outletid)->get();
        }

        return view('pages.setting.outlets',['outlets'=>$outlets]);    
    }
    public function addoutlet(){
        return view('tambah.addoutlets'); 
    }
    public function addoutletstore(Request $request){
        $this->validate($request,[
            'name_outlet' => 'required',
            'address_outlet' => 'required',
            'contact_number' => 'required',
            'receipt_header' => 'required',
            'receipt_footer' => 'required',
            'status' => 'required'
        ]);
        outlets::create([
            'name_outlet' => $request->name_outlet,
            'address_outlet' => $request->address_outlet,
            'contact_number' => $request->contact_number,
            'receipt_header' => $request->receipt_header,
            'receipt_footer' => $request->receipt_footer,
            'status' => $request->status
        ]);        
        return redirect('/setting/outlets')->with(['success' => 'Data Berhasil Ditambahkan']); 
    }
    public function editoutlet($id){
        $role = Session::get('role');
        $outletid = Session::get('outlets');
        if($role == 1 || $role == 2)
        {
            $id = $outletid;
        }
        $outlets = outlets::find($id);
        return view('pages.edit.editoutlet',['outlets'=>$outlets]);    
    }
    public function editoutletupdate($id, Request $request){
        $this->validate($request,[
            'name_outlet' => 'required',
            'address_outlet' => 'required',
            'contact_number' => 'required',
            'receipt_footer' => 'required'
            ]);

            $outlets = outlets::find($id);
            $outlets->name_outlet = $request->name_outlet;
            $outlets->address_outlet = $request->address_outlet;
            $outlets->contact_number = $request->contact_number;
            $outlets->receipt_footer = $request->receipt_footer;
            $outlets->save();
            return redirect('/setting/outlets');
    }
    public function editoutletdelete($id){
        $outlets = outlets::find($id);
        $outlets->delete();
        return redirect('/setting/outlets')->with(['success' => 'Data Berhasil Dihapus']);;
    }

}
