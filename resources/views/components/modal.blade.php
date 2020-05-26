<!--Modal: Login / Register Form-->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!--Modal cascading tabs-->
        <div class="modal-c-tabs">
            <div class="modal-title">
                <h2>MGConnect</h2>
            </div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3 justify-content-center" role="tablist">
            
            <li class="nav-item mx-2">
              <a class="nav-link active" data-toggle="tab" href="#login" role="tab"><i class="fas fa-user mr-1"></i>
                Login</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" data-toggle="tab" href="#register" role="tab"><i class="fas fa-user-plus mr-1"></i>
                Register</a>
            </li>
          </ul>
  
          <!-- Tab panels -->
          <div class="tab-content">
            <!--Panel 7-->
            <div class="tab-pane fade in show active" id="login" role="tabpanel">
  
              <!--Body-->
              <div class="modal-body mb-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class=" mb-3">
                  <input type="email" id="modalLRInput10" class="form-control " required name="email" placeholder="Email">
                </div>
  
                <div class="mb-3">
                  <input type="password" id="modalLRInput11" class="form-control" required name="password" placeholder="Password">
                </div>
                <div class="text-center mt-4">
                    <input type="submit" class="form-control " name="submit" value="Submit Button">
                </div>
            </form>
              </div>
              <!--Footer-->
              {{-- <div class="modal-footer">
                <div class="options text-center text-md-right mt-1">
                  <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                  <p>Forgot <a href="#" class="blue-text">Password?</a></p>
                </div>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
              </div> --}}
  
            </div>
            <!--/.Panel 7-->
  
            <!--Panel 8-->
            <div class="tab-pane fade" id="register" role="tabpanel">
  
              <!--Body-->
              <div class="modal-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                        placeholder="Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                        name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus
                        placeholder="Firstame">
                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                        placeholder="Password" >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="password-confirm" type="password" class="form-control mt-2"
                        name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    <input type="submit" class="form-control" name="submit" value="Submit Button" >

                </form>
  
              </div>
              <!--Footer-->
              {{-- <div class="modal-footer">
                <div class="options text-right">
                </div>
              </div> --}}
            </div>
            <!--/.Panel 8-->
          </div>
  
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Login / Register Form-->
