
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
    <title>SteerHubIT - Company Profile</title>
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
                            <a class="nav-link " href="#social">Social Links</a>
                            <a class="nav-link " href="#member">Member</a>
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
                                    <label for="name">Employer name</label>
                                    <input type="text" id="name" placeholder="Full Name" required="">
                                </div>
                                <div class="rt-input-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" placeholder="jobpath@gmqail.com" required="">
                                </div>
                            </div>
                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" placeholder="+880171234567" required="">
                                </div>
                                <div class="rt-input-group">
                                    <label for="url">Website</label>
                                    <input type="url" id="url" placeholder="jobpath.com" required="">
                                </div>
                            </div>

                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="fd">Founded Date</label>
                                    <input type="text" placeholder="DD/MM/YY" id="fd" required="">
                                </div>
                                <div class="rt-input-group">
                                    <label for="cs">Company Size</label>
                                    <select name="cs" id="cs" class="form-select">
                                        <option value="18">10-20</option>
                                        <option value="19">20-30</option>
                                        <option value="20">30-40</option>
                                        <option value="21">40-50</option>
                                        <option value="22">50-60</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="cc">Company categories</label>
                                    <select name="cc" id="cc" class="form-select">
                                        <option value="18">Design & Development</option>
                                        <option value="19">Digital Marketing</option>
                                        <option value="20">Writing & Translation</option>
                                        <option value="21">Music & Audio</option>
                                        <option value="22">Video & Animation</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="pv">Public For Profile View</label>
                                    <select name="pv" id="pv" class="form-select">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>


                             <!-- editor area -->
                              <div class="rt-input-group">
                                <div class="textarea"></div>
                              </div>
                             <!-- editor area end -->
                        </div>
                    </div>
                </div>

                <!-- social links -->
                <h6 class="fw-medium mt-4 mb-4">Social Links</h6>
                <div class="social__links p-30 radius-16 bg-white" id="social">
                    <div class="info__field">
                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="Facebook">Facebook</label>
                                <input type="url" id="Facebook" placeholder="WWW.facebook.com/jobpath" required="">
                            </div>
                            <div class="rt-input-group">
                                <label for="Linkedin">Linkedin</label>
                                <input type="url" id="Linkedin" placeholder="WWW.Linkedin.com/jobpath" required="">
                            </div>
                        </div>
                        <div class="row row-cols-sm-2 row-cols-1 g-3">
                            <div class="rt-input-group">
                                <label for="Behance">Behance</label>
                                <input type="url" id="Behance" placeholder="WWW.behance.com/jobpath" required="">
                            </div>
                            <div class="rt-input-group">
                                <label for="Dribbble">Dribbble</label>
                                <input type="url" id="Dribbble" placeholder="WWW.dribbble.com/jobpath" required="">
                            </div>
                            <div class="d-block mt-30">
                                <a href="#" class="added__social__link">Add Another Network</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- social links end -->

                <!-- address area -->
                <h6 class="fw-medium mt-4 mb-4">Address / Location</h6>
                <div class="social__links radius-16 p-30 bg-white" id="address">
                    <div class="info__field">
                        <div class="row row-cols-md-2 row-cols-1">
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
                                    <label for="lt">Latitude</label>
                                    <input type="text" id="lt" placeholder="0.000000" required>
                                </div>
                            </div>
                            <div>
                                <div class="info__field">
                                    <h6 class="font-20 fw-medium mb-2 mt-4 mt-md-0">My location</h6>
                                    <div class="gmap">
                                     <div class="user__location">
                                     <iframe id="map-frame" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                                        
                                     </iframe>
                                     </div>
                                    </div>
                                    <div class="rt-input-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" id="longitude" placeholder="0.000000" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="rts__btn fill__btn">Save Profile</button>
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
<script>
$(document).ready(function() {
    function updateMap() {
        let lat = $("#lt").val().trim();
        let lng = $("#longitude").val().trim();

        // Check if values are valid numbers
        if ($.isNumeric(lat) && $.isNumeric(lng)) {
            let mapSrc = `https://www.google.com/maps?q=${lat},${lng}&hl=en&z=14&output=embed`;
            $("#map-frame").attr("src", mapSrc);
        }
    }

    // Trigger update on input change
    $("#lt, #longitude").on("input", updateMap);
});
</script>  
</body>
</html>