
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
    <title>SteerHubIT - Blog</title>
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
                    <h1 class="breadcrumb-title h3 mb-3">Blog </h1>
                    <nav>
                        <ul class="breadcrumb m-0 lh-1">
                          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                        <img src="{{asset('assets/img/breadcrumb/shape-3.svg')}}" alt="">
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
                         @forelse($posts as $post)
                        <div class="col-xl-6 col-lg-12">
                            <div class="rts__single__blog">
                                <a href="{{ route('blog.view.single', ['slug' => $post->slug]) }}" class="blog__img">
                                    <img src="{{ asset('uploads/posts/' . $post->featured_image) }}" class="mb-2" alt="blog">
                                </a>
                                <div class="blog__meta">
                                    <div class="blog__meta__info d-flex gap-3 mt-3 mb-2 flex-wrap">
                                        <span class="d-flex gap-2 align-items-center fw-medium"> <img class="svg" src="{{asset('assets/img/icon/calender.svg')}}" alt="" height="16" width="16"> {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</span>
                                        <a href="#" class="d-flex gap-2 align-items-center fw-medium"> <img class="svg" src="{{asset('assets/img/icon/user.svg')}}" alt="" width="12" height="12"> Admin </a>
                                    </div>
                                    <a href="{{ route('blog.view.single', ['slug' => $post->slug]) }}" class="h6 fw-semibold">
                                        {{ $post->title }}
                                    </a>
                                    <a href="{{ route('blog.view.single', ['slug' => $post->slug]) }}" class="readmore__btn d-flex mt-3 gap-2 align-items-center">Read More <i class="fa-light fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @empty 
                            <div class="alert alert-info" >No post found</div>
                        <!-- single blog end -->
                         @endforelse
                    </div>
                    <div class="rts__pagination mx-auto pt-60 max-content">
                        <ul class="d-flex gap-2">
                            {{-- Previous page link --}}
                            <li>
                                @if($posts->onFirstPage())
                                    <a href="#" class="inactive"><i class="rt-chevron-left"></i></a>
                                @else
                                    <a href="{{ $posts->previousPageUrl() }}" class="active"><i class="rt-chevron-left"></i></a>
                                @endif
                            </li>

                            {{-- Loop through the pages --}}
                            @foreach(range(1, $posts->lastPage()) as $page)
                                <li>
                                    <a href="{{ $posts->url($page) }}" class="{{ $page == $posts->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Next page link --}}
                            <li>
                                @if($posts->hasMorePages())
                                    <a href="{{ $posts->nextPageUrl() }}" class="active"><i class="rt-chevron-right"></i></a>
                                @else
                                    <a href="#" class="inactive"><i class="rt-chevron-right"></i></a>
                                @endif
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>


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