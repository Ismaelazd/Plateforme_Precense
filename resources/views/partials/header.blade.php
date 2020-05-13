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
        <div  class="row  ">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="{{asset('img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <nav class="header__menu">
                    <ul>
                        <li class="{{Request::route()->getName()=='Welcome'?'active':''}}"><a href="{{url('/')}}">Home</a></li>
                        @can('admin', App\User::class)
                        <li><a href="{{url('/home')}}">Admin</a></li>
                        @endcan
                        <li class="{{Request::route()->getName()=='myProfil.index'?'active':''}}"><a href="{{route('myProfil.index')}}">Profil</a></li>
                        <li><a href="{{route('myProfil.index')}}">Calendrier</a></li>
                        {{-- <li><a href="#">Elève</a>
                            <ul class="dropdown">
                                <li><a href="./pricing.html">Login/Register</a></li>
                            </ul>
                        </li> --}}
                        
                        @if (Auth::check())
                        <li class="section-btn">
                          <a class="" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    @else
                    
                    <li class="section-btn"><a href="#" data-toggle="modal" data-target="#modal-form">Sign in / Join</a></li>
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