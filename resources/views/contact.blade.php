
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
    <title>SteerHubIT - Contact Us</title>
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
    <!-- contact map -->
    <div class="gmap">
        <div class="container-fluid">
            <div class="full__map">
                <iframe height="600" src="https://maps.google.com/maps?width=100%25&height=600&hl=en&q=reacthemes+(reacthemes)&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe>
            </div>
            
        </div>
    </div>
    <!-- contact map end -->

    <!-- contact method -->
    <div class="rts__section is__half__section ">
        <div class="container">
            <div class="row justify-content-center g-0 is__no__border rounded-3 shadow-rt-sm bg-white">
                <div class="col-lg-4 col-md-6">
                    <div class="rts__workprocess__box is__contact ">
                        <div class="rts__icon">
                            <img src="assets/img/icon/location.svg" alt="">
                        </div>
                        <span class="process__title h6 d-block">Location</span>
                        <p class="fw-medium">Some St Name Here, 23456
                        </p>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="rts__workprocess__box is__contact ">
                        <div class="rts__icon">
                            <img src="assets/img/icon/mail.svg" alt="">
                        </div>
                        <span class="process__title h6 d-block">Email</span>
                        <a class="text-para fw-medium" href="mailto:info@steerhubIT.com">info@steerhubIT.com</a>
                        <a class="text-para fw-medium" href="mailto:recruitment@steerhubIT.com">recruitment@steerhubIT.com</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="rts__workprocess__box is__contact ">
                        <div class="rts__icon">
                            <img src="assets/img/icon/phone.svg" alt="">
                        </div>
                        <span class="process__title h6 d-block">Call</span>
                       <a class="fw-medium text-para d-block" href="tel:+44-20-7328-4499">+44-20-7328-4499</a>
                       <a class="fw-medium text-para" href="tel:+44-20-7328-4499">+44-20-7328-4499</a>
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
                <div class="col-lg-6 pe-5">
                    <div class="contact__image">
                        <figure>
                            <img src="assets/img/pages/contact.webp" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <span class="h4 fw-normal"><strong class="fw-bold">Love to hear from you</strong>
                        <br>
                        Get in touch!
                    </span>
                    <div class="job__contact is__contact mt-30">
                        <form action="#" method="post" class="d-flex flex-column gap-4">
                            @csrf
                            <div class="search__item">
                                <label for="name" class="mb-4 font-20 fw-medium text-dark text-capitalize">Name</label>
                                <div class="position-relative">
                                    <input type="text" id="name" placeholder="Your Name" name="name"  autocomplete="off">
                                    <i class="fa-light fa-user"></i>
                                </div>
                            </div>
                            <div class="search__item">
                                <label for="cemail" class="mb-4 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                                <div class="position-relative">
                                    <input type="email" id="cemail" placeholder="Enter your email" name="email" autocomplete="off">
                                    <i class="rt-mailbox"></i>
                                </div>
                            </div>
                            <div class="search__item">
                                <label class="mb-4 font-20 fw-medium text-dark text-capitalize" for="message">Your Comment</label>
                                <textarea name="message" id="message" placeholder="Message" autocomplete="off"></textarea>
                                <i class="fa-thin fa-comment-lines"></i>
                            </div>
                            <button type="submit" class="rts__btn fill__btn be-1 w-100 rounded-1 apply__btn">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
     </div>
    <!-- contact form end -->


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
<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>