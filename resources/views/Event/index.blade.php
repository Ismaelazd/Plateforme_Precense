@extends('layouts/master')
@section('content')


     <nav class="navbar-dark bg-primary mb-3 ">
        <a href="#" class="navbar-brand">Liste des évènements</a>
        <a  class="navbar-brand float-right" href="{{route('calendrier')}}" class="navbar-brand">retour au calendrier</a>
    </nav>







    <div class="container ">

    <table class="table table-striped table-dark rounded">
        <thead>
            <tr class="text-center">
                <th colspan="7" class="">
                    <h1><span class="text-white font-weight-bold bg-teal px-2 rounded">Evènements</span>  </h1> 
                    <a href="{{route('event.create')}}"><i class="fa fa-plus-square fa-2x text-success"></i></a>
                </th>
            </tr>
          <tr >
            <th scope="col">Nom</th>
            <th scope="col">Classe</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Debut</th>
            <th scope="col">Fin</th>
            <th class="text-center" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                
            <tr>
                <th>{{$event->nom}} </th>
                <th>{{$event->classe->name}} </th>
                <td>{{$event->description}}</td>
                <td>{{ (new \DateTime($event->start))->format('d/m/Y')}}</td>
                <td>{{ (new \DateTime($event->start))->format('H:i')}}</td>
                <td>{{ (new \DateTime($event->end))->format('H:i')}}</td>
                <td class="d-flex justify-content-center ">              
                    <div class="text-center mb-2">
                        <a  class="  btn btn-warning rounded-circle mx-3 " href="{{route('event.edit',$event)}}"><i class="fa fa-pencil"></i></a> 
                    </div>
                    <div class="text-center">
                        <a class="   rounded-circle btn btn-danger mx-3 "  data-toggle="modal" data-target="#deleteEvent{{$event->id}}" href=""><i class="fa fa-trash"></i></a>
                    </div>
                
                </td>
            </tr>
                    <div class="modal fade" id="deleteEvent{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header ">
                            <h4 class="modal-title">Attention!!!</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body text-center">
                            <p>Vous êtes sur le point de supprimer l'évènement "{{ucfirst($event->nom)}}"! <br> Cette action n'est pas reversible!</p>
                            </div>
                            <div class="modal-footer float-right">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                            <form action="{{route('event.destroy',$event)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-light">Supprimer cet évènement</button>
                            </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
            @endforeach
      
        </tbody>
      </table>  
    </div>









@endsection
   

  

