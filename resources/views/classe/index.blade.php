@extends('layouts/master')
@section('content')


    



    <div class="container ">

    <table class="table table-striped table-dark rounded">
        <thead>
            <tr class="text-center">
                <th colspan="7" class="">
                    <h1><span class="text-white font-weight-bold bg-teal px-2 rounded">Classes</span>  </h1> 
                    <a href="{{route('classe.create')}}"><i class="fa fa-plus-square fa-2x text-success"></i></a>
                </th>
            </tr>
          <tr >
            <th scope="col">Nom</th>
            <th class="text-center" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                
            <tr>
                <th>{{$classe->name}} </th>
                <td class="d-flex justify-content-center ">              
                    <div class="text-center mb-2">
                        <a  class="  btn btn-warning rounded-circle mx-3 " href="{{route('classe.edit',$classe)}}"><i class="fa fa-pencil"></i></a> 
                    </div>
                    <div class="text-center">
                        <a class="rounded-circle btn btn-danger mx-3 "  data-toggle="modal" data-target="#deleteClasse{{$classe->id}}" href=""><i class="fa fa-trash"></i></a>
                    </div>
                
                </td>
            </tr>
                    <div class="modal fade" id="deleteClasse{{$classe->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header ">
                            <h4 class="modal-title">Attention!!!</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body text-center">
                            <p>Vous êtes sur le point de supprimer la classe "{{ucfirst($classe->name)}}"! <br> Cette action n'est pas reversible!</p>
                            </div>
                            <div class="modal-footer float-right">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                            <form action="{{route('classe.destroy',$classe)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-light">Supprimer cette classe</button>
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
   

  

