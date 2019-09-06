@extends('layouts.default-sidebar')
@section('content')
<style>
    .panel {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }

    .panel button {
        border-color: #015d93;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
<div class="col-sm-9 col-sm-offset-10 col-lg-10 col-lg-offset-2 main">
    <div class="container">
        <h1>Expenses</h1>
        <form action="" class="mt-2 panel">
            <div class="d-flex">
                <div class="mr-auto bd-highlight">
                    <button class="btn btn-primary" onclick="location.href='/expenses/addexpenses'" type="button"
                        style="padding: 0px 12px;"><i class="icono-plus"></i>
                        add Expenses</button></div>
                <div class="ml-auto bd-highlight"><input class="btn btn-success" type="button" value="Export"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group"><label for="">Expenses Number</label>
                        <input class="form-control" type="text"></div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Expenses Category</label>
                        <select class="form-control" type="text">
                            <option value="">all-category</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Outlets</label>
                        <select class="form-control" type="text">
                            <option value="-">All Outlets</option>
                            <option value="3">Uniqlo - Bugis Outlet</option>
                            <option value="2">Uniqlo - Changi Outlet</option>
                            <option value="1">Uniqlo - NEX Outlet</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Date From</label>
                        <input class="form-control datepicker" type="text" value="&nbsp"></div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Date To</label>
                        <input class="form-control datepicker" type="text" value="&nbsp"></div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">&nbsp</label>
                        <br>
                        <button class="btn btn-primary" style="width: 100%;">Search</button></div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                <table class="table table-hover">
                        <thead>
                            <tr class="table-active" style="text-align: center;">
                                <th>Expenses Number</th>
                                <th>Expenses Category</th>
                                <th>Outlets</th>
                                <th>Date</th>
                                <th>Amount (SGD)</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $e)
                            <tr style="text-align: center;">
                                <td>{{$e->expenses_number}}</td>
                                <td>{{$e->name_category}}</td>
                                <td>{{$e->name_outlet}}</td>
                                <td>{{$e->date}}</td>
                                <td>Rp. {{$e->amount}}.00</td>
                                <td><a href="/expenses/editexpenses">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    |
                                    <a href="#">
                                        <button type="button" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda Yakin ?')">
                                            <i class="fa fa-trash-o"></i> Delete</button>
                                    </a>
                                </td>
                                @endforeach

                        <tbody>
                            <tr style="text-align: center;">
                                <td colspan="10">No data available in table</td>
                            </tr>
                        </tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6" style="float: left; padding-top: 10px;">
                    Showing 0 to 0 of 0 entries </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

</script>

</section>@stop
