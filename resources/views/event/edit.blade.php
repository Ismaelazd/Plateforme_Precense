
      



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
                                    <h3 class="title pt-4 ">Modifier l'évènement : "{{$event->nom}}"</h3>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="card card-primary w-75 ">
                        
                        <form action="{{route('event.update',$event)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                          <div class="card-body">
                            <div class="form-group">
                                <label for="nom">Nom de l'évènement</label>
                                <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{ old('nom',$event->nom) }}" placeholder="Nom de l'évènement">
                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  
                            </div>
          
                
                
                            <div class="form-group">
                                <label  for="classe_id">Classe</label>
                   
                                <select class="form-control" name="classe_id" id="classe_id">
                                    @foreach ($classes as $classe)
                                            @if ($classe->id===$event->classe_id)
                                                <option selected value="{{$classe->id}}">{{$classe->name}}</option>
                                            @else
                                                <option value="{{$classe->id}}">{{$classe->name}}</option>
                                            @endif
                                    @endforeach
                                </select>
                                @error('classe_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                
                    
                            <div class="form-group">
                                <label>Description (facultatif)</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5" placeholder="Description">{{ old('description',$event->description) }}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         
                
                          @php
                              $debut= (new \DateTime($event->start))->format('Y-m-d').'T'.(new \DateTime($event->start))->format('H:i');
                              $fin= (new \DateTime($event->end))->format('Y-m-d').'T'.(new \DateTime($event->end))->format('H:i');
                          @endphp
                
                          <div class="form-group">
                            <label for="start">Debut</label>
                            <input name="start" type="datetime-local" class="form-control @error('start') is-invalid @enderror" id="start" value="{{ old('start', $debut)}}" >
                            @error('start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          
                          <div class="form-group">
                            <label for="end">Fin</label>
                            <input name="end" type="datetime-local" class="form-control @error('end') is-invalid @enderror" id="end" value="{{ old('end',$fin) }}" >
                            @error('end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <!-- /.card-body -->
                        </div>
                          <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                            <a href="{{route('event.show',$event)}}" class="btn btn-danger">Annuler</a>
                          </div>
                        </form>
                      </div>
                    </div>
            </div>
        </div>
        </div>
        </div>
        <footer class="footer text-center ">
            <p> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="https://molengeek.com" target="_blank">MolengeekTeam</a>
        </footer>
    
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
            integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
        </script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
            integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
        </script>
        <script src="{{asset('/js/profil.js')}}"></script>
    
    </body>
    
   

  