@extends('layouts/master')
@section('content')
      
<div class="d-flex justify-content-center mt-3">
    <div class="card card-primary w-75 ">
        <div class="card-header">
          <h3 class="card-title">Modifier l'évènement "{{$event->nom}}"</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('event.update',$event)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label for="nom">Nom de l'évènement</label>
                <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{ old('nom',$event->nom) }}" placeholder="Nom de l'évènement">
                @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror  
            </div>
            <div class="form-group">
                <label for="class">Nom de la classe</label>
                <input name="class" type="text" class="form-control @error('class') is-invalid @enderror" id="class" value="{{ old('class',$event->class) }}" placeholder="Nom de la classe">
                @error('class')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror  
            </div>

    
 
            {{-- quand la table classe sera créée  --}}


            {{-- <div class="form-group">
                <label  for="class_id">Classe</label>
                <select class="form-control" name="class_id" id="class_id">
                    @foreach ($classes as $classe)
                            @if ($classe->id===$event->classe_id)
                                <option selected value="{{$classe->id}}">{{$classe->classe}}</option>
                            @else
                                <option value="{{$classe->id}}">{{$classe->classe}}</option>
                            @endif
                    @endforeach
                </select>
            </div> --}}
       

    
            <div class="form-group">
                <label>Description (facultatif)</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="Description">{{ old('description',$event->description) }}
                </textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>

          @php
              $debut= (new \DateTime($event->start))->format('Y-m-d').'T'.(new \DateTime($event->start))->format('H:i');
              $fin= (new \DateTime($event->end))->format('Y-m-d').'T'.(new \DateTime($event->end))->format('H:i');
          @endphp

          <div class="form-group">
            <label for="start">Debut</label>
            <input name="start" type="datetime-local" class="form-control @error('start') is-invalid @enderror" id="start" value="{{ old('start', $debut)}}" >
            @error('start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="end">Fin</label>
            <input name="end" type="datetime-local" class="form-control @error('end') is-invalid @enderror" id="end" value="{{ old('end',$fin) }}" >
            @error('end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="{{route('event.show',$event)}}" class="btn btn-danger">Annuler</a>
          </div>
        </form>
      </div>
    </div>


    @endsection
   

  