<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                               placeholder="Search for..." aria-label="Search"
                               aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" title="@lang('content.lang')"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-language fa-fw"></i>
                <span class="badge badge-danger badge-counter">2</span>
                <!-- Counter - Alerts -->
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                   @lang('content.lang')

                    </h6>
                <a class="dropdown-item d-flex align-items-center" href="{{route('lang.admin','vi')}}">
                    <div class="dropdown-list-image " style="height: 0.5rem;">
                        <i class="status-indicator {{config('app.locale') == 'vi' ? 'bg-success':''}} "></i>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">VietNamese</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="{{route('lang.admin','en')}}">
                    <div class="dropdown-list-image " style="height: 0.5rem;">
                        <i class="status-indicator  {{config('app.locale') == 'en' ? 'bg-success':''}}"></i>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">English</div>
                    </div>
                </a>

            </div>
        </li>
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">0</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>

            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">0</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>

                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        @if(Auth::guard()->check())
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::guard()->user()->name}}</span>
                    <img class="img-profile rounded-circle"
                         src="{{asset('images/users/'.Auth::guard()->user()->image)}}">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="userDropdown">
                    <button class="dropdown-item btn  show-user" title="Chi tiết người dùng"
                            data-toggle="modal"
                            show="{{Auth::guard()->user()->id}}"
                            data-target="#showUserModal">
                        <i class="fa fa-info text-warning fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </button>
                    <button class="dropdown-item btn change-user-password" title="Đổi mật khẩu"
                            data-toggle="modal"
                            user="{{Auth::guard()->user()->id}}"
                            data-target="#changeUserPasswordModal">
                        <i class="fa fa-key text-warning fa-sm fa-fw mr-2 text-gray-400"></i>
                        Đổi mật khẩu
                    </button>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item btn" href="" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"> <i
                            class="text-danger fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                    <form id="logout-form" action="{{ route('login.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

            </li>
        @endif
    </ul>
</nav>
@include('admins.users.change_password')
@include('admins.users.show_modal')
