@extends('layouts.default-sidebar')
@section('content')
<style>
    .table th {
        background-color: #f7f7f8;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Product Category</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="border-bottom: 1px solid #e0dede; padding-bottom: 15px;">
                    <div class="col-md-12">
                        <a href="{{ url('/product/ProductCategory/addProductCategory')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Category</a>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="exampel">
                                <thead>
                                    <tr>
                                        <th width="70%">Name</th>
                                        <th width="20%">Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                @if(count($category) > 0)
                                <tbody>
                                    @foreach ($category as $p)
                                    <tr>
                                        <td>{{$p->name}}</td>
                                        @if ($p->status == 0)
                                        <td>Not Active</td>
                                        @else
                                        <td>Active</td>
                                        @endif
                                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                                    </tr>
                                    @endforeach
                                <tbody>
                                    @else
                                <tbody>
                                    <tr>
                                        <td valign="top" colspan="5" class="text-center dataTables_empty">No data
                                            available in table
                                        </td>
                                    </tr>
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#exampel').DataTable();
    });
</script>
@stop