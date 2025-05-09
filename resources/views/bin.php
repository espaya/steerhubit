
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
    <title>{{ $profile->fullname }} - SteerHubIT</title>
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
                        <div class="d-flex gap-4 gap-md-5 align-items-center flex-md-row flex-column mx-auto mx-md-0">
                            <div class="author__icon rounded-2">
                                <img class="" src="{{ $profile->user->avatar ? asset('uploads/avatars/' . $profile->user->avatar) : asset('assets/img/author/1.svg') }}" alt="">
                            </div>
                            <div class="job__meta w-100 d-flex text-center text-md-start flex-column gap-2">
                                <div class="">
                                    <h3 class="job__title h3 mb-0"> {{ $profile->fullname }} </h3>
                                </div>
                                <div class="d-flex gap-3 justify-content-center justify-content-md-start flex-wrap mb-3 mt-2">
                                    <div class="d-flex gap-2 align-items-center">
                                        Software Engineer
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-light fa-location-dot"></i> {{ $profile->state . ', ' . $profile->country }}
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-light rt-briefcase"></i> Full Time
                                    </div>
                                </div>
                                <div class="job__tags d-flex justify-content-center justify-content-md-start flex-wrap gap-3">
                                    <a href="#">React</a>
                                    <a href="#">Nest Js</a>
                                    <a href="#">C++</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb__apply d-flex gap-3 max-content">
                        <a href="#" class="rts__btn apply__btn no__fill__btn">Shortlist</a>
                        <a href="#" class="rts__btn be-1 apply__btn fill__btn">Cv Download</a>
                    </div>             
                </div>
                <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">
                    <div class="shape__one common">
                       
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

    <!-- job list one -->
     <div class="rts__section section__padding">
        <div class="container">
            <div class="row g-30">
               <div class="col-lg-7 col-xl-8">
                <div class="job__overview no-border-bottom mb-30">
                    <h6 class="fw-semibold mb-30">Job Overview</h6>
                    <div class="job__overview__content candidate__info">
                        <ul class="d-grid grid-style">
                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                <div class="d-flex gap-3">
                                    <span class="icon">
                                        <i class="rt-qualification"></i>
                                    </span>
                                    <div>
                                        <span class="left-text"> Qualification</span>
                                        <span class="text">Bachelor Degree</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                <div class="d-flex gap-3">
                                    <span class="icon">
                                        <i class="fa-light rt-experience"></i>
                                    </span>
                                    <div>
                                        <span class="left-text"> Experience</span>
                                        <span class="text">2 Year</span>
                                    </div>
                                </div>
                            </li>

                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                <div class="d-flex gap-3">
                                    <span class="icon">
                                        <i class="rt-experience"></i>
                                    </span>
                                    <div>
                                        <span class="left-text"> Offered Salary</span>
                                        <span class="text">$1000-$2000 M</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                <div class="d-flex gap-3">
                                    <span class="icon">
                                        <i class="fa-sharp fa-thin fa-location-dot"></i>
                                    </span>
                                    <div>
                                        <span class="left-text">Location</span>
                                        <span class="text">New Yourk, USA</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                <div class="d-flex gap-3">
                                    <span class="icon">
                                        <i class="rt-loading"></i>
                                    </span>
                                    <div>
                                        <span class="left-text"> Job Deadline</span>
                                        <span class="text">01 August 2024</span>
                                    </div>
                                </div>
                            </li>
                             
                            <li class="d-flex flex-column gap-3 gap-sm-0 align-items-center justify-content-between">
                                <div class="d-flex gap-3">
                                    <span class="icon">
                                        <i class="fa-light fa-user"></i>
                                    </span>
                                    <div>
                                        <span class="left-text"> Gender</span>
                                        <span class="text">Both</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 
                    <div class="rts__job__details">
                        <div id="description" class="mb-30">
                            <h6 class="fw-semibold mb-20">About Candidate</h6>
                            <p>We are seeking a skilled Part-Time Software Engineer to join our team, specializing in social media content creation for lead generation purposes. The ideal candidate will have a creative flair, technical proficiency, and a strong understanding of social media trends and algorithms. Must be able to work Monday-Friday during EST business hours. This role will be under the ScaledOn brand, but will be working directly with one of our partners as their dedicated Software Engineer.</p>
                        </div>
                        <div id="responsibility" class="mb-30">
                            <h6 class="fw-semibold mb-20">Education</h6>
                            <ul class="timeline">
                                <li>
                                    <span class="timeline__title d-block">California Institute of Technology</span>
                                    <span class="timeline__subtitle d-block">Master of Science in Computer Science   (2014- 2015)</span>
                                    <p class="mt-2 fw-medium">CareerBuilder offers a complete career portal, helping job seekers find better career opportunities and bridge skill gaps through a partnership with Capella Learning Solutions.</p>
                                </li>
                                <li>
                                    <span class="timeline__title d-block">University of California, Berkeley</span>
                                    <span class="timeline__subtitle d-block">B. Sc. in Computer Science and Engineering   (2010- 2014)</span>
                                    <p class="mt-2 fw-medium">CareerBuilder offers a complete career portal, helping job seekers find better career opportunities and bridge skill gaps through a partnership with Capella Learning Solutions.</p>
                                </li>
                                <li>
                                    <span class="timeline__title d-block">University of California, Berkeley</span>
                                    <span class="timeline__subtitle d-block">B. Sc. in Computer Science and Engineering   (2010- 2014)</span>
                                    <p class="mt-2 fw-medium">CareerBuilder offers a complete career portal, helping job seekers find better career opportunities and bridge skill gaps through a partnership with Capella Learning Solutions.</p>
                                </li>
                            </ul>
                        </div>
                        <div id="experience" class="mb-30">
                            <h6 class="fw-semibold mb-20 text-capitalize">experience</h6>
                            <ul class="timeline">
                                <li>
                                    <span class="timeline__title d-block">Software Engineer</span>
                                    <span class="timeline__subtitle d-block">Reactheme   (2016- Present)</span>
                                    <p class="mt-2 fw-medium">Software engineers apply engineering principles and knowledge of programming languages to build software solutions for end users.</p>
                                </li>
                            </ul>
                        </div>  
                        <div id="skill" class="mb-30">
                            <h6 class="fw-semibold mb-20">Skills and Experience</h6>
                            <div class="job__tags job__details__tags">
                                <a href="#" class="job__tag">Javascript</a>
                                <a href="#" class="job__tag">user interface</a>
                                <a href="#" class="job__tag">Problem Solving</a>
                            </div>
                        </div>
                        <h6 class="fw-semibold text-capitalize mb-30 mt-30">See My Latest Project</h6>
                        <div class="row g-30 row-cols-lg-3 row-cols-md-2 row-col-xl-3 row-cols-1">
                            <div class="col">
                                <img class="rounded-2 d-shadow" src="assets/img/pages/p-1.webp" alt="">
                            </div>
                            <div class="col">
                                <img class="rounded-2 d-shadow" src="assets/img/pages/p-2.webp" alt="">
                            </div>
                            <div class="col">
                                <img class="rounded-2 d-shadow" src="assets/img/pages/p-3.webp" alt="">
                            </div>
                        </div>
                        <h6 class="fw-semibold text-capitalize mb-30 mt-30">Awward</h6>
                        <ul class="timeline">
                            <li>
                                <span class="timeline__title d-block">2015 IEEE CS TCSE Distinguished Education Award</span>
                                <span class="timeline__subtitle d-block">2015</span>
                                <p class="mt-2 fw-medium">In a world adorned with stars, where excellence glimmers like distant constellations, there exists a singular moment that transcends the ordinary, capturing the essence of brilliance in its purest form.</p>
                            </li>
                            <li>
                                <span class="timeline__title d-block">2024 IEEE CS TCSE Rising Star Award</span>
                                <span class="timeline__subtitle d-block">2014</span>
                                <p class="mt-2 fw-medium">In a world adorned with stars, where excellence glimmers like distant constellations, there exists a singular moment that transcends the ordinary, capturing the essence of brilliance in its purest form.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="review__form job__contact mt-40">
                        <h6 class="fw-semibold mb-30">Add a review</h6>
                        <form action="#" class="d-flex flex-column gap-4">
                            <div class="row row-cols-lg-2 row-cols-1">
                                <div class="search__item">
                                    <label for="remail" class="mb-3 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                                    <div class="position-relative">
                                        <input type="email" id="remail" placeholder="Enter your email">
                                        <i class="rt-mailbox"></i>
                                    </div>
                                </div>
                                <div class="search__item">
                                    <label for="rphone" class="mb-3 font-20 fw-medium text-dark text-capitalize">Phone</label>
                                    <div class="position-relative">
                                        <input type="text" id="rphone" placeholder="(+88)154-678789">
                                        <i class="rt-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="search__item">
                                <label class="mb-3 font-20 fw-medium text-dark text-capitalize" for="rmessage">Your Message</label>
                                <textarea name="rmessage" id="rmessage" placeholder="Message"></textarea>
                                <i class="fa-thin fa-comment-lines"></i>
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-2 mb-3">
                                <span class="fw-medium text-dark">Your Rating </span>
                                <div class="rating">
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                    <i class="fa-sharp fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-sharp-half-stroke"></i>
                                </div>
                            </div>
                            <button type="submit" class="rts__btn apply__btn w-100">Submit Review</button>
                        </form>
                    </div>
               </div>
               <div class="col-lg-5 col-xl-4 d-flex flex-column gap-40">
                    <div class="job__contact">
                        <h6 class="fw-semibold mb-20">Contact Google.com</h6>
                        <form action="#" class="d-flex flex-column gap-4">
                            <div class="search__item">
                                <label for="gemail" class="mb-3 font-20 fw-medium text-dark text-capitalize">Your Email</label>
                                <div class="position-relative">
                                    <input type="email" id="gemail" placeholder="Enter your email">
                                    <i class="rt-mailbox"></i>
                                </div>
                            </div>

                            <div class="search__item">
                                <label for="gphone" class="mb-3 font-20 fw-medium text-dark text-capitalize">Phone</label>
                                <div class="position-relative">
                                    <input type="text" id="gphone" placeholder="(+88)154-678789">
                                    <i class="rt-phone"></i>
                                </div>
                            </div>
                            <div class="search__item">
                                <label class="mb-3 font-20 fw-medium text-dark text-capitalize" for="gmessage">Your Message</label>
                                <textarea name="message" id="gmessage" placeholder="Message"></textarea>
                                <i class="fa-thin fa-comment-lines"></i>
                            </div>
                            <button type="submit" class="rts__btn apply__btn w-100">Send a Message</button>
                        </form>
                    </div>

                    <!-- team -->
                    <div class="recent__post">
                        <h5 class="fw-bold mb-30">Related Candidates</h5>
                        <div class="team__list flex-column d-flex gap-3">
                            <div class="border-bottom pb-3 d-flex justify-content-between align-items-center gap-3">
                                <div class="d-flex gap-3 flex-wrap gap-xl-5">
                                    <div class="d-flex gap-4 flex-column flex-md-row mb-3 mb-md-0 justify-content-start align-items-start align-items-md-center">
                                        <div class="author__icon small__thumb">
                                            <img src="{{ asset('assets/img/author/1.svg') }}" alt="">
                                        </div>
                                        <div class="job__meta">
                                            <div class="d-flex align-items-start flex-column mb-2">
                                                <a href="#" class="job__title mb-0 h6 fw-semibold">Michael Roy</a>
                                                <span class="d-block fw-medium">Software Engineer</span>
                                            </div>
                                            <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light fa-location-dot"></i> Newyork, USA
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light rt-briefcase"></i> Full Time
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom pb-3 d-flex justify-content-between align-items-center gap-3">
                                <div class="d-flex gap-3 flex-wrap gap-xl-5">
                                    <div class="d-flex gap-4 flex-column flex-md-row mb-3 mb-md-0 justify-content-start align-items-start align-items-md-center">
                                        <div class="author__icon small__thumb">
                                            <img src="assets/img/author/2.svg" alt="">
                                        </div>
                                        <div class="job__meta">
                                            <div class="d-flex align-items-start flex-column mb-2">
                                                <a href="#" class="job__title mb-0 h6 fw-semibold">Jack Alexander </a>
                                                <span class="d-block fw-medium">UX Design</span>
                                            </div>
                                            <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light fa-location-dot"></i> Newyork, USA
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light rt-briefcase"></i> Full Time
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom-0 d-flex justify-content-between align-items-center gap-3">
                                <div class="d-flex gap-3 flex-wrap gap-xl-5">
                                    <div class="d-flex gap-4 flex-column flex-md-row mb-3 mb-md-0 justify-content-start align-items-start align-items-md-center">
                                        <div class="author__icon small__thumb">
                                            <img src="assets/img/author/3.svg" alt="">
                                        </div>
                                        <div class="job__meta">
                                            <div class="d-flex align-items-start flex-column mb-2">
                                                <a href="#" class="job__title mb-0 h6 fw-semibold">Jonathon Doe</a>
                                                <span class="d-block fw-medium">Ui Designer</span>
                                            </div>
                                            <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light fa-location-dot"></i> Newyork, USA
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light rt-briefcase"></i> Full Time
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- team end -->
                    
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
        <h3 class="rts__section__title section__mb">Related Candidates</h3>
        <p class="rts__section__desc">From entry-level positions to executive roles browse through.</p>
    </div>
</div>
            </div>
            <div class="row g-30">
                  <!-- single employer -->
                  <div class="col-lg-12">
                    <div class="rts__author__card__big py-3 flex-wrap flex-xl-nowrap style__gradient__two d-flex justify-content-between align-items-center gap-3">
                        <div class="d-flex gap-4 flex-column flex-md-row 
                        justify-content-start align-items-md-center align-items-start">
                            <div class="author__icon small__thumb">
                                <img src="assets/img/author/6.svg" alt="">
                            </div>
                            <div class="job__meta">
                                <div class="d-flex flex-wrap flex-column flex-md-row gap-2 gap-lg-3 gap-xxl-5">
                                    <div>
                                        <a href="#" class="job__title mb-0 h6 fw-semibold">Elizabeth</a>
                                        <span class="d-block fw-medium">UI Designer</span>
                                    </div>
                                    <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-light fa-location-dot"></i> Newyork, USA
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-light rt-briefcase"></i> Full Time
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-4 flex-wrap align-items-center">
                            <div class="job__tags style__default d-flex flex-wrap gap-3">
                                <a href="#">Creative</a>
                                <a href="#">User Interface</a>
                            </div>
                            <button class="apply__btn" aria-label="View Profile">View Profile</button>
                        </div>
                    </div>
                 </div>
                <!-- single employer end -->
                <!-- single employer -->
                 <div class="col-lg-12">
                    <div class="rts__author__card__big py-3 flex-wrap flex-xl-nowrap style__gradient__two d-flex justify-content-between align-items-center gap-3">
                        <div class="d-flex gap-4 flex-column flex-md-row 
                        justify-content-start align-items-md-center align-items-start">
                            <div class="author__icon small__thumb">
                                <img src="assets/img/author/7.svg" alt="">
                            </div>
                            <div class="job__meta">
                                <div class="d-flex flex-wrap flex-column flex-md-row gap-2 gap-lg-3 gap-xxl-5">
                                    <div>
                                        <a href="#" class="job__title mb-0 h6 fw-semibold">Addison Bekar</a>
                                        <span class="d-block fw-medium">Produc t Manager</span>
                                    </div>
                                    <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-light fa-location-dot"></i> Newyork, USA
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-light rt-briefcase"></i> Full Time
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-4 flex-wrap align-items-center">
                            <div class="job__tags style__default d-flex flex-wrap gap-3">
                                <a href="#">Creative</a>
                                <a href="#">User Interface</a>
                            </div>
                            <button class="apply__btn" aria-label="View Profile">View Profile</button>
                        </div>
                    </div>
                 </div>
                <!-- single employer end -->
                <!-- single employer -->
                 <div class="col-lg-12">
                    <div class="rts__author__card__big py-3 flex-wrap flex-xl-nowrap style__gradient__two d-flex justify-content-between align-items-center gap-3">
                        <div class="d-flex gap-4 flex-column flex-md-row 
                        justify-content-start align-items-md-center align-items-start">
                            <div class="author__icon small__thumb">
                                <img src="assets/img/author/8.svg" alt="">
                            </div>
                            <div class="job__meta">
                                <div class="d-flex flex-wrap flex-column flex-md-row gap-2 gap-lg-3 gap-xxl-5">
                                    <div>
                                        <a href="#" class="job__title mb-0 h6 fw-semibold">Anastacia Alice</a>
                                        <span class="d-block fw-medium">Digital Marketer</span>
                                    </div>
                                    <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-light fa-location-dot"></i> Newyork, USA
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-light rt-briefcase"></i> Full Time
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-4 flex-wrap align-items-center">
                            <div class="job__tags style__default d-flex flex-wrap gap-3">
                                <a href="#">Blog Post</a>
                                <a href="#">E-books</a>
                            </div>
                            <button class="apply__btn" aria-label="View Profile">View Profile</button>
                        </div>
                    </div>
                 </div>
                <!-- single employer end -->
            </div>
        </div>
    </div>
    <!-- top employer end -->
   
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