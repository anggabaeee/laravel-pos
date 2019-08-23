@extends('layouts.default-sidebar')
@section('content')

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Product Category</h1>
        <div class="card">
            <div class="card-body">
                <form action="/product/ProductCategory/addProductCategorystore" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name <span style="color: #F00">*</span></label>
                                <input type="text" name="name" class="form-control" required autocomplete="off">
                                <input type="text" name="status" value="1" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add" style="width: 80%">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-2">
                <a href="{{ url ('product/ProductCategory/')}}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@stop
</section>
