  <!-- Offcanvas Menu Begin -->
  <div class="offcanvas__menu__overlay"></div>
  <div class="offcanvas__menu__wrapper">
      <div class="canvas__close">
          <span class="fa fa-times-circle-o"></span>
      </div>
      <div class="offcanvas__logo">
          <a href="#"><img src="img/logo.png" alt=""></a>
      </div>
      <nav class="offcanvas__menu mobile-menu">
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

            @can('student', App\User::class)
                
            <li><a href="{{route('presence.longueabsenceblade')}}">Longue Absence</a></li>
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
      <div id="mobile-menu-wrap"></div>
      <div class="offcanvas__auth">
          <ul>
              <li><a href="#"><span class="icon_chat_alt"></span> Live chat</a></li>
              <li><a href="#"><span class="fa fa-user"></span> Login / Register</a></li>
          </ul>
      </div>
      <div class="offcanvas__info">
          <ul>
              <li><span class="icon_phone"></span> +1 123-456-7890</li>
              <li><span class="fa fa-envelope"></span> Support@gmail.com</li>
          </ul>
      </div>
  </div>
  <!-- Offcanvas Menu End -->
 
 <!-- Header Section Begin -->
 <header id="header"  class="header-section pb-4">
    {{-- <div class="header__info">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__info-left">
                        <ul>
                            <li><span class="icon_phone"></span> +1 123-456-7890</li>
                            <li><span class="fa fa-envelope"></span> Support@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__info-right">
                        <ul>
                            <li><a href="#"><span class="icon_chat_alt"></span> Live chat</a></li>
                            <li><a href="#"><span class="fa fa-user"></span> Login / Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div  class="row pt-3 ">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo d-flex">
                    <a href="{{url('/')}}"><img src="{{asset('img/mg-logo.png')}}" class="" alt=""></a><span class="font-weight-bold text-white d-flex align-items-center pl-3">MGConnect</span>
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

                        @can('student', App\User::class)
                            
                        <li><a href="{{route('presence.longueabsenceblade')}}">Longue Absence</a></li>
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
</header>
<!-- Header End -->