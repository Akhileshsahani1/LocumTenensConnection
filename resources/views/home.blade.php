<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Locum Tenense Conneciton</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <!-- CSS Files -->
    <!-- <link href="{{ asset('Homeassets/vendor/aos/aos.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('Homeassets/vendor/bootstrap/css/bootstrap.min.css' )}}" rel="stylesheet">
    <link href="{{ asset('Homeassets/vendor/bootstrap-icons/bootstrap-icons.css' )}}" rel="stylesheet">
    <link href="{{ asset('Homeassets/vendor/boxicons/css/boxicons.min.css' )}}" rel="stylesheet">
    <link href="{{ asset('Homeassets/vendor/swiper/swiper-bundle.min.css' )}}" rel="stylesheet">
    <link href="{{ asset('Homeassets/css/style.css' )}}" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="tel:(014) 5548-855">(014) 5548-855</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#services">Dental Practices</a></li>
                    <li><a class="nav-link scrollto" href="#services">Dental Professionals</a></li>
                    <li><a class="nav-link scrollto" href="#about">About Us</a></li>
                    <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center video-bg">
        <video src="{{ asset('Homeassets/img/black-13495.mp4') }}" preload="auto" autoplay="true" muted="true"
            loop="true" controls="false"></video>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 d-flex flex-column justify-content-center align-items-center pt-4 mx-auto"
                    data-aos="fade-up" data-aos-delay="200">
                    @if(!empty($banner->logo))
                    <img src="{{ asset('/Admin/home/'.$banner->logo) }}" class="img-fluid mb-3" width="100" alt=""
                        style="border-radius:50%">
                    @endif
                    <div class="text-uppercase text-white me-3 mb-2"><span>Locum Tenens Connection</span></div>
                    <h1>
                        @if(!empty($banner->firstHeading))
                        {{$banner->firstHeading}}
                        @endif
                    </h1>
                    <h2 class="mb-5">"
                        @if(!empty($banner->lastHeading))
                        {{$banner->lastHeading}}
                        @endif "
                    </h2>
                </div>
            </div>
        </div>


    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Our Mission</h2>
                    <p class="text text-white">
                        @if(!empty($our_mission->our_mission_contents))
                        {{ $our_mission->our_mission_contents }}
                        @endif
                    </p>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><img src="{{ asset('Homeassets/img/Pactic.png') }}"></div>
                            <h4><a href="{{route('practice.home')}}">Dental Practices</a></h4>
                            <p class="justify-content-center fw-bold">
                                @if(!empty($our_mission->dentalpractice_para_first))
                                {{ $our_mission->dentalpractice_para_first }}
                                @endif
                            </p>
                            <p><span class='me-3 text-dark fw-bold'>Search -
                                </span><span>
                                    @if(!empty($our_mission->dentalpractice_search))
                                    {{ $our_mission->dentalpractice_search }}
                                    @endif
                                </span></p>
                            <p><span class='me-3 text-dark fw-bold'>Schudeule&nbsp;-</span>
                                <span>
                                    @if(!empty($our_mission->dentalpractice_schedule))
                                    {{ $our_mission->dentalpractice_schedule }}
                                    @endif
                                </span>
                            </p>
                            <p><span class='me-3 text-dark fw-bold'>Book - </span>
                                <span>
                                    @if(!empty($our_mission->dentalpractice_book)){{ $our_mission->dentalpractice_book }}
                                    @endif
                                </span>
                            </p>
                            <p><span class='me-3 text-dark fw-bold'>Review -
                                </span><span>@if(!empty($our_mission->dentalpractice_review)){{ $our_mission->dentalpractice_review }}@endif</span>
                            </p>
                            <div class="text-center mt-3"><a class="btn btn-info"
                                    href="{{route('practice.home')}}">CLICK HERE TO START <img
                                        src="{{ asset('Homeassets/img/right-arrow.png') }}" class="ms-2" width="20"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><img src="{{ asset('Homeassets/img/provider.png') }}"></div>
                            <h4><a href="{{ route('index') }}">Dental Professionals</a></h4>
                            <p class="justify-content-center fw-bold">
                                @if(!empty($our_mission->dentalprofessional_para_first)){{ $our_mission->dentalprofessional_para_first }}
                                @endif</p>
                            <p><span class="me-3 text-dark fw-bold">Profile -</span>
                                <span>@if(!empty($our_mission->dentalprofessional_profile)){{ $our_mission->dentalprofessional_profile }}@endif</span>
                            </p>
                            <p><span class="me-3 text-dark fw-bold">Schudeule - </span>
                                <span>@if(!empty($our_mission->dentalprofessional_schedule)){{ $our_mission->dentalprofessional_schedule }}
                                    @endif </span>
                            </p>
                            <p><span class="me-3 text-dark fw-bold">Accept -
                                </span><span>@if(!empty($our_mission->dentalprofessional_accept)){{ $our_mission->dentalprofessional_accept }}
                                    @endif</span></p>
                            <p><span class="me-3 text-dark fw-bold">Get paid -
                                </span><span>@if(!empty($our_mission->dentalprofessional_getpaid)){{ $our_mission->dentalprofessional_getpaid }}@endif</span>
                            </p>
                            <p><span class="me-3 text-dark fw-bold">Review -
                                </span><span>@if(!empty($our_mission->dentalprofessional_review)){{ $our_mission->dentalprofessional_review }}
                                    @endif</span></p>
                            <div class="text-center mt-3"><a class="btn btn-info" href="{{ route('index') }}">CLICK
                                    HERE TO START <img src="{{ asset('Homeassets/img/right-arrow.png') }}" class="ms-2"
                                        width="20"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>About Us</h2>
                </div>
                <div class="row content mt-4">
                    <div class="col-lg-6 px-5">
                        <div class="custom-heading mb-4">Why Us</div>
                        <p class="text">
                            @if(!empty($about_us->first_paragraph)) {{$about_us->first_paragraph}} @endif
                        </p>
                        <p class="text">@if(!empty($about_us->last_paragraph)){{$about_us->last_paragraph}} @endif</p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        @if(!empty($about_us->about_us_image))
                        <img src="{{ asset('Admin/home/'.$about_us->about_us_image ) }}" width="100%" class="rounded-4">
                        @endif
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->


        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="zoom-in">
                <div class="section-title">
                    <h2 class="text-white mb-5"> What Professionals Are Saying About Us</h2>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @if(count($testimonial) > 0)
                        @foreach($testimonial as $testimonial_data)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('Admin/testimonial/'.$testimonial_data->testimonial_image) }}"
                                    class="testimonial-img" alt="" style="border-radius:50%">
                                <h3>{{$testimonial_data->name}}</h3>
                                <h4>{{$testimonial_data->designation}}</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    {{$testimonial_data->description}}
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- End testimonial item -->

                        <!-- <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('Homeassets/img/team-2.jpg') }}" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis
                                    quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div> -->
                        <!-- End testimonial item -->

                        <!-- <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('Homeassets/img/team-3.jpg') }}" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim
                                    tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div> -->
                        <!-- End testimonial item -->
                        <!-- 
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('Homeassets/img/team-1.jpg' ) }}" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                    fugiat minim velit
                                    minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore
                                    illum veniam.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div> -->
                        <!-- End testimonial item -->

                        <!-- <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('Homeassets/img/team-4.jpg') }}" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa
                                    labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi
                                    cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div> -->
                        <!-- End testimonial item -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->
        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>FAQ</h2>
                    <p class="text-white text">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex
                        aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                        Quia fugiat sit
                        in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="faq-list">
                    <ul>
                        @if(count($faq) > 0)
                        @foreach ($faq as $key => $faq_data)
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-{{$key}}"> {{$faq_data->fqa_heading}}<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-{{$key}}" class="collapse" data-bs-parent=".faq-list">
                                <p>{!! html_entity_decode($faq_data->faq_description) !!}
                                </p>
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>

            </div>
        </section>
        <!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Contact</h2>
                    <p class="text mb-4">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid
                        fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate.</p>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="info">
                            <h2 class="custom-heading">Have Any Query</h2>
                            <p class="text mb-5">Contact With Us and we’ll be happy to answer any question you have.</p>
                            <div class="email d-flex align-items-stretch mb-4">
                                <img src="{{ asset('Homeassets/img/technical-support.svg') }}" width="50">
                                <div class="content-box">
                                    <div class="sub-heading dis-blk">Call Us</div>
                                    <div class="text text-g dis-blk">(014) 5548-855</div>
                                </div>
                            </div>

                            <div class="phone d-flex align-items-stretch mb-4">
                                <img src="{{ asset('Homeassets/img/letter.svg') }}" width="50">
                                <div class="content-box">
                                    <div class="sub-heading dis-blk">Email Us</div>
                                    <div class="text text-g dis-blk">demo@gmail.com</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                     
                        <form id="submit_data" class="php-email-form">
                            <div class="row mb-2 mt-2">
                                <div class="col-md-12 ">
                                <span class="text-success mb-4" id="success"></span>
                                </div>
                            </div>
                       
                            {{ method_field('POST') }}
                            @csrf

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="name">Your Name</label>

                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter Your Name" maxlength="30" require>

                                        <span class="text-danger" id="name_error"></span>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter Your Email">
                                    <span class="text-danger" id="email_error"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="5"
                                    placeholder="Enter Your Message" maxlength="1000"></textarea>
                                <span class="text-danger" id="message_error"></span>

                                <p class='text-grey text-start'><span id="charCountMessage"></span></p>
                            </div>
                            <div class="text-center"><button id="submit_data_btn" type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-bottom clearfix">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-12 footer-contact">
                        <div class="fs-4 fw-bold mb-3"><img src="{{ asset('Homeassets/img/logo.svg') }}"
                                class="img-fluid me-2" width="60" alt=""> LT Connection</div>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 text-center footer-links">
                        <ul>
                            <li><a href="#services">Dental Practices</a></li>
                            <li><a href="#services">Dental Professionals</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#faq">FAQ</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 text-center footer-links">
                        <ul>
                            <li><a href="#contact">Contact Us</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="preloader"></div>
    <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> -->
    <!--  JS Files -->
    <script src="{{ asset('Homeassets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('Homeassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Homeassets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="{{ asset('Homeassets/js/main.js') }}"></script>

    
<script>
$(document).ready(function(){
    $('#submit_data').on('submit', function(e) {
        e.preventDefault();
        var name = $('#name').val();
         
        var email = $('#email').val();
        var message = $('#message').val();
        if(name == "" ){
            
            $("#name_error").html("Name field is required");
            return false;
        }else{
            $("#name_error").html("");
        }
        if(email == ""){
            $("#email_error").html("Email field is required");
            return false;
        }else{
            $("#email_error").html("");
        }
        $.ajax({
            type: 'POST',
            url: "{{route('contactSubmit') }}",
            data: {
                name: name,
                message: message,
                email: email,
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                $("#success").html(response.message);
                var name = $('#name').val('');
                var email = $('#email').val('');
                var message = $('#message').val('');
            }
        });
    });
  
});
</script>


    <script>
    
    </script>

    <!-- message limitation character -->

    <script>
    $(document).ready(function() {
        var max_length = 1000;
        var data = $("#message").val();
        $("#message").keyup(function() {
            var len = max_length - $(this).val().length;
            if (len > 0) {
                $("#charCountMessage").removeClass('text-danger');
                $("#charCountMessage").addClass('text-grey');
                $("#charCountMessage").text(
                    'Message should not be of maximum 1000 characters length');
            } else {
                $("#charCountMessage").addClass('text-danger');
                $("#charCountMessage").removeClass('text-grey');
                $("#charCountMessage").text('Dont exceed more than 1000 characters');
            }
        });
    });
    </script>
</body>

</html>