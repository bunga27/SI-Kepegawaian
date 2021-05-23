<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- Logo container-->
            @if (auth()->user()->level=="karyawan")
            <div class="logo">
                <a href="/home" class="logo"><span><i class="md md-home" ></i>Hasil Utama</span></a>
            </div>
            @endif

            @if (auth()->user()->level=="super" || auth()->user()->level=="admin" || auth()->user()->level=="owner" )
                <div class="logo">
                    <a href="/home" class="logo"><span><i class="md md-location-city"></i> CV. Hasil Utama Konsultan</span></a>
                </div>
            @endif

            <!-- End Logo container-->
            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">

                    <li class="dropdown navbar-c-items">

                        <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown"
                            aria-expanded="true"><img src="{{ asset('menu_2') }}/assets/images/users/user.png"
                                alt="user-img" class="img-circle"> <span>{{ auth()->user()->pegawai->nama }}</span> </a>
                        <ul class="dropdown-menu">
                            @if (auth()->user()->level=="super" || auth()->user()->level=="admin" || auth()->user()->level=="owner" )
                            <li>
                                <a href="/profil ">
                                <span> Profil </span>
                            </li>
                            @endif
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="ti-power-off text-danger m-r-10"></i>
                                    {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    @if (auth()->user()->level=="super" || auth()->user()->level=="owner" || auth()->user()->level=="admin")
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    @endif
                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>

    @if (auth()->user()->level=="super" || auth()->user()->level=="owner" || auth()->user()->level=="admin")
    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="/"><i class="md md-dashboard"></i>Beranda</a>
                    </li>
                    @if (auth()->user()->level=="super" || auth()->user()->level=="admin")
                    <li class="has-submenu">
                        <a><i class="md md-account-child"></i>Master Data</a>
                        <ul class="submenu">
                            @if (auth()->user()->level=="super")
                               <li><a href="/user">Data User</a></li>
                            @endif
                            <li><a href="/pegawai">Data Pegawai</a></li>

                        </ul>
                    </li>
                    @endif
                    @if (auth()->user()->level=="super" || auth()->user()->level=="admin")
                    <li class="has-submenu">
                        <a><i class="md md-location-city"></i>Aktivitas</a>
                        <ul class="submenu">
                            <li><a href="/kehadiran">Kehadiran</a></li>
                            <li><a href="/proyek">Proyek</a></li>
                            <li><a href="/pembiayaan">Pembiayaan</a></li>
                        </ul>
                    </li>
                    @endif
                    @if (auth()->user()->level=="super" || auth()->user()->level=="owner")
                    <li class="has-submenu">
                        <a><i class="md md-my-library-books"></i>Laporan</a>
                        <ul class="submenu">
                            <li><a href="/lapkehadiran">Laporan Kehadiran</a></li>
                            <li><a href="/lappembiayaan">Laporan Pembiayaan</a></li>
                            <li><a href="/lappegawai">Laporan Data Pegawai</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <!-- End navigation menu        -->
            </div>
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
    @endif
</header>
<!-- End Navigation Bar-->
