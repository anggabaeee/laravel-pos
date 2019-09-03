@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @foreach($product as $product)
        <h1>Inventory for Product Code : {{$product->code}}</h1>
        @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="mt-2 master-form">
            <h2>Inventory by Outlet</h2>
            <br>
            <div class="row" style="color: cornflowerblue;font-weight: bold;">
                <div class="col-md-3">
                    <p>Outlets</p>
                </div>
                <div class="col-md-9">
                    <p>Current Inventory Quantity</p>
                </div>
            </div>
            @foreach ($inventory as $p)
            <div class="row mt-2">
                <div class="col-md-3">
                    {{$p->name_outlet}}
                </div>
                <div class="col-md-9">
                    <label id="oldqty" name=oldqty[]>{{$p->qty}}</label>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
        <div class="mt-2 master-form mt-5 mb-5">
            <h2 class="text-center">Update Inventory by Outlet</h2>
            <br>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="row mt-3" style="color: cornflowerblue;font-weight: bold;">
                        <div class="col-md-6">
                            <p>Outlets</p>
                        </div>
                        <div class="col-md-6">
                            <p>Quantity</p>
                        </div>
                    </div>
                    <hr>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <form action="/inventory/editinventoryupdate/" method="post">
                        {{ csrf_field() }}
                        <input name="product_code" type="hidden" value="{{$product->code}}">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="outlets" class="form-control" required>
                                        <option disabled selected>-- Select Outlet --</option>
                                        @foreach ($outlets as $o)
                                        <option value="{{$o->id}}">{{$o->name_outlet}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="qty" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center mt-5">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="{{ url ('/inventory')}}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"></i> Back
                    </button>
                </a>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>
</section>
@stop
