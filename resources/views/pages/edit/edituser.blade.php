@extends('layouts.default-sidebar')
@section('content')

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Add New User</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <form action="">
                            <input type="hidden" name="id" value="id">
                            <input type="submit" class="btn btn-danger" value="Delete User">
                        </form>
                    </div>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name <span style="color: #f00">*</span></label>
                                <input type="text" name="name" class="form-control" maxlength="499" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span style="color: #F00">*</span></label>
                                <input type="email" name="email" class="form-control" maxlength="254" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role <span style="color: #F00">*</span></label>
                                <select name="role" class="form-control">
                                <option value="1">Sales Person</option>
                                <option value="2">Administrator</option>
                                <option value="3">Manager</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Outlets<span style="color: #F00">*</span></label>
                                <select name="outlets" class="form-control">
                                <option value=""></option>
                                <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status <span style="color: #F00">*</span></label>
                                <select name="status" class="form-control">
                                    <option value="">Active</option>
                                    <option value="">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-primary" style="width: 90%">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="col-md-2">
                <a href="{{ url('/setting/users')}}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left"></i>
                        Back</button></a>
            </div>
        </div>
    </div>
</div>
</section>
@stop
