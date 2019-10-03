<section class="navigasi">
    <nav class="navbar navbar-expand-lg navbar-custom bg-custom fixed-top">
        @php($site_setting = App\site_setting::all())
            @foreach ($site_setting as $s)
            <a class="navbar-brand" href="/dashboard">{{$s->site_name}}</a>
            @endforeach
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebar-collapse"
            aria-expanded="false">
            <span class="fa fa-bars"></span>
        </button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('img/english_flag.png') }}" alt="">
                </a>
                <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><img src="{{ asset('img/english_flag.png') }}" alt=""> English</a>
                    <a class="dropdown-item" href="#"><img src="{{ asset('img/spanish_flag.png') }}" alt=""> Spain</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{Session::get('name')}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/logout">
                        <i class="fa fa-power-off" aria-hidden="true" style="font-size: x-large;"></i>
                        &nbsp;Log Out
                    </a>
                </div>
            </li>
        </ul>
        </div>
    </nav>
</section>
