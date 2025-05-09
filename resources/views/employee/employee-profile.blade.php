
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

                @if(session('error'))
                <div id="error-messages" class="alert alert-danger">{{ session('error') }}</div>
                @endif 

                @if(session('success'))
                <div id="error-messages" class="alert alert-success"> {{ session('success') }} </div>
                @endif

                <form action="{{ route('employee.profile.store') }}" enctype="multipart/form-data" method="post">
                    @csrf 
                    <div class="my__profile__tab radius-16 bg-white">
                    <div class="my__details" id="info">
                        <div class="info__top">
                            <div class="author__image">
                            <img id="profile-avatar" src="{{ Auth::check() && Auth::user()->avatar ? asset('uploads/avatars/' . Auth::user()->avatar) : asset('assets/img/dashboard/profile.png') }}" alt="Profile Avatar"> 
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
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="rt-input-group">
                                        <label for="name">Full Name</label>
                                        <input name="fullname" value="{{ $profile ? $profile->fullname : old('fullname') }}" type="text" id="name" placeholder="Full Name" autocomplete="off">
                                        @error('fullname')
                                        <small style="color: red;"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row row-cols-sm-3 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" value="{{ $profile ? $profile->phone : old('phone') }}" type="text" id="phone" placeholder="+880171234567" autocomplete="off">
                                    @error('phone')
                                        <small style="color: red;"> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="rt-input-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" value="{{ $profile ? $profile->dob : old('dob') }}" autocomplete="off">
                                    @error('dob')
                                        <small style="color: red;"> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="rt-input-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="">Select</option>
                                        <option value="male" {{ (old('gender') ?? ($profile->gender ?? '')) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ (old('gender') ?? ($profile->gender ?? '')) == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                        
                            <!-- experience end -->
                             <!-- editor area -->
                              <div class="rt-input-group">
                                <label for="editor">Candidate Description</label>
                               <textarea name="description" id="editor" class="form-control" placeholder="Enter Description" cols="10" rows="5">{{ $profile ? html_entity_decode($profile->description) : old('description') }}</textarea>
                               @error('description')
                                    <small style="color: red;"> {{ $message }} </small>
                                @enderror
                              </div>
                             <!-- editor area end -->
                        </div>
                    </div>
                </div>
                <h6 class="fw-medium mt-4 mb-4">Social Links</h6>
                <div class="social__links p-30 radius-16 bg-white" id="social">
                        <div class="info__field">
                            <div class="row row-cols-sm-3 row-cols-1 g-3">
                                <div class="rt-input-group">
                                    <label for="Facebook">Facebook</label>
                                    <input value="{{ $profile ? $profile->facebook : old('facebook') }}" name="facebook" type="text" id="Facebook" placeholder="https://www.facebook.com/username" autocapitalize="off">
                                    @error('facebook')
                                        <small style="color: red;"> {{ $message }} </small>
                                        @enderror
                                </div>
                                <div class="rt-input-group">
                                    <label for="Facebook">Instagram</label>
                                    <input value="{{ $profile ? $profile->instagram : old('instagram') }}" name="instagram" type="text" id="Instagram" placeholder="https://www.instagram.com/username" autocapitalize="off">
                                    @error('instagram')
                                        <small style="color: red;"> {{ $message }} </small>
                                        @enderror
                                </div>
                                <div class="rt-input-group">
                                    <label for="Linkedin">Linkedin</label>
                                    <input value="{{ $profile ? $profile->linkedin : old('linkedin') }}" name="linkedin" type="text" id="Linkedin" placeholder="https://www.Linkedin.com/username" autocapitalize="off">
                                    @error('linkedin')
                                        <small style="color: red;"> {{ $message }} </small>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- address area -->
                <h6 class="fw-medium mt-4 mb-4">Address / Location</h6>
                <div class="social__links radius-16 p-30 bg-white" id="address">
                        <div class="info__field">
                            <div class="row row-cols-sm-2 row-cols-1 g-3">
                                <div class="col">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="rt-input-group">
                                                <label for="Country">Country *</label>
                                                <select name="country" id="Country" class="form-select">
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
                                                        <option value="{{ $country }}" 
                                                            {{ (old('country') ?? ($profile->country ?? '')) == $country ? 'selected' : '' }}>
                                                            {{ $country }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                @error('country')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="rt-input-group">
                                                <label for="State">State/Region/Province</label>
                                                <input value="{{ $profile ? $profile->state : old('state') }}" name="state" type="text" id="state"  autocapitalize="off">
                                                @error('state')
                                                <small style="color: red;"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="rt-input-group">
                                                <label for="pr">Present Address</label>
                                                <input value="{{ $profile ? $profile->present_address : old('present_address') }}" name="present_address" type="text" id="address" placeholder="2715 Ash Dr. San Jose,USA" autocapitalize="off">
                                                @error('present_address')
                                        <small style="color: red;"> {{ $message }} </small>
                                        @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rt-input-group">
                                                <label for="ps">Postal Code</label>
                                                <input value="{{ $profile ? $profile->postal_code : old('postal_code') }}" name="postal_code" type="text" id="postal-code" placeholder="8340" autocapitalize="off">
                                                @error('postal_code')
                                        <small style="color: red;"> {{ $message }} </small>
                                        @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button id="job-seeker-profile-buttom" type="submit" class="rts__btn fill__btn">Save Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- address area end -->
                </form>
                
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
    

  
      @include('templates/offcanvas')
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