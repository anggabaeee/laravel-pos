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
        <h1>Edit Expenses : </h1>
        <form action="/expenses/updateexpenses/{{$expenses->id}}" method="post" enctype="multipart/form-data" class="mt-2 panel">
        {{ csrf_field() }}
        @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif   
        <div class="row">
                <input type="hidden" name="filename" value="{{$expenses->file_name}}">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Expenses Number
                            <span style="color: #F00">*</span>
                        </label>
                        <input name="number" class="form-control" type="text" required value="{{$expenses->expenses_number}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Outlets
                            <span style="color: #F00">*</span>
                        </label>
                        <select name="outlet_id" class="form-control" type="text" required>
                            @foreach($outlets as $o)
                            <option value="{{$o->id}}" @if ($o->id === $expenses->outlet_id)
                                        selected
                                        @endif> {{$o->name_outlet}}
                            @endforeach 
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Date
                            <span style="color: #F00">*</span>
                        </label>
                        <input name="date" class="form-control" type="date" value="{{$expenses->date}}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Reason
                            <span style="color: #F00">*</span>
                        </label>
                        <textarea name="reason" class="form-control" style="width: 100%; height: 70px;"
                            required>{{$expenses->reason}}</textarea>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Amount (SGD)
                            <span style="color: #F00">*</span>
                        </label>
                        <input name="amount" class="form-control" type="text" value="{{$expenses->amount}}.00" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Expenses Category
                            <span style="color: #F00">*</span>
                        </label>
                        <select name="category" name="category" class="form-control" required>
                            @foreach($category as $c)
                            <option value="{{$c->id}}" @if ($c->id === $expenses->expense_category) selected @endif>
                            {{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">File (Less than 2MB)<span style="color: #F00">*</span><br>
                            <div class="custom-file">
                                <input name="image" type="file" class="custom-file-input" id="CustomFile">
                                <label class="custom-file-label" for="CustomFile">choose file</label>
                            </div>
                        <label style="margin-top: 10px; color: #"><a href="{{ url('/expenses_image/'.$expenses->file_name) }}" download>[Download File]</a></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" style="width: 100%;" value="Update">
                    </div>
                </div>
            </div>
        </form>
        <div class="col-md-2">
            <div class="form-group">
                <a href="/expenses" style="text-decoration: none;">
                    <div class="btn " style="background-color: #999; color: #FFF;">
                        <i class="icono-caretLeft" style="color: #FFF;"></i>Back </div>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</section>
@stop
