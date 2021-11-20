<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('assets/images/flags/smk.jpg')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('assets/images/smk.png')}}" alt="" height="50">
                    </span>
                </a>
            </div>

            <!-- Minimize Button-->
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-backburger"></i>
            </button>
                        
            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="mdi mdi-magnify"></span>
                </div>
            </form>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(auth()->user()->level == 0)
                    <img class="rounded-circle header-profile-user" src="{{ URL::asset('assets/images/admin_logo.png')}}" alt="Header Avatar">
                @elseif(auth()->user()->level == 1)
                    <img class="rounded-circle header-profile-user" src="{{ URL::asset('assets/images/kepala.png')}}" alt="Header Avatar">
                @elseif(auth()->user()->level == 2)
                    <img class="rounded-circle header-profile-user" src="{{ URL::asset('assets/images/bendahara.png')}}" alt="Header Avatar">
                @else
                    <img class="rounded-circle header-profile-user" src="{{ URL::asset('assets/images/user.png')}}" alt="Header Avatar">
                @endif
                    <span class="d-none d-sm-inline-block ml-1">{{auth()->user()->pengguna->nama_pengguna}} &nbsp</span>
                    <i class="fas fa-caret-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>