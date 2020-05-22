{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body> --}}
    


<h1 style="color:red;">Presences de la semaine</h1>
<div>

   
     @foreach ($events as $event)
        <h2 style="color:blue">Nom: {{$event->nom}}</h2>
        <h2 style="color:blue">Debut: {{$event->start}}</h2>
        <h2 style="color:blue">Fin: {{$event->end}}</h2>

           

        <table style="border: black solid 2px">       
            <thead>
                <tr>
                    <th>student</th>
                    <th>statut</th>
                    <th>statutfinal</th>
                    <th>note</th>
                    <th>fichier</th>
                    <th>signature</th>

                </tr>
            </thead>    
            <tbody>    
                @foreach (App\Presence::where('event_id',$event->id)->get() as $presence)
                    <tr>
                        <td>{{$presence->getUser->name}}</td>
                        <td>{{$presence->getEtat->etat}}</td>
                        <td>{{$presence->getEtatfinal->etatfinal}}</td>
                        <td>{{$presence->note}}</td>
                        <td>
                            @if ($presence->file)
                                oui
                            @else
                                non
                            @endif
                        </td>
                        <td></td>
                    </tr>
                    
                @endforeach
            </tbody>


        </table>
    @endforeach


</div>





{{-- 

</body>
</html> --}}