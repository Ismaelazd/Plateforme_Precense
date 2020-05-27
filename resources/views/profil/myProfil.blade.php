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
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/dist/css/adminlte.css')}}">
</head>

<body class="profile-page">
    @include('components/navbar-page')

    <div id="profilHeader" class="page-header header-filter " data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">

        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Your Profil</h2>
            <div class="bgTitle"></div>

        </div>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{asset('storage/'.$user->image)}}" alt="Circle Image"
                                    class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">{{$user->name}} {{$user->firstname}}</h3>
                                <h6>{{$user->role->role}} @if($user->classe_id)- {{$user->classe->name}}@endif </h6>
                                {{-- <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a> --}}
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" description  text-center">
                    <div class="row my-3 ">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa fa-2x fa-at"></i>
                        </div>
                        <div class="col-9">
                            <p>{{$user->email}}</p>
                        </div>
                    </div>
                    @if (!(is_null($user->tel)))

                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa fa-2x fa-phone"></i>
                        </div>
                        <div class="col-9">
                            <p>{{$user->tel}}</p>
                        </div>
                    </div>
                    @endif
                    @if (!(is_null($user->rue) || is_null($user->ville)))
                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa fa-2x fa-map-pin"></i>
                        </div>
                        <div class="col-9">
                            <p>{{$user->rue}}, {{$user->ville}}</p>
                        </div>
                    </div>
                    @endif
                    @if (!(is_null($user->facebook)))

                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa-2x fab fa-facebook"></i>
                        </div>
                        <div class="col-9">
                            <p><a href="{{$user->facebook}}">{{$user->facebook}}</a></p>
                        </div>
                    </div>
                    @endif
                    @if (!(is_null($user->twitter)))

                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa-2x fab fa-twitter"></i>
                        </div>
                        <div class="col-9">
                            <p><a href="{{$user->twitter}}">{{$user->twitter}}</a></p>
                        </div>
                    </div>
                    @endif
                    @if (!(is_null($user->linkedin)))

                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa-2x fab fa-linkedin"></i>
                        </div>
                        <div class="col-9">
                            <p><a href="{{$user->linkedin}}">{{$user->linkedin}}</a></p>
                        </div>
                    </div>
                    @endif
                    @if (!(is_null($user->instagram)))

                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa-2x fab fa-instagram"></i>
                        </div>
                        <div class="col-9">
                            <p><a href="{{$user->instagram}}">{{$user->instagram}}</a></p>
                        </div>
                    </div>
                    @endif
                    @if (!(is_null($user->github)))

                    <div class="row my-3">
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <i class="fa-2x fab fa-github"></i>
                        </div>
                        <div class="col-9">
                            <p><a href="{{$user->github}}">{{$user->github}}</a></p>
                        </div>
                    </div>
                    @endif

                </div>

                <form action="{{route('myProfil.edit',$user)}}" method="get" class="text-center mt-5 ">
                    <button style="color: #ffff; background-color: #120851 ;" title="Edit" type="submit" class="btn"><i
                            class="fa fa-pencil-alt fa-2x"></i></button>
                </form>



                <div class="row mt-5 pt-5">


                </div>



                @cannot('visiteur', App\User::class)

                {{-- liste des évènements --}}


                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                @cannot('coach', App\User::class)

                                <li class="nav-item">
                                    <a class="nav-link active" href="#stat" role="tab" data-toggle="tab">
                                        <i class="material-icons">school</i>
                                        Stat
                                    </a>
                                </li>
                                @endcannot
                                <li class="nav-item ">
                                    <a class="nav-link @if(Auth::user()->role_id==2) active @endif" href="#avis" role="tab" data-toggle="tab">
                                        <i class="material-icons">folder_open</i>
                                        Avis
                                    </a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                        <i class="material-icons">event_note</i>
                                        Calendrier
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link  " href="#message" role="tab" data-toggle="tab">
                                        <i class="material-icons">message</i>
                                        Messages
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content tab-space">
                    @cannot('coach', App\User::class)
                        
                    <div class="tab-pane active text-center " id="stat">
                        <div class="row justify-content-center m-5 ">
                            <table class="table table-striped table-light rounded ">



                                <div class="text-center text-white w-100 card-header h4"
                                    style="background-color: #120851;">Mes stats</div>


                                <thead>
                                    <tr>
                                        <th scope="col" class="">Total</th>
                                        <th scope="col">Présences</th>
                                        <th scope="col">Retards</th>
                                        <th scope="col">Absences Justifiées</th>
                                        <th scope="col">Absences Injustifiées</th>
                                        <th scope="col">Absences Annoncées</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th>{{count($presences)}} jours </th>
                                        <td>{{$presences->where('etatfinal_id',1)->count()}} jours <br>
                                            %:
                                            @if (count($presences)==0)
                                            0
                                            @else
                                            {{-- {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',1)->count())/$presences*100}}
                                            --}}
                                            {{($presences->where('etatfinal_id',1)->count())/count($presences)*100}}
                                            @endif
                                        </td>

                                        <td>{{$presences->where('etatfinal_id',2)->count()}} jours <br>
                                            %:
                                            @if (count($presences)==0)
                                            0
                                            @else
                                            {{-- {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',2)->count())/$presences*100}}
                                            --}}
                                            {{($presences->where('etatfinal_id',2)->count())/count($presences)*100}}
                                            @endif</td>
                                        <td>{{$presences->where('etatfinal_id',4)->count()}} jours <br>
                                            %:
                                            @if (count($presences)==0)
                                            0
                                            @else
                                            {{-- {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',4)->count())/$presences*100}}
                                            --}}
                                            {{($presences->where('etatfinal_id',4)->count())/count($presences)*100}}
                                            @endif
                                        </td>
                                        <td>{{$presences->where('etatfinal_id',5)->count()}} jours <br>
                                            %:
                                            @if (count($presences)==0)
                                            0
                                            @else
                                            {{-- {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',5)->count())/$presences*100}}
                                            --}}
                                            {{($presences->where('etatfinal_id',5)->count())/count($presences)*100}}
                                            @endif
                                        </td>
                                        <td>{{$presences->where('etatfinal_id',6)->count()}} jours <br>
                                            %:
                                            @if (count($presences)==0)
                                            0
                                            @else
                                            {{-- {{(App\Presence::where('user_id',$user->id)->where('etatfinal_id',6)->count())/$presences*100}}
                                            --}}
                                            {{($presences->where('etatfinal_id',6)->count())/count($presences)*100}}
                                            @endif</td>

                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endcannot

                    <div class="tab-pane text-center  @if(Auth::user()->role_id==2) active @endif" id="avis">
                        <div class="row">
                            <div class="col-6 mx-auto">
                                {{-- Testimonials --}}
                                @php
                                $testi = App\Testimonial::where('user_id',$user->id)->first();
                                @endphp
                                @if ($testi)
                                <div class="card-header" style="background-color: #120851;">

                                    <h4 class="text-center text-white m-0">Mon Avis sur MG Connect</h4>
                                </div>
                                <div class="card-footer">

                                    <label for="">Mon Avis:</label>
                                    <p>{{$testi->message}}</p>
                                    <label for="">Ma note:</label>

                                    @for ($i = 0; $i < $testi->note; $i++)
                                        <i class="fa fa-star rating_good text-warning"></i>
                                        @endfor
                                        @for ($i = 5; $i > $testi->note; $i--)
                                        <i class="fa fa-star rating_bad"></i>
                                        @endfor
                                        <div class="row justify-content-center mt-5 ">

                                            <a href="{{route('testimonial.edit',$testi)}}">

                                                <button style="color: #ffff; background-color: #120851 ;" title="Edit"
                                                    type="submit" class="btn"><i class="fa fa-pencil-alt "></i></button>
                                            </a>



                                            <form class="text-center mx-2"
                                                action="{{route('testimonial.destroy', $testi)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button style="color: #ffff; background-color: #120851 ;" title="Delete"
                                                    type="submit" class="btn"><i class="fa fa-trash "></i></button>
                                            </form>
                                        </div>
                                </div>
                                @else


                                <div class="container">
                                    <div class="card-header" style="background-color: #120851;">

                                        <h4 class="text-center text-white m-0">Mon Avis sur MG Connect</h4>
                                    </div>
                                    <div class="card-footer" style="display: block;">
                                        <form class="text-center" action="{{route('testimonial.store', $user->id)}}"
                                            method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="avis">Mon avis</label>
                                                <textarea name="avis" cols="10" rows="3" placeholder="Votre avis ..."
                                                    class="form-control " required></textarea>
                                                <label for="note">Ma note sur 5</label>
                                                <select class="form-control" name="note" id="">
                                                    <option value="5">5</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                    <option value="0">0</option>
                                                </select>
                                                <span class="input-group-append justify-content-center">
                                                    <button type="submit" class="btn text-white mt-4 "
                                                        style="background-color: #120851;">Envoyer</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane text-center " id="message">
                        <div class="row">
                            <div class="col-6 mx-auto" style="
                    border-right: 3px;
                    border-left: 3px;
                    border-style: solid;
                    border-image: 
                      linear-gradient(
                        to bottom, 
                        #120851, 
                        rgba(0, 0, 0, 0)
                      ) 1 100%;">
                                {{-- Messagerie --}}
                                <div id="messagerie" style="width: 100%" class="messagerie  ">
                                    <h3 class="text-center">Messagerie</h3>
                                    <div class="card  cardutline direct-chat ">
                                        <div class="card-header  d-flex align-items-center justify-content-between"
                                            style="background-color: #120851;">
                                            <h3 class="card-title text-white">Direct Chat</h3>

                                            <div class="card-tools ml-auto">
                                                {{-- <span data-toggle="tooltip" title="3 New Messages" class="badge bg-success">3</span> --}}
                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="collapse"><i class="fas fa-minus"></i>
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
                                                <div
                                                    class="direct-chat-msg @if ($messagerie->ecrivain_id == Auth::id())  right text-right @else text-left  @endif">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span
                                                            class="direct-chat-name  @if ($messagerie->ecrivain_id == Auth::id()) float-right  @else float-left @endif">{{$messagerie->ecrivain->name}}</span>
                                                        <span
                                                            class="direct-chat-timestamp @if ($messagerie->ecrivain_id == Auth::id()) float-left @else float-right      @endif">{{$messagerie->created_at->format('d')}}
                                                            {{\Illuminate\Support\Str::limit(date('F',strtotime($messagerie->created_at)), 3, $end='')}}
                                                            {{$messagerie->created_at->format('Y H:i')}}</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img"
                                                        src="{{asset('storage/'.$messagerie->ecrivain->image)}}"
                                                        alt="Message User Image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text @if ($messagerie->ecrivain_id == Auth::id()) text-white @else  @endif"
                                                        @if ($messagerie->ecrivain_id == Auth::id())
                                                        style="background-color:
                                                        #120851;"
                                                        @else @endif>
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
                                        <div class="card-footer" style="display: block;">
                                            <form class="text-center" action="{{route('messagerie.store', $user->id)}}"
                                                method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" name="message" placeholder="Type Message ..."
                                                        class="form-control" required>
                                                    <span class="input-group-append">
                                                        <button type="submit" class="btn text-white my-0"
                                                            style="background-color: #120851;">Send</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-footer-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @endcannot


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
