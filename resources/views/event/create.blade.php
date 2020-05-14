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
                                <h3 class="title pt-4 ">Créer un évènement</h3>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <div class="card  w-75 ">

                    <form action="{{route('event.store')}}" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nom">Nom de l'évènement</label>
                                <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                    id="nom" value="@if($errors->first('nom'))@else{{ old('nom') }}@endif"
                                    placeholder="Nom de l'évènement">
                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>




                            <div class="form-group">
                                <label for="classe_id">Classe</label>
                                <select class="form-control @error('classe_id') is-invalid @enderror" name="classe_id"
                                    id="classe_id">
                                    @foreach ($classes as $classe)
                                    @if ($classe->id == old('classe_id'))
                                    <option checked value="{{$classe->id }}">{{$classe->name}} </option>
                                    @else
                                    <option value="{{$classe->id }}">{{$classe->name}} </option>
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
                                <label for="description">Description (facultatif)</label>
                                <textarea placeholder="Description" name="description"
                                    class="form-control @error('description') is-invalid @enderror" id="description"
                                    cols="30"
                                    rows="10">@if($errors->first('description'))@else{{ old('description') }}@endif</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="start">Debut</label>
                                <input name="start" type="datetime-local"
                                    class="form-control @error('start') is-invalid @enderror" id="start"
                                    value="@if($errors->first('start'))@else{{ old('start') }}@endif">
                                @error('start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end">Fin</label>
                                <input name="end" type="datetime-local"
                                    class="form-control @error('end') is-invalid @enderror" id="end"
                                    value="@if($errors->first('end'))@else{{ old('end') }}@endif">
                                @error('end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                            <a href="{{route('calendrier')}}" class="btn btn-danger">Annuler</a>
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
