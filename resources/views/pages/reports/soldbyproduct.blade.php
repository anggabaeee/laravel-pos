@extends('layouts.default-sidebar')
@section('content')
<style>
    .btn {
        border-color: #015d93;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        <h1>Sales Reports</h1>
        <div class="mt-2 master-form">
            <form action="/soldbyproduct" method="get">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input name="startdate" class="form-control datepicker" type="text" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input name="enddate" class="form-control datepicker" type="text" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="">&nbsp</label><br>
                            <input type="submit" class="btn btn-primary" value="Get Report" id="btnreport">
                        </div>
                    </div>
                </div>
            </form>
            <div id="display" hidden="true">
                <div class="d-flex">
                    <div class="ml-auto bd-highlight"><input class="btn btn-success" type="button"
                            value="Export To Excel">
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table" id="exampel">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Total Sold Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $p)
                            <tr>
                                <td>{{$p->product_code}}</td>
                                <td>{{$p->product_name}}</td>
                                <td>{{$p->category_name}}</td>
                                <td>{{$p->totalitem}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
        $('#exampel').DataTable();
        var url_string = window.location.href;
        var url = new URL(url_string);
        var c = url.searchParams.get("startdate");
        if (c != null) {
            document.getElementById('display').hidden = false;
        }
    });

</script>
</section>
@stop
