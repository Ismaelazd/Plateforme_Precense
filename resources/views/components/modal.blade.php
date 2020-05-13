<!-- MODAL -->
<section class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-popup">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="modal-title">
                                <h2>DEERHOST</h2>
                            </div>

                            <!-- NAV TABS -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active mx-auto"><a class="text-center" href="#sign_up" aria-controls="sign_up" role="tab"
                                        data-toggle="tab">Create an account</a></li>
                                <li class=" mx-auto"><a  href="#sign_in" aria-controls="sign_in" role="tab" data-toggle="tab">Sign In</a>
                                </li>
                            </ul>

                            <!-- TAB PANES -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="sign_up">
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
                                            placeholder="firstname">
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

                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                        <input type="submit" class="form-control" name="submit" value="Submit Button" >

                                    </form>
                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="sign_in">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus name="email" placeholder="Email">
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                            placeholder="Password" >
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="submit" class="form-control" name="submit" value="Submit Button">
                                        <a href="https://www.facebook.com/templatemo">Forgot your password?</a>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>