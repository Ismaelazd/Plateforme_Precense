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
            <h2 class="text-white mx-auto titre mb-4">Calendrier</h2>
            <div class="bgTitle"></div>

        </div>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="container">
                <div class="row  py-5">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">

                            <div class="name">
                                <h3 class="title pt-4 ">Event & Présences</h3>

                                <hr>
                            </div>

                        </div>
                    </div>
                </div>

                @php
                use App\Helpers\Calendar\Month;
                use App\Helpers\Calendar\Events;
                $events = new Events();
                $month = new Month($_GET['month'] ?? null , $_GET['year'] ?? null);
                $start = $month->getStartingDay();
                $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
                $weeks = $month->getWeeks();
                $end = (clone $start)->modify('+' . (6 + 7 * ($weeks-1)) . 'days');
                $events = $events->getEventsBetweenByDay($start,$end );
                @endphp
                <div class="calendar container ">

                    <div class="d-flex container flex-row align-items-center justify-content-between  my-2">
                        <div class="d-flex align-items-center">
                            <p class="h1 my-0">{{$month->toString()}} </p>
                            <a class="calendar__list-icon " href="{{route('event.index')}}"><i
                                    class="fa fa-list"></i></a>
                        </div>



                        <div class="d-flex">
                            <a class="btn monthBtn"
                                href="/calendrier?month={{$month->previousMonth()->month}}&year={{$month->previousMonth()->year}}">&lt;</a>
                            <a class="btn monthBtn"
                                href="/calendrier?month={{$month->nextMonth()->month}}&year={{$month->nextMonth()->year}}">&gt;</a>
                        </div>

                    </div>

                    <div class="container table-responsive-lg">

                        <table class="calendar__table calendar__table--{{$month->getWeeks()}}weeks ">
                            @for ($i = 0; $i < $weeks ; $i++) <tr>
                                @foreach ($month->days as $k => $day)
                                @php
                                $date = (clone $start)->modify("+" . ($k + $i * 7) . "days");
                                $eventsForDay = $events[$date->format('Y-m-d')] ?? [];

                                @endphp
                                <td class="@if(!$month->withinmonth($date))calendar__othermonth @endif">
                                    @if ($i===0)
                                    <div class="calendar__weekday">{{$day}}</div>
                                    @endif
                                    <div class="calendar__day">{{$date->format('d')}}</div>
                                    @foreach ($eventsForDay as $event)
                                    @if (Auth::user()->classe_id == $event->classe_id || Auth::user()->role_id==1)

                                    <div class="calendar__event">

                                        {{(new \DateTime($event->start))->format('H:i')}}-{{(new \DateTime($event->end))->format('H:i')}}
                                        | <a href="{{route('event.show',$event)}}">{{$event->classe->name}} |
                                            {{$event->nom}} </a>

                                    </div>
                                    @endif

                                    @endforeach


                                </td>
                                @endforeach
                                </tr>
                                @endfor

                        </table>
                    </div>
                    @can('coach', App\User::class)

                    <div class="my-5">

                        <a href="{{route('event.create')}}" class="calendar__button">+</a>
                    </div>
                    @endcan

                </div>




            </div>
        </div>
    </div>

    @include('components/footer-page')
    <script src="{{asset('/js/profil.js')}}"></script>

</body>
