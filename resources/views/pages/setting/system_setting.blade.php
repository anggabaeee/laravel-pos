@extends('layouts.default-sidebar')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
    h1 {
        color: #5f6468;
    }

</style>

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>System Setting</h1>
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Site Name <span style="color: #F00">*</span></label>
                                <input type="text" name="site_name" class="form-control" placeholder="Site Name"
                                    autofocus required value="POS Multi - Outlets">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>System Timezone</label>
                                <select class="form-control" name="timezone" required></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pagination Per Page<span style="color: #F00">*</span></label>
                                <select class="form-control" name="pagination" required>
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
                                    required value="7.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Currency<span style="color: #F00">*</span></label>
                                <select class="form-control" name="currency" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>System Date Format<span style="color: #F00">*</span></label>
                                <select class="form-control" name="date_format" required>
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
                                <select class="form-control" name="display_product" required>
                                    <option value="1">Name</option>
                                    <option value="2">Photo</option>
                                    <option value="3">Both</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>POS Display Keyboard<span style="color: #F00">*</span></label>
                                <select class="form-control" name="display_keyboard" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>POS Default Customer<span style="color: #F00">*</span></label>
                                <select class="form-control" name="default_customer" required>
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
                                    <input type="file" class="custom-file-input" id="CustomFile" required>
                                    <label class="custom-file-label" for="CustomFile">choose file</label>
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
