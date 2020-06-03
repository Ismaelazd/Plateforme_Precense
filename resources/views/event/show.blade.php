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
    <link rel="stylesheet" href="{{asset('/css/profil.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>

<body class="profile-page">
    @include('components/navbar-page')


    <div id="profilHeader" class="page-header header-filter " data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">

        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Evènements</h2>
            <div class="bgTitle"></div>

        </div>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="">
                <div class="row no-gutters py-5">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="name d-flex align-items-center justify-content-center">
                                <h3 class="title pt-4 ">Evenement : "{{$event->nom}}"</h3>
                            </div>
                            <hr>


                        </div>
                    </div>
                </div>




                <div class="container mt-3">

                    <div class="row no-gutters pb-5 justify-content-center ">
                        {{--presentation de l'evenement --}}
                        <div class="col-md-6 px-5  border-0">

                            <div class="card-header text-center text-white" style="background-color: #120851;">
                                <h3 class="card-title">Info sur l'évènement</h3>
                            </div>
                            <div class="p-4">

                                <ul>
                                    <li>Classe: {{$event->classe->name}}</li>
                                    <li>Date: {{ (new \DateTime($event->start))->format('d/m/Y')}}</li>
                                    <li>Heure de débutte: {{ (new \DateTime($event->start))->format('H:i')}}</li>
                                    <li>Heure de fin: {{ (new \DateTime($event->end))->format('H:i')}}</li>
                                    @if ($event->description)
                                    <li>Description: {{$event->description}}</li>
                                    @endif

                                </ul>

                                <div class="mt-4 text-center">
                                    @can('coach', App\User::class)

                                    <a href="{{route('event.edit',$event)}}" class="btn btn-outline-warning">editer</a>
                                    <a href="{{route('event.edit',$event)}}" class="btn btn-outline-danger deleteEl"
                                        data-toggle="modal" data-target="#modalDeleteEvent{{$event->id}}">Supprimer</a>
                                    @endcan


                                </div>

                            </div>

                            <div class="modal fade" id="modalDeleteEvent{{$event->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-header ">
                                            <h4 class="modal-title">Attention!!!</h4>
                                            <button type="button" class="close btnAnnuler" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p>Vous êtes sur le point de supprimer l'évènement
                                                "{{ucfirst($event->nom)}}"! <br>
                                                Cette action n'est pas reversible!</p>
                                        </div>
                                        <div class="modal-footer float-right">
                                            <button type="button" class="btn btn-outline-light btnAnnuler"
                                                data-dismiss="modal">Annuler</button>
                                            <form action="{{route('event.destroy',$event)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-light btnAnnuler">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>



                        {{-- Definir le statut de presence --}}
                        @php
                        $utilisateur = $presences->where('user_id',Auth::id())->first()

                        @endphp

                        @if (!$utilisateur && Auth::user()->role_id==3 )

                             <div class="col-6 px-5 " style="
                                                border-right: 0px;
                                                border-left: 3px;
                                                border-style: solid;
                                                border-image: 
                                                linear-gradient(
                                                    to bottom, 
                                                    #120851, 
                                                    rgba(0, 0, 0, 0)
                                                ) 1 100%;">
                                    <div class="card-header text-center text-white" style="background-color: #120851;">
                                        <h3 class="card-title">Annoncer ma présence</h3>
                                    </div>
                                    <p class="text-center mt-3">
                                        <a class="  btn btn-warning rounded-circle mx-3 text-white"
                                            href="{{route('presence.create',$event->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                    </p>
                                </div>
                        @else

                            @if (Auth::user()->role_id==3 )



                                <div class="col-6 px-5 " style="
                                                border-right: 0px;
                                                border-left: 3px;
                                                border-style: solid;
                                                border-image: 
                                                linear-gradient(
                                                    to bottom, 
                                                    #120851, 
                                                    rgba(0, 0, 0, 0)
                                                ) 1 100%;">



                                    <p>{{$utilisateur->getUser->name}}</p>
                                    <p
                                        class="text-white @if($utilisateur->getEtat->id == 1) bg-success @else @if($utilisateur->getEtat->id == 2) bg-danger @else bg-warning @endif @endif">
                                        Statut : {{$utilisateur->getEtat->etat}}</p>
                                    <p>Statut Final : {{$utilisateur->getEtatfinal->etatfinal}}</p>
                                    <p>Note :
                                        @if ($utilisateur->note)

                                        {{$utilisateur->note}}
                                        @else
                                        <div class="text-center">
                                            <i class="fas fa-times-circle text-danger"></i>
                                        </div>
                                        @endif
                                    </p>
                                    <p> Justificatif :
                                        @if ($utilisateur->file)
                                        <a class="btn btn-primary"
                                            href="{{route('presence.download', $utilisateur->id)}}">Download</a>
                                        @else
                                        <div class="text-center">
                                            <i class="fas fa-times-circle text-danger"></i>
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
                            @can('coach', App\User::class)



                                <div class="container mt-5 " style="padding-top:100px;border-top: 3px; border-bottom:0px;
                        
                                    border-style: solid;
                                    border-image: 
                                    linear-gradient(
                                        90deg, #120851 0%, rgba(157,142,255,1) 50%, rgba(18,8,81,1)
                                    ) 1 1 100%;">

                                    <div class="text-right">
                                        <p>{{count($presences->where('etat_id',1))}} sur {{count($presences)}} élève(s)
                                            présent(s)</p>
                                    </div>
                                    <div class="text-right">
                                        <p>{{count($presences->where('etat_id',2))}} sur {{count($presences)}} élève(s)
                                            absent(s)</p>
                                    </div>
                                    <div class="text-right">
                                        <p>{{count($presences->where('etat_id',3))}} sur {{count($presences)}} élève(s) en
                                            retard(s)</p>
                                    </div>
                                    <div class="container table-responsive-lg ">
                                        <table class="table table-striped table-light rounded">
                                            <thead class="text-white" style="background-color: #120851;">

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
                                                    <th class="text-center">{{$pre->getUser->name}} {{$pre->getUser->firstname}}
                                                    </th>
                                                    <th class="text-center">{{$pre->getEtat->etat}} </th>
                                                    <th class="text-center">{{$pre->getEtatfinal->etatfinal}} </th>
                                                    <th class="text-center">
                                                        @if ($pre->note)

                                                        {{$pre->note}}
                                                        @else
                                                        <div class="text-center">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </div>
                                                        @endif
                                                    </th>
                                                    <th class="text-center">
                                                        @if ($pre->file)
                                                        <a class="btn btn-primary"
                                                            href="{{route('presence.download', $pre->id)}}">Download</a>
                                                        @else
                                                        <div class="text-center">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </div>
                                                        @endif
                                                    </th>
                                                    <td class="d-flex justify-content-center ">

                                                        <div class="text-center mb-2">
                                                            <a class="  btn btn-primary rounded-circle mx-3 "
                                                                href="{{route('user.show',$pre->user_id)}}"><i
                                                                    class="fa fa-eye"></i></a>
                                                        </div>
                                                        <div class="text-center mb-2">
                                                            <a class="  btn btn-warning rounded-circle mx-3 text-white"
                                                                href="{{route('presence.edit',$pre)}}"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                        </div>

                                                    </td>
                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endcan
                    @endif

                </div>

            </div>
        </div>










    </div>


    @include('components/footer-page')
    <script src="{{asset('/js/profil.js')}}"></script>

    <script>
        let main = document.querySelector('.main');
        let btnDelete = document.querySelector('.deleteEl');
        btnDelete.addEventListener('click', () => {
            main.style.position = 'static';
            btnDelete.classList.add('click');
        })


        let btnAnnuler = document.querySelectorAll('.btnAnnuler');
        btnAnnuler.forEach(element => {
            element.addEventListener('click', () => {
                console.log('saluuuuut');
                main.style.position = 'relative';

            })

            // let page= document.querySelector('.profile-page');
            // document.addEventListener('click',()=>{
            // if((main.style.position == 'static') &&((btnDelete.classList.contains("click")))) {
            //    location.reload();
            // }
            // })

        });

    </script>

</body>




@endsection
