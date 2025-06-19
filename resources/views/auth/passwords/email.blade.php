<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="mobile-web-app-capable" content="yes">
   <meta name="description" content="Whether you're a healthcare professional seeking new opportunities or a healthcare organization looking for top talent, we're here to guide you through the process. Let's navigate the job market together.">
   <meta name="keywords" content="Job, Resume, Employer, Agency, SteerHubIT">
   <link rel="canonical" href="{{ url('/') }}">
   <meta name="robots" content="index, follow">
   <!-- for open graph social media -->
   <meta property="og:title" content="SteerHubIT">
   <meta property="og:description" content="Whether you're a healthcare professional seeking new opportunities or a healthcare organization looking for top talent, we're here to guide you through the process. Let's navigate the job market together.">
   <meta property="og:image" content="{{ asset('assets/img/favicon-16x16.png') }}">
   <meta property="og:url" content="{{ url('/') }}">
   <!-- for twitter sharing -->

   <meta name="csrf-token" content="{{ csrf_token() }}">

   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="SteerHubIT">
   <meta name="twitter:description" content="Whether you're a healthcare professional seeking new opportunities or a healthcare organization looking for top talent, we're here to guide you through the process. Let's navigate the job market together.">
   <!-- fabicon -->
   <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
   <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
   <title>Reset Password - SteerHubIT</title>
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
                  <h1 class="breadcrumb-title h3 mb-3">Reset Password</h1>
                  <nav>
                     <ul class="breadcrumb m-0 lh-1">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
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
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <form action="{{ route('password.email') }}" method="POST" class="d-flex flex-column gap-4">
                    @csrf
                     <div class="search__item">
                        <label for="name" class="mb-4 font-20 fw-medium text-dark text-capitalize">Email Address</label>
                        <div class="position-relative">
                           <input value="{{ old('email') }}" type="text" name="email" id="email" autocomplete="off" placeholder="youremail@example.com">
                           <i class="fas fa-envelope"></i>
                        </div>
                        @error('email')
                        <small class="text-danger"> {{ $message }} </small>
                        @enderror
                     </div>
                     <input type="hidden" id="timezone" name="timezone">
                     <button type="submit" class="rts__btn fill__btn be-1 w-100 rounded-1 apply__btn">
                        Send Reset Link 
                     </button>
                  </form>
                  <div style="margin-top: 20px;">
                     <span class="d-block text-center fw-medium">Remember your password? <a href="{{ route('login') }}">Sign in here</a></small></span>
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

   <script src="{{ asset('assets/js/subscribe.js') }}"></script>


</body>

</html>