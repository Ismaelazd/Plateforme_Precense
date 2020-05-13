@extends('layouts/master')
@section('content')

<div class="d-flex justify-content-center mt-3">
    <div class="card  w-75 ">
        <div class="card-header bg-primary text-white">
          <h3 class="card-title">Creer une classe</h3>
        </div>
    <form action="{{route('classe.store')}}" method="post">
        @csrf
        <div class="card-body">

        <div class="form-group">
            <label for="name">Nom de l'évènement</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="@if($errors->first('name'))@else{{ old('name') }}@endif" placeholder="Nom de la classe">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
 
    </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="{{route('classe.index')}}" class="btn btn-danger">Annuler</a>
        </div>


    </form>
</div>
</div>

    
@endsection
   

  

