@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        <h1>Inventory</h1>
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
            <div class="row mt-2">
                <div class="col-md-3">
                    outlet 1
                </div>
                <div class="col-md-9">
                    1
                </div>
            </div>
        </div>
        <div class="mt-2 master-form mt-5">
            <h2 class="text-center">Update Inventory by Outlet</h2>
            <br>
            <div class="row">
                <div class="col-md-2">s
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
                    <div class="row mt-2">
                        <div class="col-md-6">
                            outlet 1
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="0">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
    </section>
    @stop
