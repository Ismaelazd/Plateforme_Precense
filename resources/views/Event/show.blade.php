@extends('layouts/master')
@section('content')

@include('components.navbar-haut')

<div class="d-flex justify-content-around mt-3">
  {{--presentation de l'evenement --}}
<div>
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
</div>

{{-- Definir le statut de presence --}}



  <div class="mt-5 card  w-50">
    <div class="card-header bg-primary text-white">
      <h3 class="card-title">Definir mon statut</h3> 
    </div> 
    <form action="{{route('presence.add',$event->id)}}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="card-body">

        <div class="form-group">
          <label  for="file">Piece jointe</label>
          <input class="form-control" type="file"  name="file" id="">
            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
          <label  for="note">Note</label>
          <textarea class="form-control" name="note" id="" cols="30" rows="5" placeholder="Note"></textarea>
          @error('note')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>

      <div class="form-group">
        <label  for="etat_id">Statut</label>
          <select class="form-control" name="etat_id" id="">
            <option value="1">Présent</option>  
            <option value="2">Absent</option>  
            <option value="3">Retard</option>  
          </select>  
          @error('etat_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
    </form>
  </div>
  

    
</div>



 
@endsection
   

  

