@extends('layouts.default-sidebar')
@section('content')
<style>
    h1 {
        color: #5f6468;
    }

    .table th {
        background-color: #f7f7f8;
    }

</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Purchase Order</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="margin-left: 0px">
                    <a href="{{ url('/purchase_order/CreatePurchaseOrder') }}"><button type="button"
                            class="btn btn-primary">
                            <i class="fa fa-plus"> </i> Create Purchase Order</button></a>
                </div>
                <div class="row" style="margin-left: 0px; margin-top: 15px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="20%">Purchase Order Number</th>
                                    <th width="12%">Outlets</th>
                                    <th width="15%">Supplier</th>
                                    <th width="10%">Created Date</th>
                                    <th width="15%">Status</th>
                                    <th width="25%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchase_order as $p)
                                <tr>
                                    <td>{{ $p->po_number }}</td>
                                    <td>{{ $p->name_outlet }}</td>
                                    <td>{{ $p->supplier_name }}</td>
                                    <td>{{ $p->datenow }}</td>
                                    @if ($p->status == 1)
                                    <td id="status" style="font-weight: bold;">Created</td>
                                    @elseif ($p->status == 2)
                                    <td id="status" style="font-weight: bold;">Sent To Supplier</td>
                                    @else
                                    <td id="status" style="font-weight: bold;">Received From Supplier</td>
                                    @endif
                                    <td>
                                        @if ($p->status == 2)
                                        <a href="/purchase_order/recivepurchaseorder/{{ $p->id }}"><button
                                                class="btn btn-primary">Recive</button></a>
                                        <a href="/purchase_order/editpurchaseorder/{{ $p->id }}"
                                            style="margin-left: 5px;"><button class="btn btn-primary">view</button></a>
                                        <a href="/purchase_order/delete_order/{{ $p->id }}"
                                            style="margin-left: 5px;"><button class="btn btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data?')">delete</button></a>
                                        @elseif ($p->status == 3)
                                        <a href="/purchase_order/viewpurchase/{{ $p->id }}" id="btnRcv"><button
                                                class="btn btn-primary">view</button></a>
                                        @else
                                        <a href="/purchase_order/editpurchaseorder/{{ $p->id }}"
                                            style="margin-left: 5px;"><button class="btn btn-primary">Edit</button></a>
                                        <a href="/purchase_order/delete_order/{{ $p->id }}"
                                            style="margin-left: 5px;"><button class="btn btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data?')">delete</button></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div></div>
                <div class="row">
                    <div class="col-md-6" style="float: left; padding-top: 10px;">
                 
                    {{$purchase_order->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if(Session::has('p'))
<script>
    toastr.success('{{Session::get('p')}}')
</script>
@elseif(Session::has('d'))
<script>
    toastr.error('{{Session::get('d')}}')
</script>
@elseif(Session::has('a'))
<script> toastr.info('{{Session::get('a')}}')</script> 
@elseif(Session::has('c'))
<script>toastr.warning('{{Session::get('c')}}')</script> 
@endif
@stop
