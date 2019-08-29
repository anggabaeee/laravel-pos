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
                            <input type="submit" class="btn btn-danger" value="Delete User">
                        </form>
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
                @foreach($users as $users)
                <form action="/setting/edituserupdate/{{$users->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name <span style="color: #f00">*</span></label>
                                <input type="text" name="name" class="form-control" maxlength="499"
                                    value="{{$users->fullname}}" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span style="color: #F00">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{$users->email}}"
                                    maxlength="254" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role <span style="color: #F00">*</span></label>
                                <select name="role_id" class="form-control">
                                    @foreach($role as $r)
                                    <option value="{{$r->id}}" 
                                        @if ($r->id === $users->role_id)
                                        selected
                                        @endif>
                                        {{$r->role_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Outlets<span style="color: #F00">*</span></label>
                                <select name="outlet_id" class="form-control">
                                    @foreach($outlets as $o)
                                    <option value="{{$o->id}}" @if ($o -> id === $users -> outlet_id)
                                        selected
                                        @endif>
                                        {{$o->name_outlet}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status <span style="color: #F00">*</span></label>
                                <select name="status" class="form-control">
                                    @if($users->status===1)
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    @else
                                    <option selected value="0">Inactive</option>
                                    <option value="1">Active</option>
                                    @endif
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
                @endforeach
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
