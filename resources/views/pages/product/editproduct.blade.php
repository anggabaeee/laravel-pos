@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        {{ csrf_field() }}
        @foreach ($product as $p)
        <h1>Edit Product : {{$p->code}}</h1>
        @endforeach
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <button class="btn btn-danger">sadlas</button>
                </div>
                <form action="">
                    @foreach ($product as $p)
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Code <span style="color:red">*</span></label>
                                <input type="text" name="code" class="form-control" value="{{$p-> code}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name <span style="color:red">*</span></label>
                                <input type="text" name="name_product" class="form-control"
                                    value=" {{$p-> name_product}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category Name <span style="color:red">*</span></label>
                                <select name="category" class="form-control">
                                    @foreach($category as $c)
                                    <option value="{{$c->id}}" @if ($c -> id === $p -> category_id)
                                        selected
                                        @endif>
                                        {{$c->category_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Purchase Price (Cost) <span style="color:red">*</span></label>
                                <input type="text" name="purchase_price" class="form-control"
                                    value="{{$p->purchase_price}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Retail Price (Price) <span style="color:red">*</span></label>
                                <input type="text" name="retail_price" class="form-control"
                                    value="{{$p->retail_price}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Category <span style="color:red">*</span></label>
                                <input type="file" name="thumbnail">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Status <span style="color:red">*</span></label>
                                <select name="status" class="form-control">
                                    @if($p->status===1)
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    @else
                                    <option selected value="0">Inactive</option>
                                    <option value="1">Active</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
        <div class="card mt-5 mb-5">
            <div class="card-body">
                <form action="">
                    <h3>Inventory by Outlet</h3>
                    <div class="row" style="margin-top: 15px">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@stop
