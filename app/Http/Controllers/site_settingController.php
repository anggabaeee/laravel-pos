<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\site_setting;
use File;

class site_settingController extends Controller
{
    public function system_setting()
    {
        $site_setting = DB::table('site_setting')->get();
        return view('pages.setting.system_setting', ['site_setting' => $site_setting]);
    }
    public function system_settingupdate($id, Request $request){
        $this->validate($request,[
            'site_name' => 'required',
            'site_logo' => 'file|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $site_setting = site_setting::find($id);
            $site_setting->site_name = $request->site_name;
            $site_setting->save();
            return redirect('/setting/system_setting')->with(['success' => 'Data Berhasil Dirubah']);
    }
    // public function system_settingstore(Request $request){
    //     $this->validate($request, [
    //         'site_name' => 'required',
    //         'site_logo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $site_logo = $request->file('site_logo');
    //     $nama_site_logo = time()."_".$site_logo->getClientOriginalName();
    //     $tujuan_upload = 'site_image';
    //     $site_logo->move($tujuan_upload,$nama_site_logo);

    //     site_setting::create([
    //         'site_name' => $request->site_name,
    //         'site_logo' => $nama_site_logo
    //     ]);        
    //     return redirect('/setting/system_setting')->with(['success' => 'Data Berhasil Ditambahkan']); 
    // }
}
