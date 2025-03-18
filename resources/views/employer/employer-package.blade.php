
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
    <title>SteerHubIt - Package</title>
    <!-- rt icons -->
    <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
    <!-- all plugin css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body class="template-dashboard">
    <!-- header area -->
@include('employer/employer_temp/header')
<!-- header area end -->

    <!-- content area -->
    <div class="dashboard__content d-flex">
            @include('employer/employer_temp/sidebar')
        <div class="dashboard__right">
            <div class="dash__content ">
                <!-- sidebar menu -->
                <div class="sidebar__menu d-md-block d-lg-none">
                    <div class="sidebar__action"><i class="fa-sharp fa-regular fa-bars"></i> Sidebar</div>
                </div>
                <!-- sidebar menu end -->
                <h6 class="fw-semibold mb-4">Your Packages</h6>

                <form action="#" class="package__form mb-30">
                    <div class="package__selection">
                        <div class="single__package__selection">
                            <input type="radio" id="package1" name="package" checked="" class="form-selection">
                            <label for="package1" class="form-selection-label">
                                <span class="h6 fw-semibold d-block">Basic</span>
                                <span>10 job posted out of 40, listed for 10 days</span>
                            </label>
                        </div>
                        <div class="single__package__selection">
                            <input type="radio" id="package2" name="package" class="form-selection">
                            <label for="package2" class="form-selection-label">
                                <span class="h6 fw-semibold d-block">Premium</span>
                                <span>10 job posted out of 40, listed for 10 days</span>
                            </label>
                        </div>
                    </div>
                </form>
                <!-- show -->
                

                <div class="dash__pricing__plan">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold">Pricing Plan</h6>
                        <div class="d-flex align-items-center max-content gap-2">
                            <p class="mb-0">Monthly</p>
                            <label for="pricing__toogle" class="switch">
                                <input type="checkbox" name="pricing__toogle" class="pricing__toogle" id="pricing__toogle">
                                <span class="slider round"></span>
                            </label>
                            <p class="mb-0">Yearly</p>
                        </div>
                    </div>
                    <div class="monthly__pricing active mt-40">
                        <div class="row g-30">
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Basic</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">30$</span>Month</div>
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Premium</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">100$/</span>Month</div>
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Basic</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">130$</span>Month</div>
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Standard</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">299$</span>Month</div>
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
                    <div class="yearly__pricing mt-40">
                        <div class="row g-30">
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Free</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">Free/</span>Yearly</div>
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Basic</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">399$</span>Yearly</div>
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Standard</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">599$</span>Yearly</div>
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Free</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">Free/</span>Yearly</div>
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Basic</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">399$</span>Yearly</div>
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
                            <div class="col-lg-6 col-xl-4 col-md-6">
                                <div class="rts__pricing__box">
                                    <div class="h6 fw-medium lh-1 mb-2 text-primary">Standard</div>
                                    <div class="plan__price lh-1 mb-40"><span class="h2 mb-0 me-1">599$</span>Yearly</div>
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
            @include('employer/employer_temp/footer')
        </div>
    </div>
    <!-- content area end -->
    

  
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