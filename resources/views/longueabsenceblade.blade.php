


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
</head>

<body class="profile-page">
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
                            <li><a href="{{route('calendrier')}}">Calendrier</a></li>
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

    <div id="profilHeader" class="page-header header-filter " data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">

        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Absence longue</h2>
            <div class="bgTitle"></div>

        </div>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">

                            <div class="name">
                                <h3 class="title pt-4 ">Absence longue</h3>

                                <hr>
                            </div>

                        </div>
                    </div>
                </div>


                



                <div class="mt-5 card  w-50 mx-auto">
                    <div class="card-header  text-white" style="background-color: #120851;">
                      <h3 class="card-title" >Absence longue</h3> 
                    </div> 
                    <form action="{{route('presence.longueabsence')}}" method="post" enctype="multipart/form-data">
                      @csrf
                
                      <div class="card-body">
                        
                        <div class="form-group">
                            <label  for="debut">debut</label>
                            <input class="form-control @error('debut') is-invalid @enderror" type="datetime-local"  name="debut" id="">
                              @error('debut')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                        
                        <div class="form-group">
                            <label  for="debut">fin</label>
                            <input class="form-control @error('fin') is-invalid @enderror" type="datetime-local"  name="fin" id="">
                              @error('fin')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                        
                        <div class="form-group">
                            <label  for="etat_id">Statut</label>
                            <select class="form-control @error('etat_id') is-invalid @enderror" name="etat_id" id="">
                                @foreach ($etats as $etat)
                                    @if ($etat->id == old('etat_id'))
                                        <option selected value="{{$etat->id }}">{{$etat->etat}} </option>
                                    @else
                                        <option value="{{$etat->id }}">{{$etat->etat}} </option>
                                    @endif
                                @endforeach
                        
                            </select>  
                                @error('etat_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                          <label  for="file">Piece jointe</label>
                          <input class="form-control @error('file') is-invalid @enderror" type="file"  name="file" id="">
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                
                        <div class="form-group">
                          <label  for="note">Note</label>
                          <textarea class="form-control @error('note') is-invalid @enderror" name="note" id="" cols="30" rows="5" placeholder="Note">{{old('note')}}</textarea>
                          @error('note')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div> 
                  

                      @if (Auth::id()!=3)
                        <div class="form-group">
                            <label  for="etatfinal_id">Statut Final</label>
                            <select class="form-control @error('etatfinal_id') is-invalid @enderror" name="etatfinal_id" id="">
                                @foreach ($etatfinals as $etatfinal)
                                    @if ($etatfinal->id == old('etatfinal_id'))
                                        <option selected value="{{$etatfinal->id }}">{{$etatfinal->etatfinal}} </option>
                                    @else
                                        <option value="{{$etatfinal->id }}">{{$etatfinal->etatfinal}} </option>
                                    @endif
                                @endforeach
                        
                            </select>  
                            @error('etatfinal_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                      @endif
                
                    </div>
                
                    <div class="card-footer text-center">
                        <button type="submit" class="btn text-white" style="background-color: #120851;">Envoyer</button>
                  
                        
                    </div>
                    </form>
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