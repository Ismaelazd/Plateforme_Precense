@extends('adminlte::page')
@section('title', 'About')
@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">About</h1>
        <hr class="bg-dark">
    </div>
</div>
@stop
@section('content')

<div class="mb-5 container">

    <table class="table table-hover table-light">
        <thead class="bg-dark ">
            <tr>
                <th scope="col" class="text-center px-5 mx-5">Element</th>
                <th scope="col" class="text-center ">Contenu element about</th>


            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col" class="text-center border border-dark">Image</th>
                <td class="text-center border border-dark"><img class="w-25"
                        src="{{asset("storage/".$about->img)}}" alt=""></td>
            </tr>
            <tr>
                <th scope="col" class="text-center border border-dark">Titre</th>
                <td class="text-center border border-dark">{{$about->titre}}</td>
            </tr>
            <tr>
                <th scope="col" class="text-center border border-dark">Texte</th>
                <td class="text-center border border-dark">{{$about->texte}}</td>
            </tr>
           
            <tr>
                <td colspan="5" class="text-center border border-dark bg-dark">
                    <a class="btn btn-outline-warning " href="{{route('about.edit',$about)}}">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@stop
@section('css')
<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
@endsection