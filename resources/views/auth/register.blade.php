<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="mobile-web-app-capable" content="yes">
   <meta name="description" content="Create your account to explore job opportunities, connect with employers, and grow your career with SteerHub IT.">
   <meta name="keywords" content="Job, Resume, Employer, Employee, Agency, SteerHubIT, Job Portal, Career Opportunities, Job Search, Hire Talent, Recruitment, Employment, IT Jobs, Tech Careers, Professional Resume, Job Applications, Talent Acquisition, Freelance Jobs, Remote Work, Job Listings, Career Hub">
   <link rel="canonical" href="{{ route('register') }}">
   <meta name="robots" content="index, follow">
   <!-- for open graph social media -->
   <meta property="og:title" content="Register - SteerHubIT">
   <meta property="og:description" content="Create your account to explore job opportunities, connect with employers, and grow your career with SteerHub IT.">

   <meta property="og:image" content="{{ asset('assets/img/favicon-16x16.png') }}">
   <meta property="og:url" content="{{ route('register') }}">
   <!-- for twitter sharing -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="register-url" content="{{ route('register') }}">
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="Register - SteerHubIT">
   <meta name="twitter:description" content="Create your account to explore job opportunities, connect with employers, and grow your career with SteerHub IT.">
   <!-- fabicon -->
   <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
   <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
   <title>Register - SteerHubIT</title>
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
                  <h1 class="breadcrumb-title h3 mb-3">Register</h1>
                  <nav>
                     <ul class="breadcrumb m-0 lh-1">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
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
               <span class="h4 fw-normal"><strong class="fw-bold">Create A Free</strong> Account</span>
               <div class="job__contact is__contact mt-30">
                  <div class="d-flex mb-3 align-items-center justify-content-between">
                     <h6 class="mb-0">Create A Free Account</h6>
                  </div>

                  <div class="d-block has__line text-center">
                     <p>Choose your Account Type</p>
                  </div>

                  <!-- General Error Message -->
                  <div id="error-message" class="alert alert-danger d-none"></div>
                  <small class="text-danger error-role" id="role-error"></small>
                  <!-- Success Message -->
                  <div id="success-message" class="alert alert-success d-none"></div>

                  <!-- Role Selection Buttons -->
                  <div class="tab__switch flex-wrap flex-sm-nowrap nav-tab mt-30 mb-30">
                     <button id="candidate-role" class="rts__btn nav-link active"><i class="fa-light fa-user"></i> Candidate</button>
                     <button id="employer-role" class="rts__btn nav-link"><i class="rt-briefcase"></i> Employer</button>
                     <!-- Error Message -->
                  </div>
                  <form id="candidate-register-form" action="{{ route('register') }}" method="post" class="d-flex flex-column gap-4">
                     @csrf
                     <input type="hidden" name="role" id="role" value="Candidate"> <!-- Hidden Input for Role -->

                     <div class="search__item">
                        <label for="name" class="mb-4 font-20 fw-medium text-dark text-capitalize">Username</label>
                        <div class="position-relative">
                           <input value="{{ old('name') }}" name="name" type="text" id="sname" placeholder="Username" autocomplete="off">
                           <i class="fa-light fa-user"></i>
                        </div>
                        <small class="text-danger error-message" id="name-error"></small> <!-- Error Message -->
                     </div>

                     <div class="search__item">
                        <label for="name" class="mb-4 font-20 fw-medium text-dark text-capitalize">Email</label>
                        <div class="position-relative">
                           <input value="{{ old('email') }}" name="email" type="text" id="email" placeholder="Your email" autocomplete="off">
                           <i class="fa-light fa-envelope"></i>
                        </div>
                        <small class="text-danger error-message" id="email-error"></small> <!-- Error Message -->
                     </div>

                     <input type="hidden" id="timezone" name="timezone">

                     <div class="search__item">
                        <label for="cemail" class="mb-4 font-20 fw-medium text-dark text-capitalize">Password</label>
                        <div class="position-relative">
                           <input value="{{ old('password') }}" name="password" type="password" id="spassword" placeholder="Enter your password" autocomplete="off">
                           <i class="fa-light fa-lock icon"></i>
                        </div>
                        <small class="text-danger error-message" id="password-error"></small> <!-- Error Message -->
                     </div>

                     <div class="search__item">
                        <label for="cemail" class="mb-4 font-20 fw-medium text-dark text-capitalize">Confirm Password</label>
                        <div class="position-relative">
                           <input value="{{ old('password_confirmation') }}" name="password_confirmation" type="password" id="password_confirmation" placeholder="Repeat your password" autocomplete="off">
                           <i class="fa-light fa-lock icon"></i>
                        </div>
                        <small class="text-danger error-message" id="password_confirmation-error"></small> <!-- Error Message -->
                     </div>

                     <button id="register-button" type="submit" class="rts__btn fill__btn be-1 w-100 rounded-1 apply__btn">
                        Register
                     </button>
                  </form>
                  <div class="d-block has__line text-center">
                     <p>Or</p>
                  </div>
                  <span class="d-block text-center fw-medium">Have an account? <a href="{{ route('login') }}" class="text-primary">Login</a> </span>
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
   <script src="{{ asset('assets/js/signup.js') }}"></script>
   <script src="{{ asset('assets/js/subscribe.js') }}"></script>
</body>

</html>