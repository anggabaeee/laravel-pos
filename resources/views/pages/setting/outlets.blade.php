@extends('layouts.default-sidebar')
@section('content')
<style>
    .table th {
        background-color: #f7f7f8;
    }

</style>

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Outlets</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="margin-left: 0px">
                    <a href="{{ url('/setting/outlets/addoutlet') }}"><button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"> </i> Add New Outlet</button></a>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="row" style="margin-left: 0px; margin-top: 15px;">
                    <div class="table-responsive">
                        <table class="table" id="exampel">
                            <thead>
                                <tr>
                                    <th width="28%">Outlet Name</th>
                                    <th width="24%">Address</th>
                                    <th width="24%">Contact Number</th>
                                    <th width="12%">Status</th>
                                    <th width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($outlets as $p)
                                <tr>
                                    <td>{{$p->name_outlet}}</td>
                                    <td>{{$p->address_outlet}}</td>
                                    <td>{{$p->contact_number}}</td>
                                    @if ($p->status == 0)
                                    <td style="font-weight: bold;"><span style="color:#090;">Inactive</span></td>
                                    @else
                                    <td style="font-weight: bold;"><span style="color:#090;">Active</span></td>
                                    @endif
                                    <td><a href="/setting/editoutlet/{{$p->id}}" style="margin-left: 5px;"><button
                                                class="btn btn-primary">Edit</button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#exampel').DataTable();
    });

</script>
</section>
@stop
