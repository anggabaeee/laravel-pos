<link href="{{ asset('css/icono.min.css') }}" rel="stylesheet">

<style>
    .user-menu {
        display: inline-block;
        margin-top: 3px;
        margin-right: 8px;
        float: right;
        list-style: none;
        padding: 0;
    }

    ul,
    ol {
        margin-top: 0;
        margin-bottom: 9px;
    }

    .navbar>.container,
    .navbar>.container-fluid {
        display: -ms-flexbox;
        display: inline-block;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -ms-flex-align: center;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .navbar-expand .navbar-toggler {
        display: inline-block;
    }

    body {
        background-color: #f0f0f0;
    }

    a {
        text-decoration: none;
        color: #005b8a;
        transition: 0.3s;
    }

    a:hover {
        text-decoration: none;
    }

    li a:hover {
        text-decoration: none;
        color: white;
        background-color: #005b8a;
    }

    .menu-sidebar {
        margin-top: 56px;
    }

    .bg-sidebar {
        background-color: white;
    }

    .nav {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
        margin-top: 10px;
    }

    .nav>li {
        position: relative;
        display: block;
    }

    .nav>li>a {
        position: relative;
        display: block;
        padding: 10px 15px;
        font-size: 13px;
    }
    .sidebar {
    display: block;
    background-color: #fff;
    padding: 0;
    display: none;
}
.collapse {
    display: none;
}
    .collapse.in {
    display: block;
}
.sidebar ul.nav ul.children {
    width: auto;
    padding: 0;
    margin: 0;
    background: #f9f9f9;
}

    @media (min-width: 768px) {
        .navbar-expand .navbar-toggler {
    display: none;
}

        .sidebar {
            display: block;
            position: fixed;
            top: 50px;
            bottom: 0;
            left: 0;
            z-index: 1000;
            display: block;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            overflow-y: auto;
            background-color: #fff;
            box-shadow: 1px 0px 10px rgba(0, 0, 0, .05);
        }

        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12 {
            float: right;
        }
    }

</style>

<nav class="navbar navbar-expand fixed-top flex-column flex-md-row bd-navbar" style="background-color: #005b8a;"
    role="navigation">
    <div class="container-fluid">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebar-collapse">
            <span class="fa fa-bars"></span>
        </button>
        <a class="navbar-brand" href="dashboard" style="color: #ffff">POS - Multi Outlets</a>

        <ul class="user-menu">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle mr-3" data-toggle="dropdown"
                    style="color: #ffff; text-decoration: none;">Owner <span class="caret"></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icono-power" style="color: #30a5ff;"></i> Logout</a>
                </div>
            </div>
        </ul>

        <ul class="user-menu">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle mr-4" data-toggle="dropdown"><img
                        src="{{asset('img/english_flag.png')}}" alt=""><span class="caret"></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><img src="{{asset('img/english_flag.png')}}" alt="">
                        English</a>
                    <a href="#" class="dropdown-item"><img src="{{asset('img/spanish_flag.png')}}" alt="">
                        Spanish</a>
                </div>
            </div>
        </ul>
    </div>
</nav>
<section class="menu-sidebar">
    <div id="sidebar-collapse" class=" col-sm-3 col-lg-2 sidebar collapse in">
        <ul class="nav flex-column bg-sidebar">
            <li>
                <a href="dashboard/">Dashboard</a>
            </li>
            <li>
                <a href="">Customer</a>
            </li>
            <li>
                <a class="parent" data-toggle="collapse" href="#subitem-gift">Gift Card</a>
                <ul class="collapse" id="subitem-gift">
                <li><a class="" data-parent="subitem-gift" href="#">Add Gift Card</a></li>
                <li><a class="" data-parent="subitem-gift" href="#">Add Gift Card</a></li>
                </ul>
            </li>
            <li>
                <a href="">Debit</a>
            </li>
            <li>
                <a href="">Sales</a>
            </li>
            <li>
                <a href="">Reports</a>
            </li>
            <li>
                <a href="">Expenses</a>
            </li>
            <li>
                <a href="">Profit & Loss</a>
            </li>
            <li>
                <a href="">POS</a>
            </li>
            <li>
                <a href="">Return Order</a>
            </li>
            <li>
                <a href="">Inventory</a>
            </li>
            <li>
                <a href="">Products</a>
            </li>
            <li>
                <a href="">Purchase Order</a>
            </li>
            <li>
                <a href="">Setting</a>
            </li>
        </ul>
    </div>
