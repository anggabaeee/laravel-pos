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
                    <a href="#">
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
                    <a href="#">
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
                    <a href="#">
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
                    <a href="#">
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
                    <a href="#">
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
    </div>
</div>
</section>
@stop
