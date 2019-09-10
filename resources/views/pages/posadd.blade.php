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
<div class="form mx-4">
    <div class="row">
        <div class="col-sm-4">
            <div class="kiri">
                <div class="row">
                    <div class="col-12 ">
                        <button type="button" class="btn btn-primary col-12 py-0" id="myBtn4"><i class="icono-plus"></i>
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
                                <div>0</div>
                            </div>
                            <div class="col-3">
                                <div>Total:</div>
                            </div>
                            <div class="col-3">
                                <div>0</div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-3">
                                <div>Dis. Amt./% :</div>
                            </div>
                            <div class="col-3">
                                <input type="text" class="mx-4 w-75">
                            </div>
                            <div class="col-3">
                                <div>Tax (7.00%) :</div>
                            </div>
                            <div class="col-3">
                                <div>0</div>
                            </div>
                        </div>
                        <hr style="border-color:white;">
                        <div class="row pt-1 mt-1">
                            <div class="col-6" style="text-align:left;">
                                <div>Total Payble</div>
                            </div>
                            <div class="col-6">
                                <div class="ml-auto">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4"><button type="button" class="btn btn-danger col-sm-12">Cancel</button></div>
                    <div class="col-4"><button type="button" class="btn btn-primary col-sm-12" id="myBtn3">Hold</button>
                    </div>
                    <div class="col-4"><button type="button" class="btn btn-success col-sm-12"
                            id="myBtn5">Payment</button></div>
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
                                        <a onclick="addlist('{{$p->id}}')"> <img height="50px" class="img-thumbnail"
                                                src="{{ url('/product_image/'.$p->thumbnail) }}">
                                            <p id="{{$p->id}}-name_product">{{$p->name_product}}</p>
                                            <p id="{{$p->id}}-qty">{{$p->qty}}</p>
                                            <p id="{{$p->id}}-price">{{$p->price}}</p>
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
<div class="modal fade" id="myModal3">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #373942;">
            <div class="modal-header">
                <h1 class="modal-title" style="color:white;">Opened Bill</h1>
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
                <form action="addCustomerposstore" method="post">
                    {{ csrf_field() }}
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
                                <input type="submit" class="btn btn-success py-1" value="Add Customer" id="myBtn6"
                                    data-dismiss="modal">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="myModal5">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #373942;">
            <div class="modal-header">
                <h1 class="modal-title" style="color:white;">Add Customer</h1>
            </div>
            <div class="modal-body" style="background-color:white;">
                <div class="row">
                    <div class="col-6 mt-1">
                        <p>Customer </p>
                    </div>
                    <div class="col-6">
                        <select class="form-control" type="text">
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-1">
                        <p>Total Payable Amount</p>
                    </div>
                    <div class="col-6">
                        <span>00.0</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-1">
                        <p>Total Purchased Items</p>
                    </div>
                    <div class="col-6">
                        <span>00.0</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-1">
                        <p>Paid By:</p>
                    </div>
                    <div class="col-6">
                        <select class="form-control" type="text">
                            <option value="">choice</option>
                            <option value="cash">cash</option>
                            <option value="Nett">Nett</option>
                            <option value="Visa">Visa</option>
                            <option value="Master Card">Master Card</option>
                            <option value="Cheque">Master Card</option>
                            <option value="Debit">Debit</option>
                            <option value="GiftCard">Gift Card</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-1">
                        <p>Paid Amount:/p>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control col-sm-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-1">
                        <p>Return Change :</p>
                    </div>
                    <div class="col-6">
                        <span>00.0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="background-color:white;">
            <div class="d-flex">
                <div class="ml-auto">
                    <button type="button" class="btn btn-success py-1" hidden="true">Add Customer</button>
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

<script>
    function addlist(i) {
        var qty = document.getElementById('' + i + '-qty').innerHTML;
        var name = document.getElementById('' + i + '-name_product').innerHTML;
        qty1 = parseInt(qty);
        var price = document.getElementById('' + i + '-price').innerHTML;

        var row = document.createElement('div');
        row.setAttribute('class', 'row ' + i + '');
        row.setAttribute("style", "margin-right: 5px");
        row.setAttribute('id', '' + i + '-row');

        var div1 = document.createElement('div');
        div1.setAttribute("class", "col-md-3");
        var pnew = document.createElement('p');
        pnew.setAttribute('id', '' + i + '-namelist')
        var newname = document.createTextNode(name);
        pnew.appendChild(newname);
        div1.appendChild(pnew)

        var div2 = document.createElement('div');
        div2.setAttribute("class", "col-md-5");
        var row21 = document.createElement('div');
        row21.setAttribute("class", "row");
        div2.appendChild(row21);

        var div21 = document.createElement('div');
        div21.setAttribute("class", "col-md-3");
        row21.appendChild(div21);
        var plusicon = document.createElement('a');
        plusicon.setAttribute("class", "fa fa-plus-circle");
        div21.appendChild(plusicon)

        var div22 = document.createElement('div');
        div22.setAttribute("class", "col-md-6");
        row21.appendChild(div22);
        var newqty = document.createElement('input');
        newqty.setAttribute("type", "text");
        newqty.setAttribute("value", qty1);
        newqty.setAttribute("class", "form-control");
        newqty.setAttribute("name", "qty[]");
        newqty.setAttribute('id', '' + i + '-qtylist');
        div22.appendChild(newqty)

        var div23 = document.createElement('div');
        div23.setAttribute("class", "col-md-3");
        row21.appendChild(div23);
        var minusicon = document.createElement('a');
        minusicon.setAttribute("class", "fa fa-minus-circle");
        div23.appendChild(minusicon);

        var div3 = document.createElement('div');
        div3.setAttribute("class", "col-md-3");
        var pnew1 = document.createElement('p');
        var newprice = document.createTextNode(price);
        pnew1.appendChild(newprice);
        div3.appendChild(pnew1)

        var div4 = document.createElement('div');
        div4.setAttribute("class", "col-md-1")
        var closeicon = document.createElement('a');
        closeicon.setAttribute("class", "fa fa-close");
        div4.appendChild(closeicon)

        row.appendChild(div1);
        row.appendChild(div2);
        row.appendChild(div3);
        row.appendChild(div4);
        document.getElementById('isitable').appendChild(row);
    }

    function changeqty(){

    }

</script>

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
        $("#myBtn3").click(function () {
            $("#myModal3").modal();
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
        $("#myBtn5").click(function () {
            $("#myModal5").modal();
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

@stop
