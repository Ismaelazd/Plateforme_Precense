@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5 d-flex align-items-center justify-content-center">

        <h1 class="text-dark mx-2">Slides - Header</h1><span><a href="{{route('slide.create')}}" class="mx-2" title="Add"><i class="fa fa-plus-circle fa-2x text-dark"></i></a></span>
    </div>
    <hr class="bg-dark mb-4">
</div>
@stop
@section('content')

    <div class="mb-5 container"> 
         <div class="container text-center">
        
            @if (count($slides)==0)
            <div class="row justify-content-center">

                <div class="col-9 text-center alert alert-dark">
                    Il n'y a aucun slides...
                </div>
            </div>
            @else
            <div class="mb-5">
                <table class="table table-dark table-hover table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th scope="col" class="text-center">Id</th>
                            <th scope="col" class="text-center ">Sous-titre</th>
                            <th scope="col" class="text-center ">Titre 1</th>
                            <th scope="col" class="text-center ">Titre 2</th>
                            <th scope="col" class="text-center ">Image</th>
                            <th scope="col" class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($slides as $slide)
                        <tr >
                            <th scope="row" class="text-center ">{{$slide->id}}</th>
                            <td class="text-center">{{$slide->sous_titre}}</td>
                            <td class="text-center">{{$slide->titre_un}}</td>
                            <td class="text-center">{{$slide->titre_deux}}</td>
                            <td class="text-center"><img src="{{asset('storage/'.$slide->image)}}" alt="" class="w-25"></td>
                            <td class="d-flex justify-content-around ">
                            
                                <a href="{{route('slide.edit',$slide)}}" class="mx-3"> <button class="btn btn-light "  title="Edit"><i class="fa fa-pencil-alt"></i></button></a>

                                <form action="{{route('slide.destroy',$slide)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-light mx-3" type="submit" title="Delete"> <i class="fa fa-trash"></i></button>
    
                                </form>
    
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
        @endif
        </div>
 
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons/css/ionicons.css')}}">
@endsection