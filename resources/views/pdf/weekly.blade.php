<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Présences</title>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
</head>

<body>



    <h1 style="background-color: #120851; color: white; text-align: center; padding: 25px 25px; margin-bottom: 65px">Présences de la semaine
    </h1>
    <div>


        @foreach ($events as $event)
        <div style="display: inline; width : 100%; ">

            <h2 style="color:#120851; display: inline; ">Event: {{$event->nom}}</h2>
            <div style="display: inline; text-align: end">
                @php
                $debut = new Carbon\Carbon($event->start);
                $fin = new Carbon\Carbon($event->end);
                $date = new Carbon\Carbon($event->start);
                @endphp
                <h5 style="color:#120851; display: inline; ">Le {{$debut->format('d/m/Y')}}</h5>
                <h5 style="color:#120851; display: inline; ">, de {{$debut->format('H:i')}}</h5>
                <h5 style="color:#120251; display: inline; ">à {{$fin->format('H:i')}}</h5>
            </div>
        </div>

        <div>
            <table style="border: black solid 2px; margin-bottom: 25px; margin-top: 10px; padding: 0px; width: 100% ">
                <thead style="border-bottom: #120251 solid 2px; padding: 0px ">
                    <tr>
                        <th>Student</th>
                        <th>Statut</th>
                        <th>Statut final</th>
                        <th style="padding: 0px 35px">Note</th>
                        <th style="padding: 0px 15px;">Fichier</th>
                        <th style="padding: 0px 25px">Signature</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Presence::where('event_id',$event->id)->get() as $presence)
                    @if($loop->last)
                    <tr style="border-bottom: #120251 solid 2px;">
                        <td
                            style="padding: 13px 8px;  border-right: #120251 solid 2px;">
                            {{$presence->getUser->name}}  {{$presence->getUser->firstname}}</td>
                        <td
                            style="padding: 13px 8px;  border-right: #120251 solid 2px;">
                            {{$presence->getEtat->etat}}</td>
                        <td
                            style="padding: 13px 8px;  border-right: #120251 solid 2px;">
                            {{$presence->getEtatfinal->etatfinal}}</td>
                        <td
                            style="padding: 13px 8px;  border-right: #120251 solid 2px;">
                            {{$presence->note}}</td>
                        <td
                            style="padding: 13px 8px;  border-right: #120251 solid 2px;  text-align: center">
                            @if ($presence->file)
                            oui
                            @else
                            non
                            @endif
                        </td>
                        <td style="padding: 13px 8px; "></td>
                    </tr>

                    @else
                    <tr style="border-bottom: #120251 solid 2px;">
                        <td
                            style="padding: 13px 8px; border-bottom: #120251 solid 2px; border-right: #120251 solid 2px;">
                            {{$presence->getUser->name}} <br> {{$presence->getUser->firstname}}</td>
                        <td
                            style="padding: 13px 8px; border-bottom: #120251 solid 2px; border-right: #120251 solid 2px;">
                            {{$presence->getEtat->etat}}</td>
                        <td
                            style="padding: 13px 8px; border-bottom: #120251 solid 2px; border-right: #120251 solid 2px;">
                            {{$presence->getEtatfinal->etatfinal}}</td>
                        <td
                            style="padding: 13px 8px; border-bottom: #120251 solid 2px; border-right: #120251 solid 2px;">
                            {{$presence->note}}</td>
                        <td
                            style="padding: 13px 8px; border-bottom: #120251 solid 2px; border-right: #120251 solid 2px;  text-align: center">
                            @if ($presence->file)
                            oui
                            @else
                            non
                            @endif
                        </td>
                        <td style="padding: 13px 8px;border-bottom: #120251 solid 2px; "></td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>


            </table>
        </div>

        @endforeach


    </div>







</body>
{{-- <script src="{{asset('js/app.js')}}"></script> --}}

</html>
