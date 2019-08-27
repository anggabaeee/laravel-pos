@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        <h1>Inventory</h1>
        <form action="" class="mt-2 master-form">
            <div class="d-flex">
                <div class="ml-auto bd-highlight">
                    <input class="btn btn-success" type="button" value="Export Inventory">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Product Code</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="offset-md-3 col-sm-2">
                    <div class="form-group">
                        <label for="">&nbsp</label><br>
                        <button class="btn btn-primary" style="width: 100%;">Search</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Total Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $p)
                        <tr>
                            <td>{{$p->code}}</td>
                            <td>{{$p->name_product}}</td>
                            <td></td>
                            <td><a href="/inventory/editinventory" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </form>
    </div>
</div>
</section>
@stop
