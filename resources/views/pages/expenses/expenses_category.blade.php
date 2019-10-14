@extends('layouts.default-sidebar')
@section('content')
<style>
    .panel {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }

    .panel button {
        border-color: #015d93;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
<div class="col-sm-9 col-sm-offset-10 col-lg-10 col-lg-offset-2 main">
    <div class="container">
        <h1>Expenses Category</h1>
        <form action="" class="mt-2 panel">
            <div class="d-flex">
                <div class="mr-auto">
                    <button class="btn btn-primary" onclick="location.href='/expensescategory/addexpensescategory'"
                        type="button" style="padding: 0px 12px;"><i class="icono-plus"></i>
                        add Expenses Category</button></div>
            </div>
            <br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover" style="margin-bottom: 0px;" id="exampel">
                            <thead>
                                <tr class="table-active">
                                    <th>Expense Category Name</th>
                                    <th>Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expensescategory as $p)
                                <tr>
                                    <td>{{$p->name}}</td>
                                    @if ($p->status == 0)
                                    <td>Inactive</td>
                                    @else
                                    <td>Active</td>
                                    @endif
                                    <td><a href="/expenses/editexpensescategory/{{$p->id}}">
                                            <button type="button" class="btn btn-primary"><i
                                                    class="fa fa-pencil"></i>Edit</button>
                                        </a>
                                        |
                                        <a href="/expenses/editexpensescategory/delete/{{$p->id}}">
                                            <button type="button" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda Yakin ?')">
                                                <i class="fa fa-trash-o"></i> Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#exampel').DataTable();
    });
</script>
</section>
@stop
