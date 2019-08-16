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
        <h1>Payment Methods</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="margin-left: 0px">
                    <a href="{{ url('/setting/payment_method/AddPaymentMethod') }}"><button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"> </i> Add Payment Method</button></a>
                </div>
                <div class="row" style="margin-left: 0px; margin-top: 15px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th widht="50%">Payment Method Name</th>
                                    <th widht="40%">Status</th>
                                    <th widht="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Gift Card</td>
                                    <td tyle="font-weight: bold;"><span style="color:#090;">Active</span></td>
                                    <td><a href="#" style="margin-left: 5px;"><button
                                            class="btn btn-primary">Edit</button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="float: left; padding-top: 10px;">
                        Showing 1 to 1 of 1 entries
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@stop
