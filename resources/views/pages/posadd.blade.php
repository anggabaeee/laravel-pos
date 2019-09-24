@extends('layouts.defaultpos')
@section('content')
<style>
    .form {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-top: 100px
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

</style>
<form action="/posadd/orderadd/{{$outlets->id}}" method="post">
    {{ csrf_field() }}
    <div class="form mx-4">
        <div class="row">
            <div class="col-sm-4">
                <div class="kiri">
                    <div class="row">
                        <div class="col-12 ">
                            <button type="button" class="btn btn-primary col-12 py-0" id="myBtn4"><i
                                    class="icono-plus"></i>
                                add Customer</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <input type="text" class="form-control" placeholder="scan your barcode">
                        </div>
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
                            <input type="hidden" name="row_length" id="row_length">
                            <input type="hidden" name="tax" id="tax" value="7">
                            <div class="row isitable" id="isitable" style="margin-top: 5px">

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
                                    <div><label id="total">0.00</label></div>
                                    <input type="hidden" name="totalprice" id="totalinput">
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <div>Dis. Amt./% :</div>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="mx-4 w-75" name="discount" id="discount"
                                        onkeyup="disc(this.value)">
                                </div>
                                <div class="col-3">
                                    <div>Tax (7.00%) :</div>
                                </div>
                                <div class="col-3">
                                    <div><label id="taxval">0.00</label></div>
                                    <input type="hidden" name="taxval" id="taxvalue">
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
                        <div class="col-4"><button type="button" class="btn btn-danger col-sm-12">Cancel</button></div>
                        <div class="col-4"><button type="button" class="btn btn-primary col-sm-12" data-toggle="modal"
                                data-target="#myModal3" id="myBtn3">Hold</button>
                        </div>
                        <div class="col-4">
                            <!-- Button trigger modal -->
                            <button type="button" id="myBtn5" class="btn btn-success col-sm-12" data-toggle="modal"
                                data-target="#Modal5">
                                Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="kanan">
                    <div class="row">
                        <div class="container">
                            <div class="col-sm-12 my-2">
                                <input type="text" class="form-control col-sm-12" placeholder="search your product">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-2 ">
                                <a href="#">
                                    <div class="tableku py-3" style="text-align: center;">
                                        All</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tablepilihan border">
                                <div class="row">
                                    @foreach ($product as $p)
                                    <div class="col-md-2 stock ml-4 mt-3">
                                        <div class="mt-1">
                                            <a onclick="addlist('{{$p->id_product}}')"> <img height="50px"
                                                    class="img-thumbnail"
                                                    src="{{ url('/product_image/'.$p->thumbnail) }}">
                                                <p id="{{$p->id_product}}-name_product">{{$p->name_product}}</p>
                                                <p hidden="true" id="{{$p->id_product}}-qty">
                                                    @if ($p->qty === null)
                                                    0
                                                    @endif
                                                    {{$p->qty}}
                                                </p>
                                                <p hidden="true" id="{{$p->id_product}}-price">{{$p->retail_price}}</p>
                                                <p hidden="true" id="{{$p->id_product}}-code">{{$p->code}}</p>
                                                <p hidden="true" id="{{$p->id_product}}-cost">{{$p->purchase_price}}</p>
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
                    <h1 class="modal-title" style="color:white;">Make Payment</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color:white;">
                    <span id="form_output"></span>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Customer </p>
                        </div>
                        <div class="col-6">
                            <select class="form-control" name="customer" id="customer" type="text" required>
                                @foreach ($customer as $c)
                                <option value="{{$c->id}}">{{$c->fullname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Total Payable Amount</p>
                        </div>
                        <div class="col-6">
                            <span id="total_amount" name="total_amount">00.0</span>
                            <input type="hidden" name="ttl_amount" id="ttl_amount">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Total Purchased Items</p>
                        </div>
                        <div class="col-6">
                            <span id="total_items" name="total_items">00.0</span>
                            <input type="hidden" name="ttl_item" id="ttl_item">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Paid By:</p>
                        </div>
                        <div class="col-6">
                            <select class="form-control" type="text" name="payment_method" id="payment_method" required>
                                <option disabled selected value>choice</option>
                                @foreach ($payment as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Paid Amount: <p>
                        </div>
                        <div class="col-6">
                            <input type="text" id="paidamount" name="paidamount" class="form-control col-sm-12"
                                onkeyup="PaidAmount(this.value)" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-1">
                            <p>Return Change :</p>
                        </div>
                        <div class="col-6">
                            <span id="return_change">00.0</span>
                            <input type="hidden" name="return_change" id="returninput" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:white;">
                    <input type="submit" id="ajaxsubmit" name="ajaxsubmit" class="btn btn-success ajaxsubmit"
                        value="Submit" hidden="true">
                </div>
            </div>
            <div class="modal fade" id="myModal1">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #373942;">
                        <div class="modal-header">
                            <h1 class="modal-title" style="color:white;">Todays's Sales <span id="datenow"></span></h1>
                        </div>
                        <div class="modal-body" style="background-color:white;">
                            <div class="container mt-2">
                                <div class="row isimodel" style="color: #5f6468; background-color: #ededed;">
                                    <div class="col-sm-12 mt-3">
                                        Cash : 0.00
                                    </div>
                                </div>
                                <div class="row isimodel">
                                    <div class="col-sm-12 mt-3">
                                        Nett : 0.00
                                    </div>
                                </div>
                                <div class="row isimodel" style="background-color: #ededed; color: #5f6468;">
                                    <div class="col-sm-12 mt-3">
                                        VISA : 0.00
                                    </div>
                                </div>
                                <div class="row isimodel" style="color: #5f6468;">
                                    <div class="col-sm-12 mt-3">
                                        MASTER : 0.00
                                    </div>
                                </div>
                                <div class="row isimodel" style="background-color: #005b8a; color:white;">
                                    <div class="col-sm-12 mt-3">
                                        Cheque : 0.00
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal2">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #373942;">
                        <div class="modal-header">
                            <h1 class="modal-title" style="color:white;">Opened Bill</h1>
                        </div>
                        <div class="modal-body" style="background-color:white;">
                            <div class="row">
                                <div class="col-5 mt-1">
                                    <p>Search Opened Bill :</p>
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control col-sm-12" placeholder="ref.number">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color:white;">
                            <div class="row">
                                <div class="col-12 isitable">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal3Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: #373942;">
                        <div class="modal-header">
                            <h1 class="modal-title" style="color:white;">Opened Bill</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        </div>
                        <div class="modal-body" style="background-color:white;">
                            <div class="row">
                                <div class="col-5 mt-1">
                                    <p>Customers</p>
                                </div>
                                <div class="col-7">
                                    <select class="form-control" type="text">
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 mt-1">
                                    <p>Hold Bill Ref. Number</p>
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control col-sm-12" placeholder="ref.number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color:white;">
                        <div class="d-flex">
                            <div class="ml-auto">
                                <button type="button" class="btn btn-success py-1">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal4">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #373942;">
                        <div class="modal-header">
                            <h1 class="modal-title" style="color:white;">Add Customer</h1>
                        </div>
                        <div class="modal-body" style="background-color:white;">
                            <div class="row">
                                <div class="col-5 mt-1">
                                    <p>Customer Name</p>
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control col-sm-12" name="fullname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 mt-1">
                                    <p>Customer Email</p>
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control col-sm-12" name="email" type="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 mt-1">
                                    <p>Customer Mobile</p>
                                </div>
                                <div class="col-7">
                                    <input name="mobile" type="text" class="form-control col-sm-12">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="d-flex col-12">
                                    <div class="ml-auto">
                                        <input type="submit" name="addcust" class="btn btn-success py-1"
                                            value="Add Customer" id="myBtn6" data-dismiss="modal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="myModal6">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background-color: #373942;">
                        <div class="modal-header">
                            <h1 class="modal-title" style="color:white;">Add Customer</h1>
                        </div>
                        <div class="modal-body" style="background-color:white;">
                            <h1 style="text-align:center; color:green;">Successfully Added New Customer</h1>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>
<script src="{{ asset('js/posadd.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#myBtn1").click(function () {
            $("#myModal1").modal();
        });
    });

</script>
<script>
    $(document).ready(function () {
        $("#myBtn2").click(function () {
            $("#myModal2").modal();
        });
    });

</script>

<script>
    $(document).ready(function () {
        $("#myBtn4").click(function () {
            $("#myModal4").modal();
        });
    });

</script>

<script>
    $(document).ready(function () {
        $("#myBtn6").click(function () {
            $("#myModal6").modal();
        });
    });

</script>


<script>
    var d = new Date();
    var a = d.getDate() + "/";
    var c = d.getMonth() + 1 + "/" + d.getFullYear();
    document.getElementById("datenow").innerHTML = a + c;

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>

@stop
