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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="login-route" content="{{ route('login') }}">
    <meta name="register-url" content="{{ route('register') }}">
    <link rel="shortcut-icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/x-icon">
    <title>Terms & Conditions - SteerHubIT</title>
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
                <div class="col-lg-12 position-relative d-flex justify-content-center align-items-center">
                    <div class="breadcrumb__area max-content  breadcrumb__padding z-2">
                        <h1 class="breadcrumb-title h3 mb-3">Terms and Conditions</h1>
                        <nav class="mx-auto max-content">
                            <ul class="breadcrumb m-0 lh-1">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="breadcrumb__area__shape breadcrumb__style__four d-flex gap-4 justify-content-end align-items-center">
                        <div class="shape__one common">

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

    <!-- tos -->
    <div class="rts__section section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="tos__content d-flex gap-30 flex-column">
                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">1. Introduction</h6>
                            <p>Welcome to SteerHubIT. By accessing or using our platform, you agree to comply with these Terms and Conditions. If you do not agree with any part of these terms, please do not use our services.</p>
                        </div>
                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">2. Definitions</h6>
                            <p>"SteerHubIT" refers to our job recruitment platform, services, and website.

                            <ul>
                                <li> "User" refers to anyone accessing our platform, including employers and job seekers.</li>
                                <li>"Employer" refers to companies or individuals posting job opportunities.</li>
                                <li> "Job Seeker" refers to individuals seeking employment through our platform</li>
                            </ul>
                            </p>

                        </div>
                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">3. User Accounts</h6>
                            <p>
                            <ul>
                                <li>Users must provide accurate and complete information when creating an account.</li>
                                <li>Users are responsible for maintaining the confidentiality of their login credentials.</li>
                                <li>We reserve the right to suspend or terminate accounts for violations of these terms.</li>
                            </ul>
                            </p>
                        </div>
                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">4. Job Postings and Applications</h6>
                            <p>
                            <ul>
                                <li>Employers are responsible for the accuracy and legality of job postings.</li>
                                <li>Job Seekers must ensure that their resumes and applications contain truthful information.</li>
                                <li>SteerHubIT is not responsible for the outcome of job applications or hiring decisions.</li>
                            </ul>
                            </p>
                        </div>
                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">5. Payments and Subscriptions</h6>
                            <p>
                            <ul>
                                <li>Certain services may require payment or subscription fees.</li>
                                <li>Payments are processed securely by third-party providers.</li>
                                <li>Subscription fees are non-refundable unless stated otherwise.</li>
                            </ul>
                            </p>
                        </div>
                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">5. Prohibited Activities</h6>
                            <p>Users may not:
                            <ul>
                                <li>Post false, misleading, or offensive job listings or resumes.</li>
                                <li>Use the platform for unlawful purposes.</li>
                                <li>Subscription fees are non-refundable unless stated otherwise.</li>
                                <li>Attempt to hack, disrupt, or abuse our services.</li>
                                <li>Share personal contact details outside of the platform to bypass subscription services.</li>
                            </ul>
                            </p>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">5. Intellectual Property</h6>
                            <p>
                            <ul>
                                <li>All content on SteerHubIT, including logos, text, and software, is owned by or licensed to us.</li>
                                <li>Users may not copy, distribute, or modify our content without permission.</li>
                            </ul>
                            </p>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">5. Liability and Disclaimers</h6>
                            <p>
                            <ul>
                                <li>SteerHubIT is not responsible for any employment decisions made by employers.</li>
                                <li>We do not guarantee job placements or hiring outcomes.</li>
                                <li>We are not liable for any loss or damages resulting from platform use.</li>
                            </ul>
                            </p>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">5. Termination of Services</h6>
                            <p>We reserve the right to terminate or restrict access to users who violate these terms.</p>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">5. Changes to Terms</h6>
                            <p>We may update these Terms and Conditions at any time. Continued use of the platform constitutes acceptance of any changes.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tos end -->

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

    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery AJAX -->
    <script src="{{ asset('assets/js/subscribe.js') }}"></script>
</body>

</html>