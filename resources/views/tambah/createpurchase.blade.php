@extends('layouts.default-sidebar')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>
    .table th {
        background-color: #686868;
        color: #FFF;
    }

</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
                                    <select name="searchproduct" class="form-control select2" style="height:120px;"  id="product">
                                        @foreach ($product as $p)
                                        <option value="{{$p->code}}">{{$p->name_product}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <br>
                                    <button type="button" class="btn btn-secondary" style="width: 66%; margin-top: 6px;" id="addlist">Add to List</button>
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
                                    <tbody id="mytbody">
                                    </tbody>
                                </table>
                            <input type="number" id="row" name="panjang" hidden>
                            <input type="text" name="grandtotal" hidden value="#">
                            <input type="text" name="subtotal" hidden value="#">
                            <input type="text" name="discount_amount" hidden value="#">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <center>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" style="padding: 15px 40px;"
                                        value="submit ">
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
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
 $(document).ready(function () {
    $('.select2').select2({
        allowClear: true,
        placeholder: {
            id: "1",
            text: "Pilih Product"
        }
    });
    });

</script>
<script>
    $(document).ready(function () {
        $("#addlist").click(function () {
            var s = document.getElementById("product");
            var text = s.options[s.selectedIndex].text;
            var id = s.options[s.selectedIndex].value;
            var markup = "<tr><td>" + text +"<input type='text'value="+ text +" class='form-control' name='product_name[]' readonly hidden></td><td>"+ id +"<input type='text'value="+ id +" class='form-control' name='product_code[]' readonly hidden><input type='text'value='0' class='form-control' name='received_qty[]' readonly hidden><input type='text'value='0' class='form-control' name='cost[]' readonly hidden></td><td><input type='number' name='ordered_qty[]' class='form-control'><td> <button type='button' class='btn btn-danger' id='deletbtn'>Delete </button></td></tr>";
            $("table tbody").append(markup);
            var count = $('#mytbody tr').length;
            document.getElementById("row").value = count
        });
        $('.table tbody').on('click','#deletbtn', function () {
           $(this).closest('tr').remove();
           var x = document.getElementById("row").value
           var d = x -1
           document.getElementById("row").value = d
        });
    });
</script>
 @if ($errors->any())
<script>toastr.warning("data sudah ada")</script>
@endif
@stop
