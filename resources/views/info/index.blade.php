@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">Info-Contact</h1>
        <hr class="bg-dark">
    </div>
</div>
@stop
@section('content')

    <div class="mb-5 container">
       
        <table class="table table-hover table-light">
            <thead class="bg-dark ">
                <tr>
                    <th scope="col" class="text-center">Nom de l'élément</th>
                    <th scope="col" class="text-center">Contenu de l'élément</th>
                 
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <th scope="col" class="text-center border border-dark">Rue</th>
                    <td class="text-center border border-dark">{{$info->adresse_un}}</td>
                </tr>
                <tr> 
                    <th scope="col" class="text-center border border-dark">Ville</th>
                    <td class="text-center border border-dark">{{$info->adresse_deux}}</td>
                </tr>
               <tr> 
                    <th scope="col" class="text-center border border-dark">Téléphone</th>
                    <td class="text-center border border-dark">{{$info->tel}}</td>
                </tr>
                <tr> 
                    <th scope="col" class="text-center border border-dark">Email</th>
                    <td class="text-center border border-dark">{{$info->email}}</td>
                </tr>
               
                <tr> 
                    <td colspan="2" class="text-center border border-dark bg-dark">  
                        <a class="btn btn-outline-warning " href="{{route('info.edit',$info)}}">Edit</a>   
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
@endsection