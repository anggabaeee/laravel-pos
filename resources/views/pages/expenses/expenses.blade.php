@extends('layouts.default-sidebar')
 @section('content')
  <style>
    .panel {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }
    .panel button {
        background-color: #0079c0;
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
                <button class="btn btn-primary" onclick="location.href='/dashboard'" type="button" style="padding: 0px 12px;"><i class="icono-plus"></i>
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
                        <label for="">Dat From</label>
                        <input class="form-control" type="date" value="&nbsp"></div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Date To</label>
                        <input class="form-control" type="date" value="&nbsp"></div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">&nbsp</label>
                        <br>
                        <button class="btn btn-primary" style="width: 100%;">Search</button></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr class="table-active">
                                <th width="10%">Expenses Number</th>
                                <th width="10%">Expenses Category</th>
                                <th width="10%">Outlets</th>
                                <th width="10%">Date</th>
                                <th width="10%">Amount (SGD)</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td colspan="5">No matching records found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6" style="float: left; padding-top: 10px;">
                Showing 0 to 0 of 0 entries </div>
            </div>
        </form>
    </div>
</div>

</section>@stop
