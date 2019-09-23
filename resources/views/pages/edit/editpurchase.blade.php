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
                                <label>Created <span style="color: #F00">*</span></label>
                                <input type="text" name="datenow" readonly class="form-control"
                                    value="{{$purchase_order->datenow}}">
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
                                <label>Status<span style="color: #F00">*</span></label>
                                <select name="status" class="form-control" required>
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
                    <section>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Search Product <span style="color: #F00">*</span></label>
                                    <select name="searchproduct" class="form-control" id="product">
                                        @foreach ($product as $p)
                                        <option value="{{$p->code}}">{{$p->name_product}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <br>
                                    <button type="button" class="btn btn-secondary" style="width: 66%; margin-top: 6px;"  id="addlist">Add to List</button>
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
                                        @foreach($purchase_order_items as $p)
                                        @if ($p->id_po === $purchase_order->id)
                                        <tr>
                                            <td>
                                            {{$p->product_name}}<input type="text" value="{{$p->product_name}}" name="product_name[]" class="form-control" hidden>
                                            </td>
                                            <td>
                                                {{$p->product_code}}<input type="text" value="{{$p->product_code}}" name="product_code[]" class="form-control" hidden>
                                            </td>
                                            <td>
                                            <input type='text'value='0' class='form-control' name="received_qty[]" readonly hidden>
                                            <input type='text'value='0' class='form-control' name="cost[]" readonly hidden>
                                            <input type="text" value="{{$p->ordered_qty}}" name="ordered_qty[]" class="form-control">
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-danger"  id="deletbtn">Delete</button>
                                            </td>
                                            @endif
                                            @endforeach
                                            <input type="number" id="row" name="panjang" hidden readonly >
                                        </tr>
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
<script>
    $(document).ready(function () {
        $("#addlist").click(function () {
            var s = document.getElementById("product");
            var text = s.options[s.selectedIndex].text;
            var id = s.options[s.selectedIndex].value;
            var markup = "<tr><td>" + text + "<input type='text'value=" + text +
                " class='form-control' name='product_name[]' readonly hidden></td><td>" + id +
                "<input type='text'value=" + id +
                " class='form-control' name='product_code[]' readonly hidden></td><td><input type='number' name='ordered_qty[]' class='form-control'><input type='text'value='0' class='form-control' name='received_qty[]' readonly hidden><input type='text'value='0' class='form-control' name='cost[]' readonly hidden><td> <button type='button' class='btn btn-danger' id='deletbtn'>Delete </button></td></tr>";
            $("table tbody").append(markup);
            var count = $('#mytbody tr').length;
            document.getElementById("row").value = count
        });
        $('.table tbody').on('click', '#deletbtn', function () {
            $(this).closest('tr').remove();
            var x = document.getElementById("row").value
            var d = x - 1
            document.getElementById("row").value = d
        });
    });
    var count = $('#mytbody tr').length;
            document.getElementById("row").value = count
</script>
@stop
