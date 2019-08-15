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
                    <a href="#"><button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"> </i> Create Purchase Order</button></a>
                </div>
                <div class="row" style="margin-left: 0px; margin-top: 15px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th widht="15%">Purchase Order Number</th>
                                    <th widht="12%">Outlets</th>
                                    <th widht="10%">Supplier</th>
                                    <th widht="10%">Created Date</th>
                                    <th widht="13%">Status</th>
                                    <th widht="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Uniqlo - Buglis Outlet</td>
                                    <td>#02-10, B2, Bugis Shopping Mall</td>
                                    <td>292948484</td>
                                    <td>safs</td>
                                    <td style="font-weight: bold;"><span style="color:#090;">Active</span></td>
                                    <td><a href="#" style="margin-left: 5px;"><button
                                            class="btn btn-primary">Edit</button></a>
                                            <a href="#" style="margin-left: 5px;" onclick="return confirm('Are you sure to delete this Purchase Order : ?')"><i class="fa fa-times" height="50px" style="color: #c50000"></i></a>
                                            </td>
                                </tr>
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
