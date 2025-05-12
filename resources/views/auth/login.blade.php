<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="mobile-web-app-capable" content="yes">
   <meta name="description" content="Sign in to your account by entering your account email and password. Securely manage your profile, view personalized content, and enjoy full features of our platform.">

   <meta name="keywords" content="Job, Resume, Employer, Employee, Agency, SteerHubIT, Job Portal, Career Opportunities, Job Search, Hire Talent, Recruitment, Employment, IT Jobs, Tech Careers, Professional Resume, Job Applications, Talent Acquisition, Freelance Jobs, Remote Work, Job Listings, Career Hub">

   <link rel="canonical" href="{{ route('login') }}">
   <meta name="robots" content="index, follow">
   <!-- for open graph social media -->
   <meta property="og:title" content="Sign In - SteerHubIT">
   <meta property="og:description" content="Sign in to your account by entering your account email and password. Securely manage your profile, view personalized content, and enjoy full features of our platform.">
   <meta property="og:image" content="{{ asset('assets/img/favicon-16x16.png') }}">
   <meta property="og:url" content="{{ route('login') }}">
   <!-- for twitter sharing -->

   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="login-route" content="{{ route('login') }}">
   <meta name="register-url" content="{{ route('register') }}">

   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="Sign In - SteerHubIT">
   <meta name="twitter:description" content="Sign in to your account by entering your account email and password. Securely manage your profile, view personalized content, and enjoy full features of our platform.">
   <!-- fabicon -->
   <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
   <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
   <title>Sign In - SteerHubIT</title>
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
                  <h1 class="breadcrumb-title h3 mb-3">Sign In</h1>
                  <nav>
                     <ul class="breadcrumb m-0 lh-1">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign In</li>
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
               <span class="h4 fw-normal"><strong class="fw-bold">Sign in to your</strong> account</span>
               <div class="job__contact is__contact mt-30">
                  <div id="login-error-message"></div>
                  <form action="#" class="d-flex flex-column gap-4">
                     <div class="search__item">
                        <label for="name" class="mb-4 font-20 fw-medium text-dark text-capitalize">Email</label>
                        <div class="position-relative">
                           <input name="email" type="text" id="login-email" placeholder="Your email" autocomplete="off">
                           <i class="fa-light fa-user"></i>
                        </div>
                        <small class="text-danger" id="login-error-email"></small>
                     </div>
                     <input type="hidden" id="timezone" name="timezone">
                     <div class="search__item">
                        <label for="cemail" class="mb-4 font-20 fw-medium text-dark text-capitalize">Password</label>
                        <div class="position-relative">
                           <input name="password" type="password" id="login-password" placeholder="Enter your password" autocomplete="off">
                           <i class="fa-light fa-lock icon"></i>
                        </div>
                        <small class="text-danger" id="login-error-password"></small>
                     </div>
                     <div class="d-flex flex-wrap justify-content-between align-items-center fw-medium">
                        <div class="form-check">
                           <input value="1" class="form-check-input" type="checkbox" name="remember" id="remember">
                           <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="forgot__password text-para" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password?</a>
                     </div>
                     <button id="login-button" type="submit" class="rts__btn fill__btn be-1 w-100 rounded-1 apply__btn">
                        Sign In
                     </button>
                  </form>
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
   <script src="{{asset('assets/js/plugins.min.js')}}"></script>
   <script src="{{asset('assets/js/main.js')}}"></script>

   <script src="{{ asset('assets/js/new-otp.js') }}"></script>
   <script src="{{ asset('assets/js/signup.js') }}"></script>
   <script src="{{ asset('assets/js/subscribe.js') }}"></script>
   <script src="{{ asset('assets/js/signin.js') }}"></script>
   <script src="{{ asset('assets/js/otp-verification.js')}}"></script>
   <script src="{{ asset('assets/js/send-reset-link.js')}}"></script>
   <script>
      $('#loginAgain').on('click', function() {
         $('#otpModal').modal('hide');
         $('#loginModal').modal('show');
      });
   </script>

</body>

</html>