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
        <h1>Create Purchase Order</h1>
        <div class="card">
            <div class="card-body">
                <form action="/purchase_order/updatepurchaseorder/{{$purchase_order->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Purchase Order Number <span style="color: #F00">*</span></label>
                                <input type="text" name="po_number" class="form-control" required autofocus
                                    value="{{$purchase_order->po_number}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Outlets<span style="color: #F00">*</span></label>
                                <select name="id_outlet" class="form-control" required>
                                    @foreach( $outlets as $p)
                                    <option value="{{$p->id}}" @if ($p->id === $purchase_order->id_outlet)
                                        selected
                                        @endif>
                                        {{$p->name_outlet}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Suppliers<span style="color: #F00">*</span></label>
                                <select name="id_supplier" class="form-control" required>
                                    @foreach( $supplier as $p)
                                    <option value="{{$p->id}}" @if ($p->id === $purchase_order->id_supplier)
                                        selected
                                        @endif>
                                        {{$p->supplier_name}}
                                    </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Created Date <span style="color: #F00">*</span></label>
                                <?php $currentDateTime = date('Y-m-d');?>
                                <input type="text" name="datenow" readonly class="form-control"
                                    value="<?php echo $currentDateTime; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Note</label>
                                <textarea name="note" class="form-control">{{$purchase_order->note}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Outlets<span style="color: #F00">*</span></label>
                                <select name="id_outlet" class="form-control" required>
                                    @foreach($purchase_order_status as $p) 
                                    <option value="{{$p->id}}" @if ($p->id === $purchase_order->status)
                                        selected
                                        @endif>
                                        {{$p->nama}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Search Product <span style="color: #F00">*</span></label>
                                <select name="searchproduct" class="form-control">
                                    <option disabled selected value=""> --silahkan pilih-- </option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <br>
                                <button id="addtolist" class="btn btn-secondary"
                                    style="width: 66%; margin-top: 6px;">Add to List</button>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="30%">Product Name</th>
                                            <th width="30%">Product Code</th>
                                            <th width="30%">Order Quantity</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="additemwrap">
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <center>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" style="padding: 15px 40px;"
                                        value="submit">
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
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
