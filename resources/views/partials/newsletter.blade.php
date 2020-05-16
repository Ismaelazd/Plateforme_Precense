  <!-- Register Domain Section Begin -->
  <section id="newsletter" class="register-domain spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="register__text">
                    <div class="section-title">
                        <h3>Register to our Newsletter!</h3>
                    </div>
                    @if(Session::has('newsletterSent'))
                    <div class="text-center alert alert-success">
                        {{ Session::get('newsletterSent') }}
                    </div>
                @endif
                    <div class="register__form">
                        <form action="{{route('newsletter.store')}}" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="Entrez Votre adresse email" name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                            <button type="submit" class="site-btn">Send</button>
                        </form>
                    </div>
      
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Register Domain Section End -->