@extends('layouts.default-sidebar')
@section('content')
<style>
    h1 {
        color: #5f6468;
    }

    .custom-file-label {
        color: #919598;
        font-family: none;
    }

</style>

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>System Setting</h1>
        <div class="card">
            <div class="card-body">
                @foreach ($site_setting as $s)
                <form action="/setting/system_settingupdate/{{$s->id}}" method="POST" enctype="multipart/form-data">
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
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Site Name <span style="color: #F00">*</span></label>
                                <input type="text" name="site_name" class="form-control" placeholder="Site Name"
                                    autofocus value="{{$s->site_name}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>System Timezone</label>
                                <select class="form-control" name="timezone"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pagination Per Page<span style="color: #F00">*</span></label>
                                <select class="form-control" name="pagination">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tax<span style="color: #F00">*</span></label>
                                <input type="text" name="tax" class="form-control" placeholder="0" maxlength="2"
                                    value="7.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Currency<span style="color: #F00">*</span></label>
                                <select class="form-control" name="currency">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>System Date Format<span style="color: #F00">*</span></label>
                                <select class="form-control" name="date_format">
                                    <option value="Y-m-d">yyyy-mm-dd</option>
                                    <option value="Y.m.d">yyyy.mm.dd</option>
                                    <option value="Y/m/d">yyyy/mm/dd</option>
                                    <option value="m-d-Y">mm-dd-yyyy</option>
                                    <option value="m.d.Y">mm.dd.yyyy </option>
                                    <option value="d-m-Y">dd-mm-yyyy</option>
                                    <option value="d.m.Y">dd.mm.yyyy</option>
                                    <option value="d/m/Y">dd/mm/yyyy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>POS Display Product<span style="color: #F00">*</span></label>
                                <select class="form-control" name="display_product">
                                    <option value="1">Name</option>
                                    <option value="2">Photo</option>
                                    <option value="3">Both</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>POS Display Keyboard<span style="color: #F00">*</span></label>
                                <select class="form-control" name="display_keyboard">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>POS Default Customer<span style="color: #F00">*</span></label>
                                <select class="form-control" name="default_customer">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Logo <span style="color: #F00">*</span></label>
                                <br>
                                <div class="custom-file">
                                    <input type="file" name="site_logo" class="custom-file-input" id="CustomFile">
                                    <label class="custom-file-label" for="CustomFile">choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img height="100px" src="{{ url('/site_image/'.$s->site_logo) }}"></a>
                        </div>
                    </div>
                    @endforeach
                    <div class="row" style="margin-top:15px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="btn btn-primary" value="Update System Setting" type="submit">
                            </div>
                        </div>
                    </div>
            </div>
            </form>
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
