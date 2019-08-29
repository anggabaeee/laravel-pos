<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\product;
use App\category;

class ProductController extends Controller
{
    public function listproduct(){
        $product = DB::table('product')
        ->join('category', 'category.id', '=', 'product.category_name')
        ->select('category.id', 'product.*')
        ->get();
        return view('pages.product.listproduct',['product' => $product]); 
    }
    public function addProduct(){
        $category = category::all();
        return view('tambah.addproduct',['category' => $category]);
    }
    public function addProductstore(Request $request){
        $this->validate($request, [
            'code' => 'required|unique:product,code',
            'name_product' => 'required',
            'category_name' => 'required',
            'purchase_price' => 'required',
            'retail_price' => 'required',
            'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required'
        ]);

        $thumbnail = $request->file('thumbnail');
        $nama_thumbnail = time()."_".$thumbnail->getClientOriginalName();
        $tujuan_upload = 'product_image';
        $thumbnail->move($tujuan_upload,$nama_thumbnail);

        product::create([
            'code' => $request->code,
            'name_product' => $request->name_product,
            'category_name' => $request->category_name,
            'purchase_price' => $request->purchase_price,
            'retail_price' => $request->retail_price,
            'thumbnail' => $nama_thumbnail,
            'status' => $request->status
        ]);        
        return redirect('/product/ListProduct')->with(['success' => 'Data Berhasil Ditambahkan']); 
    }
    public function editProduct($id){
        $product = DB::table('product')->where('product.id_product', $id)
        ->join('category', 'product.category_name', '=', 'category.id')
        ->select('product.*','category.id')
        ->get();
        $category = category::all();
        return view('pages.product.editproduct')->with('product', $product)->with('category',$category);
    }
}
