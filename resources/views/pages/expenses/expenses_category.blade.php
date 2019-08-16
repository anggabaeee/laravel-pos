@extends('layouts.default-sidebar')
@section('content')
<style>
    .panel {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }

    .panel button {
        background-color: #0079c0;
        border-color: #015d93;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
<div class="col-sm-9 col-sm-offset-10 col-lg-10 col-lg-offset-2 main">
    <div class="container">
        <h1>Expenses Category</h1>
        <form action="" class="mt-2 panel">
            <div class="d-flex">
                <div class="mr-auto bd-highlight">
                    <button class="btn btn-primary" onclick="location.href='/dashboard'" type="button"
                        style="padding: 0px 12px;"><i class="icono-plus"></i>
                        add Expenses Category</button></div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" style="margin-bottom: 0px;">
                            <thead>
                                <tr class="table-active">
                                    <th width="15%">Expense Category Name</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">No matching records found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        </form>
    </div>
</div>

</section>
@stop
