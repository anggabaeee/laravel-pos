@extends('layouts.defaultpos')
@section('content')
<style>
    .form {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-top: 80px
    }

    .kiri {
        text-align: center;

    }

    .kanan {
        border-style: groove;
        border-radius: 10px;
    }

    .tableku {
        font-weight: bold;
        font-size: 14px;
        text-align: right;
        background-color: #373942;
        color: #FFF;
        padding-top: 5px;
        padding-bottom: 5px;
        width: 100%;
    }

    .isitable {
        background-color: white;
        width: 100%;
        height: 330px;
        overflow: scroll;
    }

    .tablepilihan {
        background-color: white;
        width: 100%;
        height: 450px;
        overflow: scroll;
    }

    .isimodel {
        margin-left: 10px;
        margin-right: 10px;
        border-bottom: 1px solid #dddddd;
        padding-bottom: 10px;
        font-size: 15px;
    }

    .col-md-2.stock {
        background-color: #005b8a;
        border: solid 1px black;
        border-radius: 10%;
        color: white;
        transition: .3s;
    }

    .col-md-2.stock:hover {
        background-color: #005b8a;
        opacity: 0.8;
    }

    .stock .img-thumbnail {
        height: 50px;
        background-color: transparent;
        border: none;
    }

    #notif {
        display: none;
    }

    #holddata {
        background-color: #834f50;
        color: #FFF;
        margin: 7px 10px;
        padding-top: 10px;
        padding-bottom: 10px;
        height: 140px;
        font-size: 14px;
        text-align: center;
    }

</style>
<form action="/posadd/orderadd/{{$outlets->id}}" id="orderadd" method="post">
    {{csrf_field()}}
    <div class="form mx-4">
        <div id="notif" class="alert alert-success alert-block">
            <i class="icono-checkCircle" style="color: #090; font-size: 11px;"></i>
            <strong>Successfully Added to Opened Bill</strong>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="kiri">
                    <div class="row">
                        <div class="col-12 ">
                            <button type="button" class="btn btn-primary col-12 py-0" id="myBtn4" data-toggle="modal"
                                data-target="#myModal4"><i class="icono-plus"></i>add Customer</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2"><input type="text" class="form-control"
                                placeholder="scan your barcode"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2 ml-3">
                            <div class="row tableku" style="text-align: center;">
                                <div class="col-md-4">Products</div>
                                <div class="col-md-3">Qyt</div>
                                <div class="col-md-4">Per Item</div>
                                <div class="col-md-1">X</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2 ml-3">
                            <input type="hidden" name="id_susp" id="id_susp" value="{{$suspend->id}}">
                            <input type="hidden" name="row_length" id="row_length">
                            @php($site_setting = App\site_setting::all())
                            @foreach ($site_setting as $s)
                            <input type="hidden" name="tax" id="tax" value="{{ $s->tax }}">
                            @endforeach
                            <div class="row isitable" id="isitable" style="margin-top: 5px">
                                @foreach($suspend_item as $si)
                                <div class="row row_list" name="row_list" style="margin-right: 5px"
                                    id="{{$si->id_product}}-row">
                                    <input type="hidden" value="{{$suspend->id}}" name="suspend_id" id="suspend_id">
                                    <div class="col-md-3">
                                        <label id="namelist">{{$si->product_name}}</label><br>
                                        <label id="1-codelist">{{$si->product_code}}</label>
                                        <input value="{{$si->product_name}}" name="name[]" type="hidden">
                                        <input value="{{$si->product_code}}" name="code[]" type="hidden">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-3" style="padding-right: 0">
                                                <a onclick="getdatamin('{{$si->id_product}}')"
                                                    class="fa fa-minus-circle" style="margin-top: 11px;"></a>
                                            </div>
                                            <div class="col-md-6" style="padding-right: 0; padding-left: 0;">
                                                <input onchange="changeqty('{{$si->id_product}}')" type="text"
                                                    value="{{$si->qty}}" class="form-control" name="qty[]"
                                                    id="{{$si->id_product}}-qtylist">
                                            </div>
                                            <div class="col-md-3" style="padding-left: 0;">
                                                <a onclick="getdataplus('{{$si->id_product}}')"
                                                    class="fa fa-plus-circle" style="margin-top: 11px"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label name="pricelist[]">{{$si->price}}</label>
                                        <input value="{{$si->price}}" name="price[]" type="hidden">
                                        <input value="{{$si->cost}}" name="cost[]" type="hidden">
                                    </div>
                                    <div class="col-md-1">
                                        <a onclick="dataremove('{{$si->id_product}}')" class="fa fa-close"></a>
                                    </div>
                                    <input value="{{$suspend->customer_id}}" name="customer_name" id="customer_name"
                                        type="hidden">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 tableku" style="">
                            <div class="row">
                                <div class="col-3">
                                    <div>Total Items:</div>
                                </div>
                                <div class="col-3">
                                    <div><label id="totalqty" name="totalqty"></label></div>
                                </div>
                                <div class="col-3">
                                    <div>Total:</div>
                                </div>
                                <div class="col-3">
                                    <div>
                                        <label id="total">0.00</label>
                                    </div>
                                    <input type="hidden" name="totalprice" id="totalinput">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <div>Dis. Amt./% :</div>
                                </div>
                                <div class="col-3"><input type="text" class="mx-4 w-75" name="discount" id="discount"
                                        onkeyup="disc(this.value)"></div>
                                <div class="col-3">
                                    @php($site_setting = App\site_setting::all())
                                    @foreach ($site_setting as $s)
                                    <div>Tax ({{number_format($s->tax, 2)}}%) :</div>
                                    @endforeach
                                </div>
                                <div class="col-3">
                                    <div><label id="taxval">0.00</label></div><input type="hidden" name="taxval"
                                        id="taxvalue">
                                </div>
                            </div>
                            <hr style="border-color:white;">
                            <div class="row pt-1 mt-1">
                                <div class="col-6" style="text-align:left;">
                                    <div>Total Payble</div>
                                </div>
                                <div class="col-6">
                                    <div class="ml-auto"><label name="grandtotal" id="grandtotal"></label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"><button type="button" id="mybtncancel"
                                class="btn btn-danger col-sm-12">Cancel</button></div>
                        <div class="col-4"><button type="button" class="btn btn-primary col-sm-12" data-toggle="modal"
                                id="myBtn3">Hold</button></div>
                        <div class="col-4">
                            <button type="button" id="myBtn5" class="btn btn-success col-sm-12"
                                data-toggle="modal">Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="kanan">
                    <div class="row">
                        <div class="container">
                            <div class="col-sm-12 my-2"><input type="text" class="form-control col-sm-12"
                                    placeholder="search your product"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-2 "><a href="#">
                                    <div class="tableku py-3" style="text-align: center;">All</div>
                                </a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tablepilihan border">
                                <div class="row">@foreach ($product as $p) <div class="col-md-2 stock ml-4 mt-3">
                                        <div class="mt-1"><a onclick="addlist('{{$p->id_product}}')" id="addlist11"><img
                                                    height="50px" class="img-thumbnail"
                                                    src="{{ url('/product_image/'.$p->thumbnail) }}">
                                                <p id="{{$p->id_product}}-name_product"> {{$p->name_product}}</p>
                                                <p hidden="true" id="{{$p->id_product}}-qty">@if ($p->qty===null) 0
                                                    @endif {{$p->qty}}</p>
                                                <p hidden="true" id="{{$p->id_product}}-price"> {{$p->retail_price}}
                                                </p>
                                                <p hidden="true" id="{{$p->id_product}}-code"> {{$p->code}}</p>
                                                <p hidden="true" id="{{$p->id_product}}-cost">
                                                    {{$p->purchase_price}}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal5" tabindex="-1" role="dialog" aria-labelledby="Modal5Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #373942;">
                <div class="modal-header">
                    <h3 class="modal-title" style="color:white;">Make Payment</h3>
                </div>
                <div class="modal-body" style="background-color:white;">
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Customer </p>
                        </div>
                        <div class="col-6">
                            <select class="form-control" name="customer" id="customerpayment" type="text" required>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Total Payable Amount</p>
                        </div>
                        <div class="col-6"><span id="total_amount" name="total_amount">00.0</span><input type="hidden"
                                name="ttl_amount" id="ttl_amount"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Total Purchased Items</p>
                        </div>
                        <div class="col-6"><span id="total_items" name="total_items">00.0</span><input type="hidden"
                                name="ttl_item" id="ttl_item"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Paid By:</p>
                        </div>
                        <div class="col-6">
                            <select class="form-control" type="text" name="payment_method" id="payment_method" required>
                                <option disabled selected value>choice</option>
                                @foreach ($payment as $p)
                                <option value="{{$p->id}}"> {{ $p->name}}</option>
                                @endforeach
                            </select></div>
                    </div>
                    <div class="row" id="giftcard">
                        <div class="col-6 mt-1">
                            <p>Gift Card :<p>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control input-element" name="giftcard" id="gift">
                        </div>
                    </div>
                    <div class="row" id="chequenumber">
                        <div class="col-6 mt-1">
                            <p>Cheque Number :<p>
                        </div>
                        <div class="col-6">
                            <input type="text" name="chequenumber" class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Paid Amount: <p>
                        </div>
                        <div class="col-6"><input type="text" id="paidamount" name="paidamount"
                                class="form-control col-sm-12" onkeyup="PaidAmount(this.value)" required></div>
                    </div>
                    <div class="row" id="cardnumber">
                        <div class="col-6 mt-1">
                            <p>Card Number :<p>
                        </div>
                        <div class="col-6">
                            <input type="text" name="cardnumber" class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Return Change :</p>
                        </div>
                        <div class="col-6"><span id="return_change">00.0</span><input type="hidden" name="return_change"
                                id="returninput" readonly></div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:white;">
                    <input type="submit" id="ajaxsubmit" name="ajaxsubmit" class="btn btn-success ajaxsubmit"
                        value="Submit" hidden="true"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #373942;">
                <div class="modal-header">
                    <h5 class="modal-title" style="color:white;" id="examplemyModal1Label">Todays's Sales <span
                            id="datenow"></span></h5>
                </div>
                <div class="modal-body" style="background-color:white;">
                    <div class="container mt-2">
                        <div class="row isimodel" style="color: #5f6468; background-color: #ededed;">
                            <div class="col-sm-12 mt-3">Cash : <label id="divcash"></label></div>
                        </div>
                        <div class="row isimodel">
                            <div class="col-sm-12 mt-3">Nett : <label id="divnett"></label></div>
                        </div>
                        <div class="row isimodel" style="background-color: #ededed; color: #5f6468;">
                            <div class="col-sm-12 mt-3">VISA : <label id="divvisa"></label></div>
                        </div>
                        <div class="row isimodel" style="color: #5f6468;">
                            <div class="col-sm-12 mt-3">MASTER : <label id="divmaster"></label></div>
                        </div>
                        <div class="row isimodel" style="background-color: #005b8a; color:white;">
                            <div class="col-sm-12 mt-3">Cheque : <label id="divcheq"></label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #373942;">
                <div class="modal-header">
                    <h3 class="modal-title" style="color:white;">Opened Bill</h3>
                </div>
                <div class="modal-body" style="background-color:white;">
                    <div class="row" style="border-bottom: 1px solid #ddd;">
                        <div class="col-5 mt-1">
                            <p>Search Opened Bill :</p>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control col-sm-12" id="searchold" placeholder="ref.number">
                        </div>
                    </div>
                    <div class="row" id="isihold" style="overflow: scroll; height: 400px; margin-top: 10px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal3Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #373942;">
                <div class="modal-header" style="background-color: #373942;">
                    <h3 class="modal-title" style="color:white;">Save to Opened Bill</h3>
                </div>
                <div class="modal-body" style="background-color:white;">
                    <div class="row">
                        <div class="col-5 mt-1">
                            <p>Customers</p>
                        </div>
                        <div class="col-7">
                            <select id="customeroption" class="form-control" type="text">
                                <option disabled selected>choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 mt-1">
                            <p>Hold Bill Ref. Number</p>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control col-sm-12" placeholder="ref.number" id="ref_number"
                                name="ref_number">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:white;">
                    <div class="row">
                        <div class="d-flex col-12">
                            <div class="ml-auto">
                                <input type="button" name="saveBill" class="btn btn-success py-1" value="Submit"
                                    id="saveBill">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<form>
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModal4Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #373942;">
                <div class="modal-header">
                    <h3 class="modal-title" style="color:white;">Add Customer</h3>
                </div>
                <div class="modal-body" style="background-color:white;">
                    <div class="row">
                        <div class="col-5 mt-1">
                            <p>Customer Name</p>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control col-sm-12" name="fullname" id="customername">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 mt-1">
                            <p>Customer Email</p>
                        </div>
                        <div class="col-7">
                            <input type="text" class="form-control col-sm-12" name="email" type="email"
                                id="customeremail" require>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 mt-1">
                            <p>Customer Mobile</p>
                        </div>
                        <div class="col-7">
                            <input name="mobile" type="text" class="form-control col-sm-12" id="customernumber">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:white;">
                    <div class="row">
                        <div class="d-flex col-12">
                            <div class="ml-auto">
                                <input type="button" name="addcust" class="btn btn-success py-1" value="Add Customer"
                                    id="btnAdd">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #373942;">
            <div class="modal-header">
                <h3 class="modal-title" style="color:white;">Add Customer</h3>
            </div>
            <div class="modal-body" style="background-color:white;">
                <h3 style="text-align:center; color:green;">Successfully Added New Customer</h3>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModal7Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="background: white; border-radius: 12px;">
                <div class="row">
                    <div class="col-md-12"
                        style="text-align: center; font-size: 25px; padding-top: 20px; padding-bottom: 20px; color: #c72a25;">
                        Out of Stock! <br>
                        Please update inventory OR make Purchase Order to Supplier! </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModal8Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="background: white; border-radius: 12px;">
                <div class="row">
                    <div class="col-md-12"
                        style="text-align: center; font-size: 25px; padding-top: 20px; padding-bottom: 20px; color: #090;">
                        Please add product first to make a payment!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/suspend.js') }}"></script>
<script>
</script>
<script>
    var d = new Date();
    var a = d.getDate() + "/";
    var c = d.getMonth() + 1 + "/" + d.getFullYear();
    document.getElementById("datenow").innerHTML = a + c;
    $(document).ready(function () {
        $('.input-element').inputmask("9999 9999 9999 9999");
        $('#btnAdd').click(function () {
            var fulname = $('#customername').val();
            var email = $('#customeremail').val();
            var mobile = $('#customernumber').val();
            if (fulname == "", email == "", mobile == "") {
                alert("Please Fill All Required Field");
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/addCustomerposstore',
                    type: 'post',
                    data: {
                        fullname: fulname,
                        email: email,
                        mobile: mobile
                    },
                    complete: function () {
                        $('#myModal4').modal('hide');
                        $('#myModal6').modal('show');
                        $('#customername').val('');
                        $('#customeremail').val('');
                        $('#customernumber').val('');
                    }
                });
            }
        });
    });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@stop
