@extends('layouts.default-sidebar')
@section('content')
<style>
    .table th {
        background-color: #686868;
        color: #FFF;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Recive From Supplier</h1>
        <div class="card">
            <div class="card-body mx-1">
                <div class="row">
                    <div class="ml-auto">
                        <button type="button" class="btn btn-success ml-2">Print Purchase Order</button>
                    </div>
                </div>
                <div class="row mt-4" style="text-align:left;">
                    <div class="col-md-4">
                        <strong>Purchase Order Number<span style="color: #F00">*</span></strong>
                        <p>{{$purchase_order->po_number}}</p>
                    </div>
                    <div class="col-md-4">
                        <Strong>Outles<span style="color: #F00">*</span></strong>
                        @foreach( $outlets as $p)
                        @if ($p->id === $purchase_order->id_outlet)
                        <p>{{$p->name_outlet}}</p>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <strong>Supplier<span style="color: #F00">*</span></strong>
                        @foreach( $supplier as $p)
                        @if ($p->id === $purchase_order->id_supplier)
                        <p>{{$p->supplier_name}}</p>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="row" style="text-align:left;">
                    <div class="col-md-4">
                        <strong style="font-weight:bold;">Created Date<span style="color: #F00">*</span></strong>
                        <p>{{$purchase_order->datenow}}</p>
                    </div>
                    <div class="col-md-4">
                        <strong style="font-weight:bold;">Note<span style="color: #F00">*</span></strong>
                        <p>{{$purchase_order->note}}</p>
                    </div>
                </div>
                <div class="row" style="text-align:left;">
                    <div class="col-md-4">
                        <strong style="font-weight:bold; color: #F00;">Purchase Order Status<span
                                style="color: #F00">*</span></strong>
                        @foreach($purchase_order_status as $p)
                        @if ($p->id === $purchase_order->status)
                        <p style="font-weight:bold; color: #F00;">{{$p->nama}}</p>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" style="margin-top: 5px">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Order Quantity</th>
                                    <th>Received Quantity</th>
                                    <th>Each Cost (SGD)</th>
                                </tr>
                            </thead>
                            <tbody id="additemwrap">
                                <tr>
                                @if($purchase_order->purchase_order_items->ordered_qty != null)
                                    <td>
                                        {{$purchase_order->purchase_order_items->product_name}}
                                    </td>
                                    <td>
                                        {{$purchase_order->purchase_order_items->product_code}}
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" value="{{$purchase_order->purchase_order_items->ordered_qty}}" readonly>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control">
                                    </td>
                                @else
                                @endif
                                </tr>
                                <tr>
                                  @if($purchase_order->purchase_order_items->ordered_qty != null)
                                    <td colspan="3">
                                        <strong>Discount Amount (SGD) : <input type="number" class="form-control" style="display:inline; width:200px;"></strong>
                                    </td>
                                    <td colspan="2" style="text-align:right;">
                                    <strong>Total (SGD) : <input type="number" class="form-control" style="display:inline; width:200px;"></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:right;">
                                    <strong>Tax (0.00%) (SGD) : <input type="number" class="form-control" style="display:inline; width:200px;"></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:right;">
                                    <strong>Tax (0.00%) (SGD) : <input type="number" class="form-control" style="display:inline; width:200px;"></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:center;">
                                    <button type="button" class="btn btn-primary col-sm-2" style="height:75px;">Recive</button>
                                    </td>
                                </tr>
                                @else
                                <td colspan="3">
                                        <strong>Discount Amount (SGD) : <input type="number" class="form-control" style="display:inline; width:200px;" readonly></strong>
                                    </td>
                                    <td colspan="2" style="text-align:right;">
                                    <strong>Total (SGD) : <input type="number" class="form-control" style="display:inline; width:200px;" readonly></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:right;">
                                    <strong>Tax (0.00%) (SGD) : <input type="number" class="form-control" style="display:inline; width:200px;" readonly></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:right;">
                                    <strong>Tax (0.00%) (SGD) : <input type="number" class="form-control" style="display:inline; width:200px;" readonly></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:center;">
                                    <button type="button" class="btn btn-primary col-sm-2" style="height:75px;">Recive</button>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="col-md-2">
                <a href="{{ url('/purchase_order')}}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"></i>
                        Back</button></a>
            </div>
        </div>
    </div>
</div>
</section>
@stop
