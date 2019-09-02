@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        @foreach ($product as $p)
        <h1>Edit Product : {{$p->code}}</h1>
        @endforeach
        <div class="card">
            <div class="card-body">
                @foreach ($product as $p)
                <div class="text-right">
                    <a href="/product/ListProduct/editproductdelete/{{$p->id_product}}"
                        class="btn btn-danger">Hapus</a>
                </div>
                @endforeach
                <div class="text-right mt-3">
                    <a href="" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary">Lihat
                        Gambar</a>
                </div>
                @foreach ($product as $p)
                <form action="/product/ListProduct/editproductupdate/{{$p->id_product}}" method="POST"
                    enctype="multipart/form-data">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Code <span style="color:red">*</span></label>
                                <input type="text" name="code" class="form-control" value="{{$p-> code}}">
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
                                <select name="category_id" class="form-control">
                                    @foreach($category as $c)
                                    <option value="{{$c->id}}" @if ($c->id == $p->category_id)
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
                        <div class="col-md-4" style="margin-top: 32px">
                            <div class="form-group">
                                <input type="file" class="custom-file-input" id="customFile" name="thumbnail" value="{{$p->thumbnail}}">
                                <label class="custom-file-label" for="customFile">Product Category</label>
                                <br>
                                <img height="50px" src="{{ url('/product_image/'.$p->thumbnail) }}" alt="">
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
                                    <option value="1">Active</option>
                                    <option selected value="0">Inactive</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
                @endforeach
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @foreach ($product as $p)
                <h5 class="modal-title" id="exampleModalLongTitle">Product Code : {{$p->code}}</h5>
                @endforeach
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($product as $p)
                <img style="width: 100%;height: auto;" src="{{ url('/product_image/'.$p->thumbnail) }}">
                @endforeach
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
</section>
@stop
