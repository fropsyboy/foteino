<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <b>
{{--                    <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />--}}
{{--                    <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />--}}
                </b>
                <span>
                    <img src="{{asset('assets/images/lo.png')}}" alt="homepage" class="dark-logo" />
                    <img src="{{asset('assets/images/logo-white.png')}}" class="light-logo" alt="homepage" />
                </span>
            </a>
        </div>

        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- <li class="nav-item">
                    <form class="app-search d-none d-md-block d-lg-block">
                        <input type="text" class="form-control" placeholder="Search & enter">
                    </form>
                </li> -->
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a> -->
{{--                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <div class="drop-title">Support Messages</div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="message-center">--}}
{{--                                    <a href="javascript:void(0)">--}}
{{--                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>--}}
{{--                                        <div class="mail-contnet">--}}
{{--                                            <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)">--}}
{{--                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>--}}
{{--                                        <div class="mail-contnet">--}}
{{--                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)">--}}
{{--                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>--}}
{{--                                        <div class="mail-contnet">--}}
{{--                                            <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)">--}}
{{--                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>--}}
{{--                                        <div class="mail-contnet">--}}
{{--                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </li>


                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- @if(Auth::user()->gender == "Male")
                    <img src="{{asset('assets/images/users/male.png')}}" alt="user-img" class="img-circle">
                    @else
                    <img src="{{asset('assets/images/users/female2.png')}}" alt="user-img" class="img-circle"> -->
                    @endif

                    <span class="hidden-md-down">{{ Auth::user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">

                        <a href="{{route('profile')}}" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
            </ul>
        </div>
    </nav>
</header>
