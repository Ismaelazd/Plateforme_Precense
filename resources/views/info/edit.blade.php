@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">Edit Info-Contact </h1>
        <hr class="bg-dark">
    </div>
</div>
@stop

@section('content')


<div class="container mb-5">

    <form action="{{route('info.update',$info)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group ">
            <label class="h3" for="adresse_un ">Rue :</label>
            <input value="{{$info->adresse_un}}" type="text" name="adresse_un"
                class="form-control @error('adresse_un') is-invalid @enderror" id="adresse_un">
            @error('adresse_un')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>

        <div class="form-group ">
            <label class="h3" for="adresse_deux ">Ville :</label>
            <input value="{{$info->adresse_deux}}" type="text" name="adresse_deux"
                class="form-control @error('adresse_deux') is-invalid @enderror" id="adresse_deux">
            @error('adresse_deux')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        
        <div class="form-group ">
            <label class="h3" for="tel ">Tel:</label>
            <input value="{{$info->tel}}" type="tel" name="tel"
                class="form-control @error('tel') is-invalid @enderror" id="tel">
            @error('tel')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label class="h3" for="email ">Email :</label>
            <input value="{{$info->email}}" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror" id="email">
            @error('email')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
       
        <div class="text-center">

            <button type="submit" class="btn btn-outline-dark">Submit</button>
        </div>

    </form>
</div>



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/users.css">
@stop

@section('js')

@stop