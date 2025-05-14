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
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="login-route" content="{{ route('login') }}">
   <meta name="register-url" content="{{ route('register') }}">

   <link rel="shortcut-icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
   <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
   <title>Contact - SteerHubIT</title>
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
                  <h1 class="breadcrumb-title h3 mb-3">Contact</h1>
                  <nav>
                     <ul class="breadcrumb m-0 lh-1">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
   <!-- contact method -->
   <div class="rts__section pt-120">
      <div class="container">
         <div class="row g-30">
            <div class="col-lg-6 col-md-6">
               <div class="rts__workprocess__box is__contact rounded-3">
                  <div class="rts__icon">
                     <img src="assets/img/icon/mail.svg" alt="">
                  </div>
                  <span class="process__title h6 d-block">Email Here</span>
                  <a class="text-para fw-medium" href="mailto:info@steerhubit.com">info@steerhubit.com</a>
               </div>
            </div>
            <div class="col-lg-6 col-md-6">
               <div class="rts__workprocess__box is__contact rounded-3">
                  <div class="rts__icon">
                     <img src="assets/img/icon/phone.svg" alt="">
                  </div>
                  <span class="process__title h6 d-block">Call Here</span>
                  <a class="fw-medium text-para" href="tel:+1 (848) 330-9298">+1 (848) 330-9298</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- contact method end -->
   <!-- contact form -->
   <div class="rts__section section__padding">
      <div class="container">
         <div class="row align-items-center g-5">
            <div class="col-lg-6 ">
               <span class="h4 fw-normal"><strong class="fw-bold">Love to hear from you</strong>
                  <br>
                  Get in touch!
               </span>
               <div id="contact-message"></div>
               <div class="job__contact is__contact mt-30">
                  <form id="contact-form" method="post" enctype="multipart/form-data" action="#" class="d-flex flex-column gap-4">
                     @csrf
                     <div class="search__item">
                        <label for="name" class="mb-4 font-20 fw-medium text-dark text-capitalize">Name</label>
                        <div class="position-relative">
                           <input name="contact_name" type="text" id="name" placeholder="Your Name" value="{{ old('contact_name') }}" autocomplete="off">
                           <i class="fa-light fa-user"></i>
                        </div>
                        <small id="contact_name-error" style="color: red;"></small>
                     </div>
                     <div class="search__item">
                        <label for="cemail" class="mb-4 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                        <div class="position-relative">
                           <input name="contact_email" value="" autocomplete="off" type="text" id="contact_email" placeholder="Enter your email">
                           <i class="rt-mailbox"></i>
                        </div>
                        <small id="contact_email-error" style="color: red;"></small>
                     </div>
                     <div class="search__item">
                        <label class="mb-4 font-20 fw-medium text-dark text-capitalize" for="message">Your Comment</label>
                        <textarea autocomplete="off" name="contact_message" id="contact_message" placeholder="Message"></textarea>
                        <i class="fa-thin fa-comment-lines"></i>
                     </div>
                     <small id="contact_message-error" style="color: red;"></small>

                     <div class="search__item">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                     </div>
                     <small id="g-recaptcha-response-error" style="color: red !important;"></small>

                     <button id="contact-form-button" type="submit" class="rts__btn fill__btn be-1 w-100 rounded-1 apply__btn">
                        Send Message
                     </button>
                  </form>
               </div>
            </div>
            <div class="col-lg-6 ps-5">
               <div class="contact__image">
                  <figure>
                     <img src="{{asset('assets/img/pages/contact.webp')}}" alt="">
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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- jQuery AJAX -->
   <script src="{{ asset('assets/js/subscribe.js') }}"></script>
   <script src="{{ asset('assets/js/contact.js')}}"></script>

</body>

</html>