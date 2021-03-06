@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Edit Outlet : {{$outlets -> name_outlet}} </h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <a href="/setting/editoutletdelete/{{$outlets->id}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </div>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <form action="/setting/editoutletupdate/{{$outlets->id}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Outlet Name <span style="color: #F00">*</span></label>
                                <input type="text" name="name_outlet" class="form-control" maxlength="499" autofocus
                                    required value="{{$outlets-> name_outlet}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Number <span style="color: #F00">*</span></label>
                                <input type="text" name="contact_number" class="form-control" maxlength="30" required
                                    value="{{$outlets-> contact_number}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address <span style="color: #F00">*</span></label>
                                <textarea name="address_outlet" class="form-control" rows="5"
                                    required>{{$outlets-> address_outlet}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Receipt Footer <span style="color: #F00">*</span></label>
                                <textarea name="receipt_footer" class="ckeditor" id="ckedtor"
                                    cols="60">{{$outlets-> receipt_footer}}</textarea>
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
