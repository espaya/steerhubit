<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="description" content="Your Ultimate Job HTML Template">
      <meta name="keywords" content="Job, Resume, Employer, Agency">
      <link rel="canonical" href="https://html.themewant.com/jobpath">
      <meta name="robots" content="index, follow">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- for open graph social media -->
      <meta property="og:title" content="Your Ultimate Job HTML Template">
      <meta property="og:description" content="Your Ultimate Job HTML Template">
      <meta property="og:image" content="https://www.example.com/image.jpg">
      <meta property="og:url" content="https://html.themewant.com/jobpath/">
      <!-- for twitter sharing -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Your Ultimate Job HTML Template">
      <meta name="twitter:description" content="Your Ultimate Job HTML Template">
      <meta name="login-route" content="{{ route('login') }}">
      <meta name="register-url" content="{{ route('register') }}">
      <!-- fabicon -->
      <link rel="shortcut-icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
      <title>{{ $job ? $job->title : '' }} - SteeHubIT</title>
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
                  <div class="breadcrumb__area max-content breadcrumb__padding">
                     <div class="rts__job__card__big bg-transparent p-0 position-relative z-1 flex-wrap justify-content-between d-flex gap-4 align-items-center">
                        <div class="d-flex gap-4 align-items-center flex-md-row flex-column mx-auto mx-md-0">
                           <div class="company__icon rounded-2 bg-white">
                              <img class="" src="{{ $employer_avatar && $employer_avatar->avatar ? asset('uploads/avatars/' . $employer_avatar->avatar) : asset('assets/img/dashboard/profile.png')}}" alt="">
                           </div>
                           <div class="job__meta w-100 d-flex text-center text-md-start flex-column gap-2">
                              <div class="">
                                 <h3 class="job__title h3 mb-0">{{ $job ? $job->title : '' }}</h3>
                              </div>
                              <div class="d-flex gap-3 justify-content-center justify-content-md-start flex-wrap mb-3 mt-2">
                                 <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-light fa-location-dot"></i> {{ $job ? $job->address : '' }}
                                 </div>
                                 <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-light rt-briefcase"></i> {{ $job ? $job->working_day : '' }}
                                 </div>
                                 <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-light fa-clock"></i> {{ $job ? $job->created_at->diffForHumans() : '' }}
                                 </div>
                                 <div class="d-flex gap-2 fw-medium align-items-center">
                                    <i class="fa-light rt-price-tag"></i> USD {{ $job ? number_format($job->pay, 2, '.', ',') : '' }}
                                 </div>
                              </div>
                           </div>
                        </div>
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
               <div class="col-lg-8">
               <div id="apply-message" class="mt-"></div>
                  <div class="rts__job__details">
                     <div id="description" class="mb-">
                        {!! html_entity_decode($job->description) !!}
                     </div>
                     <div class="d-flex flex-wrap gap-4 mt-40 mb-60">
                        <a data-id="{{ $job->id }}" id="apply-job-1" href="#" class="rts__btn apply__btn fw-bold apply-job">Apply This Position</a>
                     </div>
                  </div>
                  @if($job && $job->video)
                  <div class="video__section mt-40">
                     <h5 class="mb-30 d-block">Job apply Process video</h5>
                     <div class="video__section__content">
                        <img src="{{asset('assets/img/youtube.avif')}}" width="100%" alt="">
                        <a href="{{ $job->video }}" class="video__play__btn" title="Play Video" data-lightbox="">
                        <i class="fa-sharp fa-solid fa-play"></i>
                        </a>
                     </div>
                  </div>
                  @endif
               </div>
               <div class="col-lg-4 d-flex flex-column gap-40">
                  <div class="company__card">
                     <div class="icon">
                        <img src="{{ $employer_avatar && $employer_avatar->avatar ? asset('uploads/avatars/' . $employer_avatar->avatar) : asset('assets/img/dashboard/profile.png')}}" alt="">
                     </div>
                     <h5 class="company__name mt-20">{{ $employer_website ? $employer_website : ''  }}</h5>
                     @php
                        $website = $employer_website;
                        if ($website && !preg_match('/^(https?:\/\/|www\.)/i', $website)) {
                           $website = 'https://' . $website;
                        }
                     @endphp
                     @if($employer_website)
                     <a href="{{ $employer_website ? $website : ''  }}" class="company__link d-block mt-20" aria-label="Visit Website" target="_blank">Visit Website</a>
                     @elseif($job->website)
                     <a href="{{ $job->website ? $job->website : ''  }}" class="company__link d-block mt-20" aria-label="Visit Website" target="_blank">Visit Website</a>
                     @endif
                     <a data-id="{{ $job->id }}" id="apply-job-2" href="#" class="rts__btn apply__btn mt-40 apply-job">Apply This Position</a>
                  </div>
                  <div class="job__overview">
                     <h6 class="fw-semibold mb-20">Job Overview</h6>
                     <div class="job__overview__content">
                        <ul>
                           <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                              <span class="left-text"> <i class="rt-calender"></i> Date Posted</span>
                              <span class="text">:  {{ \Carbon\Carbon::parse($job->created_at)->format('F d, Y') }}</span>
                           </li>
                           <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                              <span class="left-text"> <i class="fa-light fa-user"></i> No. of Applicants</span>
                              <span class="text">: {{ $job->applicants }}</span>
                           </li>
                           <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                              <span class="left-text"> <i class="rt-experience"></i> Experience</span>
                              <span class="text">: {{ $job->experience }}</span>
                           </li>
                           <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                              <span class="left-text"> <i class="rt-price-tag"></i> Offered Salary</span>
                              <span class="text">: USD {{ $job ? number_format($job->pay, 2, '.', ',') : '' }}</span>
                           </li>
                           <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                              <span class="left-text"> <i class="rt-loading"></i> Job Deadline</span>
                              <span class="text">: {{ \Carbon\Carbon::parse($job->deadline)->format('F d, Y') }}</span>
                           </li>
                           <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                              <span class="left-text"> <i class="rt-qualification"></i> Qualification</span>
                              <span class="text">: {{ $job->qualification }}</span>
                           </li>
                           <li class="d-flex flex-wrap gap-3 gap-sm-0 align-items-center justify-content-between">
                              <span class="left-text"> <i class="fa-sharp fa-thin fa-location-dot"></i> Location</span>
                              <span class="text">: {{ $job->address . ', ' . $job->country }}</span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- job list one end -->
      <!-- top employer -->
      <div class="rts__section pb-120 overflow-hidden">
         <div class="container">
            <div class="row justify-content-center position-relative">
               <div class="col-xl-6 col-lg-10">
                  <div class="rts__section__content text-center mb-60">
                     <h3 class="rts__section__title section__mb">Related Jobs</h3>
                     <p class="rts__section__desc">Looking for your next career opportunity. Look no further.</p>
                  </div>
               </div>
               <div class="rts__slider__control d-none d-md-flex style-gray z-3 w-100 justify-content-between g-0 position-absolute top-50  translate-middle-y">
                  <div class="rts__slide__next slider__btn"><i class="fa-sharp fa-solid fa-chevron-left"></i></div>
                  <div class="rts__slide__prev slider__btn"><i class="fa-sharp fa-solid fa-chevron-right"></i></div>
               </div>
            </div>
            <div class="row swiper-data overflow-hidden" data-swiper='{
               "slidesPerView": 4.1,
               "autoplay": true,
               "loop": true,
               "navigation": {
               "nextEl": ".rts__slide__next",
               "prevEl": ".rts__slide__prev"
               },
               "breakpoints": {
               "0": {
               "slidesPerView": 1.05
               },
               "576": {
               "slidesPerView": 1.05
               },
               "768": {
               "slidesPerView": 2.05
               },
               "992": {
               "slidesPerView": 3.05
               },
               "1200": {
               "slidesPerView": 4.05
               }
               }
               }'>
               <div class="swiper-wrapper">
                  <!-- single slide -->
                   @forelse($relatedJob as $related)
                  <div class="swiper-slide">
                     <div class="rts__job__card style__five">
                        <div class="d-flex align-items-center justify-content-between">
                           <div class="company__icon">
                              <img width="100%" height="100%" src="{{ $employer_avatar && $employer_avatar->avatar ? asset('uploads/avatars/' . $employer_avatar->avatar) : asset('assets/img/dashboard/profile.png')}}" alt="">
                           </div>
                           <div class="featured__option">
                              <span>Featured</span>
                           </div>
                        </div>
                        <div class="d-flex gap-3 mt-4 flex-wrap">
                           <div class="d-flex gap-2 align-items-center font-sm">
                              <i class="fa-light fa-location-dot"></i> {{ $related->address }}
                           </div>
                           <div class="d-flex gap-2 align-items-center font-sm">
                              <i class="fa-light fa-briefcase"></i> {{ $related->working_day }}
                           </div>
                        </div>
                        <div class="font-20 fw-medium job__title mt-3 mb-2">
                           <a href="{{ route('job.view', ['slug' => $related->slug]) }}" aria-label="job" class="job__title">
                           {{ $related->title }}
                           </a>
                        </div>
                        <div class="job__tags d-flex flex-wrap gap-2 mt-4">
                        {!! Str::words(strip_tags(html_entity_decode($related->description)), 20, '...') !!}
                        </div>

                     </div>
                  </div>
                  @empty 
                  @endforelse
                  <!-- single slide end -->
               </div>
            </div>
         </div>
      </div>
      <!-- app center end -->
      
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
      <script src="{{asset('assets/js/apply-job.js')}}"></script>
      <script src="{{ asset('assets/js/subscribe.js') }}"></script>
  
   </body>
</html>