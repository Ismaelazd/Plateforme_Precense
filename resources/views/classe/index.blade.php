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
                                
                                
                                <a class="ml-4 eventBtn d-flex align-items-center justify-content-center" href="{{route('classe.create')}}">+</a>
                                </div>
                                <hr>
                            

                        </div>
                    </div>
                </div>

            </div>
        </div>





        

        <div class="container ">

            <table class="table table-striped table-light rounded mx-5">
                <thead>
                    
                    <tr>
                        <th scope="col" class="text-center">Nom</th>
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $classe)

                    <tr>
                        <th class="text-center">{{$classe->name}} </th>
                        <td class="d-flex justify-content-center ">
                            <div class="text-center mb-2">
                                <a class="  btn btn-primary rounded-circle mx-3 "
                                    href="{{route('classe.show',$classe)}}"><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="text-center mb-2">
                                <a class="  btn btn-warning rounded-circle mx-3 text-white"
                                    href="{{route('classe.edit',$classe)}}"><i class="fas fa-pencil-alt"></i></a>
                            </div>
                            <div class="text-center">
                                <a class="rounded-circle btn btn-danger mx-3 " data-toggle="modal"
                                    data-target="#deleteClasse{{$classe->id}}" href=""><i class="fa fa-trash"></i></a>
                            </div>

                        </td>
                    </tr>
                    <div class="modal fade" id="deleteClasse{{$classe->id}}" tabindex="-1" role="dialog"
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
                                    <p>Vous êtes sur le point de supprimer la classe "{{ucfirst($classe->name)}}"! <br>
                                        Cette action n'est pas reversible!</p>
                                </div>
                                <div class="modal-footer float-right">
                                    <button type="button" class="btn btn-outline-light"
                                        data-dismiss="modal">Annuler</button>
                                    <form action="{{route('classe.destroy',$classe)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-light">Supprimer cette
                                            classe</button>
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
