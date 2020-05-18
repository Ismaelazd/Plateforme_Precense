 <!-- Testimonial Section Begin -->
 <section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Our students say</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial__slider owl-carousel">
                @foreach ($testimonials as $testimonial)
                    
                    <div class="col-lg-4 h-100">
                        <div class="testimonial__item d-flex flex-column justify-content-between">
                            <img src="{{asset('storage/'.$testimonial->getUser->image)}}" alt="">
                            <div>

                                <h5>{{$testimonial->getUser->name}}</h5>
                                <span>{{$testimonial->getUser->getRole->role}}</span>
                                <p>{{$testimonial->message}}</p>
                            </div>
                            <div class="testimonial__rating ">
                                @for ($i = 0; $i < $testimonial->note; $i++)
                                    <i class="fa fa-star rating_good"></i>
                                @endfor
                                @for ($i = 5; $i > $testimonial->note; $i--)
                                    <i class="fa fa-star rating_bad"></i>
                                @endfor
                                
                            </div>
                        </div>
                    </div>
                @endforeach

{{--                 
                <div class="col-lg-4">
                    <div class="testimonial__item">
                        <img src="img/testimonial/testimonial-2.jpg" alt="">
                        <h5>Billie Eilish</h5>
                        <span>Designer</span>
                        <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                            et dolore magna aliqua.</p>
                        <div class="testimonial__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial__item">
                        <img src="img/testimonial/testimonial-3.jpg" alt="">
                        <h5>Billie Eilish</h5>
                        <span>Designer</span>
                        <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                            et dolore magna aliqua.</p>
                        <div class="testimonial__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial__item">
                        <img src="img/testimonial/testimonial-1.jpg" alt="">
                        <h5>Billie Eilish</h5>
                        <span>Designer</span>
                        <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                            et dolore magna aliqua.</p>
                        <div class="testimonial__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial__item">
                        <img src="img/testimonial/testimonial-2.jpg" alt="">
                        <h5>Billie Eilish</h5>
                        <span>Designer</span>
                        <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                            et dolore magna aliqua.</p>
                        <div class="testimonial__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->