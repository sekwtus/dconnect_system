<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a href="javascript:void(0)" aria-expanded="false">
                        @if(Auth::user()->pic_profile != NULL)
                        <img src="{{ asset('/assets/profile'.'/'. Auth::user()->pic_profile)}}" alt="user-img"
                            class="img-circle">
                        @else
                        <img src="{{ asset('/assets/images/user.jpg')}}" alt="user-img" class="img-circle">
                        @endif
                        <span class="hide-menu">{{ Auth::user()->name }}</span></a>
                </li>

                {{-- <li> <a class="waves-effect waves-dark" href="{{url('/order_table')}}" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">D-Link</span></a></li> --}}

                <li> <a class="waves-effect waves-dark" href="{{url('/order_today')}}" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">D-Link</span></a>
                    {{-- <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/order_today')}}">Today</a></li>
                        <li><a href="{{url('/order_yesterday')}}">Yesterday</a></li>
                        <li><a href="{{url('/order_table')}}">30 Day</a></li>
                    </ul> --}}
                </li>

                <li> <a class="waves-effect waves-dark" href="{{url('/oe')}}" aria-expanded="false"><i
                            class="icon-speedometer"></i><span class="hide-menu">D-Tracking</span></a></li>

                {{-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="icon-compass"></i><span class="hide-menu">D-Tracking</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">D-tracking 1</a></li>
                        <li><a href="app-email-detail.html">D-tracking 2</a></li>
                        <li><a href="app-compose.html">D-tracking 3</a></li>
                    </ul>
                </li> --}}

                <li>
                    <a class="has-arrowwaves-effect waves-dark" href="{{ url('d-know') }}" aria-expanded="false">
                        <i class="icon-cursor"></i>
                        <span class="hide-menu">D-Know</span>
                    </a>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="icon-notebook"></i><span class="hide-menu">D-SIM</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('D-SIM/SIM1/report') }}">Lose Analysis</a></li>
                        <li><a href="{{ url('D-SIM/SIM1/order_today') }}">D-Sim 1</a></li>
                        <li><a href="{{ url('D-SIM/SIM2') }}">D-SIM 2</a></li>
                        <li><a href="{{ url('D-SIM/SIM3') }}">D-SIM 3</a></li>
                        <li><a href="{{ url('D-SIM/SIM4') }}">D-SIM 4</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrowwaves-effect waves-dark" href="{{ url('d-care') }}" aria-expanded="false">
                        <i class="icon-cursor"></i>
                        <span class="hide-menu">D-Care</span>
                    </a>
                </li>

                {{-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="icon-layers"></i><span class="hide-menu">D-Care</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ url('d-care') }}">Setting D-Care</a>
                        </li>
                    </ul>
                </li> --}}

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="icon-settings"></i><span class="hide-menu">Setting</span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li><a href="{{url('/setting/SIM2')}}">SIM2</a></li>
                        <li><a href="{{url('/profile')}}">Profile</a></li>
                        <li><a href="{{url('/user')}} ">User</a></li>

                        <li>
                            <a href="{{ url('setting/d-know') }}">D-Know</a>
                        </li>
                    </ul>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{url('/logout')}}" aria-expanded="false"><i
                            class="icon-logout"></i><span class="hide-menu">Log out</span></a></li>

            </ul>
        </nav>
    </div>
</aside>
