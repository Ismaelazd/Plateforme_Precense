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
                                
                                @can('coach', App\User::class)

                                <a class="ml-4 eventBtn d-flex align-items-center justify-content-center" href="{{route('event.create')}}">+</a>
                                @endcan
                            </div>
                                <hr>
                        </div>
                    </div>
                </div>
                <div class=" container  ">


                    <table class="table table-striped table-light rounded ">
                        <thead style="background-color: #120851; color: #fff">
                            
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
                                <th class="align-middle">{{$event->nom}} </th>
                                <th class="align-middle">{{$event->classe->name}} </th>
                                <td class="align-middle">{{$event->description}}</td>
                                <td class="align-middle">{{ (new \DateTime($event->start))->format('d/m/Y')}}</td>
                                <td class="align-middle">{{ (new \DateTime($event->start))->format('H:i')}}</td>
                                <td class="align-middle">{{ (new \DateTime($event->end))->format('H:i')}}</td>
                                <td class="d-flex justify-content-center ">
                                    @can('coach', App\User::class)

                                    <div class="text-center mb-2">
                                        <a class="btn rounded btn-warning text-white mx-3 "
                                            href="{{route('event.edit',$event)}}"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                    <div class="text-center">
                                        <a class="   rounded btn btn-danger mx-3 deleteEl" data-toggle="modal"
                                            data-target="#deleteEvent{{$event->id}}" href=""><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                    @endcan
                                    <div class="text-center  ">

                                    <a class="btn rounded  btn-primary text-white mx-3 "
                                            href="{{route('event.show',$event)}}"><i class="fas fa-eye"></i></a>
                                        </div>


                                </td>
                            </tr>
                            <div class="modal fade" id="deleteEvent{{$event->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-header ">
                                            <h4 class="modal-title">Attention!!!</h4>
                                            <button type="button" class="close btnAnnuler" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p>Vous êtes sur le point de supprimer l'évènement
                                                "{{ucfirst($event->nom)}}"! <br> Cette action n'est pas reversible!</p>
                                        </div>
                                        <div class="modal-footer float-right">
                                            <button type="button" class="btn btn-outline-light btnAnnuler"
                                                data-dismiss="modal">Annuler</button>
                                            <form action="{{route('event.destroy',$event)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-light btnAnnuler">Supprimer cet
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


    <script>
        let main = document.querySelector('.main');
        let btnDelete = document.querySelector('.deleteEl');
        btnDelete.addEventListener('click',()=>{
            main.style.position = 'static';
            btnDelete.classList.add('click');
        })


        let btnAnnuler = document.querySelectorAll('.btnAnnuler');
        btnAnnuler.forEach(element => {
            element.addEventListener('click',()=>{
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
