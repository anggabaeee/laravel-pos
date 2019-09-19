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
        <form action="/purchase_order/updaterecivepurchaseorder/{{$purchase_order->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
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
                                <tbody id="mytbody">
                                    @php
                                    $a = 1;
                                    $b = 1;
                                    @endphp
                                    @foreach($purchase_order_items as $p)
                                    @if ($p->id_po === $purchase_order->id)
                                    <tr>
                                        <td>
                                            {{$p->product_name}}}<input type="text" value="{{$p->product_name}}" name="product_name[]" class="form-control" hidden>
                                        </td>
                                        <td>
                                            {{$p->product_code}}<input type="text" value="{{$p->product_code}}" name="product_code[]" class="form-control" hidden>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="ordered_qty[]"      value="{{$p->ordered_qty}}" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="received_qty[]" id="a@php echo($a++) @endphp" value="{{$p->received_qty}}">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control uang" id="b@php echo($b++) @endphp" name="cost[]" value="{{$p->cost }}">

                                            <input type="number" class="form-control" id="row" name="panjang" hidden> </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <tr>
                                        <td colspan="3">
                                            <strong>Discount Amount (SGD) : <input type="number" class="form-control"
                                                    id="discon" style="display:inline; width:200px;"></strong>
                                        </td>
                                        <td colspan="2" style="text-align:right;">
                                            <strong>Total (SGD) : <input type="number" class="form-control"
                                                    style="display:inline; width:200px;" id="total" readonly></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align:right;">
                                            <strong>Tax (0.00%) (SGD) : <input type="number" class="form-control"
                                                    style="display:inline; width:200px;" value="0.00" readonly></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align:right;">
                                            <strong>Total Payable (SGD): : <input type="number" class="form-control"
                                                    id="total_pay" style="display:inline; width:200px;" value="0.00"
                                                    readonly></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align:center;">
                                        <input type="text" value="3" name="status" readonly hidden>
                                            <input type="submit" class="btn btn-primary col-sm-2" style="height:75px;"
                                                value="Recive">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
        var count = $('#mytbody tr').length;
        document.getElementById("row").value = count - 4

        $("#mytbody").on('input', function () {
            var lenght = document.getElementById("row").value
            var total_smt = 0;
            var akhir = 0;
            for (i = 1; i <= lenght; i++) {
                var qty = document.getElementById("a" + i).value;
                var cost = document.getElementById("b" + i).value;
                total_smt += qty * cost;
            }
            var discon = document.getElementById("discon").value
            akhir = total_smt - discon
            document.getElementById("total_pay").value = akhir + ".00";
            document.getElementById("total").value = akhir + ".00";
        });
    });

</script>
@stop
