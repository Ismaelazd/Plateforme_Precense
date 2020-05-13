@extends('layouts/master')
@section('content')

<div class="d-flex justify-content-center mt-3">
    <div class="card  w-75 ">
        <div class="card-header bg-primary text-white">
          <h3 class="card-title">Creer un évènement</h3>
        </div>
    <form action="{{route('event.store')}}" method="post">
        @csrf
        <div class="card-body">

        <div class="form-group">
            <label for="nom">Nom de l'évènement</label>
            <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" value="@if($errors->first('nom'))@else{{ old('nom') }}@endif" placeholder="Nom de l'évènement">
            @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
 
        <div class="form-group">
            <label for="class">Nom de la classe</label>
            <input name="class" type="text" class="form-control @error('class') is-invalid @enderror" id="class" value="@if($errors->first('class'))@else{{ old('class') }}@endif" placeholder="Nom de la classe">
            @error('class')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>



         {{-- quand la table classe sera créée  --}}


        {{-- <div class="form-group">
            <label for="class_id">Classe</label>
            <select class="form-control @error('class_id') is-invalid @enderror" name="class_id" id="class_id">
                @foreach ($classes as $classe)
            @if ($classe->id == old('class_id'))
                        <option checked value="{{$classe->id }}">{{$categorie->classe}} </option>
                    @else
                        <option value="{{$classe->id }}">{{$classe->classe}} </option>
                    @endif
                @endforeach
            </select>
            @error('class_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> --}}
        
        <div class="form-group">
            <label for="description">Description (facultatif)</label>
            <textarea placeholder="Description" name="description"  class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">@if($errors->first('description'))@else{{ old('description') }}@endif</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="start">Debut</label>
            <input name="start" type="datetime-local" class="form-control @error('start') is-invalid @enderror" id="start" value="@if($errors->first('start'))@else{{ old('start') }}@endif" >
            @error('start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="end">Fin</label>
            <input name="end" type="datetime-local" class="form-control @error('end') is-invalid @enderror" id="end" value="@if($errors->first('end'))@else{{ old('end') }}@endif" >
            @error('end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="{{route('calendrier')}}" class="btn btn-danger">Annuler</a>
        </div>


    </form>
</div>
</div>

    
@endsection
   

  

