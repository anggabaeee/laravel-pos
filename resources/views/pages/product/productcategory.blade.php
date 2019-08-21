@extends('layouts.default-sidebar')
@section('content')
<style>
    .table th {
        background-color: #f7f7f8;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Product Category</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="border-bottom: 1px solid #e0dede; padding-bottom: 15px;">
                    <div class="col-md-12">
                        <a href="{{ url('/product/ProductCategory/addProductCategory')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Category</a>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">Code</th>
                                        <th width="20%">Name</th>
                                        <th width="10%">Image</th>
                                        <th width="15%">Category</th>
                                        <th width="10%">Cost</th>
                                        <th width="10%">Price</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="float: left; padding-top: 10px;">
                        Showing 0 to 0 entries
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
@stop