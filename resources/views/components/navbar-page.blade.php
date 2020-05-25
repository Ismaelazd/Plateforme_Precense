<nav id="header" class="header-section pb-4" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="row pt-3 ">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo  d-flex">
                    <a class="" href="{{url('/')}}"><img src="{{asset('img/mg-logo.png')}}" class=""
                            alt=""></a><span
                        class="font-weight-bold text-white d-flex align-items-center pl-3">MGConnect</span>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <nav class="header__menu">
                    <ul>
                        <li class="{{Request::route()->getName()=='Welcome'?'active':''}}"><a
                                href="{{url('/')}}">Home</a></li>
                        @can('admin', App\User::class)
                        <li><a href="{{url('/home')}}">Admin</a></li>
                        @endcan
                        @can('myProfil', App\User::class)
                        <li class="{{Request::route()->getName()=='myProfil.index'?'active':''}}"><a
                                href="{{route('myProfil.index')}}">Profil</a></li>

                        @endcan
                        @if(Auth::check() && Auth::user()->role_id != 4)
                            
                        <li><a href="{{route('calendrier')}}">Calendrier</a></li>
                        @can('coach', App\User::class)
                            
                        <li><a href="{{route('classe.index')}}">Classes</a></li>
                        @endcan
                        @endif
                        @if(Auth::check() && Auth::user()->role_id == 2)
                            @if (count($changements) == 0)
                            <li class=""><a href="{{route('validationchange.index')}}">Changements</a></li>

                            @else
                                
                            <li class=""><a href="{{route('validationchange.index')}}">Changements <span class="ml-3 badge badge-light">{{count($changements)}}</span></a></li>
                            @endif
                    
                        @endif
                    

                        @if (Auth::check())
                        <li class="section-btn">
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else

                        <li class="section-btn"><a href="#" data-toggle="modal" data-target="#modal-form">Sign in /
                                Join</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <div class="canvas__open">
            <span class="fa fa-bars"></span>
        </div>
    </div>
</nav>