@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Edit Payment Method : </h1>
        <div class="card">
            <div class="card-body">
            <form action="">
            <div class="row" style="text-align: right;">
            <div class="col-md-12">
            <input type="hidden" name="id" value="id">
            <input type="submit" class="btn btn-danger" value="Delete Payment Method">
            </div>
            </div>
            </form>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Method Name <span style="color: #F00">*</span></label>
                                <input type="text" name="name" class="form-control" required autofocus autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status<span style="color: #F00">*</span></label>
                               <select name="status" class="form-control">
                               <option value="1">Active</option>
                               <option value="0">Inactive</option>
                               </select>
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
                <a href="{{ url('/setting/payment_method')}}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"></i>
                        Back</button></a>
            </div>
        </div>
    </div>
</div>
</section>
@stop