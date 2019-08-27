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
        <h1>Supplier</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="margin-left: 0px">
                    <a href="/setting/suppliersadd"><button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"> </i> Add New Supplier</button></a>
                </div>
                <div class="row" style="margin-left: 0px; margin-top: 15px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="20%">Name</th>
                                    <th width="15%">Email</th>
                                    <th width="10%">Telephone</th>
                                    <th width="15%">Fax</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($supplier as $p)
                                <tr>
                                    <td>{{ $p->supplier_name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->telephone }}</td>
                                    <td>{{ $p->fax }}</td>
                                    <td tyle="font-weight: bold;"><span style="color:#090;">Active</span></td>
                                    <td><a href="editsupplier" style="margin-left: 5px;"><button
                                                class="btn btn-primary">Edit</button></a></td>
                                </tr>
                                @endforeach
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
