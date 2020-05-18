<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
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
            <h2 class="text-white mx-auto titre mb-4">Edit my Profil</h2>
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
                                <h3 class="title pt-4 ">My informations</h3>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" description  ">
                    <form action="{{route('validationchange.store',$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group  ">
                            <label style="color: #120851;" class="h3 text-left" for="name ">Nom :</label>
                            <input value="{{$user->name}}" type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name">
                            @error('name')
                            <div class="alert alert-danger">{{  $message  }}</div>
                            @enderror
                        </div>
                        <div class="form-group  ">
                            <label style="color: #120851;" class="h3" for="firstname ">Prenom :</label>
                            <input value="{{$user->firstname}}" type="text" name="firstname"
                                class="form-control @error('firstname') is-invalid @enderror" id="firstname">
                            @error('firstname')
                            <div class="alert alert-danger">{{  $message  }}</div>
                            @enderror
                        </div>
                        <div class="form-group  ">
                            <label style="color: #120851;" class="h3" for="email">Email :</label> <br>
                            <input value="{{$user->email}}" type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror " id="email">
                            @error('email')
                            <div class="alert alert-danger">{{  $message  }}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label style="color: #120851;" class="h3" for="password">Mot de passe :</label>
                            <input value="{{$user->password}}" type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password')
                            <div class="alert alert-danger">{{  $message  }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group  ">
                            <label style="color: #120851;" class="h3 text-left" for="tel ">Tel :</label>
                            <input value="{{$user->tel}}" type="text" name="tel"
                                class="form-control @error('tel') is-invalid @enderror" id="tel">
                            @error('tel')
                            <div class="alert alert-danger">{{  $message  }}</div>
                            @enderror
                        </div>
                        <div class="form-group  ">
                            <label style="color: #120851;" class="h3 text-left" for="rue ">Rue :</label>
                            <input value="{{$user->rue}}" type="text" name="rue"
                                class="form-control @error('rue') is-invalid @enderror" id="rue">
                            @error('rue')
                            <div class="alert alert-danger">{{  $message  }}</div>
                            @enderror
                        </div>
                        <div class="form-group  ">
                            <label style="color: #120851;" class="h3 text-left" for="ville ">Ville :</label>
                            <input value="{{$user->ville}}" type="text" name="ville"
                                class="form-control @error('ville') is-invalid @enderror" id="ville">
                            @error('ville')
                            <div class="alert alert-danger">{{  $message  }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-9">
                                
                                <label style="color: #120851;" class="h3" for="image">Image :</label>
                                <input value="{{$user->image}}" type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" id="image">
                            </div>
                            <div class="col-3">

                                <img src="{{asset('storage/'.$user->image)}}" alt="" class="img-fluid mx-auto" style="border-radius: 50%;">
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{  $message  }}</div>
                            @enderror
                        </div>
                        
                        <div class="text-center mt-5">
                            <button style="color: #ffff; background-color: #120851 ;" title="Edit" type="submit" class="btn  font-weight-bold">Enregistrer</button>
                
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
