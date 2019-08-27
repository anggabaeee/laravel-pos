@extends('layouts.default-sidebar')
@section('content')
<style>
    h1 {
        color: #5f6468;
    }

    .table th {
        background-color: #f7f7f8;
    }

</style>

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Users</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="margin-left: 0px">
                    <a href="{{ url('/setting/users/adduser')}}"><button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"> </i> Add New User</button></a>
                </div>
                <div class="row" style="margin-left: 0px; margin-top: 15px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="15%">Full Name</th>
                                    <th width="15%">Email</th>
                                    <th width="10%">Role</th>
                                    <th width="15%">Outlet</th>
                                    <th width="10%">Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($users as $u)
                                <tr>
                                    <td>{{$u->fullname}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->role_name}}</td>
                                    <td>{{$u->name_outlet}}</td>
                                    @if($u->status==1)
                                    <td style="font-weight: bold;"><span style="color:#090;">Active</span></td>
                                    @else
                                    <td style="font-weight: bold;"><span style="color:#090;">Inactive</span></td>
                                    @endif
                                    <td>
                                        <a href="ChangePassword" style="padding: 5px, 5px;"><button
                                                class="btn btn-primary">Change Password</button></a>
                                        <a href="edituser" style="margin-left: 5px;"><button
                                                class="btn btn-primary">Edit</button></a>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div></div>
                <div class="row">
                    <div class="col-md-6" style="float: left; padding-top: 10px;">
                        Showing 1 to 1 of 1 entries
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@stop
