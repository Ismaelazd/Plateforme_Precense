


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
            <h2 class="text-white mx-auto titre mb-4">Absence</h2>
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
                                <h3 class="title pt-4 ">Longue absence</h3>

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
                            <input class="form-control @error('debut') is-invalid @enderror" type="datetime-local" required  name="debut" id="">
                              @error('debut')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                        
                        <div class="form-group">
                            <label  for="debut">fin</label>
                            <input class="form-control @error('fin') is-invalid @enderror" type="datetime-local" required name="fin" id="">
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
