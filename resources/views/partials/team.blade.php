<!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 col-md-8 mx-auto">
                <div class="section-title ">
                    <h3>Meet our team</h3>
                </div>
            </div>
           
        </div>
        <div class="row d-flex justify-content-center">
            @foreach ($coachs as $coach)
            <div class="col-lg-6 col-md-6">
                <div class="team__item">
                    <div class="team__pic">
                        <img src="{{asset('storage/'.$coach->image)}}" alt="">
                    </div>
                    <div class="team__text pb-4">
                        <h5>{{$coach->firstname}} {{$coach->name}}</h5>
                        <span>{{$coach->role->role}}</span>

                        <div class="team__social">
                            <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- Team Section End -->