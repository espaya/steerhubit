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

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="login-route" content="{{ route('login') }}">
      <meta name="register-url" content="{{ route('register') }}">
      
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
      <title> {{ $profile->fullname }} - SteerHubIT</title>
      <!-- rt icons -->
      <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
      <!-- fontawesome -->
      <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
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
                  <div class="breadcrumb__area max-content breadcrumb__padding">
                     <div class="rts__job__card__big bg-transparent p-0 position-relative z-1 flex-wrap justify-content-between d-flex gap-4 align-items-center">
                        <div class="d-flex gap-4 gap-md-5 align-items-center flex-md-row flex-column mx-auto mx-md-0">
                           <div class="author__icon rounded-2">
                              <img class="" src="{{ $profile->user->avatar ? asset('uploads/avatars/' . $profile->user->avatar) : asset('assets/img/dashboard/profile.png') }}" alt="">
                           </div>
                           <div class="job__meta w-100 d-flex text-center text-md-start flex-column gap-2">
                              <div class="">
                                 <h3 class="job__title h3 mb-0">{{ $profile->fullname }}</h3>
                              </div>
                              <div class="d-flex gap-3 justify-content-center justify-content-md-start flex-wrap mb-3 mt-2">
                                 <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-light fa-location-dot"></i> {{ $profile->present_address .', '. $profile->state . ', ' . $profile->country . ' ' . $profile->postal_code }}
                                 </div>
                              </div>
                              
                              <div class="job__tags d-flex justify-content-center justify-content-md-start flex-wrap gap-3">
                                    <a href="#">{{ $profile->gender }}</a>
                                    <a href="#">{{ $profile->phone }}</a>
                                    <a href="mailto:{{ $profile->user->email }}">{{ $profile->user->email }}</a>
                                </div>
                           </div>
                        </div>
                     </div>
                     <div class="breadcrumb__apply d-flex gap-3 max-content">
                        <a href="{{ asset('uploads/resumes/' . $profile->resume->file) }}" download="{{ $profile->fullname . '_resume' }}" class="rts__btn be-1 apply__btn fill__btn">Download Resume</a>
                     </div>
                  </div>
                  <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">
                     <div class="shape__one common">
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
      <!-- job list one -->
      <div class="rts__section section__padding">
         <div class="container">
            <div class="row g-30">
               <div class="col-lg-7 col-xl-8">
               <div class="job__overview no-border-bottom mb-30">
                                    <!-- <h6 class="fw-semibold mb-30">Job Overview</h6> -->
                                    <div class="job__overview__content candidate__info">
                                        <ul class="d-grid grid-style">
                                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                                <div class="d-flex gap-3">
                                                    <span class="icon">
                                                        <i class="rt-facebook"></i>
                                                    </span>
                                                    <div>
                                                        <span class="left-text"> Facebook</span>
                                                        <span class="text"> <a target="_blank" href="{{ $profile->facebook }}">view</a> </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                                <div class="d-flex gap-3">
                                                    <span class="icon">
                                                        <i class="fa-light rt-linkedin"></i>
                                                    </span>
                                                    <div>
                                                        <span class="left-text"> LinkedIn</span>
                                                        <span class="text"> <a target="_blank" href="{{ $profile->linkedin }}">View</a> </span>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                                <div class="d-flex gap-3">
                                                    <span class="icon">
                                                        <i class="rt-instagram"></i>
                                                    </span>
                                                    <div>
                                                        <span class="left-text"> Instagram</span>
                                                        <span class="text"> <a target="_blank" href="{{ $profile->instagram }}">View</a> </span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                  <div class="rts__job__details">
                     <div id="description" class="mb-30">
                        <h6 class="fw-semibold mb-20">About Candidate</h6>
                        <p>{{ html_entity_decode($profile->description) }}</p>
                     </div>
                     <div id="responsibility" class="mb-30">
                        <h6 class="fw-semibold mb-20">Education</h6>
                        <ul class="timeline">
                                                <li>
                                                    <span class="timeline__title d-block">{{ $profile->resume->degree_institution_name }}</span>
                                                    <span class="timeline__subtitle d-block"> {{ $profile->resume->degree_institution_location }}   ({{ \Carbon\Carbon::parse($profile->resume->degree_year_started)->format('Y') }} - {{ \Carbon\Carbon::parse($profile->resume->degree_year_completed)->format('Y') }}
                                                    )</span>
                                                </li>
                                                <li>
                                                    <span class="timeline__title d-block"> {{ $profile->resume->cert_institution_name }} </span>
                                                    <span class="timeline__subtitle d-block"> {{ $profile->resume->cert_institution_location }}   ({{ \Carbon\Carbon::parse($profile->resume->cert_year_started)->format('Y') }} - {{ \Carbon\Carbon::parse($profile->resume->cert_year_completed)->format('Y') }})</span>
                                                </li>
                                                <li>
                                                    <span class="timeline__title d-block"> {{ $profile->resume->high_school_name }} </span>
                                                    <span class="timeline__subtitle d-block"> {{ $profile->resume->high_school_location }}   ({{ \Carbon\Carbon::parse($profile->resume->high_school_year_started)->format('Y') }} - {{ \Carbon\Carbon::parse($profile->resume->high_school_year_completed)->format('Y') }})</span>
                                                </li>
                                            </ul>
                     </div>
                     <div id="skill" class="mb-30">
                        <h6 class="fw-semibold mb-20">Skills</h6>
                        <div class="job__tags job__details__tags">
                            @foreach (explode(',', $profile->resume->skills) as $skill)
                                <a href="#" class="job__tag">{{ trim($skill) }}</a>
                            @endforeach
                        </div>
                     </div>
                  </div>
                  
               </div>

               <div class="col-lg-5 col-xl-4 d-flex flex-column gap-40">
                  <div class="recent__post">
                    @if($relatedProfiles && $relatedProfiles->isNotEmpty())
                     <h5 class="fw-bold mb-30">Related Candidates</h5>
                     <div class="team__list flex-column d-flex gap-3">
                    @endif

                     @forelse($relatedProfiles as $related)
                        <div class="border-bottom pb-3 d-flex justify-content-between align-items-center gap-3">
                           <div class="d-flex gap-3 flex-wrap gap-xl-5">
                              <div class="d-flex gap-4 flex-column flex-md-row mb-3 mb-md-0 justify-content-start align-items-start align-items-md-center">
                                 <div class="author__icon small__thumb">
                                    <img src="{{ $related->user->avatar ? asset('uploads/avatars/' . $related->user->avatar) : asset('assets/img/dashboard/profile.png')}}" alt="">
                                 </div>
                                 <div class="job__meta">
                                    <div class="d-flex align-items-start flex-column mb-2">
                                       <a href="#" class="job__title mb-0 h6 fw-semibold"> {{ $related->fullname }} </a>
                                    </div>
                                    <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                       <div class="d-flex gap-2 align-items-center">
                                          <i class="fa-light fa-location-dot"></i> {{ $related->state . ', ' . $related->country }}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                    @empty 
                    @endforelse

                     </div>
                  </div>
                  <!-- team end -->
               </div>
            </div>
         </div>
      </div>
      <!-- job list one end -->

      @include('templates/login_temp')
      

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