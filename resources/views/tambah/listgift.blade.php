@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Gift Card</h1>
        <form action="" class="mt-2 master-form option" id="credit">
            <div class="row" style="margin-top:20px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Show</label>
                        <select name="example_length" aria-controls="example" class="">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                        <label for="">entries</label>
                    </div>
                </div>
                <div class="ml-auto mr-3 form-group">
                    <label class="ml-auto" for="">Search : </label>
                    <input class="" type="text">
                </div>
            </div>
            <table class="table table-sm mt-3">
                <thead>
                    <tr>
                        <th scope="col">Gift Card Number</th>
                        <th scope="col">Value (SGD)</th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                @if(count($giftcard) > 0)
                <tbody>
                    @foreach ($giftcard as $p)
                    <tr>
                        <td>{{$p->cardnumber}}</td>
                        <td>{{$p->value}}</td>
                        <td>{{$p->expiry}}</td>
                        <td>{{$p->status}}</td>
                    </tr>
                    @endforeach
                <tbody>
                    @else
                <tbody>
                    <tr>
                        <td valign="top" colspan="5" class="text-center dataTables_empty">No data available in table
                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
            <div class="row">
                <div class="col-sm">
                    Showing 0 to 0 of 0 entries
                </div>
                <div class="col-sm d-flex">
                    <p class="ml-auto"> <button type="button" class="btn btn-light">
                            < Previous</button> <button type="button" class="btn btn-light">Next >
                        </button>
                    </p>
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
