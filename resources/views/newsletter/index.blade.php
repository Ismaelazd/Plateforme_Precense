@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">Newsletter</h1>
        <hr class="bg-dark">
    </div>
</div>
@stop
@section('content')

    <div class="mb-5 container"> 
         <div class="container text-center">
        
            @if (count($newsletters)==0)
            <div class="row justify-content-center">

                <div class="col-9 text-center alert alert-dark">
                    Il n'y a aucune newsletter...
                </div>
            </div>
            @else
            <div class="mb-5">
                <table class="table table-dark table-hover table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th scope="col" class="text-center">Id</th>
                            <th scope="col" class="text-center ">Email</th>
                            <th scope="col" class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($newsletters as $newsletter)
                        <tr>
                            <th scope="row" class="text-center">{{$newsletter->id}}</th>
                            <td class="text-center">{{$newsletter->email}}</td>
                            <td class="d-flex justify-content-around ">
                            
                                <form action="{{route('newsletter.destroy',$newsletter)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-light" type="submit" title="Delete"> <i class="fa fa-trash"></i></button>
    
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