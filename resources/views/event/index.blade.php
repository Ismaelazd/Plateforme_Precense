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
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/profil.css')}}">
</head>

<body class="profile-page">
    <nav id="header" class="header-section pb-4" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="row pt-3 ">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo d-flex">
                        <a href="{{url('/')}}"><img src="{{asset('img/mg-logo.png')}}" class="" alt=""></a><span
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
                            <li><a href="{{route('calendrier')}}">Calendrier</a></li>
                            

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
        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Calendrier</h2>
            <div class="bgTitle"></div>

        </div>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile ">

                            <div class="name d-flex align-items-center justify-content-center">
                                <h3 class="title pt-4 ">Evènements</h3>
                                
                                
                                <a class="ml-4 eventBtn d-flex align-items-center justify-content-center" href="{{route('event.create')}}">+</a>
                                </div>
                                <hr>
                        </div>
                    </div>
                </div>
                <div class=" container  ">


                    <table class="table table-striped table-light rounded ">
                        <thead>
                            
                            <tr >
                                <th scope="col" class="">Nom</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                                <th scope="col">Debut</th>
                                <th scope="col">Fin</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)

                            <tr>
                                <th>{{$event->nom}} </th>
                                <th>{{$event->classe->name}} </th>
                                <td>{{$event->description}}</td>
                                <td>{{ (new \DateTime($event->start))->format('d/m/Y')}}</td>
                                <td>{{ (new \DateTime($event->start))->format('H:i')}}</td>
                                <td>{{ (new \DateTime($event->end))->format('H:i')}}</td>
                                <td class="d-flex justify-content-center ">
                                    <div class="text-center mb-2">
                                        <a class="btn rounded btn-warning text-white mx-3 "
                                            href="{{route('event.edit',$event)}}"><i class="fa fa-pencil"></i></a>
                                    </div>
                                    <div class="text-center">
                                        <a class="   rounded btn btn-danger mx-3 " data-toggle="modal"
                                            data-target="#deleteEvent{{$event->id}}" href=""><i
                                                class="fa fa-trash"></i></a>
                                    </div>

                                </td>
                            </tr>
                            <div class="modal fade" id="deleteEvent{{$event->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-header ">
                                            <h4 class="modal-title">Attention!!!</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p>Vous êtes sur le point de supprimer l'évènement
                                                "{{ucfirst($event->nom)}}"! <br> Cette action n'est pas reversible!</p>
                                        </div>
                                        <div class="modal-footer float-right">
                                            <button type="button" class="btn btn-outline-light"
                                                data-dismiss="modal">Annuler</button>
                                            <form action="{{route('event.destroy',$event)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-light">Supprimer cet
                                                    évènement</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            @endforeach

                        </tbody>
                    </table>

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
