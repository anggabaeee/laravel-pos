@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        <h1>Sales Reports</h1>
        <form action="" class="mt-2 master-form">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Outlets</label>
                        <select class="form-control" type="text">
                            <option value="-">Choose Outlets</option>
                            <option value="4">All Outlets</option>
                            <option value="3">Uniqlo - Bugis Outlet</option>
                            <option value="2">Uniqlo - Changi Outlet</option>
                            <option value="1">Uniqlo - NEX Outlet</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Paid By</label>
                        <select name="paid" class="form-control" required="">
                            <option value="">Choose Paid By</option>
                            <option value="-">All</option>
                            <option value="1">Cash </option>
                            <option value="5"> Cheque </option>
                            <option value="6"> Debit </option>
                            <option value="7">Gift Card </option>
                            <option value="4">Master Card </option>
                            <option value="2">Nett </option>
                            <option value="3">VISA </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input class="form-control" type="date">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input class="form-control" type="date">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">&nbsp</label><br>
                        <button class="btn btn-primary" style="width: 100%;">Get Report</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>
</section>
@stop
