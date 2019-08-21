@extends('layouts.default-sidebar')
@section('content')
<style>
    label {
        font-weight: 700;
    }

    .datepicker td,
    .datepicker th {
        font-size: 12px;
    }
    #display{
        display: none;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Return Order Report</h1>
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-gorup">
                                <label>Outlets</label>
                                <select name="outlets" class="form-control" required>
                                    <option value="">Choose Outlet</option>
                                    <option value="-">All Outlets</option>
                                    <option value="1" selected="selected">Uniqlo - NEX Outlet </option>
                                    <option value="2">Uniqlo - Changi Outlet </option>
                                    <option value="3">Uniqlo - Bugis Outlet </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Refund By</label>
                                <select name="paid" class="form-control" required>
                                    <option value="">Choose Paid By</option>
                                    <option value="-">All</option>
                                    <option value="10" selected="selected">ac </option>
                                    <option value="1">Cash </option>
                                    <option value="5">Cheque </option>
                                    <option value="6">Debit </option>
                                    <option value="7">Gift Card </option>
                                    <option value="4">Master Card </option>
                                    <option value="2">Nett </option>
                                    <option value="3">VISA </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="text" name="startdate" class="form-control datepicker"  autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="text" name="enddate" class="form-control datepicker" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <br>
                                <input type="submit" class="btn btn-primary" value="Get Report" onclick="setvisibility('display','inline');"
                                    style="margin-top: 8px;">
                            </div>
                        </div>
                    </div>
                </form>
                <div id="display">
                    <div class="row">
                        <div class="col-md-12" style="text-align: right;">
                            <a href="#" class="btn btn-success">Export to Excel</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="exampel" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <td>Date</td>
                                            <td>Sales Id</td>
                                            <td>Outlets</td>
                                            <td>Refund By</td>
                                            <td>Refund Method</td>
                                            <td>Sub Total (SGD)</td>
                                            <td>Tax (SGD)</td>
                                            <td>Grand Total (SGD)</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $(".datepicker").datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#exampel').DataTable();
    });

</script>
<script>
function setvisibility(id, visibility){
    document.getElementById(id).style.display = visibility;
}
</script>
@stop
</section>
