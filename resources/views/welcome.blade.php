<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="description" content="Your Ultimate Job HTML Template">
      <meta name="keywords" content="Job, Resume, Employer, Agency">
      <link rel="canonical" href="https://steerhubit.com/">
      <meta name="robots" content="index, follow">
      <!-- for open graph social media -->
      <meta property="og:title" content="Your Ultimate Job HTML Template">
      <meta property="og:description" content="Your Ultimate Job HTML Template">
      <meta property="og:image" content="https://www.example.com/image.jpg">
      <meta property="og:url" content="https://steerhubit.com/">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="login-route" content="{{ route('login') }}">

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
      <title>SteerHubIT - Building Connections</title>
      <!-- rt icons -->
      <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
      <!-- fontawesome -->
      <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
      <!-- all plugin css -->
      <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
     



      <style>
         .rts__banner__title {
         font-size: clamp(1.5rem, 4vw, 3rem); /* Adjusts dynamically */
         font-weight: bold;
         /* text-align: center; */
         line-height: 1.3;
      }

      .rts__banner__desc {
         font-size: clamp(1rem, 2vw, 1.5rem);
         /* text-align: center; */
         max-width: 80%;
         /* margin: 0 auto; */
         line-height: 1.6;
      }

      @media (max-width: 768px) {
         .rts__banner__title {
            font-size: 2rem;
         }

         .rts__banner__desc {
            font-size: 1.2rem;
            max-width: 90%;
         }
      }

      @media (max-width: 480px) {
         .rts__banner__title {
            font-size: 1.5rem;
         }

         .rts__banner__desc {
            font-size: 1rem;
         }
      }


      </style>

   </head>
   <body>
      <!-- header area -->
      @include('templates/header')
      <!-- header area end -->
      <!-- banner area -->
      <section class="rts__banner home__one__banner pt-260">
         <div class="rts__banner__background">
            <div class="shape__home__one __first d-none d-lg-block">
               <img src="{{asset('assets/img/home-1/banner/banner-shape.svg')}}" alt="">
            </div>
            <div class="shape__home__one __second d-none d-lg-block">
               <img src="{{asset('assets/img/home-1/banner/banner-shape-2.svg')}}" alt="">
            </div>
            <div class="shape__home__one __third">  
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="rts__banner__wrapper d-flex gap-4 justify-content-between ">
                  <div class="rts__banner__content">
                     <h3 style="font-size: 43px;" class="rts__banner__title wow animated fadeInUp ">
                     Explore Job Opportunities.
                     </h3><br>
                     <h4 style="font-size: 43px;" class="rts__banner__title wow animated fadeInUp ">
                     Match with Potential Applicants.
                     </h4><br>
                     <h3 style="font-size: 43px;" class="rts__banner__title wow animated fadeInUp "> 
                        <span>@ SteerHubIT</span>
                     </h3>
                     <p class="rts__banner__desc my-40 wow animated fadeInUp" data-wow-delay=".1s">
                     Whether you're a healthcare professional seeking new opportunities or a healthcare organization looking for top talent, we're here to guide you through the process.
                     Let's navigate the job market together.</p>
                     
                  </div>
                  <div class="rts__banner__image position-relative">
                     <figure class="banner__image">
                        <img src="{{asset('assets/img/home-1/banner/image_2x_1.png')}}" alt="banner">
                     </figure>
                     <div class="banner__image__shape">
                        <div class="facebook">
                           <a target="_blank" href="https://web.facebook.com/SteerHubIT"><i class="fab fa-facebook"></i></a>
                        </div>
                        <div class="twitter">
                           <a href=""><i class="fab fa-twitter"></i></a>
                        </div>
                        <div class="linkedin">
                           <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- banner area end -->
      <!-- work process area -->
      <section class="rts__section section__padding">
         <div class="container">
            <div class="row justify-content-center mb-60">
               <div class="col-xl-6 col-lg-10">
                  <div class="rts__section__content text-center wow animated fadeInUp">
                     <h3 class="rts__section__title section__mb">How SteerHubIT Works</h3>
                     <p class="rts__section__desc">Seamlessly connect with top healthcare employers and take your career to the next level. Our intuitive platform makes it easy:
                        </p>
                        <p class="rts__section__desc">Create an account, Upload your CV and Get matched to personalized job opportunities.
                        Our platform streamlines the hiring process, ensuring a smooth journey from application to placement. Join SteerHubIT today and discover your ideal role</p>
                  </div>
               </div>
            </div>
            <div class="row g-30 justify-content-center">
               <div class="col-lg-4 col-md-10 wow animated fadeInUp" data-wow-delay=".1s">
                  <div class="rts__workprocess__box">
                     <div class="rts__icon">
                        <img src="{{asset('assets/img/home-1/process/icon-1.svg')}}" alt="">
                     </div>
                     <span class="process__title h6 d-block">Create an Account</span>
                     <p>Sign up quickly and gain access to exclusive job opportunities.
                     </p>
                     <div class="work__readmore mt-3">
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-10 wow animated fadeInUp" data-wow-delay=".2s">
                  <div class="rts__workprocess__box">
                     <div class="rts__icon">
                        <img src="{{asset('assets/img/home-1/process/icon-2.svg')}}" alt="">
                     </div>
                     <span class="process__title h6 d-block">Make Your Resume Amazing</span>
                     <p>Showcase your skills and experience by uploading your CV to our platform.
                     </p>
                     <div class="work__readmore mt-3">
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-10 wow animated fadeInUp" data-wow-delay=".3s">
                  <div class="rts__workprocess__box">
                     <div class="rts__icon">
                        <img src="{{asset('assets/img/home-1/process/icon-3.svg')}}" alt="">
                     </div>
                     <span class="process__title h6 d-block">Apply  job</span>
                     <p>Our system matches you with employers, helping you land a job.
                     </p>
                     <div class="work__readmore mt-3">
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- work process area end -->
      <!-- cat slider -->
      <div class="rts__section overflow-hidden cat__slider__bg pt-100 pb-100">
         <div class="container">
            <div class="row justify-content-between mb-50 gap-4 position-relative mtn-1">
               <div class="col-xl-6 col-lg-10">
                  <div class="rts__section__content text-start wow animated fadeInUp">
                     <h3 class="rts__section__title section__mb">Browse Job Category</h3>
                     <p class="rts__section__desc">Looking for your next career opportunity. Look no further</p>
                  </div>
               </div>
               <div class="rts__slider__control align-items-end 
                  position-relative position-md-absolute right-md-0 bottom-md-0 z-3 d-flex gap-2 max-contnet">
                  <div class="rts__slide__next slider__btn"><i class="fa-sharp fa-solid fa-chevron-left"></i></div>
                  <div class="rts__slide__prev slider__btn"><i class="fa-sharp fa-solid fa-chevron-right"></i></div>
               </div>
            </div>
            <div class="row">
               <div class="cat__slider overflow-hidden swiper-data @@style" data-swiper='
                  {
                  "slidesPerView": 4, 
                  "spaceBetween": 30,
                  "loop": true,
                  "speed": 1000,
                  "autoplay":{
                  "delay":"7000"
                  },
                  "pagination": {
                  "el": ".rts__pagination",
                  "clickable": true
                  },
                  "navigation": {
                  "nextEl": ".rts__slide__next",
                  "prevEl": ".rts__slide__prev"
                  },
                  "breakpoints": {
                  "0": {
                  "slidesPerView": 1
                  },
                  "490": {
                  "slidesPerView": 1.5
                  },
                  "768": {
                  "slidesPerView": 2
                  },
                  "1024": {
                  "slidesPerView": 3
                  },
                  "1200": {
                  "slidesPerView": 3.5
                  },
                  "1400": {
                  "slidesPerView": 4
                  }
                  }
                  }'>
                  <div class="swiper-wrapper">
                     <div class="swiper-slide">
                        <div class="single__cat d-flex gap-4">
                           <div class="single__cat__icon color-2">
                              <img src="{{asset('assets/img/home-1/cat/2.svg')}}" alt="">
                           </div>
                           <div class="single__cat__link d-flex flex-column">
                              <a href="job-list-1.html" aria-label="cat__label">LIcensed Practical Nurse (LPN)</a>
                              <span>130+ Jobs</span>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="single__cat d-flex gap-4">
                           <div class="single__cat__icon color-3">
                              <img src="{{asset('assets/img/home-1/cat/3.svg')}}" alt="">
                           </div>
                           <div class="single__cat__link d-flex flex-column">
                              <a href="job-list-1.html" aria-label="cat__label">Home Health Aide (HHA)</a>
                              <span>130+ Jobs</span>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="single__cat d-flex gap-4">
                           <div class="single__cat__icon color-4">
                              <img src="{{asset('assets/img/home-1/cat/4.svg')}}" alt="">
                           </div>
                           <div class="single__cat__link d-flex flex-column">
                              <a href="job-list-1.html" aria-label="cat__label">Certified Nursing Assistant (CNA)</a>
                              <span>130+ Jobs</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- cat slider end -->
      <!-- current open position -->
      
      <!-- current open position end -->
      <!-- what we are -->
      

      <!-- what we are end -->
       
      @include('templates/login_temp')

      @include('templates/footer')
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
         <div class="offcanvas-header p-0 mb-5 mt-4">
         <a href="{{ url('/') }}" class="offcanvas-title" id="offcanvasLabel">
            <img src="{{asset('assets/img/logo/logo.png')}}" alt="logo">
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
            <!-- OTP Modal -->
      <div class="modal similar__modal fade " id="otpModal">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="max-content similar__form form__padding">
                  <div id="otp-error-message"></div>
                  <div class="text-center" id="otp-message" style="font-size: 14px;"></div>                  
                  <div class="tab-content" id="">
                  </div>
                  <form id="otp-form-ajax" action="{{ route('verify-otp.submit') }}" method="post" class="d-flex flex-column gap-3">
                     @csrf
                     <div class="form-group">
                     <label for="otp" class="fw-medium text-dark mb-3 text-center d-block">Please enter the OTP code sent to your email</label>
                        <div class="position-relative">
                              <input type="text" name="otp" id="login-otp" autocomplete="off">
                        </div>
                        <span class="text-danger" id="login-error-otp"></span>
                     </div>

                     <input type="hidden" id="timezone" name="timezone">

                     <div class="form-group my-3">
                        <button id="otp-button" type="submit" class="rts__btn w-100 fill__btn">Submit</button>
                     </div>
                  </form>
                  <span class="d-block text-center fw-medium"><a href="#" id="sendNewOtp" class="text-primary">Request new code</a>
               </div>
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

      <script src="{{asset('assets/js/plugins.min.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- jQuery AJAX -->
      <script src="{{ asset('assets/js/new-otp.js') }}"></script>
      <script src="{{ asset('assets/js/signup.js') }}"></script>
      <script src="{{ asset('assets/js/subscribe.js') }}"></script>
      <script src="{{ asset('assets/js/signin.js') }}"></script>
      <script src="{{ asset('assets/js/otp-verification.js')}}"></script>
   </body>
</html>