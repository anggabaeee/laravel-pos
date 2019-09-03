@extends('layouts.default-sidebar')
@section('content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css'>
<link href="{{ asset('css/magnific.css') }}" rel="stylesheet">

<style>
    .table th {
        background-color: #f7f7f8;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>List Product</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="border-bottom: 1px solid #e0dede; padding-bottom: 15px;">
                    <div class="col-md-12">
                        <a href="ListProduct/addProduct" class="btn btn-primary"><i class="fa fa-plus"></i> Add New
                            Product</a>
                    </div>
                </div>
                <form action="">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Code</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Category</label>
                                <select name="kategori" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <br>
                                <button class="btn btn-primary" style="margin-top: 5px; width: 90%">Search
                                    Product</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="exampel">
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
                                    @foreach ($product as $p)
                                    <tr>
                                        <td>{{$p->code}}</td>
                                        <td>{{$p->name_product}}</td>
                                        <td><img height="50px" src="{{ url('/product_image/'.$p->thumbnail) }}"></a>
                                        </td>
                                        <td>{{$p->category_name}}</td>
                                        <td>{{ number_format($p->retail_price, 2, '.', ',') }}</td>
                                        <td>{{ number_format($p->purchase_price, 2, '.', ',') }}</td>
                                        @if ($p->status == 0)
                                        <td>Not Active</td>
                                        @else
                                        <td>Active</td>
                                        @endif
                                        <td>
                                            <a class="with-caption image-link"
                                                href="{{ url('/product_image/'.$p->thumbnail) }}"><i
                                                    class="fa fa-picture-o fa-2x" aria-hidden="true"></i></a>
                                            <a href="/product/ListProduct/editproduct/{{$p->id_product}}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                            <a href="#"><i class="fa fa-barcode fa-2x" style="color: black"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#exampel').DataTable();
    });

</script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js'></script>
<script src="{{ asset('js/magnific.js') }}"></script>
@stop
