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

            <div class="row">
                <div class="col-md-12">
                <div class="table-responsive">
                        <table class="table table-hover" style="margin-bottom: 0px;">
                            <thead>
                                <tr class="table-active">
                                    <th >Expense Category Name</th>
                                    <th >Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>b</td>
                                    <td>active</td>
                                    <td><a href="/customer/editcustomer">
                                            <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
                                        </a>
                                        |
                                        <a href="#">
                                            <button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda Yakin ?')">
                                            <i class="fa fa-trash-o"></i> Delete</button>
                                        </a>
                                    </td>

                            <tbody>
                                <tr style="text-align: center;">
                                    <td colspan="10">No data available in table</td>
                                </tr>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
        </form>
    </div>
</div>

</section>
@stop
