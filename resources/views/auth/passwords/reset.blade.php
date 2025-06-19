<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="description" content="Whether you're a healthcare professional seeking new opportunities or a healthcare organization looking for top talent, we're here to guide you through the process. Let's navigate the job market together.">
    <meta name="keywords" content="Job, Resume, Employer, Agency, SteerHubIT">
    <link rel="canonical" href="{{ url('/') }}">
    <meta name="robots" content="index, follow">
    <!-- for open graph social media -->
    <meta property="og:title" content="SteerHubIT">
    <meta property="og:description" content="Whether you're a healthcare professional seeking new opportunities or a healthcare organization looking for top talent, we're here to guide you through the process. Let's navigate the job market together.">
    <meta property="og:image" content="{{ asset('assets/img/favicon-16x16.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <!-- for twitter sharing -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SteerHubIT">
    <meta name="twitter:description" content="Whether you're a healthcare professional seeking new opportunities or a healthcare organization looking for top talent, we're here to guide you through the process. Let's navigate the job market together.">
    <!-- fabicon -->
    <link rel="shortcut-icon" href="assets/img/favicon-16x16.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
    <title>Reset Password - SteerHubIT</title>
    <!-- rt icons -->
    <link rel="stylesheet" href="{{asset('assets/fonts/icon/css/rt-icons.css')}}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/fontawesome.min.css')}}">
    <!-- all plugin css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <style>
        /* Eye icon container positioned relative */
        .icons {
            position: absolute;
            top: 50%;
            right: 50px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 18px;
            user-select: none;
            z-index: 2;
            /* keep it above input text */
        }

        /* Hide lock icon on small devices (optional) */
        @media (max-width: 480px) {
            .input-icon-leading {
                display: none;
            }
        }
    </style>

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
                        <h1 class="breadcrumb-title h3 mb-3">Reset Password</h1>
                        <nav>
                            <ul class="breadcrumb m-0 lh-1">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="breadcrumb__area__shape d-flex gap-4 justify-content-end align-items-center">
                        <div class="shape__one common">
                            <img src="{{asset('assets/img/breadcrumb/shape-1.svg')}}" alt="">
                        </div>
                        <div class="shape__two common">
                            <img src="{{asset('assets/img/breadcrumb/shape-2.svg')}}" alt="">
                        </div>
                        <div class="shape__three common">
                            <img src="{{asset('assets/img/breadcrumb/shape-3.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- contact form -->
    <div class="rts__section section__padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 ">
                    <div class="job__contact is__contact mt-30">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div id="form-response" class="mb-3"></div>
                        <form action="{{ route('password.update') }}" method="POST" class="d-flex flex-column gap-4">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="search__item">
                                <label for="name" class="mb-4 font-20 fw-medium text-dark text-capitalize">Email Address</label>
                                <div class="position-relative">
                                    <input value="{{ $email ?? old('email') }}" type="text" name="email" id="email" autocomplete="off" placeholder="youremail@example.com">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                @error('email')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="search__item">
                                <label for="login-password" class="mb-4 font-20 fw-medium text-dark text-capitalize">Password</label>
                                <div class="password-input-container">
                                    <input type="password" name="password" id="password" autocomplete="off" placeholder="Enter your new password">
                                    <i class="fa-light fa-lock input-icon"></i>
                                    <div class="icons">
                                        <i class="fa-light fa-eye-slash input-icon input-icon-trailing toggle-password" id="toggle-password"></i>
                                    </div>
                                </div>
                                @error('password')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="search__item">
                                <label for="login-password" class="mb-4 font-20 fw-medium text-dark text-capitalize">Confirm Password</label>
                                <div class="password-input-container">
                                    <input type="password" name="password_confirmation" id="password-confirm" autocomplete="off" placeholder="Re-enter your new password">
                                    <i class="fa-light fa-lock input-icon"></i>
                                    <div class="icons">
                                        <i class="fa-light fa-eye-slash input-icon input-icon-trailing toggle-password2" id="toggle-password2" data-=""></i>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>

                            <button type="submit" class="rts__btn fill__btn be-1 w-100 rounded-1 apply__btn">
                                Reset Password
                            </button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-6 ps-5">
                    <div class="contact__image">
                        <figure>
                            <img src="assets/img/pages/contact.webp" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact form end -->


    @include('templates/footer')
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script src="{{ asset('assets/js/subscribe.js') }}"></script>
    <script src="{{ asset('assets/js/reset-password.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const icon = document.getElementById('toggle-password');
            const icon2 = document.getElementById('toggle-password2');
            const input = document.getElementById('password');
            const input2 =document.getElementById('password-confirm');

            icon.addEventListener('click', function() {
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });

            icon2.addEventListener('click', function() {
                if (input2.type === 'password') {
                    input2.type = 'text';
                    icon2.classList.remove('fa-eye-slash');
                    icon2.classList.add('fa-eye');
                } else {
                    input2.type = 'password';
                    icon2.classList.remove('fa-eye');
                    icon2.classList.add('fa-eye-slash');
                }
            });

        });
    </script>

</body>

</html>