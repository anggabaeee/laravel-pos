@extends('layouts.default-sidebar')
@section('content')
<style>
    .form-group label {
        font-weight: normal;
    }

    .table th {
        background-color: #686868;
        color: #FFF;
    }

</style>
<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Create Return Order</h1>
        <div class="card">
            <div class="card-body">
                <form action="/createstore" method="post">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Customers <span style="color: #F00">*</span></label>
                                <div style="position: relative; width: 294px;">
                                    <select name="customer" class="form-control" style="height: 60px;">
                                    <option value="" disabled selected>Choice</option>
                                    @foreach($customer as $c)
                                        <option value="{{$c->id}}">{{$c->fullname}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Outlets <span style="color: #F00">*</span></label>
                                <select name="outlets" placeholder="Search Outlets" class="form-control">
                                <option value="" disabled selected>Choice</option>
                                @foreach($outlets as $c)
                                        <option value="{{$c->id}}">{{$c->name_outlet}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Remark</label>
                                <textarea name="remark" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Refund Amount (SGD)</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="amount" id="amount" class="form-control" onkeyup="hasil()">
                        </div>
                        <div class="col-md-5" style="padding-top: 10px; color: #afb1b2;">
                            * Please type positive value for Refund Amount, invoice will effect with minus.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Refund Tax (7.00%)</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="tax" class="form-control" id="tax" readonly>
                        </div>
                        <div class="col-md-5" style="padding-top: 8px; color: #afb1b2;">
                            * invoice will effect with minus.
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-3">
                            <label>Refund Grand Total (SGD)</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="grandtotal" id="grandtotal" class="form-control" readonly>
                        </div>
                        <div class="col-md-5" style="color: #afb1b2;">
                            * invoice will effect with minus.
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-3">
                            <label>Refund by</label>
                        </div>
                        <div class="col-md-4">
                            <select name="refundby" class="form-control">
                                <option value="">Choose Refund By</option>
                                <option value="1">Cash</option>
                                <option value="2">Nett</option>
                                <option value="3">VISA</option>
                                <option value="4">Master Card</option>
                                <option value="5">Cheque</option>
                                <option value="10">ac</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-3">
                            <label>Refund Method</label>
                        </div>
                        <div class="col-md-4">
                            <select name="refundmethod" class="form-control">
                                <option value="">Choose Refund Method</option>
                                <option value="1">Full Refund</option>
                                <option value="2">Partial Refund</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12" style="border-top: 1px solid #ccc;"></div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Search Product <span style="color: #F00;">*</span></label>
                                <select id="typeahead" class="form-control add_product_po" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <button class="btn btn-secondary" style="width: 90%">Add to Return Item(s) List</button>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20%">Product Code</th>
                                            <th width="20%">Product Name</th>
                                            <th width="20%">Return Quality</th>
                                            <th width="20%">Condition</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                            <input type="text" id="tglskrng">
                                <button class="btn btn-primary" style="padding: 12px 20px;">Submit</button>
                            </center>
                        </div>
                    </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>
<script>
    function hasil() {
        var amount = document.getElementById("amount").value;
        if (amount.length > 0) {
            tax = parseFloat(tax);
            amount = parseFloat(amount);
            var tax = amount * 7 / 100;
            document.getElementById("tax").value = tax;
            var grandtotal = amount + tax;
            document.getElementById("grandtotal").value = grandtotal;
        } else {
            document.getElementById("tax").value = 0;
            document.getElementById("grandtotal").value = 0;
        }
    }

</script>
<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        var d = new Date();
  var c = d.getFullYear();
  var a = d.getDate();
  var b = d.getMonth();
  $("#tglskrng").val() = a+"/"+b+"/"+c;
        $(".add_product_po").select2({
            placeholder: "Search Product by Name OR Code",
            allowClear: true
        });
    });

</script>
</section>
@stop
