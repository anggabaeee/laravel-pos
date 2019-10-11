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
<!-- toast -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<form action="/createstore" method="post">
    {{ csrf_field() }}
    <div class="col-sm-9 col-lg-10">
        <div class="container mb-5">
            <h1>Create Return Order</h1>
            <div class="card">
                <div class="card-body">
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
                            <input type="number" name="amount" id="amount" class="form-control" onkeyup="hasil()">
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
                                <option value="" disabled selected>Choice</option>
                                @foreach($payment_method as $m)
                                <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-3">
                            <label>Refund Method</label>
                        </div>
                        <div class="col-md-4">
                            <select name="refundmethod" class="form-control">
                                <option value="" disabled selected>Choose Refund Method</option>
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
                                <select id="typeahead" class="form-control add_product_po">
                                @foreach ($product as $p)
                                <option value="{{$p->code}}" data-aku="{{$p->retail_price}}">{{$p->name_product}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <button type="button" class="btn btn-secondary" style="width: 66%; margin-top: 6px;"
                                id="addlist">Add Return Item to List</button>
                                <input type="text" id="row" name="panjang">
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
                                            <th width="20%">Return Quantity</th>
                                            <th width="20%">Condition</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mytbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</form>
<div class="row">
    <div class="col-md-12">
        <center>
            <input type="submit" class="btn btn-primary" style="padding: 12px 20px;">
        </center>
    </div>
</div>
</div>
</div>
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
        $("#row").val("0");
        $(".add_product_po").select2({
            placeholder: "Search Product by Name OR Code",
            allowClear: true
        });
        $("#addlist").click(function () {
            var s = document.getElementById("typeahead");
            var text = $( "#typeahead option:selected" ).text();
            var id =$( "#typeahead option:selected" ).val();
            var ids =$( "#typeahead option:selected" ).data('aku');
            var count = $('#mytbody tr').length;
            var row = count + 1;
            document.getElementById("row").value = row
            var markup = `<tr><td>` + id + `<input name='retail_price[]' value=`+ ids +` hidden><input type='text'value=` + id + ` class='form-control' name='product_code[]' readonly hidden> </td>
            <td>` + text + `<input type='text'value=` + text + ` class='form-control' name='product_name[]' readonly hidden></td>
            <td><input type='number' value='1' name='qty[]' class='form-control'></td>
            <td><input type="checkbox" id="check`+ row +`" style="display:inline;" class='form-control col-6'><strong id="keterangan`+ row +`" value='0' style='font-size: 30px;'>Good</strong><input type="number" id="status`+ row +`" value="1" name='item_condition[]' style="display:inline;" class='form-control col-6'> 
            <td> <button type='button' class='btn btn-danger' id='deletbtn'>Delete </button></td></tr>`;
            $("table tbody").append(markup);
            $("#mytbody").on('click','#check'+row, function () {
            if (this.checked) {
                    $("#keterangan"+ row).css("color", "#575757");
                    $("#status"+ row).val("2");
                } else {
                    $("#keterangan"+ row).css("color", "black");
                    $("#status"+ row).val("1");
                }
        });
        });
        $("#mytbody").on('click','#deletbtn', function () {
           $(this).closest('tr').remove();
           var x = document.getElementById("row").value
           var d = x -1
           document.getElementById("row").value = d
        });
    });

</script>
<!-- toast -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if(Session::has('p'))
<script>
    toastr.success('{{Session::get('p')}}')

</script>
@endif
</section>
@stop
