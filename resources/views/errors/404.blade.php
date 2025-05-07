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

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="login-route" content="{{ route('login') }}">
      <meta name="register-url" content="{{ route('register') }}">

      <!-- fabicon -->
      <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
      <title>404 - SteerHubIT</title>
      <!-- rt icons -->
      <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
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
                     <h1 class="breadcrumb-title h3 mb-3">404</h1>
                     <nav>
                        <ul class="breadcrumb m-0 lh-1">
                           <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                           <li class="breadcrumb-item active" aria-current="page">404</li>
                        </ul>
                     </nav>
                  </div>
                  <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">
                     <div class="shape__one common">
                        <img src="{{asset('assets/img/breadcrumb/shape-1.svg')}}" alt="">
                     </div>
                     <div class="shape__two common">
                        <img src="{{asset('assets/img/breadcrumb/shape-2.svg')}}" alt="">
                     </div>
                     <div class="shape__three common">
                        <img src="{{asset('assets/img/breadcrumb/shape-3.svg')}}" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->
      <!-- pricing section -->
      <div class="rts__section pt-110">
         <div class="container">
            <div class="row justify-content-center mb-60">
               <div class="col-lg-7">
                  <div class="rts__section__content mb-30 text-center  wow animated fadeInUp">
                     <h3 class="rts__section__title mb-3">404 Not Found</h3>
                     <p class="rts__section__desc">The page you were looking for was not found.</p>
                     <a onclick="window.history.back();" href="#" class="rts__btn pricing__btn  no__fill__btn mt-40">Go Back</a>
                  </div>
               </div>
            </div>

         </div>
      </div>
      <!-- pricing section end -->
      
      
      @include('templates/login_temp')

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
      <script src="{{asset('assets/js/plugins.min.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- jQuery AJAX -->
      <script src="{{ asset('assets/js/new-otp.js') }}"></script>
      <script src="{{ asset('assets/js/signup.js') }}"></script>
      <script src="{{ asset('assets/js/subscribe.js') }}"></script>
      <script src="{{ asset('assets/js/signin.js') }}"></script>
      <script src="{{ asset('assets/js/otp-verification.js')}}"></script>
      <script>
         $('#loginAgain').on('click', function () {
            $('#otpModal').modal('hide');
            $('#loginModal').modal('show');
         });
      </script>

   </body>
</html>