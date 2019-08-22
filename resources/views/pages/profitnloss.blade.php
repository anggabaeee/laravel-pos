@extends('layouts.default-sidebar')
@section('content')
<style>
    #chart {
        min-width: 290px;
        max-width: 1000px;
        height: 400px;
        margin: 0 auto
    }
</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Profit & Loss</h1>
        <div class="card">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div id="chart"></div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px; margin-left: 2px">
                <div class="col-md-12" style="font-size: 15px">
                    <b>Profit & Loss</b> = Selling Price - Cost - tax
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>

<script>
    Highcharts.chart('chart', {

        title: {
            text: 'Monthly Profit & Loss by Outlets'
        },

        // subtitle: {
        //     text: 'Source: thesolarfoundation.com'
        // },
        yAxis: {
            title: {
                text: 'Profit Amount (SGD)'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },

        series: [{
            name: 'Uniqlo - Buggis Outlet',
            data: [500, 1000, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Uniqlo Changi Outlet',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Uniqlo - Nex Outlet',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

</script>
</section>
@stop
