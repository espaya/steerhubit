
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
    <!-- fabicon -->
    <link rel="shortcut-icon" href="{{asset('assets/img/favicon-16x16.png')}}" type="image/x-icon">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <title>SteerHubIT - Profile</title>
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

                <div id="avatar-message"></div>

                <div class="my__profile__tab radius-16 bg-white">
                    <nav>
                        <div class="nav nav-tabs">
                            <a class="nav-link active" href="#info">My Details</a>
                            <a class="nav-link " href="#social">Social Links</a>
                            <a class="nav-link" href="#address">Contact Information</a>                         
                        </div>
                    </nav>
                    <div class="my__details" id="info">
                        <div class="info__top">
                            <div class="author__image">
                            <img id="profile-avatar" src="{{ Auth::user()->avatar ?? asset('assets/img/dashboard/profile.png') }}" alt="Profile Avatar">
                            </div>
                            <div class="select__image">
                                <label for="file" class="file-upload__label">Upload New Photo</label>
                                <input name="file" type="file" class="file-upload__input" id="file">
                            </div>
                            <div class="delete__data">
                                <i class="fa-light fa-trash-can"></i>
                            </div>
                        </div>
                        <div class="info__field">
                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="name">Full Name</label>
                                    <input name="fullname" value="{{ old('fullname') }}" type="text" id="name" placeholder="Full Name" autocomplete="off">
                                </div>
                                <div class="rt-input-group">
                                    <label for="email">Email</label>
                                    <input name="email" value="{{ old('email') }}" type="email" id="email" placeholder="jobpath@gmqail.com" autocomplete="off">
                                </div>
                            </div>
                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" value="{{ old('phone') }}" type="text" id="phone" placeholder="+880171234567" autocomplete="off">
                                </div>
                                <div class="rt-input-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" value="{{ old('dob') }}" autocomplete="off" >
                                </div>
                            </div>
                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="">Select</option>
                                        <option {{ old('gender') == 'Male' ? 'selected' : '' }} value="male">Male</option>
                                        <option {{ old('gender') == 'Female' ? 'selected' : '' }} value="female">Female</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="age">Age</label>
                                    <input type="text" id="age" name="age" value="{{ old('age') }}" autocomplete="off" >
                                </div>
                            </div>
                            <!-- salary type -->
                            <div class="row row-cols-sm-3 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="salary">Salary Type</label>
                                    <select name="salary" id="salary" class="form-select">
                                        <option value="hourly">Hourly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="jobcat">Job Category</label>
                                    <select name="jobcat" id="jobcat" class="form-select">
                                        <option value="1">Select Job Category</option>
                                        <option value="2">it consultancy</option>
                                        <option value="3">Job Category 2</option>
                                        <option value="4">Job Category 3</option>
                                        <option value="5">Job Category 4</option>
                                        <option value="6">Job Category 5</option>
                                        <option value="7">Job Category 6</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="jobtitle">Job Title</label>
                                    <input type="text" id="jobtitle" placeholder="Enter Job Title" required="">
                                </div>
                            </div>
                            <!-- salary type end -->
                             
                            <!-- qualification -->
                            <div class="row row-cols-sm-3 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="qualification">qualification</label>
                                    <select name="qualification" id="qualification" class="form-select">
                                       <option value="1">Select Qualification</option>
                                        <option value="2">SSC</option>
                                        <option value="3">HSC</option>
                                        <option value="4">Diploma</option>
                                        <option value="5">Graduation</option>
                                        <option value="6">Post Graduation</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="lang">Language</label>
                                    <select name="lang" id="lang" class="form-select">
                                        <option value="1">Select Language</option>
                                        <option value="2">English</option>
                                        <option value="3">Hindi</option>
                                        <option value="4">French</option>
                                        <option value="5">Spanish</option>
                                        <option value="6">Chinese</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="tags">Tags</label>
                                    <input value="tags" type="text" id="tags" placeholder="Enter Tags" autocomplete="off">
                                </div>
                            </div>
                            <!-- qualification end -->

                            <!-- experience -->
                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="experience">experience</label>
                                    <select name="experience" id="experience" class="form-select">
                                       <option value="1">Experience</option>
                                        <option value="2">1 Year</option>
                                        <option value="3">2 Year</option>
                                        <option value="4">3 Year</option>
                                        <option value="5">4 Year</option>
                                    </select>
                                </div>
                                <div class="rt-input-group">
                                    <label for="show">Show my profile</label>
                                    <select name="show" id="show" class="form-select">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                               
                            </div>
                            <!-- experience end -->
                             <!-- editor area -->
                              <div class="rt-input-group">
                                <label for="editor">Candidate Description</label>
                               <textarea name="description" id="editor" class="form-control" placeholder="Enter Description" cols="10" rows="5">{{ old('description') }}</textarea>
                              </div>
                             <!-- editor area end -->
                        </div>
                    </div>
                </div>
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
                <!-- address area -->
                <h6 class="fw-medium mt-4 mb-4">Address / Location</h6>
                <div class="social__links radius-16 p-30 bg-white" id="address">
                    <div class="row row-cols-md-2 row-cols-lg-2 row-cols-1 g-30">
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
                            <div class="info__field">
                                <h6 class="font-20 fw-medium mb-2 mt-4 mt-md-0">My location</h6>
                                <div class="gmap">
                                <div class="user__location">
                                    <iframe src="https://maps.google.com/maps?width=100%25&height=600&hl=en&q=reacthemes+(reacthemes)&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe>
                                </div>
                                </div>
                                <div class="rt-input-group">
                                    <label for="longitude">longitude</label>
                                    <input type="text" id="longitude" placeholder="0.00.000.0000" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info__field">
                        <button type="submit" class="rts__btn fill__btn mx-0">Save Profile</button>
                    </div>
                </div>
                <!-- address area end -->
            </div>
            
           @include('employee/employee_temp/emp-footer')
        </div>
    </div>
    <!-- content area end -->

    <div class="modal similar__modal fade " id="remove-avatar-Modal">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="max-content similar__form form__padding">
                  <div id="otp-error-message"></div>
                  <div class="text-center" id="remove-avatar-message" style="font-size: 14px;"></div>                  
                  <div class="tab-content" id="">
                  </div>
                  <form id="remove--form-ajax" action="" method="post" class="d-flex flex-column gap-3">
                     @csrf
                     <div class="form-group">
                        <div class="position-relative">
                             <p>Are you sure you want to delete your profile picture?</p>
                        </div>
                     </div>

                     <div class="form-group my-3">
                        <button id="otp-button" type="submit" class="rts__btn w-25 fill__btn">Yes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
    

  
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header p-0 mb-5 mt-4">
      <a href="index.html" class="offcanvas-title" id="offcanvasLabel">
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
<script src="{{asset('assets/js/upload-avatar.js')}}"></script>
<script src="{{asset('assets/js/remove-avatar.js')}}"></script>
    
</body>
</html>