
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
    <link rel="shortcut-icon" href="{{asset('assets/img/favicon-16x16.png')}}" type="image/x-icon">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <title>SteerHubIT - Choose Subscription Plan</title>
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
                    <h1 class="breadcrumb-title h3 mb-3">Subscription</h1>
                    <nav>
                        <ul class="breadcrumb m-0 lh-1">
                          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Subscription</li>
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
                        <h3 class="rts__section__title mb-3">Choose the Perfect Plan For You</h3>
                        <p class="rts__section__desc">Looking for your next career opportunity.</p>
                    </div>
                </div>
            </div>
            <div class="monthly__pricing active">
                <div class="row g-30">
                    <div class="col-lg-6 col-xl-4 col-md-12">
                        <div class="rts__pricing__box">
                            <div class="h6 fw-medium lh-1 mb-2 text-primary">1 Month</div>
                            <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">Trial</span></div>
                            <ul class="plan__feature">
                                <li><i class="fa-sharp fa-solid fa-check"></i> Unlimited access to 100+ Job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> 10+ Featured job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Job duration for 30 days</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Get 10+ job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Try for free, forever!</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Individual Job</li>
                            </ul>
                            <a href="#" class="rts__btn pricing__btn  no__fill__btn mt-40">Get Started Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-md-12">
                        <div class="rts__pricing__box">
                            <div class="h6 fw-medium lh-1 mb-2 text-primary">Basic</div>
                            <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">99$</span>Month</div>
                            <ul class="plan__feature">
                                <li><i class="fa-sharp fa-solid fa-check"></i> Unlimited access to 100+ Job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> 10+ Featured job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Job duration for 30 days</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Get 10+ job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Try for free, forever!</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Individual Job</li>
                            </ul>
                            <a href="#" class="rts__btn pricing__btn  no__fill__btn mt-40">Get Started Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-md-12">
                        <div class="rts__pricing__box">
                            <div class="h6 fw-medium lh-1 mb-2 text-primary">Standard</div>
                            <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">199$</span>Month</div>
                            <ul class="plan__feature">
                                <li><i class="fa-sharp fa-solid fa-check"></i> Unlimited access to 100+ Job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> 10+ Featured job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Job duration for 30 days</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Get 10+ job</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Try for free, forever!</li>
                                <li><i class="fa-sharp fa-solid fa-check"></i> Individual Job</li>
                            </ul>
                            <a href="#" class="rts__btn pricing__btn  no__fill__btn mt-40">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pricing section end -->

    <!-- faq section -->
    <section class="rts__section section__padding"></section>
    <!-- faq section end -->

    
    <div class="rts__section pb-120">
        <div class="container">
            <div class="row">
                <div class="rts__appcenter">
                    <div class="rts__appcenter__shape">
                        <img src="{{asset('assets/img/home-1/app/shape.png')}}" alt="">
                    </div>
                    <div class="rts__appcenter__content d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between justify-content-lg-center">
                        <div class="content__left align-items-end d-flex position-relative top-15px">
                            <img src="{{asset('assets/img/home-1/app/app_screen.png')}}" alt="">
                        </div>
                        <div class="content__right text-white text-center text-xl-start max-630">
                            <h3 class="l--1 mb-4 text-white wow animated fadeInUp" data-wow-delay=".1s ">Download The app Free!</h3>
                            <p class="wow animated fadeInUp" data-wow-delay=".2s">Looking for a new job can be both exciting and daunting. Navigating the job market involves exploring various avenues.</p>
                            <div class="d-flex gap-3 justify-content-center justify-content-xl-start flex-wrap mt-40 wow animated fadeInUp" data-wow-delay=".3s">
                                <div class="link">
                                    <a href="https://appstore.com" target="_blank" title="app store">
                                        <img src="{{asset('assets/img/home-1/app/app-store.svg')}}" alt="">
                                    </a>
                                </div>
                                <div class="link">
                                    <a href="https://google.com" target="_blank" title="play store">
                                        <img src="{{asset('assets/img/home-1/app/play-store.svg')}}" alt="">
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
                <h6 class="mb-0">Login To SteerHubIT</h6>
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
                    <button><img src="{{asset('assets/img/icon/google-small.svg')}}" alt="">Continue with Google</button>
                </div>
                <div class="is__social facebook">
                    <button><img src="{{asset('assets/img/icon/facebook-small.svg')}}" alt="">Continue with Facebook</button>
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
                    <button><img src="{{asset('assets/img/icon/google-small.svg')}}" alt="">Continue with Google</button>
                </div>
                <div class="is__social facebook">
                    <button><img src="{{asset('assets/img/icon/facebook-small.svg')}}" alt="">Continue with Facebook</button>
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
      <script src="{{ asset('assets/js/new-otp.js') }}"></script>
      <!-- jQuery AJAX -->
      <script src="{{ asset('assets/js/signup.js') }}"></script>
      <script src="{{ asset('assets/js/subscribe.js') }}"></script>
      <script src="{{ asset('assets/js/signin.js') }}"></script>
      <script src="{{ asset('assets/js/otp-verification.js')}}"></script>
</body>
</html>