
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
                <div id="avatar-error-messages" class="alert alert-danger" style="display: none;"></div>
                <form id="company-profile-form" action="{{ route('update.employer.profile') }}" method="post" enctype="multipart/form-data">
                    @csrf 
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
                                <a class="nav-link" href="#address">Contact Information</a>                         
                            </div>
                        </nav>
                        <div class="my__details" id="info">
                            <div class="info__top">
                                <div class="author__image">
                                    <img class="p-4" src="{{ Auth::check() && Auth::user()->avatar ? asset('uploads/avatars/' . Auth::user()->avatar) : asset('assets/img/placeholder.avif') }}" alt="">
                                </div>
                                <div class="select__image">
                                    <label for="file" class="file-upload__label">Upload New Photo</label>
                                    <input type="file" name="employer_avatar" class="file-upload__input" id="file">
                                </div>
                                <div class="delete__data">
                                    <i id="remove-avatar" class="fa-light fa-trash-can"></i>
                                </div>
                            </div>
                            <div class="info__field">
                                <div class="row row-cols-sm-2 row-cols-1 g-3">
                                    <div class="rt-input-group">
                                        <label for="name">Employer name</label>
                                        <input name="employer_name" value="{{ $profile && $profile->employer_name ? $profile->employer_name : '' }}" type="text" id="name" placeholder="Full Name" autocapitalize="off">
                                        <small id="error-employer_name"></small>
                                    </div>
                                    <div class="rt-input-group">
                                        <label for="email">Email</label>
                                        <input value="{{ $profile && $profile->employer_email ? $profile->employer_email : '' }}" name="employer_email" type="text" id="email" placeholder="jobpath@gmqail.com" autocapitalize="off">
                                        <small id="error-employer_email"></small>
                                    </div>
                                </div>
                                <div class="row row-cols-sm-2 row-cols-1 g-3">
                                    <div class="rt-input-group">
                                        <label for="phone">Phone</label>
                                        <input value="{{ $profile && $profile->employer_phone ? $profile->employer_phone : '' }}" name="employer_phone" type="text" id="phone" placeholder="+880171234567" autocapitalize="off">
                                        <small id="error-employer_phone"></small>
                                    </div>
                                    <div class="rt-input-group">
                                        <label for="url">Website</label>
                                        <input value="{{ $profile && $profile->employer_website ? $profile->employer_website : '' }}" name="employer_website" type="text" id="website" placeholder="emaple.com" autocapitalize="off">
                                        <small id="error-employer_website"></small>
                                    </div>
                                </div>

                                <div class="row row-cols-sm-2 row-cols-1 g-3">
                                    <div class="rt-input-group">
                                        <label for="cc">Company categories</label>
                                        <select name="employer_category" id="employer_category" class="form-select">
                                            <option value="">Select</option>
                                            <option value="Healthcare" {{ $profile && $profile->employer_category && $profile->employer_category == 'Healthcare'  ? 'selected' : '' }}>Healthcare</option>
                                            <option value="IT" {{ $profile && $profile->employer_category && $profile->employer_category == 'IT'  ? 'selected' : '' }}>IT</option>
                                        </select>
                                        <small id="error-employer_category"></small>
                                    </div>
                                    <div class="rt-input-group">
                                        <label for="pv">Public For Profile View</label>
                                        <select name="employer_public_view_profile" id="employer_public_view_profile" class="form-select">
                                            <option value="">Select</option>
                                            <option value="Yes" {{ $profile && $profile->employer_public_view_profile && $profile->employer_public_view_profile == 'Yes'  ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ $profile && $profile->employer_public_view_profile && $profile->employer_public_view_profile == 'No'  ? 'selected' : '' }}>No</option>
                                        </select>
                                        <small id="error-employer_public_view_profile"></small>
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
                            <div class="row row-cols-sm-3 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="Facebook">Facebook</label>
                                    <input value="{{ $profile && $profile->employer_facebook ? $profile->employer_facebook : '' }}" name="employer_facebook" type="text" id="Facebook" placeholder="WWW.facebook.com/username" autocapitalize="off">
                                    <small id="error-employer_facebook"></small>
                                </div>
                                <div class="rt-input-group">
                                    <label for="Facebook">Instagram</label>
                                    <input value="{{ $profile && $profile->employer_instagram ? $profile->employer_instagram : '' }}" name="employer_instagram" type="text" id="Instagram" placeholder="WWW.instagram.com/username" autocapitalize="off">
                                    <small id="error-employer_instagram"></small>
                                </div>
                                <div class="rt-input-group">
                                    <label for="Linkedin">Linkedin</label>
                                    <input value="{{ $profile && $profile->employer_linkedin ? $profile->employer_linkedin : '' }}" name="employer_linkedin" type="text" id="Linkedin" placeholder="WWW.Linkedin.com/username" autocapitalize="off">
                                    <small id="error-employer_linkedin"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- social links end -->

                    <!-- address area -->
                    <h6 class="fw-medium mt-4 mb-4">Address / Location</h6>
                    <div class="social__links radius-16 p-30 bg-white" id="address">
                        <div class="info__field">
                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="col">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="rt-input-group">
                                                <label for="Country">Country</label>
                                                <select name="employer_country" id="Country" class="form-select">
                                                    <option value="">Select Country</option>
                                                    @php
                                                        $countries = [
                                                            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                                            "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos",
                                                            "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia",
                                                            "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain",
                                                            "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                                        ];
                                                    @endphp

                                                    @foreach($countries as $country)
                                                        <option value="{{ $country }}" {{ $profile && $profile->employer_country && $profile->employer_country == $country ? 'selected' : '' }}>
                                                            {{ $country }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small id="error-employer_country"></small>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rt-input-group">
                                                <label for="State">State/Region/Province</label>
                                                <input value="{{ $profile && $profile->employer_state ? $profile->employer_state : '' }}" name="employer_state" type="text" id="state" placeholder="" autocapitalize="off">
                                                <small id="error-employer_state"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="rt-input-group">
                                                <label for="pr">Present Address</label>
                                                <input value="{{ $profile && $profile->employer_present_address ? $profile->employer_present_address : '' }}" name="employer_present_address" type="text" id="address" placeholder="2715 Ash Dr. San Jose,USA" autocapitalize="off">
                                                <small id="error-employer_present_address"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rt-input-group">
                                                <label for="ps">Postal Code</label>
                                                <input value="{{ $profile && $profile->employer_postal_code ? $profile->employer_postal_code : '' }}" name="employer_postal_code" type="text" id="postal-code" placeholder="8340" autocapitalize="off">
                                                <small id="error-employer_postal_code"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col">
                                    <button id="company-profile-buttom" type="submit" class="rts__btn fill__btn">Save Profile</button>
                                </div>
                            </div>
                            <div id="error-messages" class="alert alert-danger" style="display: none;"></div>
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
<script src="{{asset('assets/js/update-empr-profile.js')}}"></script>  
<script src="{{asset('assets/js/update-empr-avatar.js')}}"></script>    
</body>
</html>