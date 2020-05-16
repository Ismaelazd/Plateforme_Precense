@extends('adminlte::page')

@section('title', 'MgConnect - Admin')

@section('content_header')
    <h1 class="m-0 text-dark text-center">Messages</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container" >
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                          <div class="container-fluid">
                            <div class="row mb-2">
                              <div class="col-sm-6">
                                <h1>Inbox</h1>
                              </div>
                              {{-- <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                                  <li class="breadcrumb-item active">Inbox</li>
                                </ol>
                              </div> --}}
                            </div>
                          </div><!-- /.container-fluid -->
                        </section>
                    
                        <!-- Main content -->
                        <section class="content">
                          <div class="row">
                            <div class="col-md-3">
                              <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a>
                    
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
                                  <h3 class="card-title">Inbox</h3>
                    
                                  <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                      <input type="text" class="form-control" placeholder="Search Mail">
                                      <div class="input-group-append">
                                        <div class="btn btn-primary">
                                          <i class="fas fa-search"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                  <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                      <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                                      <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                                    <div class="float-right">
                                      1-50/200
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                      </div>
                                      <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                  </div>
                                  <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped">
                                      <tbody>
                                          @if (count($messages)==0)
                                              <tr>
                                                
                                                 
                                                  <td class="mailbox-subject d-flex justify-content-center"><b class="">Boite mail vide</b>
                                                  </td>
                                                  
                                                  

                                              </tr>
                                          @else
                                          @foreach ($messages as $form)
                                            <tr style="{{$form->read ? "" : "background-color:rgb(253, 132, 132);"}}">
                                            <td>
                                              <div class="icheck-primary">
                                                <input type="checkbox" value="" id="check2">
                                                <label for="check2"></label>
                                              </div>
                                            </td>
                                            <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                            <td class="mailbox-name"><a href="{{route('form.show',$form)}}">{{$form->firstname}} {{$form->name}}</a></td>
                                            <td class="mailbox-subject"><b>{{$form->sujet}}</b></td>
                                            <td> {{Illuminate\Support\Str::limit($form->message, 15, ' (...)')}}
                                            </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">{{$form->created_at->diffForHumans()}}</td>
                                          </tr>
                                          @endforeach
                                          @endif
                                      
                                      
                                      </tbody>
                                    </table>
                                    <!-- /.table -->
                                  </div>
                                  <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer p-0">
                                  <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                      <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                                      <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                                    <div class="float-right">
                                      1-50/200
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                      </div>
                                      <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                  </div>
                                </div>
                              </div>
                              <!-- /.card -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </section>
                        <!-- /.content -->
                      </div>
                </div>
            </div>
        </div>
    </div>
@stop

