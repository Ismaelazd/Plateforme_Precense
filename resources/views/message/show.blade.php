@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark text-center">Read mail</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                          
                          
                        </section>
                    
                        <!-- Main content -->
                        <section class="content">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-3">
                                <a href="{{route('form.index')}}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>
                    
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">Folders</h3>
                    
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <div class="card-body p-0">
                                    <ul class="nav nav-pills flex-column">
                                      <li class="nav-item active">
                                        <a href="{{route('form.index')}}" class="nav-link">
                                          <i class="fas fa-inbox"></i> Inbox
                                          <span class="badge bg-primary float-right">{{count($unread)}}</span>
                                        </a>
                                      </li>
                                      
                                      <li class="nav-item">
                                        <a href="#" class="nav-link">
                                          <i class="far fa-trash-alt"></i> Trash
                                          <span class="badge bg-primary float-right">{{count($deletedMsg)}}</span>

                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <!-- /.card-body -->
                                </div>
                               
                              </div>
                              <!-- /.col -->
                            <div class="col-md-9">
                              <div class="card card-primary card-outline">
                                <div class="card-header">
                                  <h3 class="card-title">Read Mail</h3>
                    
                                  {{-- <div class="card-tools">
                                    <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                    <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                                  </div>  --}}
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                  <div class="mailbox-read-info">
                                    <h5>Message Subject : {{$form->sujet}}</h5>
                                    <h6>{{$form->email}}
                                      <span class="mailbox-read-time float-right">{{$form->created_at->format('d-m-Y H:i')}}</span></h6>
                                  </div>
                                 
                                  <div class="mailbox-read-message">
                                    <p>{{$form->message}}</p>
                    
                                    
                                  </div>
                                  <!-- /.mailbox-read-message -->
                                </div>
                                <!-- /.card-body -->
                                
                                <!-- /.card-footer -->
                                <div class="card-footer">
                                  {{-- <div class="float-right">
                                    <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                                    <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                                  </div> --}}
                                  <div class="d-flex">

                                    <form action="{{route('form.destroy',$form)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      
                                      <button type="submit" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                                      </form>
                                    <a href="mailto:{{$form->email}}?subject=Re: {{$form->sujet}}" type="button" class="btn btn-default"><i class="fas fa-reply-all"></i> Reply</a>
                                  </div>
                                </div>
                                <!-- /.card-footer -->
                              </div>
                              <!-- /.card -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div></section>
                        <!-- /.content -->
                      </div>
                </div>
            </div>
        </div>
    </div>
@stop
