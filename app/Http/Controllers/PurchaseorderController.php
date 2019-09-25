<?php 
namespace App\Http\Controllers;
use PDF;
use App\Htpp\Kernel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use App\purchase_order_status;
use App\purchase_order;
use App\purchase_order_items;
use App\supplier;
use App\Customer;
use App\gift_card;
use App\category;
use App\expensescategory;
use App\product;
use App\outlets;
use App\users;
use App\UserRoles;

class PurchaseorderController extends Controller
 {
    public function exportPDF($id) {
        $purchase_order=purchase_order::find($id);
        $purchase_order_items=purchase_order_items::all();
        $outlets=outlets::all();
        $supplier=supplier::all();
        $purchase_order_status=purchase_order_status::all();
        return view('pages.edit.pdf_purchase')->with('purchase_order', $purchase_order)->with('supplier', $supplier)->with('outlets', $outlets)->with('purchase_order_status', $purchase_order_status)->with('purchase_order_items', $purchase_order_items);
        // $purchase_order=purchase_order::all();
        // $purchase_order_items=purchase_order_items::all();
        // $outlets=outlets::all();
        // $supplier=supplier::all();
        // $purchase_order_status=purchase_order_status::all();
        // $pdf = PDF::loadview('pages.edit.pdf_purchase',['purchase_order'=>$purchase_order,]);
        // return $pdf->stream();
    }

    public function purchase() {
        $purchase_order = DB::table('purchase_order')
        ->join('outlets', 'outlets.id', '=', 'purchase_order.id_outlet')
        ->join('supplier', 'supplier.id', '=', 'purchase_order.id_supplier')
        ->join('purchase_order_status', 'purchase_order_status.id', '=', 'purchase_order.status')
        ->select('purchase_order.*', 'outlets.name_outlet', 'supplier.supplier_name','purchase_order_status.nama')
        ->get();
        return view('pages.purchase_order',['purchase_order'=>$purchase_order]);    
    }


    public function recivepurchaseorder($id) {
        $purchase_order=purchase_order::find($id);
        $purchase_order_items=purchase_order_items::all();
        $outlets=outlets::all();
        $supplier=supplier::all();
        $purchase_order_status=purchase_order_status::all();
        return view('pages.edit.recive')->with('purchase_order', $purchase_order)->with('supplier', $supplier)->with('outlets', $outlets)->with('purchase_order_status', $purchase_order_status)->with('purchase_order_items', $purchase_order_items);
    }

    public function editpurchaseorder($id) {
        $purchase_order=purchase_order::find($id);
        $purchase_order_items=purchase_order_items::all();
        $outlets=outlets::all();
        $supplier=supplier::all();
        $product=product::all();
        $purchase_order_status=purchase_order_status::all()->take(2);
        return view('pages.edit.editpurchase')->with('purchase_order', $purchase_order)->with('supplier', $supplier)->with('outlets', $outlets)->with('purchase_order_status', $purchase_order_status)->with('purchase_order_items', $purchase_order_items)->with('product', $product);
    }

    public function delete_order($id) {

        $purchase_order=purchase_order::where('id', $id);
        $purchase_order_items=purchase_order_items::where('id_po', $id);
        $purchase_order_items->delete();
        $purchase_order->delete();
        return redirect('/purchase_order')->with('d', 'data berhasil dihapus');
    }

    public function createpurchase() {
        $supplier=supplier::all();
        $outlets=outlets::all();
        $product=product::all();
        return view('tambah.createpurchase', ['outlets'=> $outlets], ['supplier'=> $supplier])->with('product', $product);
    }

    public function createpurchasestore(Request $request) {

        $this->validate($request, [ 'po_number'=> 'required|unique:purchase_order,po_number',
            ]);
        purchase_order::create([ 'po_number'=> $request->po_number,
                'grandtotal'=> $request->grandtotal,
                'subtotal'=> $request->subtotal,
                'discount_amount'=> $request->discount_amount,
                'id_outlet'=> $request->id_outlet,
                'id_supplier'=> $request->id_supplier,
                'datenow'=> $request->datenow,
                'note'=> $request->note,
                'status'=> $request->status,
                ]);

        if($request->product_name !=null) {
            $var=purchase_order::max('id');
            $panjang=$request->panjang;

            for ($i=0; $i < $panjang; $i++) {
                $answers[]=[ 'id_po'=>$var,
                'product_name'=>$request->product_name[$i],
                'product_code'=>$request->product_code[$i],
                'ordered_qty'=>$request->ordered_qty[$i],
                'received_qty'=>$request->received_qty[$i],
                'cost'=>$request->cost[$i],
                ];
            }

            purchase_order_items::insert($answers);
        }

        return redirect('/purchase_order')->with('p', 'Create Order Succses');
    }

    public function updatepurchaseorder($id, Request $request) {

        $purchase_order_items=purchase_order_items::where('id_po', $id);
        $purchase_order_items->delete();

        if($request->product_name !=null) {
            $panjang=$request->panjang;

            for ($i=0; $i < $panjang; $i++) {
                $answers[]=[ 'id_po'=>$id,
                'product_code'=>$request->product_code[$i],
                'product_name'=>$request->product_name[$i],
                'ordered_qty'=>$request->ordered_qty[$i],
                'received_qty'=>$request->received_qty[$i],
                'cost'=>$request->cost[$i],
                ];

            }
            $d=$request->product_name;
            purchase_order_items::where('id_po', $id)->where('product_name', $d)->insert($answers);
        }

        $purchase_order=purchase_order::find($id);
        $purchase_order->po_number=$request->po_number;
        $purchase_order->id_outlet=$request->id_outlet;
        $purchase_order->id_supplier=$request->id_supplier;
        $purchase_order->datenow=$request->datenow;
        $purchase_order->note=$request->note;
        $purchase_order->status=$request->status;
        $purchase_order->save();

        if( $request->status == 2)
        {
            return redirect('/purchase_order')->with('c', 'Succses Send To Supplier');   
        }
        return redirect('/purchase_order')->with('a', 'Succses Update Data');
    }

    public function updaterecivepurchaseorder($id, Request $request) {
        if($request->product_name !=null) {
            $purchase_order_items=purchase_order_items::where('id_po', $id);
            $purchase_order_items->delete();
            $f= ".00";
            $panjang=$request->panjang;
            for ($i=0; $i < $panjang; $i++) {
                $answers[]=[ 'id_po'=>$id,
                'product_code'=>$request->product_code[$i],
                'product_name'=>$request->product_name[$i],
                'ordered_qty'=>$request->ordered_qty[$i],
                'received_qty'=>$request->received_qty[$i].$f,
                'cost'=>$request->cost[$i].$f,
                ];

            }
            purchase_order_items::where('id_po', $id)->insert($answers);
        }
        $d= ".00";
        $purchase_order=purchase_order::find($id);    
        $purchase_order->status=$request->status;
        $purchase_order->grandtotal=$request->grandtotal;
        $purchase_order->discount_amount=$request->discount_amount.$d;
        $purchase_order->subtotal=$request->subtotal;
        $purchase_order->save();
        return redirect("/purchase_order/viewpurchase/$id")->with('a', 'Succses Recive Data');;
    }
    public function viewpurchase($id){
        $purchase_order=purchase_order::find($id);
        $purchase_order_items=purchase_order_items::all();
        $outlets=outlets::all();
        $supplier=supplier::all();
        $purchase_order_status=purchase_order_status::all();
        return view('pages.edit.view')->with('purchase_order', $purchase_order)->with('supplier', $supplier)->with('outlets', $outlets)->with('purchase_order_status', $purchase_order_status)->with('purchase_order_items', $purchase_order_items);
    }

}

