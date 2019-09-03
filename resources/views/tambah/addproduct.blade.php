@extends('layouts.default-sidebar')
@section('content')
<style>
    .custom-file-label {
        color: #919598;
        font-family: none;
    }

</style>

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Add Product</h1>
        <div class="card">
            <div class="card-body">
                <form action="/product/ListProduct/addProductstore" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Product Code <span style="color: #F00">*</span></label>
                                <input type="text" name="code" class="form-control" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name <span style="color: #F00">*</span></label>
                                <input type="text" name="name_product" class="form-control" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Category <span style="color: #F00">*</span></label>
                                <select name="category_id" class="form-control">
                                    <option disabled selected value> -- select an option -- </option>
                                    @foreach ($category as $p)
                                    <option value="{{$p->id}}">{{$p->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Purchase Price (Cost) <span style="color: #F00">*</span></label>
                                <input type="text" name="retail_price" class="form-control" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Retail Price (Price) <span style="color: #F00">*</span></label>
                                <input type="text" name="purchase_price" class="form-control" required
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Image <span style="color: #F00">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="status" value="1" hidden>
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
                <a href="{{ url ('product/ListProduct/')}}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
@stop
</section>
