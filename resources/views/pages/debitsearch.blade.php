@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        <h1>Debit</h1>
        <form action="/debitsearch" method="get" class="mt-2 master-form">
            <div class="d-flex">
                <div class="ml-auto bd-highlight">
                <a href="#"><button class="btn btn-success">Export To Excel</button></a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Customer Name</label>
                        <input name="namecus" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Date From</label>
                        <input name="startdate" class="form-control" type="date">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Date To</label>
                        <input name="enddate" class="form-control" type="date">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">&nbsp</label><br>
                        <input type="submit" value="Search" class="btn btn-primary" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Sale ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Outlets</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Grand Total</th>
                            <th scope="col">Unpaid Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$debit)
                        <tr style="text-align: center;">
                            <td colspan="10">No data available in table</td>
                        </tr>
                        @else
                        @foreach($debit as $d)
                        <tr style="text-align: center;">
                            <td>{{$d->id}}</td>
                            <td>{{$d->date}}</td>
                            <td>{{$d->name_outlet}}</td>
                            <td>{{$d->customer_name}}</td>
                            <td>{{$d->grandtotal}}</td>
                            <td>{{$d->minus}}</td>
                            <td><a href="/debit/makepayment/{{$d->id}}">
                                    <button type="button" class="btn btn-primary">Make Payment</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </form>
    </div>
</div>
</section>
@stop
