@extends('layouts.default-sidebar')
@section('content')
<style>
    .btn {
        height:40px;
        width:107px;
        background-color: #0079c0;
        border-color: #015d93;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        <h1>Sales Reports</h1>
        <form action="" class="mt-2 master-form">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input class="form-control" type="date">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input class="form-control" type="date">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">&nbsp</label><br>
                        <button class="btn btn-primary">Get Report</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
@stop
