@extends('adminlte::page')

@section('title', 'Edit About')

@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">Edit About </h1>
        <hr class="bg-dark">
    </div>
</div>
@stop

@section('content')


<div class="mb-5">
<div class="container mb-5">

    <form action="{{route('about.update',$about)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group ">
            <label class="h3" for="img">Image :</label>
            <div class="custom-file">

                <input type="file" name="img" value="{{$about->img}}"
                    class="custom-file-input @error('img') is-invalid @enderror" id="img">
                <label class="custom-file-label" for="inputGroupFile01">Choose logo</label>
                @error('img')
                <div class="alert alert-danger">{{  $message  }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group ">
            <label class="h3" for="titre ">Titre :</label>
            <input value="{{$about->titre}}" type="text" name="titre"
                class="form-control @error('titre') is-invalid @enderror" id="titre">
            @error('titre')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label class="h3" for="texte ">Texte :</label>
            <input value="{{$about->texte}}" type="text" name="texte"
                class="form-control @error('texte') is-invalid @enderror" id="texte">
            @error('texte')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        
        
    </div>


        <div class="text-center">

            <button type="submit" class="btn btn-outline-dark">Submit</button>
        </div>

    </form>
</div>

</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/users.css">
@stop

@section('js')

@stop