@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')            
    <div class="row">
        <div class="col-12">
            <div class="card">             
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div> 


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{count($students)}}</h3>

                <p>Students</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning ">
            <div class="inner text-white">
                <h3>{{count($events)}}</h3>

                <p>Events</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt"></i>          
            </div>
            <a href="{{route('calendrier')}}" class="small-box-footer "><span class="text-white">More info</span>  <i class="fas fa-arrow-circle-right text-white"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h3>{{count($coachs)}}</h3>

                <p>Coachs</p>
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href="{{route('user.create')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo">
            <div class="inner">
                <h3>{{count($messages)}}</h3>

                <p>Messages</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{route('form.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{count($newsletters)}}</h3>

                <p>Classes</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{route('newsletter.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-pink">
            <div class="inner">
                <h3>{{count($classes)}}</h3>
                <p>Inscrits à la newsletter</p>
            </div>
            <div class="icon">
                <i class="far fa-newspaper"></i>
            </div>
            <a href="{{route('newsletter.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
{{-- :::: --}}
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-lime elevation-1"><i class="fas fa-thumbs-up "></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Avis positifs</span>
                <span class="info-box-number">{{round((count($testimonials->where('note','>=',3))/count($testimonials)*100),1)}} % </span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-smile-beam"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Taux de présences</span>
                <span class="info-box-number">{{round((count($presences->where('etat_id',1))/count($presences)*100),1)}} % </span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-meh text-white"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Taux de retards</span>
                <span class="info-box-number">{{round((count($presences->where('etat_id',3))/count($presences)*100),1)}} % </span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-frown"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Taux d'absences</span>
                <span class="info-box-number">{{round((count($presences->where('etat_id',2))/count($presences)*100),1)}} % </span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

       

    </div>
    {{-- liste des prochains evenements --}}

    <div class="row">
        <div class="card col-6">
            <div class="card-header ui-sortable-handle" >
            <h3 class="card-title">
                <i class="fas fa-calendar-day mr-1"></i>            
                Prochains evènements
            </h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm">
                    {{ $futurevents->links() }}

                </ul>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <ul class="todo-list ui-sortable" data-widget="todo-list">
                @foreach ($futurevents as $futurevent)
                    
                
                        <li class="" style="">  
                        {{-- <div class="icheck-primary d-inline ml-2">
                            <input type="checkbox" value="" name="todo6" id="todoCheck6">
                            <label for="todoCheck6"></label>
                        </div> --}}
                        <div>
                            <span class="text">{{$futurevent->nom}}</span> - <span class="text">{{$futurevent->classe->name}}</span>
                        
                            
                            <small class="badge badge-primary float-right"><i class="far fa-clock"></i> {{(new Carbon\Carbon($futurevent->start))->diffForHumans()}} </small>
                        
                        <div class="tools">
                            <a href="{{route('event.show',$futurevent)}}"><i class="fas fa-eye"></i></a>
                        </div>
                        </li>
                    @endforeach
            
                
            </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            <a href="{{route('event.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</a>
            </div>
        </div>
    </div>


    





@stop     
      