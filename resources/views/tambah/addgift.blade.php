@extends('layouts.default-sidebar')
@section('content')
<section>
    <div class="col-sm-9 col-lg-10">
        <div class="container">
            <h1>Add Gift Card</h1>
            <form action="" class="mt-2 master-form">
                <div class="row">
                    <div class="col">
                        <h2>Please fill in the information below</h2>
                    </div>
                </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Gift Card Number</label>
                            <div class="input-group">
                                <br>
                                <input class="form-control">
                                <div class="input-group-append">
                                    <span class="" id="basic-addon2">
                                        <button type="button" class="btn btn-primary" id="btn-todo"><i class="fa fa-cog"
                                                aria-hidden="true"></i>&nbsp;&nbsp;Generate</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Value (SGD)</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Expiry Date</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <button class="btn btn-primary form-submit" style="width: 100%;">Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@stop
