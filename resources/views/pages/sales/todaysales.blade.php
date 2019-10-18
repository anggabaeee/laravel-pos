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
        <h1>Today's Sales</h1>
        <form action="" class="mt-2 panel">
            <div class="d-flex">
                <div class="ml-auto bd-highlight"><input class="btn btn-success" type="button" value="Export To Excel">
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="exampel">
                            <thead>
                                <tr class="table">
                                    <th>date</th>
                                    <th>sale Id</th>
                                    <th>outlets</th>
                                    <th>Customer</th>
                                    <th>Item</th>
                                    <th>Sub Totals</th>
                                    <th>Tax</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$sales)
                                <tr style="text-align: center;">
                                    <td colspan="10" class="dataTables_empty">No data available in table</td>
                                </tr>
                                @else
                                @foreach($sales as $s)
                                <tr>
                                    <td>{{$s->date}}</td>
                                    <td>{{$s->id}}</td>
                                    <td>{{$s->outlet_id}}</td>
                                    <td>{{$s->payment_method_name}}</td>
                                    <td>{{$s->customer_name}}</td>
                                    <td>{{$s->subtotal}}</td>
                                    <td>{{$s->tax}}</td>
                                    <td>{{$s->grandtotal}}</td>
                                    <td><a href=""><i class="fa fa-th-list fa-2x"></i></a>
                                        <a href=""><i class="fa fa-times-circle fa-2x" style="color: #F00"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
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

</section>@stop
