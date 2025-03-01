<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="description" content="Your Ultimate Job HTML Template">
      <meta name="keywords" content="Job, Resume, Employer, Agency">
      <link rel="canonical" href="https://steerhubit.com/">
      <meta name="robots" content="index, follow">
      <!-- for open graph social media -->
      <meta property="og:title" content="Your Ultimate Job HTML Template">
      <meta property="og:description" content="Your Ultimate Job HTML Template">
      <meta property="og:image" content="https://www.example.com/image.jpg">
      <meta property="og:url" content="https://steerhubit.com/">
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
      <title>SteerHubIT - Building Connections</title>
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
      <!-- banner area -->
      <section class="rts__banner home__one__banner pt-260">
         <div class="rts__banner__background">
            <div class="shape__home__one __first d-none d-lg-block">
               <img src="{{asset('assets/img/home-1/banner/banner-shape.svg')}}" alt="">
            </div>
            <div class="shape__home__one __second d-none d-lg-block">
               <img src="{{asset('assets/img/home-1/banner/banner-shape-2.svg')}}" alt="">
            </div>
            <div class="shape__home__one __third">  
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="rts__banner__wrapper d-flex gap-4 justify-content-between ">
                  <div class="rts__banner__content">
                     <h1 class="rts__banner__title wow animated fadeInUp ">
                        Find Your 
                        Dream Job / Employees With 
                        <span>SteerHubIT</span>
                     </h1>
                     <p class="rts__banner__desc my-40 wow animated fadeInUp" data-wow-delay=".1s">
                        Looking for a new job or the best employee can be both exciting and daunting. Navigating the job market involves exploring various avenues, including online job boards.
                     </p>
                     <div class="rts__job__search wow animated fadeInUp" data-wow-delay=".2s">
                        <form action="#" class="d-flex align-items-center flex-wrap flex-md-nowrap flex-lg-wrap flex-xl-nowrap gap-4 gap-xl-0 justify-content-between">
                           <div class="input-group flex-wrap d-flex gap-4">
                              <div class="single__input d-flex flex-column">
                                 <label for="location">location</label>
                                 <select name="location" class="select-nice" id="location">
                                    <option value="1">Select Location</option>
                                    <option value="2">Dhaka</option>
                                    <option value="3">Barisal</option>
                                    <option value="4">Chittagong</option>
                                 </select>
                              </div>
                              <div class="vr d-none d-sm-block"></div>
                              <div class="single__input d-flex flex-column">
                                 <label for="job__type">job type</label>
                                 <select name="job__type" class="select-nice" id="job__type">
                                    <option value="1">Select Job Type</option>
                                    <option value="2">Full Time</option>
                                    <option value="3">Part Time</option>
                                    <option value="4">Internship</option>
                                 </select>
                              </div>
                           </div>
                           <button type="submit" class="rts__btn gap-2 fill__btn job__search" aria-label="Search"><i class="fa-light fa-magnifying-glass"></i> Search Job</button>
                        </form>
                     </div>
                  </div>
                  <div class="rts__banner__image position-relative">
                     <figure class="banner__image">
                        <img src="{{asset('assets/img/home-1/banner/image_2x.webp')}}" alt="banner">
                     </figure>
                     <div class="banner__image__shape">
                        <div class="facebook">
                           <i class="fab fa-facebook"></i>
                        </div>
                        <div class="twitter">
                           <i class="fab fa-twitter"></i>
                        </div>
                        <div class="linkedin">
                           <i class="fab fa-linkedin-in"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- banner area end -->
      <!-- work process area -->
      <section class="rts__section section__padding">
         <div class="container">
            <div class="row justify-content-center mb-60">
               <div class="col-xl-6 col-lg-10">
                  <div class="rts__section__content text-center wow animated fadeInUp">
                     <h3 class="rts__section__title section__mb">How SteerHubIT Works</h3>
                     <p class="rts__section__desc">SteerHubIT connects you to top employers through a seamless process. Simply create an account, upload your CV, and get matched with the best job opportunities. Our platform ensures a smooth journey from application to placement</p>
                  </div>
               </div>
            </div>
            <div class="row g-30 justify-content-center">
               <div class="col-lg-4 col-md-10 wow animated fadeInUp" data-wow-delay=".1s">
                  <div class="rts__workprocess__box">
                     <div class="rts__icon">
                        <img src="{{asset('assets/img/home-1/process/icon-1.svg')}}" alt="">
                     </div>
                     <span class="process__title h6 d-block">Create an Account</span>
                     <p>Sign up quickly and gain access to exclusive job opportunities.
                     </p>
                     <div class="work__readmore mt-3">
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-10 wow animated fadeInUp" data-wow-delay=".2s">
                  <div class="rts__workprocess__box">
                     <div class="rts__icon">
                        <img src="{{asset('assets/img/home-1/process/icon-2.svg')}}" alt="">
                     </div>
                     <span class="process__title h6 d-block">Make Your Resume Amazing</span>
                     <p>Showcase your skills and experience by uploading your CV to our platform.
                     </p>
                     <div class="work__readmore mt-3">
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-10 wow animated fadeInUp" data-wow-delay=".3s">
                  <div class="rts__workprocess__box">
                     <div class="rts__icon">
                        <img src="{{asset('assets/img/home-1/process/icon-3.svg')}}" alt="">
                     </div>
                     <span class="process__title h6 d-block">Apply  job</span>
                     <p>Our system matches you with employers, helping you land a job.
                     </p>
                     <div class="work__readmore mt-3">
                        <!-- <a href="#">Read More <i class="fas fa-arrow-right"></i></a> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- work process area end -->
      <!-- cat slider -->
      <div class="rts__section overflow-hidden cat__slider__bg pt-100 pb-100">
         <div class="container">
            <div class="row justify-content-between mb-50 gap-4 position-relative mtn-1">
               <div class="col-xl-6 col-lg-10">
                  <div class="rts__section__content text-start wow animated fadeInUp">
                     <h3 class="rts__section__title section__mb">Browse Job Category</h3>
                     <p class="rts__section__desc">Looking for your next career opportunity. Look no further</p>
                  </div>
               </div>
               <div class="rts__slider__control align-items-end 
                  position-relative position-md-absolute right-md-0 bottom-md-0 z-3 d-flex gap-2 max-contnet">
                  <div class="rts__slide__next slider__btn"><i class="fa-sharp fa-solid fa-chevron-left"></i></div>
                  <div class="rts__slide__prev slider__btn"><i class="fa-sharp fa-solid fa-chevron-right"></i></div>
               </div>
            </div>
            <div class="row">
               <div class="cat__slider overflow-hidden swiper-data @@style" data-swiper='
                  {
                  "slidesPerView": 4, 
                  "spaceBetween": 30,
                  "loop": true,
                  "speed": 1000,
                  "autoplay":{
                  "delay":"7000"
                  },
                  "pagination": {
                  "el": ".rts__pagination",
                  "clickable": true
                  },
                  "navigation": {
                  "nextEl": ".rts__slide__next",
                  "prevEl": ".rts__slide__prev"
                  },
                  "breakpoints": {
                  "0": {
                  "slidesPerView": 1
                  },
                  "490": {
                  "slidesPerView": 1.5
                  },
                  "768": {
                  "slidesPerView": 2
                  },
                  "1024": {
                  "slidesPerView": 3
                  },
                  "1200": {
                  "slidesPerView": 3.5
                  },
                  "1400": {
                  "slidesPerView": 4
                  }
                  }
                  }'>
                  <div class="swiper-wrapper">
                     <div class="swiper-slide">
                        <div class="single__cat d-flex gap-4">
                           <div class="single__cat__icon color-1">
                              <img src="{{asset('assets/img/home-1/cat/1.svg')}}" alt="">
                           </div>
                           <div class="single__cat__link d-flex flex-column">
                              <a href="job-list-1.html" aria-label="cat__label">Development</a>
                              <span>130+ Jobs</span>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="single__cat d-flex gap-4">
                           <div class="single__cat__icon color-2">
                              <img src="{{asset('assets/img/home-1/cat/2.svg')}}" alt="">
                           </div>
                           <div class="single__cat__link d-flex flex-column">
                              <a href="job-list-1.html" aria-label="cat__label">Design &amp; arts</a>
                              <span>130+ Jobs</span>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="single__cat d-flex gap-4">
                           <div class="single__cat__icon color-3">
                              <img src="{{asset('assets/img/home-1/cat/3.svg')}}" alt="">
                           </div>
                           <div class="single__cat__link d-flex flex-column">
                              <a href="job-list-1.html" aria-label="cat__label">Accounting</a>
                              <span>130+ Jobs</span>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="single__cat d-flex gap-4">
                           <div class="single__cat__icon color-4">
                              <img src="{{asset('assets/img/home-1/cat/4.svg')}}" alt="">
                           </div>
                           <div class="single__cat__link d-flex flex-column">
                              <a href="job-list-1.html" aria-label="cat__label">Marketting</a>
                              <span>130+ Jobs</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- cat slider end -->
      <!-- current open position -->
      <section class="rts__section section__padding">
         <div class="container">
            <div class="row justify-content-center mb-60">
               <div class="col-xl-6 col-lg-10">
                  <div class="rts__section__content text-center wow animated fadeInUp">
                     <h3 class="rts__section__title section__mb">There Are More Then 1000+ Jobs in SteerHubIT</h3>
                     <p class="rts__section__desc">From entry-level positions to executive roles browse through.</p>
                  </div>
               </div>
            </div>
            <div class="row g-30 wow animated fadeInUp" data-wow-delay=".0s">
               <!-- single job -->
               <div class="col-lg-6 col-xl-4 col-md-6">
                  <div class="rts__job__card">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="company__icon">
                           <img src="{{asset('assets/img/home-1/company/apple.svg')}}" alt="">
                        </div>
                        <div class="featured__option">
                           <span>Featured</span>
                        </div>
                     </div>
                     <div class="d-flex gap-3 mt-4 flex-wrap">
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-location-dot"></i> Newyork, USA
                        </div>
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-briefcase"></i> Full Time
                        </div>
                     </div>
                     <div class="h6 job__title my-3">
                        <a href="job-details-1.html" aria-label="job">
                        Senior UI Designer, Apple
                        </a>
                     </div>
                     <p>Consectetur adipisicing elit. Possimus 
                        aut mollitia eum ipsum fugiat odio officiis odit mollitia eum ipsum.
                     </p>
                     <div class="job__tags d-flex flex-wrap gap-3 mt-4">
                        <a href="#">Creative</a>
                        <a href="#">user interface</a>
                        <a href="#">web ui</a>
                     </div>
                  </div>
               </div>
               <!-- single job end -->
               <!-- single job -->
               <div class="col-lg-6 col-xl-4 col-md-6">
                  <div class="rts__job__card">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="company__icon">
                           <img src="{{asset('assets/img/home-1/company/google.svg')}}" alt="">
                        </div>
                        <div class="featured__option">
                        </div>
                     </div>
                     <div class="d-flex gap-3 mt-4 flex-wrap">
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-location-dot"></i> Newyork, USA
                        </div>
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-briefcase"></i> Full Time
                        </div>
                     </div>
                     <div class="h6 job__title my-3">
                        <a href="job-details-1.html" aria-label="job">
                        Senior UX Designer, Google
                        </a>
                     </div>
                     <p>Consectetur adipisicing elit. Possimus 
                        aut mollitia eum ipsum fugiat odio officiis odit mollitia eum ipsum.
                     </p>
                     <div class="job__tags d-flex flex-wrap gap-3 mt-4">
                        <a href="#">Creative</a>
                        <a href="#">user interface</a>
                        <a href="#">web ui</a>
                     </div>
                  </div>
               </div>
               <!-- single job end -->
               <!-- single job -->
               <div class="col-lg-6 col-xl-4 col-md-6">
                  <div class="rts__job__card">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="company__icon">
                           <img src="{{asset('assets/img/home-1/company/microsoft.svg')}}" alt="">
                        </div>
                        <div class="featured__option">
                        </div>
                     </div>
                     <div class="d-flex gap-3 mt-4 flex-wrap">
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-location-dot"></i> Newyork, USA
                        </div>
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-briefcase"></i> Full Time
                        </div>
                     </div>
                     <div class="h6 job__title my-3">
                        <a href="job-details-1.html" aria-label="job">
                        Software Engineer, Apple
                        </a>
                     </div>
                     <p>Consectetur adipisicing elit. Possimus 
                        aut mollitia eum ipsum fugiat odio officiis odit mollitia eum ipsum.
                     </p>
                     <div class="job__tags d-flex flex-wrap gap-3 mt-4">
                        <a href="#">Creative</a>
                        <a href="#">user interface</a>
                        <a href="#">web ui</a>
                     </div>
                  </div>
               </div>
               <!-- single job end -->
               <!-- single job -->
               <div class="col-lg-6 col-xl-4 col-md-6">
                  <div class="rts__job__card">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="company__icon">
                           <img src="assets/img/home-1/company/upwork.svg" alt="">
                        </div>
                        <div class="featured__option">
                           <span>Upcoming</span>
                        </div>
                     </div>
                     <div class="d-flex gap-3 mt-4 flex-wrap">
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-location-dot"></i> Newyork, USA
                        </div>
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-briefcase"></i> Full Time
                        </div>
                     </div>
                     <div class="h6 job__title my-3">
                        <a href="job-details-1.html" aria-label="job">
                        Web developer, Upwork
                        </a>
                     </div>
                     <p>Consectetur adipisicing elit. Possimus 
                        aut mollitia eum ipsum fugiat odio officiis odit mollitia eum ipsum.
                     </p>
                     <div class="job__tags d-flex flex-wrap gap-3 mt-4">
                        <a href="#">Creative</a>
                        <a href="#">user interface</a>
                        <a href="#">web ui</a>
                     </div>
                  </div>
               </div>
               <!-- single job end -->
               <!-- single job -->
               <div class="col-lg-6 col-xl-4 col-md-6">
                  <div class="rts__job__card">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="company__icon">
                           <img src="assets/img/home-1/company/facebook.svg" alt="">
                        </div>
                        <div class="featured__option">
                        </div>
                     </div>
                     <div class="d-flex gap-3 mt-4 flex-wrap">
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-location-dot"></i> Newyork, USA
                        </div>
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-briefcase"></i> Full Time
                        </div>
                     </div>
                     <div class="h6 job__title my-3">
                        <a href="job-details-1.html" aria-label="job">
                        Digital Marketing, Facebook
                        </a>
                     </div>
                     <p>Consectetur adipisicing elit. Possimus 
                        aut mollitia eum ipsum fugiat odio officiis odit mollitia eum ipsum.
                     </p>
                     <div class="job__tags d-flex flex-wrap gap-3 mt-4">
                        <a href="#">Creative</a>
                        <a href="#">user interface</a>
                        <a href="#">web ui</a>
                     </div>
                  </div>
               </div>
               <!-- single job end -->
               <!-- single job -->
               <div class="col-lg-6 col-xl-4 col-md-6">
                  <div class="rts__job__card">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="company__icon">
                           <img src="assets/img/home-1/company/in.svg" alt="">
                        </div>
                        <div class="featured__option">
                           <span>Featured</span>
                        </div>
                     </div>
                     <div class="d-flex gap-3 mt-4 flex-wrap">
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-location-dot"></i> Newyork, USA
                        </div>
                        <div class="d-flex gap-1 align-items-center">
                           <i class="fa-light fa-briefcase"></i> Full Time
                        </div>
                     </div>
                     <div class="h6 job__title my-3">
                        <a href="job-details-1.html" aria-label="job">
                        Senior UI Designer, Apple
                        </a>
                     </div>
                     <p>Consectetur adipisicing elit. Possimus 
                        aut mollitia eum ipsum fugiat odio officiis odit mollitia eum ipsum.
                     </p>
                     <div class="job__tags d-flex flex-wrap gap-3 mt-4">
                        <a href="#">Creative</a>
                        <a href="#">user interface</a>
                        <a href="#">web ui</a>
                     </div>
                  </div>
               </div>
               <!-- single job end -->
            </div>
         </div>
      </section>
      <!-- current open position end -->
      <!-- what we are -->
      <div class="rts__section pb-120">
         <div class="container">
            <div class="row align-items-center g-5">
               <div class="col-lg-5">
                  <div class="rts__image__section">
                     <img src="assets/img/home-1/we-are/image.webp" alt="">
                  </div>
               </div>
               <div class="col-lg-7">
                  <div class="rts__content__section ms-lg-4 ms-md-0 wow animated fadeInUp">
                     <h3 class="fw-bold mb-4">Our Vision</h3>
                     <p>Transforming healthcare one placement at a time, by providing personalized staffing solutions, promoting diversity and inclusion, and empowering healthcare professionals to deliver exceptional patient care.</p>

                     <h3 style="margin-top: 20px;" class="fw-bold mb-4">Our Mission</h3>
                     <p>Transforming healthcare staffing by combining cutting-edge technology, personalized service, and a commitment to quality, safety, and patient satisfaction.</p>
                     
                     <a href="{{ route('about') }}" class="rts__btn common__btn  fill__btn mt-50">Explore More <i class="fa-regular fa-arrow-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- what we are end -->
       
      <!-- blog section -->
      <div class="rts__section section__padding">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xl-6 col-lg-10">
                  <div class="rts__section__content text-center wow animated fadeIn mb-60">
                     <h3 class="rts__section__title section__mb">Read Our Latest News</h3>
                     <p class="rts__section__desc">Looking for your next career opportunity. Look no further</p>
                  </div>
               </div>
            </div>
            <div class="row justify-content-center justify-content-lg-start g-30">
               <div class="col-lg-6 col-xl-4 col-md-10">
                  <div class="rts__single__blog">
                     <a href="blog-details.html" class="blog__img">
                     <img src="assets/img/home-1/blog/1.webp" class="mb-2" alt="blog">
                     </a>
                     <div class="blog__meta">
                        <div class="blog__meta__info d-flex gap-3 my-3">
                           <span class="d-flex gap-1 align-items-center"> <img class="svg" src="assets/img/icon/calender.svg" alt=""> 20 March, 2022</span>
                           <a href="#" class="d-flex gap-1 align-items-center"> <img class="svg" src="assets/img/icon/user.svg" alt=""> Jon Adom</a>
                        </div>
                        <a href="blog-details.html" class="h6 fw-semibold">
                        7 Ways Job Post Has Improved Business Today
                        </a>
                        <a href="blog-details.html" class="readmore__btn d-flex mt-3 gap-2 align-items-center">Read More <i class="fa-light fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-xl-4 col-md-10">
                  <div class="rts__single__blog">
                     <a href="blog-details.html" class="blog__img">
                     <img src="assets/img/home-1/blog/2.webp" class="mb-2" alt="blog">
                     </a>
                     <div class="blog__meta">
                        <div class="blog__meta__info d-flex gap-3 my-3">
                           <span class="d-flex gap-1 align-items-center"> <img class="svg" src="assets/img/icon/calender.svg" alt=""> 20 March, 2022</span>
                           <a href="#" class="d-flex gap-1 align-items-center"> <img class="svg" src="assets/img/icon/user.svg" alt=""> Jon Adom</a>
                        </div>
                        <a href="blog-details.html" class="h6 fw-semibold">
                        Start an online Job and work from home
                        </a>
                        <a href="blog-details.html" class="readmore__btn d-flex mt-3 gap-2 align-items-center">Read More <i class="fa-light fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-xl-4 col-md-10">
                  <div class="rts__single__blog">
                     <a href="blog-details.html" class="blog__img">
                     <img src="assets/img/home-1/blog/3.webp" class="mb-2" alt="blog">
                     </a>
                     <div class="blog__meta">
                        <div class="blog__meta__info d-flex gap-3 my-3">
                           <span class="d-flex gap-1 align-items-center"> <img class="svg" src="assets/img/icon/calender.svg" alt=""> 20 March, 2022</span>
                           <a href="#" class="d-flex gap-1 align-items-center"> <img class="svg" src="assets/img/icon/user.svg" alt=""> Jon Adom</a>
                        </div>
                        <a href="blog-details.html" class="h6 fw-semibold">
                        Insider Strategies for Success on Job Websites
                        </a>
                        <a href="blog-details.html" class="readmore__btn d-flex mt-3 gap-2 align-items-center">Read More <i class="fa-light fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- blog section end -->

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
      <script src="{{asset('assets/js/plugins.min.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
   </body>
</html>