<section class="navigasi">
    <nav class="navbar navbar-expand-lg navbar-custom bg-custom fixed-top">
        <a class="navbar-brand" href="/dashboard">POS - Multi Outlets</a>
        <ul class="navbar-nav  ml-auto ">
            <li class="nav-item dropdown mx-1">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="{{ asset('img/english_flag.png') }}" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><img src="{{ asset('img/english_flag.png') }}" alt=""> English</a>
                    <a class="dropdown-item" href="#"><img src="{{ asset('img/spanish_flag.png') }}" alt=""> Spain</a>
                </div>
            </li>
            <li class="nav-item mx-1">
                <button type="button" class="btn btn-success mt-1 py-1" id="myBtn1" data-toggle="modal">Today's
                    Sales</button>
            </li>
            <li class="nav-item mx-1">
                <button type="button" class="btn btn-danger mt-1 py-1" id="myBtn2" data-toggle="modal"
                    data-target="#myModal2">Opened Hold</button>
            </li>
            <li class="nav-item mx-1">
                <i>
                    <a href="/dashboard">
                        <img src="{{ asset('img/home.png') }}">
                    </a>
                </i>
            </li>
            <li class="nav-item dropdown mt-1">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                    {{Session::get('name')}}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/logout">
                        <i class="fa fa-power-off" style="font-size: x-large;"></i>
                        Log Out
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</section>
