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

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Purchase Order</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="margin-left: 0px">
                    <a href="{{ url('/purchase_order/CreatePurchaseOrder') }}"><button type="button" class="btn btn-primary">
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
                                    <th width="13%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($purchase_order as $p)
                                <tr>
                                    <td>{{ $p->po_number }}</td>
                                    <td>{{ $p->name_outlet }}</td>
                                    <td>{{ $p->supplier_name }}</td>
                                    <td>{{ $p->datenow }}</td>
                                    <td style="font-weight: bold;"><span style="color:#090;">Active</span></td>
                                    <td><a href="#" style="margin-left: 5px;"><button
                                            class="btn btn-primary">Edit</button></a>
                                            <a href="#" style="margin-left: 5px;" onclick="return confirm('Are you sure to delete this Purchase Order : ?')"><i class="fa fa-times" height="50px" style="color: #c50000"></i></a>
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
                        Showing 1 to 1 of 1 entries
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@stop
