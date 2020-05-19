@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">Edit user </h1>
        <hr class="bg-dark">
    </div>
</div>
@stop

@section('content')
    

<div class="container pb-5">
    
    <form action="{{route('user.update',$user)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group ">
            <label class="h3" for="name ">Nom :</label>
            <input value="{{$user->name}}" type="text" name="name"
                class="form-control @error('name') is-invalid @enderror" id="name">
            @error('name')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label class="h3" for="firstname ">Prénom :</label>
            <input value="{{$user->firstname}}" type="text" name="firstname"
                class="form-control @error('firstname') is-invalid @enderror" id="firstname">
            @error('firstname')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label class="h3" for="email">Email :</label> <br>
            <input value="{{$user->email}}" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror" id="email">
            @error('email')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label class="h3" for="tel">Tel :</label> <br>
            <input value="{{$user->tel}}" type="tel" name="tel"
                class="form-control @error('tel') is-invalid @enderror" id="tel">
            @error('tel')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label class="h3" for="rue ">Rue :</label>
            <input value="{{$user->rue}}" type="text" name="rue"
                class="form-control @error('rue') is-invalid @enderror" id="rue">
            @error('rue')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div><div class="form-group ">
            <label class="h3" for="ville ">Ville :</label>
            <input value="{{$user->ville}}" type="text" name="ville"
                class="form-control @error('ville') is-invalid @enderror" id="ville">
            @error('ville')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="h3" for="role_id">Role :</label>
            <select class="form-control" name="role_id" id="role_id">
                @foreach ($roles as $role)
                    @if ($user->role_id == $role->id)
                        <option selected value="{{$role->id}}">{{$role->role}}</option>
                    @else
                        <option  value="{{$role->id}}">{{$role->role}}</option>
                    @endif
                @endforeach
            </select>
            @error('role_id')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="h3" for="classe_id">Classe :</label>
            <select class="form-control" name="classe_id" id="classe_id">
                @foreach ($classes as $classe)
                    @if ($user->classe_id == $classe->id)
                        <option selected value="{{$classe->id}}">{{$classe->name}}</option>
                    @else
                        <option  value="{{$classe->id}}">{{$classe->name}}</option>
                    @endif
                @endforeach
            </select>
            @error('classe_id')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-9">
                
                <label class="h3" for="image">Image :</label>
                <input value="{{$user->image}}" type="file" name="image"
                    class="form-control @error('image') is-invalid @enderror" id="image">
                    @error('image')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
            </div>
            <div class="col-3">

                <img src="{{asset('storage/'.$user->image)}}" alt="" class="img-fluid mx-auto" style="border-radius: 50%;">
            </div>
       
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