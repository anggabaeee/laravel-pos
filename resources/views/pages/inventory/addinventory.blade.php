@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @foreach ($product as $product)
        <h1>Inventory for Product Code : {{$product -> code}}</h1>
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
            @foreach ($outlets as $p)
            <div class="row mt-2">
                <div class="col-md-3">
                    {{$p->name_outlet}}
                </div>
                <div class="col-md-9">
                    0
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
                    <form action="/inventory/addinventoryupdate" method="post">
                        {{ csrf_field() }}
                        <input name="product_code" type="text" value="{{$product->code}}">
                        @foreach ($outlets as $o)
                        <div class="row mt-2">
                            <div class="col-md-6">
                                {{$o->name_outlet}}
                                <input name="outlet_id[]" type="text" value="{{$o->id}}">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="qty[]" type="text" value="0">
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        <div class="text-center mt-5">
                            <input type="submit" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </section>
    @stop
