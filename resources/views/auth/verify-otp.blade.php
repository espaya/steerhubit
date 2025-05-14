<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="mobile-web-app-capable" content="yes">
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

      <meta name="csrf-token" content="{{ csrf_token() }}">

      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Your Ultimate Job HTML Template">
      <meta name="twitter:description" content="Your Ultimate Job HTML Template">
      <!-- fabicon -->
      <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
      <title>Verify OTP - SteerHubIT</title>
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
                     <h1 class="breadcrumb-title h3 mb-3">Verify OTP</h1>
                     <nav>
                        <ul class="breadcrumb m-0 lh-1">
                           <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                           <li class="breadcrumb-item"><a href="{{ route('login') }}">Sign In</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Verify OTP</li>
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
      
      <!-- contact form -->
      <div class="rts__section section__padding">
         <div class="container">
            <div class="row align-items-center g-5">
               <div class="col-lg-6 ">
                  <div class="job__contact is__contact mt-30">
                     <div id="otp-error-message"></div>
                    <div class="text-center" id="otp-message" style="font-size: 14px;"></div>   
                     <form id="otp-form-ajax" action="#" method="POST" class="d-flex flex-column gap-4">
                        <div class="search__item">
                           <label for="name" class="mb-4 font-20 fw-medium text-dark text-capitalize">Enter the one-time password sent to your email</label>
                           <div class="position-relative">
                              <input value="{{ old('otp') }}" type="text" name="otp" id="login-otp" autocomplete="off">
                              <i class="fa-light fa-shield-keyhole"></i>
                           </div>
                           <span class="text-danger" id="login-error-otp"></span>
                        </div>
                         <input type="hidden" id="timezone" name="timezone">
                        <button id="otp-button" type="submit" class="rts__btn fill__btn be-1 w-100 rounded-1 apply__btn">
                        Verify
                        </button>
                     </form>
                     <div style="margin-top: 20px;">
                        <span class="d-block text-center fw-medium"><a href="#" id="sendNewOtp" class="text-primary">Request new code</a> <small>or <a href="{{ route('login') }}">Login Again</a></small></span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 ps-5">
                  <div class="contact__image">
                     <figure>
                        <img src="assets/img/pages/contact.webp" alt="">
                     </figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact form end -->
     
    
      @include('templates/footer')
        @include('templates/offcanvas')

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
       <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="{{asset('assets/js/plugins.min.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>

      <script src="{{ asset('assets/js/new-otp.js') }}"></script>
      <script src="{{ asset('assets/js/subscribe.js') }}"></script>
      <script src="{{ asset('assets/js/otp-verification.js')}}"></script>


   </body>
</html>