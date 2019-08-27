@extends('layouts.default-sidebar')
@section('content')
<style>
    label {
        font-weight: 700;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Return Order Report</h1>
        <div class="card">
            <div class="card-body">
                <form action="/addrole">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="role_name" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <br>
                                <input type="submit" class="btn btn-primary" value="Add Role" style="margin-top: 8px;">
                            </div>
                        </div>
                    </div>
                </form>
                <div id="display">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="exampel" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <td>Id</td>
                                            <td>Role Name</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($role as $r)
                                        <tr>
                                            <td>{{$r->id}}</td>
                                            <td>{{$r->role_name}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#exampel').DataTable();
    });

</script>
@stop
</section>
