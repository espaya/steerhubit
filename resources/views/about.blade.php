<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="description" content="Transforming healthcare one placement at a time, by providing personalized staffing solutions, promoting diversity and inclusion, and empowering healthcare professionals to deliver exceptional patient care.">
      <meta name="keywords" content="Job, Resume, Employer, Agency">
      <link rel="canonical" href="{{ route('about') }}">
      <meta name="robots" content="index, follow">
      <!-- for open graph social media -->
      <meta property="og:title" content="About us">
      <meta property="og:description" content="Transforming healthcare one placement at a time, by providing personalized staffing solutions, promoting diversity and inclusion, and empowering healthcare professionals to deliver exceptional patient care.">
      <meta property="og:image" content="{{ asset('assets/img/favicon-16x16.png') }}">
      <meta property="og:url" content="{{ route('about') }}">
      <!-- for twitter sharing -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="About Us - SteerHubIT">
      <meta name="twitter:description" content="Transforming healthcare one placement at a time, by providing personalized staffing solutions, promoting diversity and inclusion, and empowering healthcare professionals to deliver exceptional patient care.">
      <!-- fabicon -->
      <link rel="shortcut-icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="login-route" content="{{ route('login') }}">
      <meta name="register-url" content="{{ route('register') }}">

      <title>About Us - SteerHubIt</title>
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
                     <p class=" wow animated fadeInUp">Transforming healthcare one placement at a time, by providing personalized staffing solutions, promoting diversity and inclusion, and empowering healthcare professionals to deliver exceptional patient care.</p>
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
                           <img src="{{asset('assets/img/home-6/about/1.jpg')}}" alt="">
                        </figure>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about image card end -->
      <section class="rts__section section__padding">
         <div class="container">
            <div class="row align-items-center justify-content-center g-30">
               <div class="col-lg-12 col-xl-12">
                  <div class="rts__workprocess__content mx-0 mx-lg-5  wow  fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                     <div class="rts__section__content text-start">
                        <h3 class="h6 d-block">Our Story</h3>
                        <p class="rts__section__desc">At SteerHubIT, we are driven by a passion for providing exceptional healthcare staffing solutions that positively impact the lives of patients, professionals, and healthcare organizations.
                        </p>
                     </div>
                     <div style="margin-top: 50px;" class="rts__section__content text-start">
                        <h3 class="h6 d-block">Our Journey</h3>
                        <p class="rts__section__desc">Our story began with a simple yet powerful idea: to create a healthcare staffing agency that prioritizes people. Our founders have extensive experience in healthcare staffing and small business startups, which has shaped our approach. We recognize the importance of a more personalized and compassionate approach to healthcare staffing</p>
                     </div>
                     <div style="margin-top: 50px;" class="rts__section__content text-start">
                        <h3 class="h6 d-block">Our Mission Takes Shape                                </h3>
                        <p class="rts__section__desc">With a clear vision and unwavering commitment, we set out to build a team of dedicated professionals who share our passion for delivering outstanding patient care. Today, we are proud to be a competitive healthcare staffing agency, connecting top talent with innovative healthcare organizations.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <div class="rts__section overflow-hidden" style="padding-top: 15px;">
         <div class="container">
            <div class="row justify-content-between align-items-center mb-50">
               <!-- Left Column -->
               <div class="col-lg-6">
                  <div class="rts__section__content text-start wow fadeInUp">
                     <h3 class="h6 d-block">Our Values</h3>
                     <p class="rts__section__desc">
                     <ul>
                        <li>- <strong>Compassion:</strong> We prioritize empathy and kindness in every interaction.</li>
                        <li>- <strong>Excellence:</strong> We strive for exceptional quality in our staffing solutions.</li>
                        <li>- <strong>Inclusivity:</strong> We promote diversity, equity, and inclusion within our workforce.</li>
                        <li>- <strong>Integrity:</strong> We operate with transparency, honesty, and ethics.</li>
                     </ul>
                     </p>
                  </div>
               </div>
               <!-- Right Column -->
               <div class="col-lg-6">
                  <div class="rts__section__content text-start wow fadeInUp">
                     <h3 style="padding-top: 20px;" class="h6 d-block">Join Our Story</h3>
                     <p class="rts__section__desc">We are always looking for talented professionals to join our team. If you are passionate about healthcare and committed to delivering exceptional service, we would love to hear from you.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
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
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
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
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- work process area end -->

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
                  <span class="d-block text-center fw-medium"><a href="#" id="sendNewOtp" class="text-primary">Request new code</a><small>or <a id="loginAgain" href="#">Login Again</a></small></span>
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
      <script src="{{ asset('assets/js/send-reset-link.js')}}"></script>
      <script>
         $('#loginAgain').on('click', function () {
            $('#otpModal').modal('hide');
            $('#loginModal').modal('show');
         });
      </script>
   </body>
</html>