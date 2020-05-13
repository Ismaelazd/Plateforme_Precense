@extends('layouts/master')
@section('content')
    <nav class="navbar-dark bg-primary mb-3">
        <a href="{{route('calendrier')}}" class="navbar-brand">Mon calendrier</a>
        <a href="{{route('event.index')}}" class="navbar-brand float-right">Liste des évènements</a>
    </nav>

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
<div class="calendar">
    
    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1>{{$month->toString()}}</h1>
        <div>
            <a class="btn btn-primary" href="/calendrier?month={{$month->previousMonth()->month}}&year={{$month->previousMonth()->year}}">&lt;</a>
            <a class="btn btn-primary" href="/calendrier?month={{$month->nextMonth()->month}}&year={{$month->nextMonth()->year}}">&gt;</a>
        </div>

    </div>

    
    <table class="calendar__table calendar__table--{{$month->getWeeks()}}weeks container">
        @for ($i = 0; $i < $weeks ; $i++)
            <tr>
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
                        <div class="calendar__event">
                            <a href="{{route('event.show',$event)}}">
                                {{(new \DateTime($event->start))->format('H:i')}}-{{(new \DateTime($event->start))->format('H:i')}} | {{$event->classe->name}} | {{$event->nom}}
                            </a>
                        </div>
                           
                       @endforeach

                    </td> 
                @endforeach
                

            </tr>
        @endfor

    </table>

    <a href="{{route('event.create')}}" class="calendar__button">+</a>

</div>



@endsection

