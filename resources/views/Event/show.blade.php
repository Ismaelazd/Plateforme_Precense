@extends('layouts/master')
@section('content')


     <nav class="navbar-dark bg-primary mb-3 ">
        <a href="#" class="navbar-brand">Mon evenement</a>
        <a  class="navbar-brand float-right" href="{{route('calendrier')}}" class="navbar-brand">retour au calendrier</a>
    </nav>

    <h2>Evenement : {{$event->nom}}</h2>
    <ul>
        <li>Classe: {{$event->classe->name}}</li> 
        <li>Date: {{ (new \DateTime($event->start))->format('d/m/Y')}}</li>
        <li>Heure de débutte: {{ (new \DateTime($event->start))->format('H:i')}}</li>
        <li>Heure de fin: {{ (new \DateTime($event->end))->format('H:i')}}</li>
        @if ($event->description)
            <li>Description: {{$event->description}}</li> 
        @endif
        
    </ul>


    <a href="{{route('event.edit',$event)}}" class="btn btn-warning" >editer</a>
    <a href="{{route('event.edit',$event)}}" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteEvent{{$event->id}}">Supprimer</a>
 

    




    
  <div class="modal fade" id="modalDeleteEvent{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header ">
          <h4 class="modal-title">Attention!!!</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <p>Vous êtes sur le point de supprimer l'évènement "{{ucfirst($event->nom)}}"! <br> Cette action n'est pas reversible!</p>
        </div>
        <div class="modal-footer float-right">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
          <form action="{{route('event.destroy',$event)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-light">Supprimer</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
   

  

