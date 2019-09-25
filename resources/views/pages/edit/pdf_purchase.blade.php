@extends('layouts.defaultpdf')
@section('content')
<style>
    h1 {
        color: #005b8a;
        font-size: 60px;
        font-weight: bold;
        text-align: center;
    }

    h2 {
        color: #005b8a;
        font-size: 20px;
        font-weight: bold;

    }

    .atas {
        font-size: 18px;
    }

    .kiri {
        color: #005b8a;
    }

    p {
        display: inline;
    }
</style>
<div class="container mt-2" id="frame">
    <div class="row ">
        <div class="col-md-6 offset-md-3">
            <h1>Purchase Order</h1>
        </div>
    </div>
    <div class="row mt-5 atas">
        <div class="col-md-5 kanan ">
            <div class="row ">
                <div class="col-md-4">
                    @foreach( $supplier as $p)
                    @if ($p->id === $purchase_order->id_outlet)
                    <p>SUPPLIERS </p>
                </div>
                <div class="col-md-1">
                    <p>:</p>
                </div>
                <div class="col-md-3">
                    <p>{{$p->supplier_name}}</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-4">
                    <p>ADDRESS</p>
                </div>
                <div class="col-md-1">
                    <p>:</p>
                </div>
                <div class="col-md-3">
                    <p>{{$p->supplier_addres}}</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-4">
                    <p>EMAIL</p>
                </div>
                <div class="col-md-1">
                    <p>:</p>
                </div>
                <div class="col-md-3">
                    <p>{{$p->email}}</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-4">
                    <p>TELEPHONE </p>
                </div>
                <div class="col-md-1">
                    <p>:</p>
                </div>
                <div class="col-md-3">
                    <p>{{$p->telephone}}</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-4">
                    <p>FAX</p>
                </div>
                <div class="col-md-1">
                    <p>:</p>
                </div>
                <div class="col-3">
                    <p>{{$p->fax}}</p>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-7 kiri" style="font-size:16px;  font-weight: bold; color:#1392ff;">
            <div class="col-8 ml-auto">
                <div class="row" style="text-align: right;">
                    <div class="col-8">
                        <p>PURCHASE ORDER NUMBER</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col">
                        <p>{{$purchase_order->po_number}}</p>
                    </div>
                </div>
                <div class="row" style="text-align: right;">
                    <div class="col-7">
                        <p>CREATED DATE</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col">
                        <p>{{$purchase_order->datenow}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="background-color:black;">
    <h2>SHIP TO</h2>
    <div class="row atas mb-4">
        <div class="col kanan mr-a">
            <div class="row mt-3">
                @foreach( $outlets as $p)
                @if ($p->id === $purchase_order->id_outlet)
                <div class="col-md-2">
                    <p>OUTLETS</p>
                </div>
                <div class="col-md-1">
                    <p>: </p>
                </div>
                <div class="col-md-1">
                    <p>{{$p->name_outlet}}</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-2">
                    <p>ADDRESS</p>
                </div>
                <div class="col-md-1">
                    <p>: </p>
                </div>
                <div class="col-md-1">
                    <p>{{$p->address_outlet}}</p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-2">
                    <p>TELEPHONE</p>
                </div>
                <div class="col-md-1">
                    <p>: </p>
                </div>
                <div class="col-md-1">
                    <p>{{$p->contact_number}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mt-4">
            <div class="table-responsive" style="text-align:left;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>PRODUCT NAME </th>
                            <th>PRODUCT CODE</th>
                            <th>ORDERED QUANTITY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchase_order_items as $p)
                        @if ($p->id_po === $purchase_order->id)
                        <tr>
                            <td>
                                {{$p->product_name}}
                            </td>
                            <td>
                                {{$p->product_code}}
                            </td>
                            <td>
                            {{$p->ordered_qty}}
                            </td>
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                </table>
                <hr>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col">
            <div class="row ">
                <div class="col-md-1">
                    <p>Note</p>
                </div>
                <div class="col-md-1">
                    <p>:</p>
                </div>
                <div class="col">
                    <p>{{$purchase_order->note}}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="col-10 ml-auto">
                <div class="row" style="text-align: right;">
                    <div class="col-5">
                        <strong>AUTHORIZED BY</strong>
                    </div>
                    <div class="col-7" style=" border-bottom: 1px solid black;">
                    </div>
                </div>
                <div class="row mt-4" style="text-align: right;">
                    <div class="col-5">
                        <strong>SIGNATURE</strong>
                    </div>
                    <div class="col-7" style=" border-bottom: 1px solid black;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        window.print()
        $("#frame").click(function(){
            window.print()
            });
    });

</script>
@stop
