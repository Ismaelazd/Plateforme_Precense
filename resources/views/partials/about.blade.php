<!-- About Section Begin -->
<section id="about" class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about__img">
                    <img src="{{asset('storage/'.$about->img)}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__text">
                    <h2>{{$about->titre}}</h2>
                    <p>{{$about->texte}}</p>
                    <div class="about__achievement">
                        <div class="about__achieve__item">
                            <span class="fas fa-user "></span>
                            <h4 class="achieve-counter">2468</h4>
                            <p>Coachs</p>
                        </div>
                        <div class="about__achieve__item">
                            <span class="fa fa-users"></span>
                            <h4 class="achieve-counter">2468</h4>
                            <p>Students</p>
                        </div>
                        <div class="about__achieve__item">
                            <span class="fas fa-graduation-cap"></span>
                            <h4 class="achieve-counter">2468</h4>
                            <p>Classes</p>
                        </div>
                        <div class="about__achieve__item">
                            <span class="fas fa-layer-group"></span>
                            <h4 class="achieve-counter">2468</h4>
                            <p>Lessons</p>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Get started now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->