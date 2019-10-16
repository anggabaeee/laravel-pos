@extends('layouts.defaultpdf')
@section('content')
<style>
    .blog p {
        margin-bottom: 10px;
    }


    .table td {
        padding: 5px;
        border-bottom: 1.5px solid #000;
        margin-bottom: 5px;
    }

    .btn:hover {
        background-color: #007bff;
    }
    @media print {
  #button {
    display: none;
  }
}

</style>
<div class="container">
    <div class="col-md-4 offset-md-4 mt-1 blog">
        @foreach( $outlets as $p)
        @if ($p->id === $orders->outlet_id)
        <h2 style="text-align: center; color:black;">{{$p->name_outlet}}</h2>
        <p class="mt-3">Addres : {{$p->address_outlet}}</p>
        <p>Telephone : {{$p->contact_number}}</p>
        @endif
        @endforeach
        <p>Date : {{$orders->ordered_datetime}}</p>
        <p>Customer : {{$orders->customer_name}}</p>
        <table class="table" style="border-width: bold; width:100%;">
            <thead>
                <tr>
                    <th width="10%">#</th>
                    <th width="20%">Code</th>
                    <th width="40%">Name</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Condition</th>
                </tr>
            </thead>
            <tbody>
                @php
                $a = 1;
                @endphp
                @foreach( $returnItem as $p)
                @if ($p->order_id === $orders->id)
                <tr>
                    <td>@php echo($a++) @endphp</td>
                    <td style="text-align: center">{{$p->product_code}}</td>
                    @foreach($product as $d)
                    @if ($d->code === $p->product_code)
                    <td>{{$d->name_product}}</td>
                    @endif
                    @endforeach
                    <td style="text-align: center">{{$p->qty}}</td>
                    @if($p->item_condition = 1)
                    <td style="text-align: center"><strong>Good</strong></td>
                    @else
                    <td style="text-align: center"><strong>Not Good</strong></td>
                    @endif
                </tr>
                @endif
                @endforeach
                <tr>
                    <td colspan="3">
                        Total Items : <strong>{{$orders->total_items}} </strong>
                    </td>
                    <td colspan="2" style="border-left: 1.5px solid #000;">
                        Sub Total : <strong>{{$orders->subtotal}} </strong>
                        <br>
                        Tax : <strong>{{$orders->tax}} </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="row">
                            <div class="col-6">
                                <strong> Grand Total : </strong>
                            </div>
                            <div class="col-6 text-right">
                                <strong>
                                    {{$orders->grandtotal}}
                                </strong>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="row">
                            <div class="col-6">
                                <strong>
                                    Refund By :
                                </strong>
                            </div>
                            <div class="col-6 text-right">
                                <strong>
                                    {{$orders->payment_method_name}}
                                </strong>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="row">
                            <div class="col-6">
                                <strong>
                                    Refund Method :
                                </strong>
                            </div>
                            <div class="col-6 text-right">
                                <strong>
                                    @if($orders->refund_status = 1)
                                    Full Refund
                                    @else
                                    Partial Refund
                                    @endif
                                </strong>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="row">
                            <div class="col-6">
                                <strong>
                                    Remark :
                                </strong>
                            </div>
                            <div class="col-6 text-right">
                                <strong>
                                    {{$orders->remark}}
                                </strong>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="text-align: center" class="mt-2">Thank you for coming!</p>
        <div class="row" id="button">
            <a href="/returnorder/ViewCreateReturn/{{$orders->id}}" class="col-12 ">
                <button type="button" class="btn btn-primary col-12 mr-3" 
                    style="background-color:#005b8a; border-radius: 0%;">back</button>
            </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        window.print()
    });
</script>
@stop
