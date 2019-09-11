@extends('layouts.default-sidebar')
@section('content')

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Product Category</h1>
        <div class="card">
            <div class="card-body">
                <form action="/product/ProductCategory/editProductCategoryupdate/{{$category->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="text-right">
                        <a href="" class="mr-auto btn btn-danger">Delete Product Category</a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name <span style="color: #F00">*</span></label>
                                <input type="text" value="{{$category->category_name}}" name="category_name"
                                    class="form-control" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Status <span style="color: #F00">*</span></label>
                                <div class="form-group">
                                    <select name="status" class="form-control" id="sel1">
                                        @if($category->status===1)
                                        <option selected value="1">Active</option>
                                        <option value="0">Inactive</option>
                                        @else
                                        <option value="1">Active</option>
                                        <option selected value="0">Inactive</option>
                                        @endif
                                    </select>
                                </div>
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
