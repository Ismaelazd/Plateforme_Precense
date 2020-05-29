@extends('layouts/master')
@section('content')
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
        @include('components/footer-page')
        <script src="{{asset('/js/profil.js')}}"></script>
    
    </body>
    
   

  