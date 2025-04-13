
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
      <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link href="../../css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
      <title> {{ $post->title }} - SteerHubIt</title>
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
                     <h1 class="breadcrumb-title h3 mb-3">Blog</h1>
                     <nav>
                        <ul class="breadcrumb m-0 lh-1">
                           <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                           <li class="breadcrumb-item active" aria-current="page"> {{ $post->title }} </li>
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
      <div class="rts__section section__padding">
         <div class="container">
            <div class="row g-30">
               <div class="col-xl-4 col-lg-5">
                @include('templates/blog-sidebar')
               </div>
               <div class="col-lg-7 col-xl-8">
                  <div class="row g-30">
                     <!-- single blog -->

                     <div class="rts__blog__details">
                        <img src="{{ asset('uploads/posts/' . $post->featured_image) }}" alt="" class="rounded-3 mb-30 mb-md-5">
                        <div>
                        {!! html_entity_decode($post->description) !!}
                        </div>

                        <h6 class="mt-30 mb-20 font-20 fw-medium">Tags</h6>
                        <div class="job__tags is__blog__details mb-30 d-flex flex-wrap gap-3">
                            @if($post && $post->tags)
                                @php
                                    $tags = json_decode($post->tags, true); // decode JSON to PHP array
                                @endphp
                                @if(is_array($tags))
                                    @foreach($tags as $tag)
                                        <a href="#">{{ $tag }}</a>
                                    @endforeach
                                @endif
                            @endif
                        </div>

                        <!-- share -->
                         <div class="d-flex gap-4 mb-20 align-items-center mt-20">
                            <h6 class="fw-semibold">Share</h6>
                            <div class="rts__social d-flex gap-3">
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
                         <!-- share end -->

                         <!-- comment list -->
                          <h6 class="fw-semibold mb-30">Comment</h6>
                          <ul class="comment__list">
                            <li>
                                <div class="is__content">
                                    <div class="d-flex gap-3">
                                        <img height="60" width="60" src="{{ asset('assets/img/author/1.svg')}}" alt="" class="rounded-2 mb-3">
                                        <div class="d-flex flex-column">
                                            <a href="#" class="font-20 text-dark fw-medium">Jonathon Doe</a>
                                            <span>a week ago</span>
                                        </div>
                                    </div>
                                    <p>I still have a lot of studying to do using this course and the other practice exams, but so far it's been great! I have not taken my Security+ exam as well, so I'll update this at a later time.</p>
                                    <a href="#" class="rts__btn reply__btn mt-3">Reply</a>
                                </div>
                            </li>
                            <li>
                                <div class="is__content">
                                    <div class="d-flex gap-3">
                                        <img height="60" width="60" src="{{asset('assets/img/author/1.svg')}}" alt="" class="rounded-2 mb-3">
                                        <div class="d-flex flex-column">
                                            <a href="#" class="font-20 text-dark fw-medium">Jonathon Doe</a>
                                            <span>a week ago</span>
                                        </div>
                                    </div>
                                    <p>I still have a lot of studying to do using this course and the other practice exams, but so far it's been great! I have not taken my Security+ exam as well, so I'll update this at a later time.</p>
                                    <a href="#" class="rts__btn reply__btn mt-3">Reply</a>
                                </div>
                            </li>
                          </ul>
                         <!-- comment list end -->

                         <!-- comment form -->
                         <div class="review__form job__contact mt-40">
                            <h6 class="fw-semibold mb-30">Leave a Comment</h6>
                            <form action="#" class="d-flex flex-column gap-4">
                                <div class="row row-cols-lg-2 row-cols-1 gap-3 gap-lg-0">
                                    <div class="search__item">
                                        <label for="name" class="mb-3 font-20 fw-medium text-dark text-capitalize">Name</label>
                                        <div class="position-relative">
                                            <input type="text" id="name" placeholder="Your Name" autocomplete="off">
                                            <i class="fa-light fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="search__item">
                                        <label for="bemail" class="mb-3 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                                        <div class="position-relative">
                                            <input type="email" id="bemail" placeholder="Enter your email" autocomplete="off">
                                            <i class="rt-mailbox"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="search__item">
                                    <label class="mb-3 font-20 fw-medium text-dark text-capitalize" for="message">Your Comment</label>
                                    <textarea name="message" id="message" placeholder="Message"></textarea>
                                    <i class="fa-thin fa-comment-lines"></i>
                                </div>
                                <button type="submit" class="rts__btn fill__btn be-1 max-content apply__btn">Submit Comment</button>
                            </form>
                        </div>
                         <!-- comment form end -->

                    </div>
                     
                     <!-- single blog end -->
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
                     <h6 class="mb-0">Login To Jobpath</h6>
                     <button type="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-regular fa-xmark text-primary"></i>
                     </button>
                  </div>
                  <div class="d-block has__line text-center">
                     <p>Choose your Account Type</p>
                  </div>
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
                  <div class="d-block has__line text-center">
                     <p>Or</p>
                  </div>
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
                  <div class="d-block has__line text-center">
                     <p>Choose your Account Type</p>
                  </div>
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
                  <div class="d-block has__line text-center">
                     <p>Or</p>
                  </div>
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
            <a href="{{ url('/') }}" class="offcanvas-title" id="offcanvasLabel">
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
   </body>
</html>