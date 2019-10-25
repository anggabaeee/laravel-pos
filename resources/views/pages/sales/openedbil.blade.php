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
            <br>
            <div class="d-flex">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="exampel">
                            <thead>
                                <tr class="table">
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>outlets</th>
                                    <th>Ref.Number</th>
                                    <th>Items</th>
                                    <th>Sub Totals</th>
                                    <th>Tax</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($bill == null)
                                <tr style="text-align: center;">
                                    <td colspan="9" class="dataTables_empty">No data available in table</td>
                                </tr>
                                @else
                                @foreach($bill as $b)
                                <tr>
                                    <td>{{$b->date}}</td>
                                    <td>{{$b->customer_name}}</td>
                                    <td>{{$b->name_outlet}}</td>
                                    <td>{{$b->ref_number}}</td>
                                    <td>{{$b->total_items}}</td>
                                    <td>{{$b->subtotal}}</td>
                                    <td>{{$b->tax}}</td>
                                    <td>{{$b->grandtotal}}</td>
                                    <td><a href="/posadd/suspend/{{$b->id}}"><i class="fa fa-th-list fa-2x"></i></a>
                                        <a href="/openedbil/deletebill/{{$b->id}}" onclick="return confirm('Are you confirm to delete this Sale?')"><i class="fa fa-times-circle fa-2x" style="color: #F00"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
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
</section>
@stop
