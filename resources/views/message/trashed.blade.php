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
                              <a href="mailto:" class="btn btn-primary btn-block mb-3">Compose</a>
                    
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
                                        <span class="badge bg-primary float-right">{{count($messages)}}</span>

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
                                  <h3 class="card-title">Trash</h3>
                    
                                  {{-- <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                      <input type="text" class="form-control" placeholder="Search Mail">
                                      <div class="input-group-append">
                                        <div class="btn btn-primary">
                                          <i class="fas fa-search"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div> --}}
                                  <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                  <div class="mailbox-controls">
                                    <!-- Check all button -->
                                   <h4>Corbeille</h4>
                                  </div>
                                  <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped">
                                      @if (count($messages)!=0)
                                      <thead>
                                        <tr>
                                            <th scope="col" class="">Prénom Nom</th>
                                            <th scope="col">Sujet</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Reçus</th>
                                            <th scope="col">Actions</th>
    
                                        </tr>
                                    </thead>
                                    @endif
                                      <tbody>
                                          @if (count($messages)==0)
                                              <tr>
                                                
                                                 
                                                  <td class="mailbox-subject d-flex justify-content-center"><b class="">Corbeille vide</b>
                                                  </td>
                                                  
                                                    

                                              </tr>        
                                          @else
                                          @foreach ($messages as $form)
                                            <tr style="{{$form->read ? "" : "background-color:rgb(253, 132, 132);"}}">
                                            {{-- <td>
                                              <div class="icheck-primary">
                                                <input type="checkbox" value="" id="check2">
                                                <label for="check2"></label> 
                                              </div>
                                            </td>    --}}
                                            @php
                                                $nom =$form->firstname . ' ' . $form->name;
                                            @endphp
                                            <td class="mailbox-name">{{Illuminate\Support\Str::limit($nom, 18, ' (...)')}}</td>
                                            <td class="mailbox-subject"><b>{{Illuminate\Support\Str::limit($form->sujet, 15, ' (...)')}}</b></td>
                                            <td> {{Illuminate\Support\Str::limit($form->message, 15, ' (...)')}}
                                            </td>
                                            <td class="mailbox-date">{{$form->created_at->diffForHumans()}}</td>
                                            <td class="d-flex">
                                              <form action="{{route('form.forceDestroy',$form->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Supprimer définitivement" class="btn btn-outline-dark mx-1"><i class="far fa-trash-alt"></i> </button>
                                              </form>
                                              <form action="{{route('form.restore',$form->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" title="Récupérer" class="btn btn-outline-dark mx-1"><i class="fas fa-undo"></i> </button>
                                              </form>
                                            </td>
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

                                    <div class="float-right">
                                      {{ $messages->links() }}
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

