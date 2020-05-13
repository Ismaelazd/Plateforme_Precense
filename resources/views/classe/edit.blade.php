@extends('layouts/master')
@section('content')
      
<div class="d-flex justify-content-center mt-3">
    <div class="card card-primary w-75 ">
        <div class="card-header">
          <h3 class="card-title">Modifier la classe "{{$classe->name}}"</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('classe.update',$classe)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label for="name">Nom de la classe</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name',$classe->name) }}" placeholder="Nom de la classe">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror  
            </div>


          <!-- /.card-body -->
        </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="{{route('classe.index',$classe)}}" class="btn btn-danger">Annuler</a>
          </div>
        </form>
      </div>
    </div>


    @endsection
   

  