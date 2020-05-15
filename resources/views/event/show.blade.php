@extends('layouts/master')
@section('content')

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
                                <h3 class="title pt-4 ">Classes</h3>


                                <a class="ml-4 eventBtn d-flex align-items-center justify-content-center"
                                    href="{{route('classe.create')}}">+</a>
                            </div>
                            <hr>


                        </div>
                    </div>
                </div>

            </div>
        </div>








        <div class="d-flex justify-content-around mt-3">
            {{--presentation de l'evenement --}}
            <div>
                <h2>Evenement : {{$event->nom}}</h2>
                <ul>
                    <li>Classe: {{$event->classe->name}}</li>
                    <li>Date: {{ (new \DateTime($event->start))->format('d/m/Y')}}</li>
                    <li>Heure de débutte: {{ (new \DateTime($event->start))->format('H:i')}}</li>
                    <li>Heure de fin: {{ (new \DateTime($event->end))->format('H:i')}}</li>
                    @if ($event->description)
                    <li>Description: {{$event->description}}</li>
                    @endif

                </ul>


                <a href="{{route('event.edit',$event)}}" class="btn btn-warning">editer</a>
                <a href="{{route('event.edit',$event)}}" class="btn btn-danger" data-toggle="modal"
                    data-target="#modalDeleteEvent{{$event->id}}">Supprimer</a>

                <div class="modal fade" id="modalDeleteEvent{{$event->id}}" tabindex="-1" role="dialog"
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
                                <p>Vous êtes sur le point de supprimer l'évènement "{{ucfirst($event->nom)}}"! <br>
                                    Cette action n'est pas reversible!</p>
                            </div>
                            <div class="modal-footer float-right">
                                <button type="button" class="btn btn-outline-light"
                                    data-dismiss="modal">Annuler</button>
                                <form action="{{route('event.destroy',$event)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-light">Supprimer</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>

            

            {{-- Definir le statut de presence --}}
            @if (!($presences->where('user_id',Auth::id())->first()))

                <div class="mt-5 card  w-50">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Definir mon statut</h3>
                    </div>
                    <form action="{{route('presence.add',$event->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="form-group">
                                <label for="file">Piece jointe</label>
                                <input class="form-control" type="file" name="file" id="">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" name="note" id="" cols="30" rows="5"
                                    placeholder="Note"></textarea>
                                @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="etat_id">Statut</label>
                                <select class="form-control" name="etat_id" id="">
                                    <option value="1">Présent</option>
                                    <option value="2">Absent</option>
                                    <option value="3">Retard</option>
                                </select>
                                @error('etat_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            @else
                @php
                $utilisateur = $presences->where('event_id',$event->id)->first()
                    
                @endphp
            <div>
                <p>{{$utilisateur->getUser->name}}</p>
                <p class="text-white @if($utilisateur->getEtat->id == 1) bg-success @else @if($utilisateur->getEtat->id == 2) bg-danger @else bg-warning @endif @endif">Statut : {{$utilisateur->getEtat->etat}}</p>
                <p>Statut Final{{$utilisateur->getEtatfinal->etatfinal}}</p>
                <p>Note :
                    @if ($utilisateur->note)

                        {{$utilisateur->note}}
                     @else
                        <div class="text-center">
                            <i  class="fas fa-times-circle text-danger"></i>
                        </div>
                    @endif  
                </p>
                <p>
                    @if ($utilisateur->file)
                        <a class="btn btn-primary" href="{{route('presence.download', $utilisateur->id)}}">Download</a>
                    @else
                        <div class="text-center">
                            <i  class="fas fa-times-circle text-danger"></i>
                        </div>
                    @endif  
                </p>
                <p>
                    <a class="  btn btn-warning rounded-circle mx-3 text-white"
                    href="{{route('presence.edit',$utilisateur)}}"><i class="fas fa-pencil-alt"></i></a>
                </p>
            </div>
                
            @endif



          </div>

          {{-- presences enregistrées --}}

          <div class="container ">

            <table class="table table-striped table-light rounded mx-5">
                <thead>
                    
                    <tr>
                        <th scope="col" class="text-center">Nom Prenom</th>
                        <th scope="col" class="text-center">Statut</th>
                        <th scope="col" class="text-center">Statut final</th>
                        <th scope="col" class="text-center">Note</th>
                        <th scope="col" class="text-center">fichier</th>
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presences as $pre)

                    <tr>
                        <th class="text-center">{{$pre->getUser->name}} {{$pre->getUser->firstname}}</th>
                        <th class="text-center">{{$pre->getEtat->etat}} </th>
                        <th class="text-center">{{$pre->getEtatfinal->etatfinal}} </th>
                        <th class="text-center">
                          @if ($pre->note)

                              {{$pre->note}}
                          @else
                            <div class="text-center">
                              <i  class="fas fa-times-circle text-danger"></i>
                            </div>
                          @endif  
                        </th>
                        <th class="text-center">
                          @if ($pre->file)
                          <a class="btn btn-primary" href="{{route('presence.download', $pre->id)}}">Download</a>
                          @else
                           <div class="text-center">
                              <i  class="fas fa-times-circle text-danger"></i>
                           </div>
                          @endif  
                        </th>
                        <td class="d-flex justify-content-center ">
                            <div class="text-center mb-2">
                                <a class="  btn btn-primary rounded-circle mx-3 "
                                
                                    href="{{route('user.show',$pre->user_id)}}"><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="text-center mb-2">
                                <a class="  btn btn-warning rounded-circle mx-3 text-white"
                                    href="{{route('presence.edit',$pre)}}"><i class="fas fa-pencil-alt"></i></a>
                            </div>

                        </td>
                    </tr>
                    
                    @endforeach

                  </tbody>
              </table>
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




@endsection
