@extends('layouts.default-sidebar')
@section('content')
<style>
    h1 {
        color: #5f6468;
    }

    .panel {
        margin-bottom: 10px;
    }

    @media (max-width: 767.98px) {
        .panel {
            margin-bottom: 40px;
        }
    }

    /* main */
    .panel-body.easypiechart-panel {
        background-color: white;
        color: #005b8a;
        border: 1px solid;
        border-radius: 10px;
        padding-top: 20px;
        padding-bottom: 30px;
        transition: 0.3s;
    }


    .panel-body.easypiechart-panel:hover {
        background-color: #005b8a;
        color: white;
    }

    .icon-fa {
        font-size: 1.5rem;
    }

    #chart {
        max-width: 1000px;
        height: 400px;
        margin: 0 auto
    }

</style>
<div class="col-sm-9 col-sm-offset-10 col-lg-10 col-lg-offset-2 main">
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row text-center">
            <div class="col-6 col-md-2">
                <div class="panel panel-default">
                    <a href="pos">
                        <div class="panel-body easypiechart-panel">
                            <p>Point of Sales</p>
                            <div class="icon-fa">
                                <i class="fa fa-th"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="panel panel-default">
                    <a href="/todaysales">
                        <div class="panel-body easypiechart-panel">
                            <p>Sales</p>
                            <div class="icon-fa">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="panel panel-default">
                    <a href="/salesreports">
                        <div class="panel-body easypiechart-panel">
                            <p>Reports</p>
                            <div class="icon-fa">
                                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="panel panel-default">
                    <a href="{{ url('/setting/outlets')}}">
                        <div class="panel-body easypiechart-panel">
                            <p>Outlets</p>
                            <div class="icon-fa">
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="panel panel-default">
                    <a href="{{ url('/setting/users') }}">
                        <div class=" panel-body easypiechart-panel">
                            <p>Users</p>
                            <div class="icon-fa">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="panel panel-default">
                    <a href="{{ url('/setting/system_setting') }}">
                        <div class=" panel-body easypiechart-panel">
                            <p>System Setting</p>
                            <div class="icon-fa">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="card" style="margin-top: 10px">
            <div class="row">
                <div class="col-md-12" style="margin-top: 20px">
                    <div id="chart"></div>
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
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Sales by Outlets'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Amount (SGD)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Uniqlo - Bugis Outlet',
            data: [20000, 10000, 1500, 4500, null, null, null, null, null, null, null, null]

        }, {
            name: 'Uniqlo - Changi Outlet',
            data: [35000, 25000, 1500, 4500, null, null, null, null, null, null, null, null]

        }, {
            name: 'Uniqlo - Bugis Outlet',
            data: [20000, 1500, 15000, 45000, null, null, null, null, null, null, null, null]

        }]
    });

</script>

</section>
@stop
