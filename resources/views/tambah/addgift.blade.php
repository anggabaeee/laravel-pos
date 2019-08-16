@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Add Gift Card</h1>
        <form action="" class="mt-2 master-form option" id="credit">
            <div class="row">
                <div class="col">
                    <h2>Please fill in the information below</h2>
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Gift Card Number</label>
                        <div class="input-group">
                            <br>
                            <input class="cc-number form-control" id="btn-input" name="gift_card_numb" required
                                autocomplete="off">
                            <div class=" input-group-append">
                                <span class="" id="basic-addon2">
                                    <button id="btn-todo" class="btn btn-primary" id="btn-todo">
                                        <i class="fa fa-cog"></i>&nbsp;&nbsp;Generate
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Value (SGD)</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Expiry Date</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary form-submit" style="width: 100%;">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function generateCardNo(x) {
        if (!x) {
            x = 16;
        }
        chars = "1234567890";
        no = "";
        for (var i = 0; i < x; i++) {
            var rnum = Math.floor(Math.random() * chars.length);
            no += chars.substring(rnum, rnum + 1);
        }
        return no;
    }
    $(document).ready(function () {
        $('#btn-input').inputmask("9999 9999 9999 9999");
        $('#btn-todo').click(function () {
            var numb = generateCardNo();
            document.getElementById("btn-input").value = numb;
            return false;
        });
    });

</script>
@stop
