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
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Product Code <span style="color: #F00">*</span></label>
                                <input type="text" name="code" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name <span style="color: #F00">*</span></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Category <span style="color: #F00">*</span></label>
                                <select name="category" class="form-control">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Purchase Price (Cost) <span style="color: #F00">*</span></label>
                                <input type="text" name="cost" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Retail Price (Price) <span style="color: #F00">*</span></label>
                                <input type="text" name="price" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Image <span style="color: #F00">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="CustomFile" required>
                                    <label class="custom-file-label" for="CustomFile">choose file</label>
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
                <a href="{{ url ('product/ListProduct/')}}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"></i> Back
                    </button>
                </a>
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
