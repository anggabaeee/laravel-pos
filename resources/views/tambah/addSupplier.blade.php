@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Add Supplier</h1>
        <div class="card">
            <div class="card-body">
                <form action="/setting/supllierstore"  method="post">
                 {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier Name <span style="color: #F00">*</span></label>
                                <input type="text" name="supplier_name" class="form-control" autofocus required maxlength="499">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span style="color: #F00">*</span></label>
                                <input type="text" name="email" class="form-control" required maxlength="100">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone <span style="color: #F00">*</span></label>
                                <input type="text" name="telephone" class="form-control" required maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" name="fax" class="form-control" maxlength="50">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Supplier Addres <span style="color: #F00;">*</span></label>
                                <textarea name="supplier_addres" class="form-control" rows="4" style="width: 100%"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Supplier Tax </label>
                                <input type="text" name="supplier_tax" class="form-control" style="width: 100%" required>
                                <input type="text" name="status" style="width: 100%" value="0" readonly hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" style="width: 100%" value="Add">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="col-md-2">
            <a href="{{ url('/setting/suppliers') }}">
                <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"> Back</i></button>
                </a>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>
@stop
</section>
