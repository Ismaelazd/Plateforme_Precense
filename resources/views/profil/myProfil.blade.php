<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet"
        href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">

    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/profil.css')}}">
</head>

<body class="profile-page">
    <nav id="header" class="header-section pb-4" color-on-scroll="100" id="sectionsNav">
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
                            <li class="{{Request::route()->getName()=='myProfil.index'?'active':''}}"><a href="{{route('myProfil.index')}}">Profil</a></li>
    
                            @endcan
                            <li><a href="{{route('myProfil.index')}}">Calendrier</a></li>
                            {{-- <li><a href="#">Elève</a>
                                <ul class="dropdown">
                                    <li><a href="./pricing.html">Login/Register</a></li>
                                </ul>
                            </li> --}}

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

    <div id="profilHeader" class="page-header header-filter" data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">
        <h2 class="text-white mx-auto">Your Profil</h2>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{asset('storage/'.$user->image)}}"
                                    alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">{{$user->name}} {{$user->firstname}}</h3>
                                <h6>{{$user->role->role}}</h6>
                                {{-- <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a> --}}
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" description  text-center">
                    <div class="row my-3 ">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa fa-2x fa-at"></i>
                        </div>
                        <div class="col-9">
                            <p>{{$user->email}}</p>
                        </div>
                    </div>
                    @if (!(is_null($user->tel)))
                    
                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa fa-2x fa-phone"></i>
                        </div>
                        <div class="col-9">
                            <p>{{$user->tel}}</p>
                        </div>
                    </div>
                    @endif
                    @if (!(is_null($user->rue) || is_null($user->ville)))
                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa fa-2x fa-map-pin"></i>
                        </div>
                        <div class="col-9">
                            <p>{{$user->rue}}, {{$user->ville}}</p>
                        </div>
                    </div>
                    @endif
                    

                </div>

                <form action="{{route('myProfil.edit',$user)}}" method="get" class="text-center mt-5 ">
                    <button style="color: #ffff; background-color: #120851 ;" title="Edit" type="submit" class="btn"><i class="fa fa-pencil fa-2x"></i></button>
                </form>

                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                        <i class="material-icons">school</i>
                                        Classes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                        <i class="material-icons">folder_open</i>
                                        Projects
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                        <i class="material-icons">event_note</i>
                                        Calendrier
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>

    <footer class="footer text-center ">
        <p> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                href="https://molengeek.com" target="_blank">MolengeekTeam</a>
    </footer>

    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
    </script>
    <script src="{{asset('/js/profil.js')}}"></script>

</body>
