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
    @include('components/navbar-page')

    <div id="profilHeader" class="page-header header-filter " data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">
        
        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Your Profil</h2>
            <div class="bgTitle"></div>

        </div>
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
                    <button style="color: #ffff; background-color: #120851 ;" title="Edit" type="submit" class="btn"><i class="fa fa-pencil-alt fa-2x"></i></button>
                </form>


                <div style="width: 400px" class="messagerie container">
                    <h3 class="text-center">Messagerie</h3>
                    <div class="" >
                        @foreach ($messageries as $messagerie)
                            <div class="message d-block  my-2 @if ($messagerie->ecrivain_id == $user->id)   @else text-right  @endif">
                               <p class="d-inline rounded  p-2 @if ($messagerie->ecrivain_id == $user->id)  bg-primary text-white @else text-right border border-primary text-primary @endif"> {{$messagerie->message}}</p>
                            </div>
                        @endforeach
                    </div>
                    <form class="text-center" action="{{route('messagerie.store', $user->id)}}" method="post">
                    @csrf
                        <input name="message" type="text" placeholder="Ecrivez votre message"><button type="submit">envoyer</button>
                    </form>
                </div>





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
                                <li class="nav-item">
                                    <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                        <i class="material-icons">message</i>
                                        Messages
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
