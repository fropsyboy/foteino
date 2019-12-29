<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">{{ Auth::user()->name }}</span></a>
                    <ul aria-expanded="false" class="collapse">
                   
                        <li><a href="{{route('profile')}}"><i class="ti-settings"></i> Account Setting</a></li>
                        <li>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        </li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PERSONAL</li>
                <li> <a class="waves-effect waves-dark" href="{{route('dashboard')}}" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                <li> <a class="waves-effect waves-dark" href="{{route('empty')}}" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Jobs</span></a>
                <li> <a class="waves-effect waves-dark" href="{{route('empty')}}" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Applications</span></a>
                </li>

                <li class="nav-small-cap">--- System Users</li>
                    <li> <a class="waves-effect waves-dark" href="{{route('empty')}}" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Applicants</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{route('empty')}}" aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span class="hide-menu">Companies</span></a>
                    </li>


                    <li class="nav-small-cap">--- SUPPORT</li>
                    <li> <a class="waves-effect waves-dark" href="{{route('empty')}}" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Assignments</span></a></li>
                    <li> <a class="waves-effect waves-dark" href="{{route('empty')}}" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Tickets</span></a></li>
                </li>
            </ul>
        </nav>
    </div>
</aside>
        