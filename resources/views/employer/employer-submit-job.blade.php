
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
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <title>Submit Job - SteerHubIT</title>
    <!-- rt icons -->
    <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
    <!-- all plugin css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <style>
        .ck-label{
            display: none !important;
        }
    </style>

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

                <form id="add-job-form" action="#" method="post">
                    @csrf
                    <div class="my__profile__tab radius-16 bg-white">
                        <div class="my__details" id="info">
                            <div class="info__field">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="rt-input-group">
                                            <label for="jt">Job Title</label>
                                            <input name="title" type="text" id="title" placeholder="Enter Job Title" autocomplete="off">
                                            <small style="color:red" id="error-title"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-1">
                                    <div class="rt-input-group">
                                        <label for="jd">Job Description</label>
                                        <textarea id="description" name="description" placeholder="Enter Job Description" autocomplete="off"></textarea>
                                        <small style="color:red" id="error-description"></small>
                                    </div>
                                </div>

                                <div class="row g-3">
                                <div class="col-md-3">
                                        <div class="rt-input-group">
                                            <label for="ws">Cateogry</label>
                                            <select name="category" id="category" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Certified Nursing Assistant">Certified Nursing Assistant (CNA)</option>
                                                <option value="Licensed Practical Nurse">Licensed Practical Nurse (LPN)</option>
                                                <option value="Home Health Aide">Home Health Aide (HHA)</option>
                                            </select>
                                            <small style="color:red" id="error-category"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="rt-input-group">
                                            <label for="ws">Working Schedule</label>
                                            <select name="working_schedule" id="working-schedule" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Day Shift">Day Shift</option>
                                                <option value="Night Shift">Night Shift</option>
                                            </select>
                                            <small style="color:red" id="error-working_schedule"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="rt-input-group">
                                            <label for="wd">Working Day</label>
                                            <select name="working_day" id="wd" class="form-select">
                                            <option value="">Select</option>
                                                <option value="Sat - Thus">Sat - Thus</option>
                                                <option value="Mon - Fri">Mon - Fri</option>
                                                <option value="Mon - Sun">Mon - Sun</option>
                                            </select>
                                            <small style="color:red" id="error-working_day"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="rt-input-group">
                                            <label for="pay">Pay</label>
                                            <input type="text" id="pay" name="pay" class="form-control" placeholder="Enter Pay" autocomplete="off">
                                            <small style="color:red" id="error-pay"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-sm-2 row-cols-1 g-3">
                                    <div class="rt-input-group">
                                        <label for="experience">Experience</label>
                                        <input name="experience" type="text" id="experience" placeholder="Enter Experience" autocomplete="off">
                                        <small style="color:red" id="error-experience"></small>
                                    </div>
                                    <div class="rt-input-group">
                                        <label for="ad">Application Deadline Date</label>
                                        <input name="deadline" type="date" id="deadline" autocomplete="off">
                                        <small style="color:red" id="error-deadline"></small>
                                    </div>
                                </div>


                                <div class="row row-cols-sm-2 row-cols-1 g-3">
                                    <div class="rt-input-group">
                                        <label for="qf">Qualification</label>
                                        <input name="qualification" type="text" id="qualification" placeholder="Enter Qualification" autocomplete="off">
                                        <small style="color:red" id="error-qualification"></small>
                                    </div>
                                    <div class="rt-input-group">
                                        <label for="vurl">Introduction Video(YouTube) URL (Optional)</label>
                                        <input name="video" type="text" id="video" placeholder="Link Here" autocomplete="off">
                                        <small style="color:red" id="error-video"></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- address area -->
                    <h6 class="fw-medium mt-30 mb-20">Address / Location</h6>
                    <div class="social__links radius-16 p-30 bg-white" id="address">
                        <div class="info__field">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="rt-input-group">
                                        <label for="Country">Country</label>
                                        <select name="country" id="country" class="form-select">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                        <small style="color:red" id="error-country"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="rt-input-group">
                                        <label for="State">State</label>
                                        <input name="state" type="text" id="state" class="form-control" placeholder="Enter state" autocomplete="off">
                                        <small style="color:red" id="error-state"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="rt-input-group">
                                        <label for="pr">Present Address</label>
                                        <input name="address" type="text" id="address" class="form-control" placeholder="2715 Ash Dr. San Jose, USA" autocomplete="off">
                                        <small style="color:red" id="error-address"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="rt-input-group">
                                        <label for="ps">Postal Code</label>
                                        <input name="postal_code" type="text" id="postal-code" class="form-control" placeholder="8340" autocomplete="off">
                                        <small style="color:red" id="error-postal_code"></small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="rt-input-group">
                                        <button type="submit" class="rts__btn fill__btn">Post Job</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div id="job-error-message"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- address area end -->
                </form>
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
<script src="{{asset('assets/js/empr-submit-job.js')}}"></script> 
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {
            editor.editing.view.change(writer => {
                writer.setStyle('min-height', '300px', editor.editing.view.document.getRoot());
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>

</body>
</html>