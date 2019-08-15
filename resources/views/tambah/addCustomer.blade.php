@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Add Customer</h1>
        <form action="" class="mt-2 master-form">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Mobile</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <button class="btn btn-primary" style="width: 100%;">Tambah</button>
                    </div>
                </div>
            </div>
        </form>
        <a href="/customer">
            <button type="button" class="btn btn-secondary" style="margin-top: 20px">
                Back
            </button>
        </a>
    </div>
</div>
</section>
@stop
