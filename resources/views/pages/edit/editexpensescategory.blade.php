@extends('layouts.default-sidebar')
@section('content')
<style>
    .panel {
        background-color: white;
        padding: 15px;
        border-radius: 10px;
    }

    .panel button {
        background-color: #0079c0;
        border-color: #015d93;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
<div class="col-sm-9 col-sm-offset-10 col-lg-10 col-lg-offset-2 main">
    <div class="container mt-3">
        <h1>Edit Expenses Category : {{$expensescategory->name}}</h1>
        <form method="post"  action="/expenses/editexpensescategory/update/{{$expensescategory->id}}" class="mt-2 panel">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <button type="button" class="close" data-dismiss="alert">×</button>
                <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Expense Category Name
                            <span style="color: #F00">*</span>
                        </label>
                        <input name="name" class="form-control" type="text" required autocomplete="off"
                            value="{{$expensescategory->name}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Status
                            <span style="color: #F00">*</span>
                        </label>
                        <select name="status" class="form-control" type="text" required>
                            @if ($expensescategory->status === 1)
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                            @else
                            <option value="1">Active</option>
                            <option selected value="0">Inactive</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 ">
                    <div class="form-group">
                        <input class="btn btn-primary" style="width: 100%;" type="submit" value="Add">
                    </div>
                </div>
            </div>
        </form>
        <div class="col-md-2">
            <div class="form-group">
                <a href="/expensescategory" style="text-decoration: none;">
                    <div class="btn " style="background-color: #999; color: #FFF;">
                        <i class="icono-caretLeft" style="color: #FFF;"></i>Back </div>
                </a>
            </div>
        </div>
    </div>
</div>
</section>
@stop
