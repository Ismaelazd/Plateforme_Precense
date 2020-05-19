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
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/dist/css/adminlte.css')}}">

</head>

<body class="profile-page">
    @include('components/navbar-page')

    <div id="profilHeader" class="page-header header-filter " data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">

        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Student</h2>
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
                            <h3 class="title pt-4 ">Student : {{$user->name}} {{$user->firstname}}</h3>

                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- profil --}}
                <div>
                    <img src="{{asset('storage/'.$user->firstname)}}" alt="">
                    <p>Classe: {{$user->classe->name}}</p> 
                    <p>Nom: {{$user->name}}</p> 
                    <p>Prénom: {{$user->firstname}}</p> 
                    <p>Email: {{$user->email}}</p> 
                    <p>Tel: {{$user->tel}}</p> 
                    <p>Adresse: {{$user->rue}} {{$user->ville}}</p> 
                </div>
                {{-- presences --}}
                <div>

                    <p>Total: {{$total}} jours</p> 
                    <p>Presences: {{App\Presence::where('user_id',$user->id)->where('etatfinal_id',1)->count()}} jours <br>
                    %: 
                    @if ($total==0)
                        0
                    @else
                        {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',1)->count())/$total*100}}
                    @endif
                    </p> 

                    <p>Retards: {{App\Presence::where('user_id',$user->id)->where('etatfinal_id',2)->count()}} jours <br>
                    %: 
                    @if ($total==0)
                        0
                    @else
                        {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',2)->count())/$total*100}} 
                    @endif
                    </p> 

                    <p>Absences: {{App\Presence::where('user_id',$user->id)->where('etatfinal_id',3)->count()}} jours <br>
                    %: 
                    @if ($total==0)
                        0
                    @else
                        {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',3)->count())/$total*100}} 
                    @endif
                    </p> 

                    <p>Justifiées: {{App\Presence::where('user_id',$user->id)->where('etatfinal_id',4)->count()}} jours <br>
                    %: 
                    @if ($total==0)
                        0
                    @else
                        {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',4)->count())/$total*100}} 
                    @endif
                    </p> 

                    <p>Injustifiées: {{App\Presence::where('user_id',$user->id)->where('etatfinal_id',5)->count()}} jours <br>
                    %:
                    @if ($total==0)
                        0
                    @else
                        {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',5)->count())/$total*100}} 
                    @endif
                    </p> 

                    <p>Annoncées: {{App\Presence::where('user_id',$user->id)->where('etatfinal_id',6)->count()}} jours <br>
                    %: 
                    @if ($total==0)
                        0
                    @else
                        {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',6)->count())/$total*100}} 
                    @endif
                    </p> 

                </div>
                {{-- Messagerie --}}
                <div id="messagerie" style="width: 400px" class="messagerie container">
                    <h3 class="text-center">Messagerie</h3>
                    <div class="card  cardutline direct-chat " >
                        <div class="card-header  d-flex align-items-center justify-content-between" style="background-color: #120851;">
                          <h3 class="card-title text-white">Direct Chat</h3>
          
                          <div class="card-tools ml-auto">
                            {{-- <span data-toggle="tooltip" title="3 New Messages" class="badge bg-success">3</span> --}}
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                              <i class="fas fa-comments"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button> --}}
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                          <!-- Conversations are loaded here -->
                          <div class="direct-chat-messages">

                            @foreach ($messageries as $messagerie)
                            
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg @if ($messagerie->ecrivain_id == Auth::id())  right @else   @endif">    
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name  @if ($messagerie->ecrivain_id == Auth::id()) float-right  @else float-left @endif">{{$messagerie->ecrivain->name}}</span>
                                <span class="direct-chat-timestamp @if ($messagerie->ecrivain_id == Auth::id()) float-left @else float-right      @endif">{{$messagerie->created_at->format('d')}} {{\Illuminate\Support\Str::limit(date('F',strtotime($messagerie->created_at)), 3, $end='')}} {{$messagerie->created_at->format('Y H:i')}}</span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <img class="direct-chat-img" src="{{asset('storage/'.$messagerie->ecrivain->image)}}" alt="Message User Image">
                              <!-- /.direct-chat-img -->
                              <div class="direct-chat-text @if ($messagerie->ecrivain_id == Auth::id()) text-white @else  @endif" @if ($messagerie->ecrivain_id == Auth::id()) style="background-color: #120851;" @else  @endif>
                                {{$messagerie->message}}
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                            @endforeach
                        
                          </div>
                          <!--/.direct-chat-messages-->
          
                         
                         
                        </div>
                        <!-- /.card-body -->
                        <div  class="card-footer" style="display: block;">
                          <form class="text-center" action="{{route('messagerie.store', $user->id)}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control " required>
                               
                              <span class="input-group-append">
                                <button type="submit" class="btn text-white my-0" style="background-color: #120851;" >Send</button>
                              </span>
                            </div>
                           
                          </form>
                        </div>
                        <!-- /.card-footer-->
                      </div>
                   
                </div>
                {{-- liste des évènements --}}
                <div class=" container  ">


                    <table class="table table-striped table-light rounded ">
                        <thead>
                            
                            <tr >
                                <th scope="col" class="">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Note</th>
                                <th scope="col">Justificatif</th>
                                <th scope="col">Statut final</th>
                              
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->getEvents as $event)
                            @php
                                $presence = App\Presence::where('event_id',$event->id)->where('user_id',$user->id)->first();
                            @endphp
                                <tr>
                                    <th>{{$event->nom}} </th>
                                    <td>{{$event->description}}</td>
                                    <td>{{ (new \DateTime($event->start))->format('d/m/Y')}}</td>
                                    <td>{{$presence->getEtat->etat}}</td>
                                    <td>
                                        @if ($presence->note)

                                            {{$presence->note}}
                                        @else
                                        <div class="text-center">
                                           <i  class="fas fa-times-circle text-danger"></i>
                                        </div>
                                       @endif
                                    </td>
                                    <td>
                                        @if ($presence->file)
                                        <a class="btn btn-primary" href="{{route('presence.download', $presence->id)}}">Download</a>
                                        @else
                                         <div class="text-center">
                                            <i  class="fas fa-times-circle text-danger"></i>
                                         </div>
                                        @endif
                                    </td>
                                    <td>{{$presence->getEtatFinal->etatfinal}}</td>
                                    <td class="d-flex justify-content-center ">
                                        <div class="text-center mb-2">
                                            <a class="btn rounded btn-warning text-white mx-3 "
                                                href="{{route('presence.edit',$presence)}}"><i class="fa fa-pencil"></i></a>
                                        </div>
                               

                                    </td>
                                </tr>
                          
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
    <script src="{{asset('/vendor/adminlte/dist/js/adminlte.js')}}"></script>


</body>
