
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
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <title>SteerHubIT - Submit Job</title>
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

                <div class="my__profile__tab radius-16 bg-white">
                    <nav>
                        <div class="nav nav-tabs">
                            <a class="nav-link active" href="#info">Company Details</a>
                            <a class="nav-link" href="#address">Contact Information</a>                         
                        </div>
                    </nav>
                    <div class="my__details" id="info">
                        <div class="info__top">
                            <div class="author__image">
                                <img class="p-4" src="{{asset('assets/img/icon/google.svg')}}" alt="">
                            </div>
                            <div class="select__image">
                                <label for="file" class="file-upload__label">Upload New Photo</label>
                                <input type="file" class="file-upload__input" id="file" required="">
                            </div>
                            <div class="delete__data">
                                <i class="fa-light fa-trash-can"></i>
                            </div>
                        </div>
                        <div class="info__field">
                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="cname">Company Name</label>
                                    <input type="text" id="cname" placeholder="Company Name" required="">
                                </div>
                                <div class="rt-input-group">
                                    <label for="jt">Job Title</label>
                                    <input type="text" id="jt" placeholder="Software Engineer" required="">
                                </div>
                            </div>
                            <div class="row row-cols-1">
                                <div class="rt-input-group">
                                    <label for="jd">Job Description</label>
                                    <textarea id="jd" placeholder="Enter Job Description" required=""></textarea>
                                </div>
                            </div>

                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="ws">Working Schedule</label>
                                    <select name="ws" id="ws" class="form-select">
                                        <option value="18">Day Shift</option>
                                        <option value="19">Night Shift</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="wd">Working Day</label>
                                    <select name="wd" id="wd" class="form-select">
                                        <option value="18">Sat - Thus</option>
                                        <option value="19">Mon - Fri</option>
                                        <option value="20">Mon - Sun</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="salary">Salary</label>
                                    <select name="salary" id="salary" class="form-select">
                                       <option value="1">Hourly</option>
                                       <option value="1">Monthly</option>
                                       <option value="1">Custom</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="hp">How You Want To Pay?</label>
                                    <select name="hp" id="hp" class="form-select">
                                        <option value="1">Monthly</option>
                                        <option value="2">Yearly</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="salarymin">Salary Min</label>
                                    <select name="salary" id="salarymin" class="form-select">
                                       <option value="1">1000 - 1500</option>
                                       <option value="1">2000 - 2500</option>
                                       <option value="1">3000 - 3500</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="sm">Salary Max</label>
                                    <select name="sm" id="sm" class="form-select">
                                        <option value="1">1000 - 1500</option>
                                        <option value="1">2000 - 2500</option>
                                        <option value="1">3000 - 3500</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="experience">Experience</label>
                                   <input type="text" id="experience" placeholder="Enter Experience" required="">
                                </div>
                                <div class="rt-input-group">
                                    <label for="qf">Qualification</label>
                                    <input type="text" id="qf" placeholder="Enter Qualification" required="">
                                </div>
                            </div>

                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="ad">Application Deadline Date</label>
                                   <input type="text" id="ad" placeholder="DD/MM/YY" required="">
                                </div>
                                <div class="rt-input-group">
                                    <label for="vurl">Introduction Video URL</label>
                                    <input type="text" id="vurl" placeholder="Link Here" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- address area -->
                <h6 class="fw-medium mt-30 mb-20">Address / Location</h6>
                <div class="social__links radius-16 p-30 bg-white" id="address">
                    <div class="info__field">
                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="info__field">
                                <div class="rt-input-group">
                                    <label for="Country">Country</label>
                                    <select name="Country" id="Country" class="form-select">
                                        <option value="1">Select Country</option>
                                        <option value="2">Bangladesh</option>
                                        <option value="3">India</option>
                                        <option value="4">Pakistan</option>
                                        <option value="5">Nepal</option>
                                        <option value="6">Srilanka</option>
                                        <option value="7">China</option>
                                        <option value="8">USA</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="State">State</label>
                                    <select name="State" id="State" class="form-select">
                                        <option value="1">Select State</option>
                                        <option value="2">Dhaka</option>
                                        <option value="3">Chittagong</option>
                                        <option value="4">Sylhet</option>
                                        <option value="5">Rajshahi</option>
                                        <option value="6">Khulna</option>
                                        <option value="7">Barishal</option>
                                        <option value="8">Mymensingh</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="pr">Present Address</label>
                                    <input type="text" id="pr" placeholder="2715 Ash Dr. San Jose,USA" required="">
                                </div>
                                <div class="rt-input-group">
                                    <label for="ps">Postal Code</label>
                                    <input type="text" id="ps" placeholder="8340" required="">
                                </div>
                                <div class="rt-input-group">
                                    <label for="lt">latitude</label>
                                    <input type="text" id="lt" placeholder="0.000000" required="">
                                </div>
                            </div>
                            <div>
                               <h6 class="font-20 fw-medium mb-20">My location</h6>
                               <div class="gmap">
                                <div class="user__location">
                                    <iframe src="https://maps.google.com/maps?width=100%25&height=600&hl=en&q=reacthemes+(reacthemes)&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe>
                                </div>
                               </div>
                                <div class="rt-input-group mt-30">
                                    <label for="longitude">longitude</label>
                                    <input type="text" id="longitude" placeholder="0.00.000.0000" required="">
                                </div>
                            </div>
                            <button type="submit" class="rts__btn fill__btn">Post Job</button>
                        </div>
                    </div>
                </div>
                <!-- address area end -->
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