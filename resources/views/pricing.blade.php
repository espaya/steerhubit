
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="login-route" content="{{ route('login') }}">
      <meta name="register-url" content="{{ route('register') }}">
    <!-- fabicon -->
    <link rel="shortcut-icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
    <title>Pricing - SteerHubIT</title>
    <!-- rt icons -->
    <link rel="stylesheet" href="{{('assets/fonts/icon/css/rt-icons.css')}}">
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
                    <h1 class="breadcrumb-title h3 mb-3">Pricing</h1>
                    <nav>
                        <ul class="breadcrumb m-0 lh-1">
                          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Pricing</li>
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

    <!-- pricing section -->
    <div class="rts__section pt-110">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-7">
                    <div class="rts__section__content mb-30 text-center  wow animated fadeInUp">
                        <h3 class="rts__section__title mb-3">Choose the Perfect Plan For You</h3>
                        <p class="rts__section__desc">Looking for the best employee. Look no further</p>
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
                    <section class="rts__section section__padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-10">
                    <div class="rts__section__content text-start mb-60  wow animated fadeInUp">
                        <h3 class="rts__section__title section__mb">Frequently Asked Questions</h3>
                        <p class="rts__section__desc">Looking for the best employees. Look no further</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="accordion accordion-flush d-flex flex-column gap-4 style__one" id="rts__accordion">
    
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button p-4 fw-medium border font-20 focus-none" type="button" data-bs-toggle="collapse" data-bs-target="#item_one" aria-expanded="true" aria-controls="item_one">
                                    Why should I subscribe to SteerHubIT?
                                </button>
                            </h2>
                            <div id="item_one" class="accordion-collapse border mt-3 collapse show " data-bs-parent="#rts__accordion">
                                <div class="accordion-body">Find top talent faster! SteerHubIT connects you with qualified candidates, streamlines hiring, and ensures the right fit for your business.</div>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion accordion-flush d-flex flex-column gap-4 style__one" id="rts__accordion2">
    
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button p-4 fw-medium border font-20 focus-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item_two" aria-expanded="false" aria-controls="item_two">
                                    What payment methods do you accept?
                                </button>
                            </h2>
                            <div id="item_two" class="accordion-collapse border mt-3 collapse" data-bs-parent="#rts__accordion">
                                <div class="accordion-body">We accept multiple payment methods, including credit/debit cards, PayPal, and bank transfers.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq section end -->

  
    @include('templates/footer')
    @include('templates/offcanvas')

        <!-- OTP Modal -->
        <div class="modal similar__modal fade " id="otpModal">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="max-content similar__form form__padding">
                  <div id="otp-error-message"></div>
                  <div id="otp-message"></div>                  
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
                  <span class="d-block text-center fw-medium"><a href="#" id="sendNewOtp" class="text-primary">Request new code</a><small>or <a id="loginAgain" href="#">Login Again</a></small></span>
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
      <!-- jQuery AJAX -->
      <script src="{{ asset('assets/js/subscribe.js') }}"></script>

</body>
</html>