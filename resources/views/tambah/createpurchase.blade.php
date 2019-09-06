@extends('layouts.default-sidebar')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                <form action="/purchase_order/CreatePurchaseOrderstore" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-gorup">
                            <label>Purchase Order Number <span style="color: #F00">*</span></label>
                            <input type="number" name="po_number" class="form-control" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-gorup">
                            <label>Outlets<span style="color: #F00">*</span></label>
                                <select name="id_outlet" class="form-control" required>
                                    <option disabled selected value=""> --silahkan pilih-- </option>
                                    @foreach ($outlets as $p)
                                    <option value="{{$p->id}}">{{$p->name_outlet}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Suppliers<span style="color: #F00">*</span></label>
                                <select name="id_supplier" class="form-control" required>
                                    <option disabled selected value=""> --silahkan pilih-- </option>
                                    @foreach ($supplier as $p)
                                    <option value="{{$p->id}}">{{$p->supplier_name}}</option>
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
                                <input type="date" name="datenow" readonly class="form-control"
                                    value="<?php echo $currentDateTime; ?>">
                                    <input type="text" value="1" name="status" readonly hidden>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-gorup">
                                    <label>Note</label>
                                <textarea name="note" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <section>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Search Product <span style="color: #F00">*</span></label>
                                    <select name="searchproduct" class="form-control select2" style="height:120px;">
                                        @foreach ($product as $p)
                                        <option value="{{$p->code}}">{{$p->name_product}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <br>
                                    <button type="button" class="btn btn-secondary" style="width: 66%; margin-top: 6px;" onclick="addtolist()">Add to List</button>
                                </div>
                            </div>
                        </div>
                    </section>
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
                                    <tbody>     
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                            <center>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" style="padding: 15px 40px;" value="submit ">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('.select2').select2({
        allowClear: true,
        placeholder: {
        id: "0",
        text: "Select an Title" 
    }
    })
</script>
@stop
