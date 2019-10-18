@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Customer</h1>
        <form action="/customer" method="get" class="mt-2 master-form">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="d-flex">
                <div class="mr-auto bd-highlight">
                    <a href="{{ url('/customer/addCustomer') }}">
                        <input class="btn btn-primary" type="button" value="Add Customer">
                    </a>
                </div>
                <div class="ml-auto bd-highlight">
                    <input class="btn btn-success" type="button" value="Export">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Mobile</label>
                        <input class="form-control" type="text" name="mobile">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">&nbsp</label><br>
                        <input type="submit" value="Search" class="btn btn-primary" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover" id="exampel">
                    <thead>
                        <tr>
                            <th scope="col">Customer Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @if(count($customer) > 0)
                    <tbody>
                        @foreach ($customer as $p)
                        <tr>
                            <td>{{$p->fullname}}</td>
                            <td>{{$p->email}}</td>
                            <td>{{$p->mobile}}</td>
                            <td><a href="/customer/editcustomer/{{$p->id}}">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </a>
                                |
                                <a href="">
                                    <button type="button" class="btn btn-primary">Sales History</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                    <tbody>
                        <tr style="text-align: center;">
                            <td colspan="10">No data available in table</td>
                        </tr>
                    </tbody>
                    </tbody>
                    @endif
                </table>
            </div>
        </form>
    </div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#exampel').DataTable({
            "searching": false
        });
    });

</script>
@stop
