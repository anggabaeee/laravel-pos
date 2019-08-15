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
