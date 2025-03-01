
<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Your Ultimate Job HTML Template">
    <meta name="keywords" content="Job, Resume, Employer, Agency">
    <link rel="canonical" href="https://html.themewant.com/jobpath">
    <meta name="robots" content="index, follow">
    <!-- for open graph social media -->
    <meta property="og:title" content="Your Ultimate Job HTML Template">
    <meta property="og:description" content="Your Ultimate Job HTML Template">
    <meta property="og:image" content="https://www.example.com/image.jpg">
    <meta property="og:url" content="https://html.themewant.com/jobpath/">
    <!-- for twitter sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Your Ultimate Job HTML Template">
    <meta name="twitter:description" content="Your Ultimate Job HTML Template">
    <!-- fabicon -->
    <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <title>SteerHubIt - About Us</title>
    <!-- rt icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/icon/css/rt-icons.css')}}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
    <!-- all plugin css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body>
    
    <!-- header area -->
@include('templates/header')
<!-- header area end -->
        
    <!-- breadcrumb area -->
    <div class="rts__section breadcrumb__background">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 position-relative d-flex justify-content-between align-items-center">
                <div class="breadcrumb__area max-content breadcrumb__padding z-2">
                    <h1 class="breadcrumb-title h3 mb-3">About Us</h1>
                    <nav>
                        <ul class="breadcrumb m-0 lh-1">
                          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ul>
                    </nav>                  
                </div>
                <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">
                    <div class="shape__one common">
                        <img src="assets/img/breadcrumb/shape-1.svg" alt="">
                    </div>
                    <div class="shape__two common">
                        <img src="assets/img/breadcrumb/shape-2.svg" alt="">
                    </div>
                    <div class="shape__three common">
                        <img src="assets/img/breadcrumb/shape-3.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- breadcrumb area end -->

        <!-- about image card -->
        <div class="rts__section pt-120">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="rts__content__section">
                            <h3 class="fw-bold l--3 mb-4  wow animated fadeInUp">Our Vision</h3>
                            <p class=" wow animated fadeInUp">Transforming healthcare one placement at a time, by providing personalized staffing solutions, promoting diversity and inclusion, and empowering healthcare professionals to deliver exceptional patient care.</p>
                        </div>
                        <div style="margin-top: 50px;" class="rts__content__section">
                            <h3 class="fw-bold l--3 mb-4  wow animated fadeInUp">Our Mission</h3>
                            <p class=" wow animated fadeInUp">Transforming healthcare staffing by combining cutting-edge technology, personalized service, and a commitment to quality, safety, and patient satisfaction.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="about__image__section position-relative flex-wrap flex-sm-nowrap d-flex justify-content-between gap-5">
    
                            <div class="about__image__one align-self-end">
                                <figure>
                                    <img src="assets/img/home-6/about/1.webp" alt="">
                                </figure>
                            </div>
                            <div class="about__applicant">
                                <div class="rts__applicants">
                                    <span class="font-20 mb-3 d-block fw-medium">Applicants</span>
                                    <div class="applicant__list wow animated fadeInUp">
                                        
                                        <div class="single__list">
                                            <img src="assets/img/author/1.svg" alt="">
                                        </div>
                                        <div class="single__list">
                                            <img src="assets/img/author/2.svg" alt="">
                                        </div>
                                        <div class="single__list">
                                            <img src="assets/img/author/3.svg" alt="">
                                        </div>
                                        <div class="single__list">
                                            <img src="assets/img/author/4.svg" alt="">
                                            <div class="icon-plus"><i class="fa-sharp fa-solid fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about__image__two align-self-start">
                                <figure>
                                    <img src="assets/img/home-6/about/2.webp" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about image card end -->

        <!-- work process area -->
        <section class="rts__section section__padding">
            <div class="container">
                <div class="row justify-content-center mb-60">
                    <div class="col-xl-6 col-lg-10">
                        <div class="rts__section__content text-center wow animated fadeInUp">
                            <h3 class="rts__section__title section__mb">How SteerHubIT Works</h3>
                            <p class="rts__section__desc">SteerHubIT connects you to top employers through a seamless process. Simply create an account, upload your CV, and get matched with the best job opportunities. Our platform ensures a smooth journey from application to placement</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-30">
                    <div class="col-lg-4 col-md-10">
                        <div class="rts__workprocess__box">
                            <div class="rts__icon">
                                <img src="assets/img/home-1/process/icon-1.svg" alt="">
                            </div>
                            <span class="process__title h6 d-block">Create an Account</span>
                            <p>Sign up quickly and gain access to exclusive job opportunities.
                            </p>
                            <div class="work__readmore mt-3">
                                <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-10">
                        <div class="rts__workprocess__box">
                            <div class="rts__icon">
                                <img src="assets/img/home-1/process/icon-2.svg" alt="">
                            </div>
                            <span class="process__title h6 d-block">Make Your Resume Amazing</span>
                            <p>Showcase your skills and experience by uploading your CV to our platform.
                            </p>
                            <div class="work__readmore mt-3">
                                <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-10">
                        <div class="rts__workprocess__box">
                            <div class="rts__icon">
                                <img src="assets/img/home-1/process/icon-3.svg" alt="">
                            </div>
                            <span class="process__title h6 d-block">Get Job Placement</span>
                            <p>Our system matches you with employers, helping you land a job.
                            </p>
                            <div class="work__readmore mt-3">
                                <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- work process area end -->

        <!-- funfact section -->
        <div class="rts__section">
            <div class="container">
                <div class="row g-30 justify-content-center  wow animated fadeInUp">
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="rts__single__counter">
                            <h2 class="fw-bold ms-lg-3 mx-auto heading__color"><span class="counter">20</span>K</h2>
                            <p class="h6 mb-0 fw-semibold">Happy Employer</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="rts__single__counter">
                            <h2 class="fw-bold ms-lg-3 mx-auto heading__color"><span class="counter">11</span>K</h2>
                            <p class="h6 mb-0 fw-semibold">Opening Position</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="rts__single__counter">
                            <h2 class="fw-bold ms-lg-3 mx-auto heading__color"><span class="counter">1</span>M</h2>
                            <p class="h6 mb-0 fw-semibold">Daily active users</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="rts__single__counter">
                            <h2 class="fw-bold ms-lg-3 mx-auto heading__color"><span class="counter">100</span>+</h2>
                            <p class="h6 mb-0 fw-semibold">Job Categories</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- funfact section end -->

        <!-- top employer -->
        <div class="rts__section overflow-hidden pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-between gap-4 mb-50 position-relative mtn-1">
                    <div class="col-xl-6 col-lg-10">
    <div class="rts__section__content text-start  wow animated fadeInUp">
        <h3 class="rts__section__title section__mb">Let’s Meet Our Team</h3>
        <p class="rts__section__desc">Our job board offers a wide range</p>
    </div>
</div>
                    <div class="rts__slider__control style-gray align-items-end position-relative z-3 d-none d-md-flex gap-2 max-contnet">
                        <div class="rts__slide__next rounded-2 slider__btn"><i class="fa-sharp fa-solid fa-chevron-left"></i></div>
                        <div class="rts__slide__prev rounded-2 slider__btn"><i class="fa-sharp fa-solid fa-chevron-right"></i></div>
                    </div>
                </div>
                <div class="row swiper-data overflow-hidden" data-swiper='{
                    "slidesPerView": 4,
                    "autoplay": true,
                    "loop": true,
                    "navigation": {
                        "nextEl": ".rts__slide__next",
                        "prevEl": ".rts__slide__prev"
                    },
                    "breakpoints": {
                        "0": {
                            "slidesPerView": 1.05
                        },
                        "490": {
                            "slidesPerView": 1.05
                        },
                        "768": {
                            "slidesPerView": 2
                        },
                        "1024": {
                            "slidesPerView": 3
                        },
                        "1200": {
                            "slidesPerView": 4
                        }
                    }
                    }'>
                    <!-- single company info -->
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="team__member text-center">
                                <a href="#">
                                    <img class="rounded-3" src="assets/img/team/1.webp" alt="">
                                </a>
                                <div class="team__member__meta mt-3">
                                    <a href="#" class="h6 fw-semibold text-dark mb-0 d-block">Al Amin Bali</a>
                                    <span class="font-sm fw-medium">UX Designer</span>
                                    <div class="social__link d-flex gap-2 justify-content-center align-items-center">
                                        <a class="text-body" href="#"><i class="rt-facebook"></i></a>
                                        <a class="text-body" href="#"><i class="fa-brands fa-linkedin"></i></a>
                                        <a class="text-body" href="#"><i class="fa-brands fa-skype"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="team__member text-center">
                                <a href="#">
                                    <img class="rounded-3" src="assets/img/team/2.webp" alt="">
                                </a>
                                <div class="team__member__meta mt-3">
                                    <a href="#" class="h6 fw-semibold text-dark mb-0 d-block">Jonathon Doe</a>
                                    <span class="font-sm fw-medium">UI/UX Designer</span>
                                    <div class="social__link d-flex gap-2 justify-content-center align-items-center">
                                        <a class="text-body" href="#"><i class="rt-facebook"></i></a>
                                        <a class="text-body" href="#"><i class="fa-brands fa-linkedin"></i></a>
                                        <a class="text-body" href="#"><i class="fa-brands fa-skype"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="team__member text-center">
                                <a href="#">
                                    <img class="rounded-3" src="assets/img/team/3.webp" alt="">
                                </a>
                                <div class="team__member__meta mt-3">
                                    <a href="#" class="h6 fw-semibold text-dark mb-0 d-block">Emma Elizabeth</a>
                                    <span class="font-sm fw-medium">Software Engineer</span>
                                    <div class="social__link d-flex gap-2 justify-content-center align-items-center">
                                        <a class="text-body" href="#"><i class="rt-facebook"></i></a>
                                        <a class="text-body" href="#"><i class="fa-brands fa-linkedin"></i></a>
                                        <a class="text-body" href="#"><i class="fa-brands fa-skype"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single company info end -->
                    
                </div>
            </div>
        </div>
        <!-- top employer end -->
           
        <!-- testimonial section -->
        <div class="rts__section section__padding rts__testimonial__background">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-10">
    <div class="rts__section__content text-center mb-60  wow animated fadeInUp">
        <h3 class="rts__section__title section__mb">What Our Customer Saying</h3>
        <p class="rts__section__desc">Looking for your next career opportunity. Look no further</p>
    </div>
</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="rts__testimonial__active overflow-hidden swiper-data" data-swiper='{
                            "slidesPerView": 1,
                            "autoplay": true,
                            "loop": true,
                            "navigation": {
                                "nextEl": ".rts__slide__next",
                                "prevEl": ".rts__slide__prev"
                            }
                        }'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="rts__single__testimonial text-center">
                                        <div class="rts__quote mb-40">
                                            <img class="opacity-50" src="assets/img/icon/quote.svg" alt="">
                                        </div>
                                        <div class="testimonial__text h6    ">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia</div>
                                        <div class="d-flex align-items-center justify-content-center mx-auto gap-3 pt-40 max-content">
                                            
                                            <div class="author__content text-center">
                                                <span class="h6">Alexander Joy</span>
                                                <p>Web Developer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rts__single__testimonial text-center">
                                        <div class="rts__quote mb-40">
                                            <img class="opacity-50" src="assets/img/icon/quote.svg" alt="">
                                        </div>
                                        <div class="testimonial__text h6    ">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia</div>
                                        <div class="d-flex align-items-center justify-content-center mx-auto gap-3 pt-40 max-content">
                                            
                                            <div class="author__content text-center">
                                                <span class="h6">Alexander Joy</span>
                                                <p>Web Developer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rts__slider__control d-none d-lg-flex justify-content-between g-0 position-absolute top-50  translate-middle-y">
                        <div class="rts__slide__next slider__btn"><i class="fa-sharp fa-solid fa-chevron-left"></i></div>
                        <div class="rts__slide__prev slider__btn"><i class="fa-sharp fa-solid fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial section end -->

        
        <!-- brand area -->
         <div class="rts__section rts__brand section__padding no-bb text-center">
    <div class="container">
        <div class="row">
            <div class="section__title mb-40">
                <span class="h6 d-block fw-semibold">Trusted by 300+ leading companies</span>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="rts__brand__slider overflow-hidden swiper-data" data-swiper='{
                "slidesPerView":7,
                "loop": true,
                "speed": 1000,
                "autoplay":{
                    "delay":"7000"
                },

                "breakpoints": {
                    "0": {
                        "slidesPerView": 2
                    },
                    "480": {
                        "slidesPerView": 3
                    },
                    "768": {
                        "slidesPerView": 4
                    },
                    "1024": {
                        "slidesPerView": 4
                    },
                    "1200": {
                        "slidesPerView": 6
                    },
                    "1400": {
                        "slidesPerView": 7
                    }
                }

            }'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand__item">
                            <a href="#" class="brand__item__link" aria-label="brand">
                                <img src="assets/img/home-1/brand/b51.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item">
                            <a href="#" class="brand__item__link" aria-label="brand">
                                <img src="assets/img/home-1/brand/image1.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item">
                            <a href="#" class="brand__item__link" aria-label="brand">
                                <img src="assets/img/home-1/brand/image2.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item">
                            <a href="#" class="brand__item__link" aria-label="brand">
                                <img src="assets/img/home-1/brand/image3.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item">
                            <a href="#" class="brand__item__link" aria-label="brand">
                                <img src="assets/img/home-1/brand/image4.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item">
                            <a href="#" class="brand__item__link" aria-label="brand">
                                <img src="assets/img/home-1/brand/image5.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item">
                            <a href="#" class="brand__item__link" aria-label="brand">
                                <img src="assets/img/home-1/brand/image1.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand__item">
                            <a href="#" class="brand__item__link" aria-label="brand">
                                <img src="assets/img/home-1/brand/linkedin-logo-png-20321.svg" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
        <!-- brand area end -->

    
    <div class="rts__section pb-120">
        <div class="container">
            <div class="row">
                <div class="rts__appcenter">
                    <div class="rts__appcenter__shape">
                        <img src="assets/img/home-1/app/shape.png" alt="">
                    </div>
                    <div class="rts__appcenter__content d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between justify-content-lg-center">
                        <div class="content__left align-items-end d-flex position-relative top-15px">
                            <img src="assets/img/home-1/app/app_screen.png" alt="">
                        </div>
                        <div class="content__right text-white text-center text-xl-start max-630">
                            <h3 class="l--1 mb-4 text-white wow animated fadeInUp" data-wow-delay=".1s ">Download The app Free!</h3>
                            <p class="wow animated fadeInUp" data-wow-delay=".2s">Looking for a new job can be both exciting and daunting. Navigating the job market involves exploring various avenues.</p>
                            <div class="d-flex gap-3 justify-content-center justify-content-xl-start flex-wrap mt-40 wow animated fadeInUp" data-wow-delay=".3s">
                                <div class="link">
                                    <a href="https://appstore.com" target="_blank" title="app store">
                                        <img src="assets/img/home-1/app/app-store.svg" alt="">
                                    </a>
                                </div>
                                <div class="link">
                                    <a href="https://google.com" target="_blank" title="play store">
                                        <img src="assets/img/home-1/app/play-store.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    

<div class="modal similar__modal fade " id="loginModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="max-content similar__form form__padding">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h6 class="mb-0">Login To Jobpath</h6>
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-regular fa-xmark text-primary"></i>
                </button>
            </div>
            <div class="d-block has__line text-center"><p>Choose your Account Type</p></div>
            
            <div class="tab__switch flex-wrap flex-sm-nowrap nav-tab mt-30 mb-30">
                <button class="rts__btn nav-link  active"><i class="fa-light fa-user"></i>Candidate</button>
                <button class="rts__btn nav-link"><i class="rt-briefcase"></i> Employer</button>
            </div>
            <div class="tab-content" id="">
                
            </div>
            <form action="candidate-dashboard.html" method="post" class="d-flex flex-column gap-3">
                <div class="form-group">
                    <label for="email" class="fw-medium text-dark mb-3">Your Email</label>
                    <div class="position-relative">
                        <input type="email" name="email" id="email" value="user@test.com" placeholder="Enter your email" required="">
                        <i class="fa-light fa-user icon"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="fw-medium text-dark mb-3">Password</label>
                    <div class="position-relative">
                        <input type="password" name="password" value="1234" id="password" placeholder="Enter your password" required="">
                        <i class="fa-light fa-lock icon"></i>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between align-items-center fw-medium">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="forgot__password text-para" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password?</a>
                </div>
                <div class="form-group my-3">
                    <button class="rts__btn w-100 fill__btn">Login</button>
                </div>
            </form>
            <div class="d-block has__line text-center"><p>Or</p></div>
            <div class="d-flex gap-4 flex-wrap justify-content-center mt-20 mb-20">
                <div class="is__social google">
                    <button><img src="assets/img/icon/google-small.svg" alt="">Continue with Google</button>
                </div>
                <div class="is__social facebook">
                    <button><img src="assets/img/icon/facebook-small.svg" alt="">Continue with Facebook</button>
                </div>
            </div>
            <span class="d-block text-center fw-medium">Don`t have an account? <a href="#" data-bs-target="#signupModal" data-bs-toggle="modal" class="text-primary">Sign Up</a> </span>
        </div>
      </div>
    </div>
</div>

<!-- signup form -->
<div class="modal similar__modal fade " id="signupModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="max-content similar__form form__padding">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h6 class="mb-0">Create A Free Account</h6>
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-regular fa-xmark text-primary"></i>
                </button>
            </div>
            <div class="d-block has__line text-center"><p>Choose your Account Type</p></div>
            
            <div class="tab__switch flex-wrap flex-sm-nowrap nav-tab mt-30 mb-30">
                <button class="rts__btn nav-link  active"><i class="fa-light fa-user"></i>Candidate</button>
                <button class="rts__btn nav-link"><i class="rt-briefcase"></i> Employer</button>
            </div>
            <form action="#" class="d-flex flex-column gap-3">
                
                <div class="form-group">
                    <label for="sname" class="fw-medium text-dark mb-3">Your Name</label>
                    <div class="position-relative">
                        <input type="text" name="sname" id="sname" placeholder="Candidate" required="">
                        <i class="fa-light fa-user icon"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="signemail" class="fw-medium text-dark mb-3">Your Email</label>
                    <div class="position-relative">
                        <input type="email" name="signemail" id="signemail" placeholder="Enter your email" required="">
                        <i class="fa-sharp fa-light fa-envelope icon"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="spassword" class="fw-medium text-dark mb-3">Password</label>
                    <div class="position-relative">
                        <input type="password" name="spassword" id="spassword" placeholder="Enter your password" required="">
                        <i class="fa-light fa-lock icon"></i>
                    </div>
                </div>
                
                <div class="form-group my-3">
                    <button class="rts__btn w-100 fill__btn">Login</button>
                </div>
            </form>
            <div class="d-block has__line text-center"><p>Or</p></div>
            <div class="d-flex flex-wrap justify-content-center gap-4 mt-20 mb-20">
                <div class="is__social google">
                    <button><img src="assets/img/icon/google-small.svg" alt="">Continue with Google</button>
                </div>
                <div class="is__social facebook">
                    <button><img src="assets/img/icon/facebook-small.svg" alt="">Continue with Facebook</button>
                </div>
            </div>
            <span class="d-block text-center fw-medium">Have an account? <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal" class="text-primary">Login</a> </span>
        </div>
      </div>
    </div>
</div>

<!-- forgot password form -->
<div class="modal similar__modal fade " id="forgotModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="max-content similar__form form__padding">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <h6 class="mb-0">Forgot Password</h6>
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-regular fa-xmark text-primary"></i>
                </button>
            </div>
            <form action="#" class="d-flex flex-column gap-3">
                
                <div class="form-group">
                    <label for="fmail" class="fw-medium text-dark mb-3">Your Email</label>
                    <div class="position-relative">
                        <input type="email" name="email" id="fmail" placeholder="Enter your email" required="">
                        <i class="fa-sharp fa-light fa-envelope icon"></i>
                    </div>
                </div>
                
                <div class="form-group my-3">
                    <button class="rts__btn w-100 fill__btn">Reset Password</button>
                </div>
            </form>
        
            <span class="d-block text-center fw-medium">Remember Your Password? <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal" class="text-primary">Login</a> </span>
        </div>
      </div>
    </div>
</div>
  
    @include('templates/footer')

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header p-0 mb-5 mt-4">
      <a href="index.html" class="offcanvas-title" id="offcanvasLabel">
        <img src="assets/img/logo/header__one.svg" alt="logo">
      </a> 
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <!-- login offcanvas -->
     <div class="mb-4 d-block d-sm-none">
      <div class="header__right__btn d-flex justify-content-center gap-3">
        <a href="#" class="small__btn no__fill__btn border-6 font-xs" aria-label="Login Button" data-bs-toggle="modal" data-bs-target="#loginModal"> <i class="rt-login"></i>Sign In</a>
        <a href="#" class="small__btn d-xl-flex fill__btn border-6 font-xs" aria-label="Job Posting Button">Add Job</a>
    </div>
     </div>
    <div class="offcanvas-body p-0">
      <div class="rts__offcanvas__menu overflow-hidden">
        <div class="offcanvas__menu"></div>
      </div>
      <p class="max-auto font-20 fw-medium text-center text-decoration-underline mt-4">Our Social Links</p>
      <div class="rts__social d-flex justify-content-center gap-3 mt-3">
    <a target="_blank" href="https://facebook.com" aria-label="facebook">
        <i class="fa-brands fa-facebook"></i>
    </a>
    <a target="_blank" href="https://instagram.com" aria-label="instagram">
        <i class="fa-brands fa-instagram"></i>
    </a>
    <a target="_blank" href="https://linkedin.com" aria-label="linkedin">
        <i class="fa-brands fa-linkedin"></i>
    </a>
    <a target="_blank" href="https://pinterest.com" aria-label="pinterest">
        <i class="fa-brands fa-pinterest"></i>
    </a>
    <a target="_blank" href="https://youtube.com" aria-label="youtube">
        <i class="fa-brands fa-youtube"></i>
    </a>
</div>
    </div>
  </div>
<!-- THEME PRELOADER START -->
<div class="loader-wrapper">
    <div class="loader">
    </div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- THEME PRELOADER END -->
<button type="button" class="rts__back__top" id="rts-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
<!-- all plugin js -->
<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>