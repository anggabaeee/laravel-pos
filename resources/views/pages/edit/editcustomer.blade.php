@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Edit Customer</h1>
        <form action="/customer/addCustomerstore" method="post"class="mt-2 master-form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input name="fullname" class="form-control" type="text" required autocomplete="off">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input name="email" class="form-control" type="email" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Mobile</label>
                        <input name="mobile" class="form-control" type="text" pattern= "[0-9]+" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="submit" value="Tambah" class="btn btn-primary" style="width: 100%;">
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
