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
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./about.html">Admin</a></li>
            <li><a href="./about.html">Profil</a></li>
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