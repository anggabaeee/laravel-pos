@extends('layouts.defaultpos')
@section('content')
<style>
    .form {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
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

</style>
<div class="row">
    <div class="col-sm-12">
    </div>
    &nbsp;
</div>
<div class="form mx-3">
    <div class="row">
        <div class="col-sm-4">
            <div class="kiri">
                <div class="row">
                    <div class="col-12 ">
                        <button type="button" class="btn btn-primary col-12">Primary</button>
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
                    <div class="col-12 ml-3">
                        <div class="isitable"></div>
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
                    <div class="col-4"><button type="button" class="btn btn-danger col-sm-12">Primary</button></div>
                    <div class="col-4"><button type="button" class="btn btn-primary col-sm-12">Primary</button></div>
                    <div class="col-4"><button type="button" class="btn btn-success col-sm-12">Success</button></div>
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
                        <div class="tablepilihan border"></div>
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
    var d = new Date();
    var a = d.getDate() + "/";
    var c = d.getMonth() + 1 + "/" + d.getFullYear();
    document.getElementById("datenow").innerHTML = a + c;

</script>

@stop
