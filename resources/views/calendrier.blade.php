<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendrier</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <nav class="navbar-dark bg-primary mb-3">
        <a href="{{route('calendrier')}}" class="navbar-brand">Mon calendrier</a>
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
        $events = $events->getEventsBetween($start,$end );

    @endphp

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1>{{$month->toString()}}</h1>
        <div>
            <a class="btn btn-primary" href="/calendrier?month={{$month->previousMonth()->month}}&year={{$month->previousMonth()->year}}">&lt;</a>
            <a class="btn btn-primary" href="/calendrier?month={{$month->nextMonth()->month}}&year={{$month->nextMonth()->year}}">&gt;</a>
        </div>

    </div>

    
    <table class="calendar__table calendar__table--{{$month->getWeeks()}}weeks">
        @for ($i = 0; $i < $weeks ; $i++)
            <tr>
                @foreach ($month->days as $k => $day)
                @php
                    $date = (clone $start)->modify("+" . ($k + $i * 7) . "days")
                @endphp
                   <td class="@if(!$month->withinmonth($date))calendar__othermonth @endif">
                       @if ($i===0)
                           <div class="calendar__weekday">{{$day}}</div>
                       @endif
                       <div class="calendar__day">{{$date->format('d')}}</div>

                    </td> 
                @endforeach
                

            </tr>
        @endfor

    </table>





</body>
</html>

