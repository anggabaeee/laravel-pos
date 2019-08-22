@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Gift Card</h1>
        <div class="card">
            <div class="card-body">
                <div class="row" style="margin-top: 15px">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="exampel" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Gift Card Number</th>
                                        <th scope="col">Value (SGD)</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
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
                                        <td><a href="#" onclick="return confirm('Are you confirm to delete this Gift Card?')"><i class="fa fa-times-circle fa-2x" style="color: #F00"></i></a></td>
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
                        <td>{!!$p->value!!}</td>
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
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#exampel').DataTable();
    });

</script>
@stop
</section>
