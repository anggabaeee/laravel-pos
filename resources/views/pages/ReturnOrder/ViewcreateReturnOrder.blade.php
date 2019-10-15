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

    .card {
        font-size: 18px;
    }

</style>
<!-- toast -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<div class="col-sm-9 col-lg-10">
    <div class="container mb-5">
        <h1>Create Return Order</h1>
        <div class="card">
            <div class="mx-3">
                <div class="row mt-3">
                    <div class="col-3">
                        <strong> Customer</strong>
                        <p>{{$orders->customer_name}}</p>
                    </div>
                    <div class="col-3">
                        <strong>Outlets</strong>
                        @foreach( $outlets as $p)
                        @if ($p->id === $orders->outlet_id)
                        <p>{{$p->name_outlet}}</p>
                        @endif
                        @endforeach
                        <p></p>
                    </div>
                    <div class="col-3 ml-auto">
                        <button type="button" class="btn btn-success col-12 ">Print Purchase Order</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <strong> Remark</strong>
                        <p>{{$orders->remark}}</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-3">
                        <strong>Refund Amount</strong>
                    </div>
                    <div class="col-3">
                        <p>
                            : {{$orders->paid_amt}}
                        </p>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-3">
                        <strong>Refund Tax</strong>
                    </div>
                    <div class="col-3">
                        <p>
                            : {{$orders->tax}}
                        </p>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-3">
                        <strong>Refund Grand Total</strong>
                    </div>
                    <div class="col-3">
                        <p>
                            : {{$orders->grandtotal}}
                        </p>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-3">
                        <strong>Refund by</strong>
                    </div>
                    <div class="col-3">
                        <p>
                            : {{$orders->payment_method_name}}
                        </p>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-3">
                        <strong>Refund method</strong>
                    </div>
                    <div class="col-3">
                        @if($orders->Refund_status = 1)
                        <p>: Full Refund
                        </p>
                        @elseif($orders->Refund_status = 2)
                        <p>: Partial Refund
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <hr style="color :#686868;">
            <div class="row mx-3">
                <table class="table">
                    <thead style="background-color :#686868;">
                        <tr style="color:white;">
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Return Quantity</th>
                            <th scope="col">Condition</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $returnItem as $p)
                        @if ($p->order_id === $orders->id)
                        <tr>
                            <td>{{$p->product_code}}</td>
                            @foreach($product as $d)
                            @if ($d->code === $p->product_code)
                            <td>{{$d->name_product}}</td>
                            @endif
                            @endforeach
                            <td>{{$p->qty}}</td>
                            @if($p->item_condition = 1)
                            <td><strong>Good</strong></td>
                            @else
                            <td><strong>Not Good</strong></td>
                            @endif
                            @endif
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop
