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


                <li>
                    <a class="has-arrowwaves-effect waves-dark" href="{{ url('d-care') }}" aria-expanded="false">
                        <i class="icon-cursor"></i>
                        <span class="hide-menu">D-Care</span>
                    </a>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{url('/logout')}}" aria-expanded="false"><i
                            class="icon-logout"></i><span class="hide-menu">Log out</span></a></li>

            </ul>
        </nav>
    </div>
</aside>
