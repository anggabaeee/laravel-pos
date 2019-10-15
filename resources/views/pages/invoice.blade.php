<style>
    @media print {
        #bkpos_wrp{
            visibility: hidden;
        }
    }

    body {
        width: 300px;
        margin: 0 auto;
        text-align: center;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
    }

    #wrapper {
        min-width: 250px;
        margin: 0px auto;
    }

    p {
        margin: 5px;
    }

    .table th {
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        padding-top: 4px;
        padding-bottom: 4px;
        font-size: 13px;
    }

    .table td {
        font-size: 13px;
    }

    .totals td {
        font-size: 13px;
    }

    .table {
        margin-top: 10px;
    }

    .totals {
        width: 100%;
        margin: 10px 0;
    }

</style>
<div class="container">
    <div id="wrapper">
        <div id="printdiv" name="printdiv">
            <div class="row"><img src="{{asset('img/logo.jpg')}}" style="width: 60px;"></div>
            <div class="row" style="margin-top: 10px"><strong style="font-size: 24px">{{$outlets->name_outlet}}</strong>
            </div>
            <div class="row" style="text-align: left;">
                <p>Address : {{$outlets->address_outlet}}</p>
                <p>Telephone : {{$outlets->contact_number}}</p>
                <p>Sale ID : {{$orders->id}}</p>
                <p>Date : {{$orders->ordered_datetime}}</p>
                <p>Customer Name : {{$orders->customer_name}}</p>
                <p>Mobile : {{$customer->mobile}}</p>
            </div>
            <div class="row">
                <table class="table" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th width="10%"><em>#</em></th>
                            <th width="35%" align="left">Products</th>
                            <th width="10%">Qty</th>
                            <th width="25%">Per Item</th>
                            <th width="20%" align="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $n=1 @endphp
                        @foreach($items as $i)
                        <tr>
                            <td style="text-align:center; width:30px;">{{$n++}}</td>
                            <td style="text-align:left; width:130px;">{{$i->product_name}} <br> [{{$i->product_code}}]
                            </td>
                            <td style="text-align:center; width:50px;">{{$i->qty}}</td>
                            <td style="text-align:center; width:50px;">{{$i->price}}</td>
                            <td style="text-align:right; width:70px;">{{$i->total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <table class="totals" cellspacing="0" border="0"
                    style="margin-bottom:5px; border-top: 1px solid #000; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td style="text-align:left; padding-top: 5px;">Total Items</td>
                            <td
                                style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-weight:bold;">
                                {{$orders->total_items}}</td>
                            <td style="text-align:left; padding-left:1.5%;">Total</td>
                            @foreach($total as $total)
                            <td style="text-align:right;font-weight:bold;">{{$total->totalall}}</td>
                            @endforeach
                        </tr>
                        @if($orders->discount_total == 0)
                        <tr></tr>
                        @else
                        <tr>
                            <td style="text-align:left; padding-top: 5px;">&nbsp;</td>
                            <td
                                style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-weight:bold;">
                                &nbsp;</td>
                            <td style="text-align:left; padding-left:1.5%;">Discount</td>
                            <td style="text-align:right;font-weight:bold;">-{{$orders->discount_total}}</td>
                        </tr>
                        @endif
                        <tr>
                            <td style="text-align:left; padding-top: 5px;">&nbsp;</td>
                            <td
                                style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-weight:bold;">
                                &nbsp;</td>
                            <td style="text-align:left; padding-left:1.5%;">Sub Total</td>
                            <td style="text-align:right;font-weight:bold;">{{$orders->subtotal}}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left; padding-top: 5px;">&nbsp;</td>
                            <td
                                style="text-align:right; padding-right:1.5%; border-right: 1px solid #000;font-weight:bold;">
                                &nbsp;</td>
                            <td style="text-align:left; padding-left:1.5%;">Tax</td>
                            <td style="text-align:right;font-weight:bold;">{{$orders->tax}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"
                                style="text-align:left; font-weight:bold; border-top:1px solid #000; padding-top: 5px; padding-bottom: 5px;">
                                Grand Total</td>
                            <td colspan="2"
                                style="text-align:right; font-weight:bold; border-top:1px solid #000; padding-top: 5px; padding-bottom: 5px;">
                                {{$orders->grandtotal}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"
                                style="text-align:left; font-weight:bold; padding-top: 5px; padding-bottom: 5px;">Paid
                                Amount</td>
                            <td colspan="2"
                                style="text-align:right; font-weight:bold; padding-top: 5px; padding-bottom: 5px;">
                                {{$orders->paid_amt}}
                            </td>
                        </tr>
                        @if(((float)$orders['paid_amt'] - (float)$orders['grandtotal']) < 0)
                        <tr>
                            <td colspan="2"
                                style="text-align:left; font-weight:bold; padding-top: 5px; padding-bottom: 5px;">Unpaid
                                Amount</td>
                            <td colspan="2"
                                style="text-align:right; font-weight:bold; padding-top: 5px; padding-bottom: 5px;">
                                {{ ((float)$orders['paid_amt'] - (float)$orders['grandtotal'])}}
                            </td>
                        </tr>
                        @else
                        <tr></tr>
                        @endif
                        @if($orders->return_change == 0)
                        <tr></tr>
                        @else
                        <tr>
                            <td colspan="2"
                                style="text-align:left; font-weight:bold; padding-top: 5px; padding-bottom: 5px;">Return
                                Change</td>
                            <td colspan="2"
                                style="text-align:right; font-weight:bold; padding-top: 5px; padding-bottom: 5px;">
                                {{$orders->return_change}}
                            </td>
                        </tr>
                        @endif
                        @foreach($order_payments as $op)
                        <tr>
                            <td colspan="3"
                                style="text-align:left; border-top: 1px solid #000; padding-top: 5px; padding-bottom: 5px;">
                                <b>Paid By :</b> {{$op->name}} [{{$op->date}}]
                            </td>
                            <td
                                style="text-align:right; border-top: 1px solid #000; padding-top: 5px; padding-bottom: 5px;">
                                {{$op->payment_amount}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row print6" style="border-top:1px solid #000; padding-top:0px;">
                {!!$outlets->receipt_footer!!}
            </div>
        </div>
        <div class="row">
            <a href="/posadd/{{$orders->outlet_id}}" id="bkpos_wrp"
                style="width:100%; display:block; font-size:13px; text-decoration: none; text-align:center; color:#FFF; background-color:#005b8a; border:0px solid #007FFF; padding: 10px 1px; margin: 5px auto 10px auto; font-weight:bold;">Back
                to Point of Sales</a>
        </div>
        <div class="row">
            <a href="/view_invoice/{{$orders->id}}" id="bkpos_wrp"
                style="width:100%; display:block; font-size:13px; text-decoration: none; text-align:center; color:#000; background-color:#FFA93C; border:0px solid #FFA93C; padding: 10px 1px; margin: 5px auto 10px auto; font-weight:bold;">Print
                Small Receipt
            </a>
        </div>
        <div class="row">
            <a href="#" id="bkpos_wrp" class="bkpos_wrp"
                style="width:100%; display:block; font-size:13px; text-decoration: none; text-align:center; color:#000; background-color:#4FA950; border:0px solid #4FA950; padding: 10px 1px; margin: 5px auto 10px auto; font-weight:bold;">Email
            </a>
        </div>
        <div class="row">
            <a href="/view_invoice_a4/{{$orders->id}}" id="bkpos_wrp" class="bkpos_wrp"
                style="width:100%; display:block; font-size:13px; text-decoration: none; text-align:center; color:#000; background-color:#4FA950; border:0px solid #4FA950; padding: 10px 1px; margin: 5px auto 10px auto; font-weight:bold;">Print
                A4
            </a>
        </div>
    </div>
</div>
<script>
    window.onload = window.print();
</script>
