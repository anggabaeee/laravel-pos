@extends('layouts.default-sidebar')
@section('content')
<style>
    .btn {
        border-color: #015d93;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container menu">
        <h1>Sales Reports</h1>
        <form action="" class="mt-2 master-form">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input class="form-control" type="date" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input class="form-control" type="date" required>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">&nbsp</label><br>
                        <input type="button" class="btn btn-primary" value="Get Report" id="btnreport">
                    </div>
                </div>
            </div>
            <div id="tableku" style=" display: none;">
                <div class="d-flex">
                    <div class="ml-auto bd-highlight"><input class="btn btn-success" type="button"
                            value="Export To Excel">
                    </div>
                </div>
                <br>
                <div class="d-flex">
                    <div class="mr-auto bd-highlight">
                        <label> Show <select type="text">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                            </select> Enteris </label>
                    </div>
                    <div class="ml-auto bd-highlight">
                        <label>Search: <input type="text" class="" placeholder="" aria-controls="example"> </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="table">
                                    <th>date</th>
                                    <th>sale Id</th>
                                    <th>Type</th>
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
                                <tr style="text-align: center;">
                                    <td colspan="10" class="dataTables_empty">No data available in table</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6" style="float: left; padding-top: 10px;">
                        Showing 0 to 0 of 0 entries </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
document.getElementById("btnreport").addEventListener("click", displaytable);

function displaytable() {
    document.getElementById("tableku").style.display = "block";
}
</script>
</section>
@stop
