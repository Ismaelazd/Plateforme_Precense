@extends('layouts/master')
@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet"
        href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">

    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/profil.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/profil-card.css')}}">

</head>

<body class="profile-page">
    @include('components/navbar-page')


    <div id="profilHeader" class="page-header header-filter " data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">

        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Nos classes</h2>
            <div class="bgTitle"></div>

        </div>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="name d-flex align-items-center justify-content-center">
                                <h3 class="title pt-4 ">Classe : {{$classe->name}}</h3>

                            </div>
                            <hr>

                        </div>
                    </div>
                </div>




                <div class="container table-responsive-lg ">

                    <div class="row justify-content-center pb-5">
                        @foreach ($coachs as $coach)

                        <div class="col-sm-12 col-md-4 mb-4">
                            <div class="d-flex justify-content-center">
                                <div class="card cardBorderCorners darkCard">
                                    <div class="card-body">
                                        <img class="proPic proDark card-img rounded-circle"
                                            src="{{asset('storage/'.$coach->image)}}" alt="Profile Pic">
                                        <h5 class="darkTitle card-title">{{$coach->name}} {{$coach->firstname}}</h5>
                                        <h6 class="darkSubTitle card-subtitle">{{$coach->role->role}}</h6>
                                        @if (!(is_null($coach->tel)))

                                        <div class="row my-3  mx-3">
                                            <div
                                                class="col-2 d-flex justify-content-center align-item-center text-white">
                                                <i class="fas  fa-phone-alt"></i>
                                            </div>
                                            <div class="col-10">
                                                <p class="darkDesc card-text m-0">{{$coach->tel}}</p>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row my-3  mx-3">
                                            <div
                                                class="col-2 d-flex justify-content-center align-item-center text-white">
                                                <i class="fas  fa-phone-alt"></i>
                                            </div>
                                            <div class="col-10">
                                                <p class="darkDesc card-text m-0">Inconnu</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if (!(is_null($coach->rue) || is_null($coach->ville)))

                                        <div class="row my-3  mx-3">
                                            <div
                                                class="col-2 d-flex justify-content-center align-items-center text-white">
                                                <i class="fas  fa-map-pin"></i>
                                            </div>
                                            <div class="col-10">
                                                <p class="darkDesc card-text m-0">{{$coach->rue}}, {{$coach->ville}}</p>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row my-3  mx-3">
                                            <div
                                                class="col-2 d-flex justify-content-center align-items-center text-white">
                                                <i class="fas  fa-map-pin"></i>
                                            </div>
                                            <div class="col-10">
                                                <p class="darkDesc card-text m-0">Inconnu</p>
                                            </div>
                                        </div>
                                        @endif

                                        <p class="darkMail card-text">
                                            <span class="darkMailText rounded">{{$coach->email}}</span>
                                        </p>
                                    </div>

                                    <div class="social">
                                        <div class="row d-flex justify-content-center">
                                            {{-- <div class="col-sm-4 col-md-4">
                                        <a class="  btn btn-primary rounded mx-3  "
                                            href="{{route('user.show',$coach)}}"><i class="fa fa-eye"></i>
                                            </a>
                                        </div> --}}
                                        @if (Auth::user()->id == $coach->id )

                                        <div class="col-sm-4 col-md-4">
                                            <a class="  btn btn-warning rounded mx-3 text-white"
                                                href="{{route('myProfil.edit',$coach)}}"><i
                                                    class="fas fa-pencil-alt"></i>
                                            </a>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                <div class="row d-flex justify-content-center">
                    @foreach ($users as $user)
                    <!-- Light Mode -->
                    <div class="col-sm-12 col-md-3 col-lg-4 mb-4">
                        <div class="d-flex justify-content-center">
                            <div class="card cardBorderCorners lightCard">
                                <div class="card-body">
                                    <img class="proPic proLight card-img rounded-circle"
                                        src="{{asset('storage/'.$user->image)}}" alt="Profile Pic">
                                    <h5 class="lightTitle card-title">{{$user->name}} {{$user->firstname}} </h5>
                                    <h6 class="lightSubTitle card-subtitle">{{$user->role->role}}</h6>
                                    @if (!(is_null($user->tel)))

                                    <div class="row my-3  mx-3">
                                        <div class="col-2 d-flex justify-content-center align-item-center "
                                            style="color: #120851;">
                                            <i class="fas  fa-phone-alt"></i>
                                        </div>
                                        <div class="col-10">
                                            <p class="lightDesc card-text m-0">{{$user->tel}}</p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row my-3  mx-3">
                                        <div class="col-2 d-flex justify-content-center align-item-center "
                                            style="color: #120851;">
                                            <i class="fas  fa-phone-alt"></i>
                                        </div>
                                        <div class="col-10">
                                            <p class="lightDesc card-text m-0">Inconnu</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if (!(is_null($user->rue) || is_null($user->ville)))

                                    <div class="row my-3  mx-3">
                                        <div class="col-2 d-flex justify-content-center align-items-center "
                                            style="color: #120851;">
                                            <i class="fas  fa-map-pin"></i>
                                        </div>
                                        <div class="col-10">
                                            <p class="lightDesc card-text m-0">{{$user->rue}}, {{$user->ville}}</p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row my-3  mx-3">
                                        <div class="col-2 d-flex justify-content-center align-item-center "
                                            style="color: #120851;">
                                            <i class="fas fa-map-pin"></i>
                                        </div>
                                        <div class="col-10">
                                            <p class="lightDesc card-text m-0">Inconnu</p>
                                        </div>
                                    </div>
                                    @endif

                                    <p class="lightMail card-text">
                                        <span class="lightMailText rounded">{{$user->email}}</span>
                                    </p>
                                </div>

                                <div class="social">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <a class="  btn btn-primary rounded mx-3  "
                                                href="{{route('user.show',$user)}}"><i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                        {{-- <div class="col-xs-4 col-sm-4 col-md-4">
                                        <a class="  btn btn-warning rounded mx-3 text-white"
                                            href="{{route('myProfil.edit',$user)}}"><i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
