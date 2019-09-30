@extends('layouts.default-sidebar')
@section('content')
<style>
    #display {
        display: none;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        <h1>Sales Reports</h1>
        <div class="mt-2 master-form">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Outlets</label>
                        <select id="outlets" class="form-control" type="text" required>
                            <option value="">Choose Outlets</option>
                            @foreach ($outlets as $p)
                            <option value="{{$p->id}}">{{$p->name_outlet}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="">Paid By</label>
                        <select id="paid" class="form-control" required>
                            <option value="">Choose Paid By</option>
                            <option value="0">All</option>
                            @foreach($payment as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input id="startdate" class="form-control datepicker" type="text">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input id="enddate" class="form-control datepicker" type="text">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">&nbsp</label><br>
                        <input type="submit" class="btn btn-primary" style="width: 100%;" id="btnreport"
                            value="Get Report">
                    </div>
                </div>
            </div>
            <div id="display">
                <div class="d-flex">
                    <div class="ml-auto bd-highlight"><input class="btn btn-success" type="button"
                            value="Export To Excel">
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table" id="exampel">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Sale Id</th>
                                <th>Outlets</th>
                                <th>Payment Method</th>
                                <th>Sub Total(SGD)</th>
                                <th>Tax(SGD)</th>
                                <th>Grand Total(SGD)</th>
                                <th>Print</th>
                            </tr>
                        </thead>
                        <tbody id="reportinfo">

                        </tbody>
                    </table>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script>
        $(function () {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#exampel').DataTable();
            $("#btnreport").click(function () {
                $("#display").css({
                    "display": "block"
                });
                var outlets = $('#outlets').val();
                var paid = $('#paid').val();
                var start = $('#startdate').val();
                var end = $('#enddate').val();
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/reportsale',
                    type: 'get',
                    data: {
                        outlets: outlets,
                        paid: paid,
                        start: start,
                        end: end
                    },
                    success: function (data) {
                        $('#reportinfo'). empty().html(data);
                        // $.each(data, function(i, value){

                        // });
                    }
                });
            });
        });

    </script>
    </section>
    @stop
