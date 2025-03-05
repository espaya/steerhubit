
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
    <title>SteerHubIT - Employer Following</title>
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
    @include('employee/employee_temp/emp-header');
<!-- header area end -->
    
    <!-- content area -->
    <div class="dashboard__content d-flex">
    @include('employee/employee_temp/emp-sidebar');
        <div class="dashboard__right">
            <div class="dash__content ">
                <!-- sidebar menu -->
                <div class="sidebar__menu d-md-block d-lg-none">
                    <div class="sidebar__action"><i class="fa-sharp fa-regular fa-bars"></i> Sidebar</div>
                </div>
                <!-- sidebar menu end -->
                 
                <div class="applied__job__info radius-16">

                    <div class="job__filter">
                        <div class="search__job">
                            <div class="position-relative">
                                <input type="text" id="search" placeholder="Find Top Employer" required="">
                                <i class="fa-light fa-magnifying-glass"></i>
                            </div>
                        </div>
                        <div class="filter__job">
                            <div class="nice-select filter__select">
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
                    </div>

                    <div class="applied__job__list">
                        <!-- single job -->
                        <div class="single__applied__job">
                            <div class="single__applied__job__content">   
                                <div class="icon">
                                    <img src="assets/img/icon/apple.svg" alt="">
                                </div>
                                <div class="content">
                                    <a href="#"> <h6>Apple.com</h6></a>
                                    <div class="content__info">
                                        <span><i class="fa-light fa-location-dot"></i> Newyork, USA</span>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                
                                <button class="action__btn">
                                    <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2.21851L7.59814 2.60749C7.65021 2.66179 7.71263 2.70498 7.78167 2.73448C7.85072 2.76397 7.92497 2.77918 8 2.77918C8.07502 2.77918 8.14928 2.76397 8.21833 2.73448C8.28737 2.70498 8.3498 2.66179 8.40186 2.60749L8 2.21851ZM6.08447 11.8098C4.95628 10.9159 3.72316 10.0429 2.74456 8.93583C1.78605 7.84969 1.11628 6.58327 1.11628 4.9391H0C0 6.93335 0.826046 8.45485 1.91033 9.68087C2.97451 10.8852 4.33191 11.8502 5.39312 12.6909L6.08447 11.8098ZM1.11628 4.9391C1.11628 3.33084 2.02047 1.98139 3.25507 1.41363C4.4547 0.862335 6.0666 1.0082 7.59814 2.60749L8.40186 1.83029C6.58605 -0.0674675 4.47553 -0.380892 2.7907 0.393319C1.14307 1.15107 0 2.91044 0 4.9391H1.11628ZM5.39312 12.6909C5.77488 12.9932 6.18419 13.3148 6.5987 13.5587C7.01321 13.8018 7.48651 14 8 14V12.878C7.7693 12.878 7.49842 12.7882 7.16205 12.59C6.82493 12.3925 6.47591 12.1202 6.08447 11.8098L5.39312 12.6909ZM10.6069 12.6909C11.6681 11.8494 13.0255 10.8859 14.0897 9.68087C15.174 8.4541 16 6.93335 16 4.9391H14.8837C14.8837 6.58327 14.214 7.84969 13.2554 8.93583C12.2768 10.0429 11.0437 10.9159 9.91553 11.8098L10.6069 12.6909ZM16 4.9391C16 2.91044 14.8577 1.15107 13.2093 0.393319C11.5245 -0.380892 9.41544 -0.0674675 7.59814 1.82954L8.40186 2.60749C9.9334 1.00895 11.5453 0.862335 12.7449 1.41363C13.9795 1.98139 14.8837 3.33009 14.8837 4.9391H16ZM9.91553 11.8098C9.52409 12.1202 9.17507 12.3925 8.83795 12.59C8.50158 12.7874 8.2307 12.878 8 12.878V14C8.51349 14 8.98679 13.8018 9.4013 13.5587C9.81656 13.3148 10.2251 12.9932 10.6069 12.6909L9.91553 11.8098Z" fill="#34A853"></path>
                                    </svg>
                                </button> 
                                <button class="action__operation pending">
                                    2 Open Job
                                </button>
                            </div>
                        </div>
                        <!--single job end  -->
                        <!-- single job -->
                        <div class="single__applied__job">
                            <div class="single__applied__job__content">   
                                <div class="icon">
                                    <img src="assets/img/icon/google.svg" alt="">
                                </div>
                                <div class="content">
                                    <a href="#"> <h6> Google Inc</h6></a>
                                    <div class="content__info">
                                        <span><i class="fa-light fa-location-dot"></i> Newyork, USA</span>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <button class="action__btn">
                                    <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2.21851L7.59814 2.60749C7.65021 2.66179 7.71263 2.70498 7.78167 2.73448C7.85072 2.76397 7.92497 2.77918 8 2.77918C8.07502 2.77918 8.14928 2.76397 8.21833 2.73448C8.28737 2.70498 8.3498 2.66179 8.40186 2.60749L8 2.21851ZM6.08447 11.8098C4.95628 10.9159 3.72316 10.0429 2.74456 8.93583C1.78605 7.84969 1.11628 6.58327 1.11628 4.9391H0C0 6.93335 0.826046 8.45485 1.91033 9.68087C2.97451 10.8852 4.33191 11.8502 5.39312 12.6909L6.08447 11.8098ZM1.11628 4.9391C1.11628 3.33084 2.02047 1.98139 3.25507 1.41363C4.4547 0.862335 6.0666 1.0082 7.59814 2.60749L8.40186 1.83029C6.58605 -0.0674675 4.47553 -0.380892 2.7907 0.393319C1.14307 1.15107 0 2.91044 0 4.9391H1.11628ZM5.39312 12.6909C5.77488 12.9932 6.18419 13.3148 6.5987 13.5587C7.01321 13.8018 7.48651 14 8 14V12.878C7.7693 12.878 7.49842 12.7882 7.16205 12.59C6.82493 12.3925 6.47591 12.1202 6.08447 11.8098L5.39312 12.6909ZM10.6069 12.6909C11.6681 11.8494 13.0255 10.8859 14.0897 9.68087C15.174 8.4541 16 6.93335 16 4.9391H14.8837C14.8837 6.58327 14.214 7.84969 13.2554 8.93583C12.2768 10.0429 11.0437 10.9159 9.91553 11.8098L10.6069 12.6909ZM16 4.9391C16 2.91044 14.8577 1.15107 13.2093 0.393319C11.5245 -0.380892 9.41544 -0.0674675 7.59814 1.82954L8.40186 2.60749C9.9334 1.00895 11.5453 0.862335 12.7449 1.41363C13.9795 1.98139 14.8837 3.33009 14.8837 4.9391H16ZM9.91553 11.8098C9.52409 12.1202 9.17507 12.3925 8.83795 12.59C8.50158 12.7874 8.2307 12.878 8 12.878V14C8.51349 14 8.98679 13.8018 9.4013 13.5587C9.81656 13.3148 10.2251 12.9932 10.6069 12.6909L9.91553 11.8098Z" fill="#34A853"></path>
                                    </svg>
                                </button> 
                                <button class="action__operation rejected">
                                    2 Open Job
                                </button>
                            </div>
                        </div>
                        <!--single job end  -->
                        <!-- single job -->
                        <div class="single__applied__job">
                            <div class="single__applied__job__content">   
                                <div class="icon">
                                    <img src="assets/img/icon/upwork.svg" alt="">
                                </div>
                                <div class="content">
                                    <a href="#"> <h6>Upwork Inc</h6></a>
                                    <div class="content__info">
                                        <span><i class="fa-light fa-location-dot"></i> Newyork, USA</span>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                
                                <button class="action__btn">
                                    <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2.21851L7.59814 2.60749C7.65021 2.66179 7.71263 2.70498 7.78167 2.73448C7.85072 2.76397 7.92497 2.77918 8 2.77918C8.07502 2.77918 8.14928 2.76397 8.21833 2.73448C8.28737 2.70498 8.3498 2.66179 8.40186 2.60749L8 2.21851ZM6.08447 11.8098C4.95628 10.9159 3.72316 10.0429 2.74456 8.93583C1.78605 7.84969 1.11628 6.58327 1.11628 4.9391H0C0 6.93335 0.826046 8.45485 1.91033 9.68087C2.97451 10.8852 4.33191 11.8502 5.39312 12.6909L6.08447 11.8098ZM1.11628 4.9391C1.11628 3.33084 2.02047 1.98139 3.25507 1.41363C4.4547 0.862335 6.0666 1.0082 7.59814 2.60749L8.40186 1.83029C6.58605 -0.0674675 4.47553 -0.380892 2.7907 0.393319C1.14307 1.15107 0 2.91044 0 4.9391H1.11628ZM5.39312 12.6909C5.77488 12.9932 6.18419 13.3148 6.5987 13.5587C7.01321 13.8018 7.48651 14 8 14V12.878C7.7693 12.878 7.49842 12.7882 7.16205 12.59C6.82493 12.3925 6.47591 12.1202 6.08447 11.8098L5.39312 12.6909ZM10.6069 12.6909C11.6681 11.8494 13.0255 10.8859 14.0897 9.68087C15.174 8.4541 16 6.93335 16 4.9391H14.8837C14.8837 6.58327 14.214 7.84969 13.2554 8.93583C12.2768 10.0429 11.0437 10.9159 9.91553 11.8098L10.6069 12.6909ZM16 4.9391C16 2.91044 14.8577 1.15107 13.2093 0.393319C11.5245 -0.380892 9.41544 -0.0674675 7.59814 1.82954L8.40186 2.60749C9.9334 1.00895 11.5453 0.862335 12.7449 1.41363C13.9795 1.98139 14.8837 3.33009 14.8837 4.9391H16ZM9.91553 11.8098C9.52409 12.1202 9.17507 12.3925 8.83795 12.59C8.50158 12.7874 8.2307 12.878 8 12.878V14C8.51349 14 8.98679 13.8018 9.4013 13.5587C9.81656 13.3148 10.2251 12.9932 10.6069 12.6909L9.91553 11.8098Z" fill="#34A853"></path>
                                    </svg>
                                </button> 
                                <button class="action__operation pending">
                                    2 Open Job
                                </button>
                            </div>
                        </div>
                        <!--single job end  -->
                        <!-- single job -->
                        <div class="single__applied__job">
                            <div class="single__applied__job__content">   
                                <div class="icon">
                                    <img src="assets/img/icon/microsoft.svg" alt="">
                                </div>
                                <div class="content">
                                    <a href="#"> <h6>microsoft.com </h6></a>
                                    <div class="content__info">
                                        <span><i class="fa-light fa-location-dot"></i> Newyork, USA</span>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <button class="action__btn">
                                    <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2.21851L7.59814 2.60749C7.65021 2.66179 7.71263 2.70498 7.78167 2.73448C7.85072 2.76397 7.92497 2.77918 8 2.77918C8.07502 2.77918 8.14928 2.76397 8.21833 2.73448C8.28737 2.70498 8.3498 2.66179 8.40186 2.60749L8 2.21851ZM6.08447 11.8098C4.95628 10.9159 3.72316 10.0429 2.74456 8.93583C1.78605 7.84969 1.11628 6.58327 1.11628 4.9391H0C0 6.93335 0.826046 8.45485 1.91033 9.68087C2.97451 10.8852 4.33191 11.8502 5.39312 12.6909L6.08447 11.8098ZM1.11628 4.9391C1.11628 3.33084 2.02047 1.98139 3.25507 1.41363C4.4547 0.862335 6.0666 1.0082 7.59814 2.60749L8.40186 1.83029C6.58605 -0.0674675 4.47553 -0.380892 2.7907 0.393319C1.14307 1.15107 0 2.91044 0 4.9391H1.11628ZM5.39312 12.6909C5.77488 12.9932 6.18419 13.3148 6.5987 13.5587C7.01321 13.8018 7.48651 14 8 14V12.878C7.7693 12.878 7.49842 12.7882 7.16205 12.59C6.82493 12.3925 6.47591 12.1202 6.08447 11.8098L5.39312 12.6909ZM10.6069 12.6909C11.6681 11.8494 13.0255 10.8859 14.0897 9.68087C15.174 8.4541 16 6.93335 16 4.9391H14.8837C14.8837 6.58327 14.214 7.84969 13.2554 8.93583C12.2768 10.0429 11.0437 10.9159 9.91553 11.8098L10.6069 12.6909ZM16 4.9391C16 2.91044 14.8577 1.15107 13.2093 0.393319C11.5245 -0.380892 9.41544 -0.0674675 7.59814 1.82954L8.40186 2.60749C9.9334 1.00895 11.5453 0.862335 12.7449 1.41363C13.9795 1.98139 14.8837 3.33009 14.8837 4.9391H16ZM9.91553 11.8098C9.52409 12.1202 9.17507 12.3925 8.83795 12.59C8.50158 12.7874 8.2307 12.878 8 12.878V14C8.51349 14 8.98679 13.8018 9.4013 13.5587C9.81656 13.3148 10.2251 12.9932 10.6069 12.6909L9.91553 11.8098Z" fill="#34A853"></path>
                                    </svg>
                                </button> 
                                <button class="action__operation rejected">
                                    2 Open Job
                                </button>
                            </div>
                        </div>
                        <!--single job end  -->
                        <!-- single job -->
                        <div class="single__applied__job">
                            <div class="single__applied__job__content">   
                                <div class="icon">
                                    <img src="assets/img/icon/facebook.svg" alt="">
                                </div>
                                <div class="content">
                                    <a href="#"> <h6>Facebook Inc</h6></a>
                                    <div class="content__info">
                                        <span><i class="fa-light fa-location-dot"></i>Hacker Street, USA</span>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <button class="action__btn">
                                    <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2.21851L7.59814 2.60749C7.65021 2.66179 7.71263 2.70498 7.78167 2.73448C7.85072 2.76397 7.92497 2.77918 8 2.77918C8.07502 2.77918 8.14928 2.76397 8.21833 2.73448C8.28737 2.70498 8.3498 2.66179 8.40186 2.60749L8 2.21851ZM6.08447 11.8098C4.95628 10.9159 3.72316 10.0429 2.74456 8.93583C1.78605 7.84969 1.11628 6.58327 1.11628 4.9391H0C0 6.93335 0.826046 8.45485 1.91033 9.68087C2.97451 10.8852 4.33191 11.8502 5.39312 12.6909L6.08447 11.8098ZM1.11628 4.9391C1.11628 3.33084 2.02047 1.98139 3.25507 1.41363C4.4547 0.862335 6.0666 1.0082 7.59814 2.60749L8.40186 1.83029C6.58605 -0.0674675 4.47553 -0.380892 2.7907 0.393319C1.14307 1.15107 0 2.91044 0 4.9391H1.11628ZM5.39312 12.6909C5.77488 12.9932 6.18419 13.3148 6.5987 13.5587C7.01321 13.8018 7.48651 14 8 14V12.878C7.7693 12.878 7.49842 12.7882 7.16205 12.59C6.82493 12.3925 6.47591 12.1202 6.08447 11.8098L5.39312 12.6909ZM10.6069 12.6909C11.6681 11.8494 13.0255 10.8859 14.0897 9.68087C15.174 8.4541 16 6.93335 16 4.9391H14.8837C14.8837 6.58327 14.214 7.84969 13.2554 8.93583C12.2768 10.0429 11.0437 10.9159 9.91553 11.8098L10.6069 12.6909ZM16 4.9391C16 2.91044 14.8577 1.15107 13.2093 0.393319C11.5245 -0.380892 9.41544 -0.0674675 7.59814 1.82954L8.40186 2.60749C9.9334 1.00895 11.5453 0.862335 12.7449 1.41363C13.9795 1.98139 14.8837 3.33009 14.8837 4.9391H16ZM9.91553 11.8098C9.52409 12.1202 9.17507 12.3925 8.83795 12.59C8.50158 12.7874 8.2307 12.878 8 12.878V14C8.51349 14 8.98679 13.8018 9.4013 13.5587C9.81656 13.3148 10.2251 12.9932 10.6069 12.6909L9.91553 11.8098Z" fill="#34A853"></path>
                                    </svg>
                                </button> 
                                <button class="action__operation pending">
                                    2 Job Opening
                                </button>
                            </div>
                        </div>
                        <!--single job end  -->
                    </div>
                </div>
            </div>

            @include('employee/employee_temp/emp-footer')
        </div>
    </div>
    <!-- content area end -->
    

  
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