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

    .red {
        border-style: groove;
        border-radius: 10px;
    }

    .tableku {
        background-color: #373942;
        color: #FFF;
        padding-top: 10px;
        padding-bottom: 10px;
        width: 100%;
    }

    .isitable {
        background-color: white;
        width: 100%;
        height: 330px;
        overflow: scroll;
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
            <div class="kiri ml-2">
                <div class="row">
                    <div class="col-12 mt-2">
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
                    <div class="col-12" style="">
                        <table class="tableku">
                            <tbody>
                                <tr style=" text-align: right;">
                                    <td>Total Items :</td>
                                    <td>
                                        <div>
                                            <div>0.00</div>
                                        </div>
                                    </td>
                                    <td>
                                        Total :
                                    </td>
                                    <td>
                                        <div>0.00</div>
                                    </td>
                                </tr>
                                <tr style=" text-align: right;">
                                    <td>TDis. Amt./% :</td>
                                    <td>
                                        <div>
                                        <input type="text" value>
                                        </div>
                                    </td>
                                    <td>
                                        Total :
                                    </td>
                                    <td>
                                        <div>0.00</div>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="red">
                <h1>dwdwd</h1>
                <h2>dwdwd</h2>
            </div>
        </div>
    </div>
</div>

@stop
