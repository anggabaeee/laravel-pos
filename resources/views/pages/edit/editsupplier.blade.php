@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Edit Supplier : </h1>
        <div class="card">
            <div class="card-body">
            <form action="">
            <div class="row">
            <div class="col-md-12" style="text-align: right;">
            <input type="hidden" name="id" value="id">
            <input type="submit" class="btn btn-danger" value="Delete Supplier">
            </div>
            </div>
            </form>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier Name <span style="color: #F00">*</span></label>
                                <input type="text" name="name" class="form-control" autofocus required maxlength="499" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span style="color: #F00">*</span></label>
                                <input type="email" name="email" class="form-control" required maxlength="100" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone <span style="color: #F00">*</span></label>
                                <input type="text" name="telephone" class="form-control" required maxlength="50" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" name="fax" class="form-control" maxlength="50" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Supplier Addres <span style="color: #F00;">*</span></label>
                                <textarea name="address" class="form-control" rows="4" style="width: 100%"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status <span style="color: #F00">*</span></label>
                                <select name="status" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier Tax</label>
                                <input type="text" name="tax" class="form-control" required maxlength="100" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-primary" style="width: 100%">Add</button>
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
