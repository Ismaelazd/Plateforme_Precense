@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">User </h1>
        <hr class="bg-dark">
    </div>
</div>
@stop

@section('content')
    



<section class="sectionUser">
    <div class="container ">
        @error('msg')
        <div class="text-danger">{{  $message  }}</div>
        @enderror
        <div class="row justify-content-center">
            @if (count($users) == 0)
            <div class="row justify-content-center">

                <div class=" text-center alert alert-dark">
                    Aucune personne trouvée...
                </div>
            </div>
            @else
            @foreach ($users as $user)

            <!--Profile Card 3-->
            <div class="col-md-4 my-3">
                <div class="card profile-card-3">
                    <div class="background-block" style="background-color: #120851;">
                        {{-- <img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                            alt="profile-sample1" class="background" /> --}}
                    </div>
                    <div class="profile-thumb-block">
                        <img src="{{asset('storage/'.$user->image)}}" alt="profile-image" class="profile" />
                    </div>
                    <div class="card-content">
                        <h2>{{$user->role->role}}
                            <small>{{$user->name}}
                            </small>
                            <small>{{$user->email}}</small>

                        </h2>
                        <div class="icon-block d-flex justify-content-center">
                            <button class="btn">

                                <a title="Edit" href="{{route('user.edit',$user)}}"><i
                                        class=" fas fa-pencil-alt"></i></a>

                            </button>

                            <form action="{{route('user.destroy',$user)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn " type="submit" title="Delete"> <i class="fa fa-trash"></i></button>

                            </form>

                            @if ($user->bigcoach)
                            <button class="btn">

                                <a title="BigCoach" href="{{route('bigcoach',$user)}}"><i
                                        class=" fas fa-user-check mx-auto"></i></a>

                            </button>
                            @else
                            <button class="btn">

                                <a title="Be bigcoach" href="{{route('bigcoach',$user)}}"><i
                                        class=" fas fa-user-times mx-auto"></i></a>

                            </button>
                            @endif
                            
                            {{-- <a title="Newsletter" class="disabled" href="{{route('newsletter.index')}}"><i
                                class="fa fa-envelope-square"></i></a> --}}

                        </div>
                    </div>
                </div>
            </div>
 
            @endforeach
            @endif

           

        </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/users.css">
@stop

@section('js')
   
@stop