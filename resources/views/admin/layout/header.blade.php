<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header hidden-xs">
            <a class="navbar-brand" href="{{url("/admin")}}">
                <span class="show hide ax" style="color: #FFF;">{{trans('web.m')}}</span>
                </b>
                <span class="hides" style="color: #FFF;">PM PRO</span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item">
                    <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                       href="javascript:void(0)">
                        <i class="mdi mdi-menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:void(0)"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ucfirst(app()->getLocale())}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-{{app()->getLocale() == 'en' ? 'right' : 'left'}} scale-up">
                        @if(app()->getLocale() == 'en')
                            <a class="dropdown-item" href="{{ url("".url()->full()."?&lang=ar") }}">{{trans('web.arabic')}}</a>
                        @else
                            <a class="dropdown-item" href="{{ url("".url()->full()."?&lang=en") }}">{{trans('web.english')}}</a>
                        @endif
                    </div>
                </li>
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""--}}
{{--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i--}}
{{--                            class="mdi mdi-bell-ring"></i>--}}
{{--                        <div class="notify">--}}
{{--                            <span class="heartbit"></span> <span class="point"></span></div>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset("assets/admin/images/logo.png")}}" alt="user" class="profile-pic"/>
                        <div class="notify">
                            <span class="heartbit"></span> <span class="point"></span></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-{{app()->getLocale() == 'en' ? 'right' : 'left'}} scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{asset("assets/admin/images/logo.png")}}" alt="user"></div>
                                    <div class="u-text">
                                        <h4><strong>{{auth()->User()->name}}</strong></h4>
                                        <p class="text-muted">{{auth()->User()->email}}</p>

                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                        </ul>
                        <div class="container">
                            <button onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="btn btn-secondary waves-effect waves-light btn-sm pull-right">{{trans('web.signOut')}}</button>
                        </div>

                        <form id="logout-form" action="{{ url('/adminlogout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
