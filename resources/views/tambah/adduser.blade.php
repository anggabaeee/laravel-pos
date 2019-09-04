@extends('layouts.default-sidebar')
@section('content')

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Add New User</h1>
        <div class="card">
            <div class="card-body">
                <form action="/postuser">
                {{ csrf_field() }}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <input type="text" name="status" value="1" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name <span style="color: #f00">*</span></label>
                                <input type="text" name="name" class="form-control" maxlength="499" required autofocus autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span style="color: #F00">*</span></label>
                                <input type="email" name="email" class="form-control" maxlength="254" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password <span style="color: #F00">*</span></label>
                                <input type="password" name="password" class="form-control" maxlength="499" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password Confirmation <span style="color: #F00">*</span></label>
                                <input type="password" name="confirmation" class="form-control" maxlength="100"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role <span style="color: #F00">*</span></label>
                                <select name="role" class="form-control" id="role" onchange="hiddenoutlet()">
                                    <option disabled selected value> -- select an option -- </option>
                                    @foreach($role as $r)
                                    <option value="{{$r->id}}">{{$r->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="outlets">
                            <div class="form-group">
                                <label>Outlets <span style="color: #F00">*</span></label>
                                <select name="outlets" class="form-control" id="idoutlets" required>
                                    <option disabled selected value> -- select an option -- </option>
                                    @foreach($outlets as $o)
                                    <option value="{{$o->id}}">{{$o->name_outlet}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" style="width: 90%" value="Add">
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
<script>
function hiddenoutlet(){
    $roleid = document.getElementById('role').value;
    if($roleid == "3"){
        document.getElementById('outlets').style.display = "none";
        document.getElementById('idoutlets').required = false;
    }
    else{
        document.getElementById('outlets').style.display = "block";   
    }
}
</script>
</section>
@stop
