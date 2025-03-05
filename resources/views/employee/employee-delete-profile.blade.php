
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
    <title>SteerHubIT - Delete Profile</title>
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

                <div class="candidate__passwordchange">
                    <h6 class="mb-3">Delete Profile</h6>
                    <div class="change__password">
                        <div class="password__change__form">
                            <h6 class="text-center mb-4">Are you sure! You want to delete your profile.</h6>
                            <form action="#">
                                
                                <!-- single item -->
                                <div class="rts-input-group">
                                    <label for="currentPassword">Please Enter Your Login Password</label>
                                    <div class="input-box">
                                        <input type="password" name="currentPassword" id="currentPassword" placeholder="Enter your current password">
                                        <svg class="password__icon" width="26" height="26" viewbox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.4 17.7977C9.4 18.1159 9.27357 18.4211 9.04853 18.6462C8.82348 18.8712 8.51826 18.9977 8.2 18.9977C7.88174 18.9977 7.57652 18.8712 7.35147 18.6462C7.12643 18.4211 7 18.1159 7 17.7977C7 17.4794 7.12643 17.1742 7.35147 16.9491C7.57652 16.7241 7.88174 16.5977 8.2 16.5977C8.51826 16.5977 8.82348 16.7241 9.04853 16.9491C9.27357 17.1742 9.4 17.4794 9.4 17.7977ZM14.2 17.7977C14.2 18.1159 14.0736 18.4211 13.8485 18.6462C13.6235 18.8712 13.3183 18.9977 13 18.9977C12.6817 18.9977 12.3765 18.8712 12.1515 18.6462C11.9264 18.4211 11.8 18.1159 11.8 17.7977C11.8 17.4794 11.9264 17.1742 12.1515 16.9491C12.3765 16.7241 12.6817 16.5977 13 16.5977C13.3183 16.5977 13.6235 16.7241 13.8485 16.9491C14.0736 17.1742 14.2 17.4794 14.2 17.7977ZM19 17.7977C19 18.1159 18.8736 18.4211 18.6485 18.6462C18.4235 18.8712 18.1183 18.9977 17.8 18.9977C17.4817 18.9977 17.1765 18.8712 16.9515 18.6462C16.7264 18.4211 16.6 18.1159 16.6 17.7977C16.6 17.4794 16.7264 17.1742 16.9515 16.9491C17.1765 16.7241 17.4817 16.5977 17.8 16.5977C18.1183 16.5977 18.4235 16.7241 18.6485 16.9491C18.8736 17.1742 19 17.4794 19 17.7977Z" fill="black"></path>
                                            <path d="M11.8 24.9976H8.2C4.8064 24.9976 3.1084 24.9976 2.0548 23.9428C1 22.8892 1 21.1912 1 17.7976C1 14.404 1 12.706 2.0548 11.6524C3.1084 10.5976 4.8064 10.5976 8.2 10.5976H17.8C21.1936 10.5976 22.8916 10.5976 23.9452 11.6524C25 12.706 25 14.404 25 17.7976C25 21.1912 25 22.8892 23.9452 23.9428C22.8916 24.9976 21.1936 24.9976 17.8 24.9976H16.6M5.8 10.5976V8.19763C5.8 7.78963 5.8336 7.38763 5.8996 6.99763M19.9732 6.39763C19.6465 5.13602 18.9836 3.98667 18.0552 3.07204C17.1269 2.15742 15.9678 1.51177 14.7014 1.2039C13.4351 0.896023 12.1089 0.937454 10.8643 1.32378C9.61961 1.7101 8.50307 2.42684 7.6336 3.39763" stroke="#939393" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg> 
                                    </div>
                                </div>
                                <!-- single item end -->
                                 <div class="d-flex justify-content-end gap-30">
                                    <button class="cancel__buttonh rts__btn gray__btn">Cancel</button>
                                     <button type="submit" class="rts__btn fill__btn">Delete Profile</button>
                                 </div>
                            </form>
                        </div>
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