@extends('layouts.default-sidebar')
@section('content')
<style>
#cheqNum{
    display: none;
}

#cardNum{
    display: none;
}
</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Make Payment for Sale Id : </h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <button class="btn btn-success">Print</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="row">
                            <h2 style="color: #5f6468; font-weight: 400; margin-bottom: 20px;">Uniqlo - Bugis Outlet
                            </h2>
                        </div>
                        <div class="row" style="margin-top: 7px">Address : #02-10, B2, Bugis Shopping Mall</div>
                        <div class="row" style="margin-top: 7px">Telephone : 292948484</div>
                        <div class="row" style="margin-top: 7px">Ordered Date : 23-08-2019 10:26 AM</div>
                        <div class="row" style="margin-top: 7px">Customers : A</div>
                        <div class="row" style="margin-top: 20px">
                            <table class="table" cellspacing="0" border="0" style="margin-bottom: 0px; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="background-color: #e6e7e8;"><em>#</em></th>
                                        <th style="background-color: #e6e7e8;">Products</th>
                                        <th style="background-color: #e6e7e8;">Quantity</th>
                                        <th style="background-color: #e6e7e8;">Per Item Price</th>
                                        <th style="background-color: #e6e7e8;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="totals" cellspacing="0" border="0"
                                style="margin-bottom:5px; border-top: 1px solid #000; border-collapse: collapse; width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="text-align:left; padding-top: 5px;">Total Items</td>
                                        <td
                                            style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-weight:bold;">
                                            #</td>
                                        <td style="text-align:left; padding-left:1.5%;">Total</td>
                                        <td style="text-align:right;font-weight:bold;">#</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left; padding-top: 5px;"></td>
                                        <td
                                            style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-weight:bold;">
                                        </td>
                                        <td style="text-align:left; padding-left:1.5%;">Sub Total</td>
                                        <td style="text-align:right;font-weight:bold;">#</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left; padding-top: 5px;"></td>
                                        <td
                                            style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-weight:bold;">
                                        </td>
                                        <td style="text-align:left; padding-left:1.5%;">Tax</td>
                                        <td style="text-align:right;font-weight:bold;">#</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"
                                            style="text-align:left; font-weight:bold; border-top:1px solid #000; padding-top:5px;">
                                            Grand Total </td>
                                        <td colspan="2"
                                            style="border-top:1px solid #000; padding-top:5px; text-align:right; font-weight:bold;">
                                            #</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">Paid
                                            Amount</td>
                                        <td colspan="2" style="text-align:right; font-weight:bold; padding-top:5px;">#
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">
                                            Unaid Amount</td>
                                        <td colspan="2" style="text-align:right; font-weight:bold; padding-top:5px;">#
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"
                                            style="text-align:left; font-weight:bold; padding-top:5px; border-top: 1px solid #000;">
                                            Paid By</td>
                                        <td
                                            style="text-align:right; font-weight:bold; padding-top:5px; border-top: 1px solid #000;">
                                            Debit []</td>
                                        <td
                                            style="padding-top:5px; text-align:right; font-weight:bold; border-top: 1px solid #000;">
                                            #</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"
                                            style="text-align:left; font-weight:bold; padding-top:5px; border-top: 1px solid #000;">
                                            Paid By</td>
                                        <td
                                            style="text-align:right; font-weight:bold; padding-top:5px; border-top: 1px solid #000;">
                                            Cash []</td>
                                        <td
                                            style="padding-top:5px; text-align:right; font-weight:bold; border-top: 1px solid #000;">
                                            #</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form action="">
                            <div class="row" style="margin-top: 15px">
                                <div class="col-md-6" style="text-align: right;">
                                    <b style="color">Payment Methods</b>
                                </div>
                                <div class="col-md-6">
                                    <select name="paymentmethod" class="form-control"
                                        style="border: 1px solid; color: #010101" onchange="chkmethod(this.value)">
                                        <option disabled selected value>-- Select Payment Method --</option>
                                        <option value="1">Cheque</option>
                                        <option value="2">Master Card</option>
                                        <option value="3">Visa</option>
                                        <option value="4">Cash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="cheqNum" style="margin-top: 10px">
                                <div class="col-md-6" style="text-align: right;">
                                    <b>Cheque Number :</b>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <input type="text" id="cheque" name="cheque" class="form-control" placeholder="Cheque Number"
                                        style="border: 1px solid; color: #010101" required>
                                </div>
                            </div>
                            <div class="row" id="cardNum" style="margin-top: 10px">
                                <div class="col-md-6" style="text-align: right;">
                                    <b>Card Number :</b>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <input type="text" id="cardnumber" name="card" class="form-control" placeholder="Card Number"
                                        style="border: 1px solid; color: #010101" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-md-6" style="text-align: right;">
                                    <b>Payment Amount :</b>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <input type="text" name="amount" class="form-control" placeholder="0.00"
                                        style="border: 1px solid; color: #010101" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="Submit Payment">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-md-2">
                <a href="/debit"><button class="btn btn-secondary" style="width: 80%"><i class="fa fa-chevron-left">
                            Back</i></button></a>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>

<script>
    function chkmethod(val) {
        if (val=="1") {
            document.getElementById("cheqNum").style.display = "flex";
           
            document.getElementById("cardNum").style.display = "none";
            document.getElementById("cardnumber").required = false;
        }
        else if ((val=="2") || (val=="3")) {
        document.getElementById("cardNum").style.display = "flex";

        document.getElementById("cheqNum").style.display = "none";
        document.getElementById("cheque").required = false;
    }
    else {
        document.getElementById("cardNum").style.display = "none";
        document.getElementById("cardnumber").required = false;

        document.getElementById("cheqNum").style.display = "none";
        document.getElementById("cheque").required = false;
    }
    }

</script>
</section>
@stop
