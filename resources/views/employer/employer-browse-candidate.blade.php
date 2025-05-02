
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
    <title>Browse Candidates - SteerHubIT</title>
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
                    <h1 class="breadcrumb-title h3 mb-3">Candidates</h1>
                    <nav>
                        <ul class="breadcrumb m-0 lh-1">
                          <li class="breadcrumb-item"><a href="{{ route('employer.dashboard') }}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Candidates</li>
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

    <!-- job list one -->
     <div class="rts__section section__padding">
        <div class="container">
            <div class="row g-30">
                <div class="col-lg-5 col-xl-4">
                    <div class="job__search__section mb-40">
                        <form action="#" class="d-flex flex-column row-30">
                            <div class="search__item">
                                <label for="search" class="mb-20 font-20 fw-medium text-dark text-capitalize">Search By Job Title</label>
                                <div class="position-relative">
                                    <input type="text" id="search" placeholder="Enter Type Of job" required="">
                                    <i class="fa-light fa-magnifying-glass"></i>
                                </div>
                            </div>
                            <!-- job location -->
                            <div class="search__item">
                                <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">Search Location</h6>
                                <div class="position-relative">
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Search Location</span>
                                        <ul class="list">
                                            <li data-value="Nothing" data-display="Search Location" class="option selected focus">Search Location</li>
                                            <li data-value="1" class="option">Dhaka</li>
                                            <li data-value="2" class="option">Barisal</li>
                                            <li data-value="3" class="option">Chittagong</li>
                                            <li data-value="4" class="option">Rajshahi</li>
                                        </ul>
                                    </div>
                                    <i class="fa-light fa-location-dot"></i>
                                </div>
                            </div>
                            <!-- job category -->
                            <div class="search__item">
                                <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">Search By Job category</h6>
                                <div class="position-relative">
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Choose a Category</span>
                                        <ul class="list">
                                            <li data-value="Nothing" data-display="Search By Job category" class="option selected focus">Choose a Category</li>
                                            <li data-value="1" class="option">Government</li>
                                            <li data-value="2" class="option">NGO</li>
                                            <li data-value="3" class="option ">Private</li>
                                        </ul>
                                    </div>
                                    <i class="rt-briefcase"></i>
                                </div>
                            </div>
                            <!-- candidate gender -->
                            <div class="search__item">
                                <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">candidate gender</h6>
                                <div class="search__item__list">
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="bt" id="bt">
                                            <label for="bt">Both</label>
                                        </div>
                                        <span>(230)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="female" id="female">
                                            <label for="female">Female</label>
                                        </div>
                                        <span>(80)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="male" id="male">
                                            <label for="male">Male</label>
                                        </div>
                                        <span>(150)</span>
                                    </div>
                                </div>
                            </div>
                            <!-- candidate gender end -->

                            <!-- candidate type -->
                            <div class="search__item">
                                <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">Candidate Type</h6>
                                <div class="search__item__list">
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="fulltime" id="fulltime">
                                            <label for="fulltime">Full Time</label>
                                        </div>
                                        <span>(130)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="part" id="part">
                                            <label for="part">Part Time</label>
                                        </div>
                                        <span>(80)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="temporary" id="temporary">
                                            <label for="temporary">temporary</label>
                                        </div>
                                        <span>(150)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="freelance" id="freelance">
                                            <label for="freelance">freelance</label>
                                        </div>
                                        <span>(130)</span>
                                    </div>
                                </div>
                            </div>
                            <!-- candidate type end -->

                            <!-- candidate type -->
                            <div class="search__item">
                                <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">experience Label</h6>
                                <div class="search__item__list">

                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="5year" id="5year">
                                            <label for="5year">5 year</label>
                                        </div>
                                        <span>(10)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="4year" id="4year">
                                            <label for="4year">4 year</label>
                                        </div>
                                        <span>(15)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="3year" id="3year">
                                            <label for="3year">3 year</label>
                                        </div>
                                        <span>(50)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="fresher" id="fresher">
                                            <label for="fresher">fresher</label>
                                        </div>
                                        <span>(130)</span>
                                    </div>
                                </div>
                            </div>
                            <!-- candidate type end -->

                            <!-- salary label -->
                            <div class="search__item">
                                <h6 class="mb-2 font-20 fw-medium text-dark text-capitalize">salary offered</h6>
                                <div class="search__item__list">

                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="500" id="500">
                                            <label for="500">under $500</label>
                                        </div>
                                        <span>(10)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="5000" id="5000">
                                            <label for="5000">$5,000 - $10,000</label>
                                        </div>
                                        <span>(44)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="1000" id="1000">
                                            <label for="1000">$10,000 - $15,000</label>
                                        </div>
                                        <span>(27)</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between list">
                                        <div class="d-flex gap-2 align-items-center checkbox">
                                            <input type="checkbox" name="1500" id="1500">
                                            <label for="1500">$15,000 - $20,000</label>
                                        </div>
                                        <span>(85)</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="rts__btn no__fill__btn max-content mx-auto job__search__btn font-sm" aria-label="Search">Find Candidate</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8">
                    <div class="top__query mb-40 d-flex flex-wrap gap-4 gap-xl-0 justify-content-between align-items-center">
                        <span class="text-dark font-20 fw-medium">Showing 1-9 of 19 results</span>
                        <div class="d-flex flex-wrap align-items-center gap-4">
                            <form action="#" class="category-select">
                                <div class="position-relative">
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">All Category</span>
                                        <ul class="list">
                                            <li data-value="Nothing" data-display="All Category" class="option selected focus">All Category</li>
                                            <li data-value="1" class="option">Dhaka</li>
                                            <li data-value="2" class="option">Part time</li>
                                            <li data-value="3" class="option">Full Time</li>
                                            <li data-value="4" class="option">Government</li>
                                            <li data-value="5" class="option">NGO</li>
                                            <li data-value="6" class="option">Private</li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active" role="tabpanel" id="list">
                            <div class="row g-30">
                                <!-- author card -->
                                <div class="col-12">
                                    <div class="rts__author__card__big style__gradient__two flex-wrap d-flex justify-content-between align-items-center gap-3">
                                        <div class="d-flex gap-3 gap-md-4 flex-column flex-md-row justify-content-start
                                         align-items-start align-items-md-center">
                                            <div class="author__icon">
                                                <img src="{{asset('assets/img/author/1.svg')}}" alt="">
                                            </div>
                                            <div class="job__meta">
                                                <div class="d-flex align-items-start flex-column">
                                                    <a href="candidate-details-2.html" class="job__title mb-0 h6 fw-semibold">Michael Roy</a>
                                                    <span class="d-block fw-medium">Software Engineer</span>
                                                </div>
                                                <div class="job__tags mt-3 d-flex flex-wrap gap-3">
                                                    <a href="#">Creative</a>
                                                    <a href="#">web ui</a>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="d-flex gap-4 flex-wrap align-items-center">
                                            <div class="d-flex gap-3 flex-wrap gap-lg-4 fw-medium">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light fa-location-dot"></i> Newyork, USA
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <i class="fa-light rt-briefcase"></i> Full Time
                                                </div>
                                            </div>
                                            <a href="{{ route('employer.view.candidate') }}" class="apply__btn" aria-label="View Profile">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- author card end -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="rts__pagination mx-auto pt-60 max-content">
                        <ul class="d-flex gap-2">
                            <li><a href="#" class="inactive"><i class="rt-chevron-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="rt-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
     </div>
    <!-- job list one end -->

    <!--- app center -->
    
    <!-- app center end -->

    
  
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