@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Edit Outlet : </h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <form action="#">
                            <input hidden="text" name="id" value="id">
                            <input type="submit" class="btn btn-danger" value="Delete Outlet">
                        </form>
                    </div>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Outlet Name <span style="color: #F00">*</span></label>
                                <input type="text" name="outlet_name" class="form-control" maxlength="499" autofocus
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Number <span style="color: #F00">*</span></label>
                                <input type="text" name="contact_number" class="form-control" maxlength="30" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address <span style="color: #F00">*</span></label>
                                <textarea name="address" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Receipt Footer <span style="color: #F00">*</span></label>
                                <textarea name="receipt_footer" class="ckeditor" id="ckedtor" cols="60"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <input type="submit" class="btn btn-primary" style="width: 100%" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-2">
                <a href="{{ url ('setting/outlets')}}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.12.1/basic/ckeditor.js"></script>
</section>
@stop
