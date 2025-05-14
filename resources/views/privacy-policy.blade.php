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
    <title>Privacy Policy - SteerHubIT</title>
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
                        <h1 class="breadcrumb-title h3 mb-3">Privacy Policy</h1>
                        <nav class="mx-auto max-content">
                            <ul class="breadcrumb m-0 lh-1">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
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
                    <div class="privacy__content fw-medium d-flex gap-30 flex-column">

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">Introduction</h6>
                            <p>Welcome to SteerHubIT. We are committed to protecting your privacy and ensuring that your personal information is handled securely and responsibly. This Privacy Policy explains how we collect, use, disclose, and protect your information when you use our job recruitment platform.
                        </div>
                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">Information We Collect</h6>
                            <p>We collect various types of information to facilitate job recruitment services for both employers and job seekers. This includes:</p>
                            <ul class="list__style__dot">
                                <li>Personal Information: Name, email address, phone number, and resume details.</li>
                                <li>Employer Information: Company name, contact details, and job postings.</li>
                                <li>Usage Data: Log files, IP addresses, device information, and browsing activity.</li>
                                <li>Payment Information: Billing details for subscription services (processed securely by third-party payment providers).</li>
                            </ul>
                        </div>
                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">How We Use Your Information</h6>
                            <p>We use the collected data for the following purposes:</p>
                            <ul class="number__style__dot">
                                <li>To provide job matching and recruitment services.</li>
                                <li>To verify user identities and prevent fraud.</li>
                                <li>To improve our platform and user experience.</li>
                                <li>To communicate with users regarding job postings, applications, and updates.</li>
                                <li>To process payments and manage subscriptions.</li>
                            </ul>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3"> Sharing Your Information</h6>
                            <p>We do not sell your personal information. However, we may share information with:</p>
                            <ul class="number__style__dot">
                                <li>Employers and Job Seekers: To facilitate job placements.</li>
                                <li>Service Providers: Third-party companies that assist with platform operations, such as payment processors and hosting services.</li>
                                <li>Legal Authorities: If required by law or to protect our rights and users.</li>
                            </ul>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">Data Security</h6>
                            <p>We implement security measures to protect your information from unauthorized access, alteration, or disclosure. However, no online platform is completely secure, so we encourage users to take precautions when sharing personal information.</p>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">Your Rights and Choices</h6>
                            <p>You have the right to:</p>
                            <li>Access, update, or delete your personal information.</li>
                            <li>Opt out of marketing communications.</li>
                            <li>Request information on how your data is being used.</li>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3"> Cookies and Tracking Technologies</h6>
                            <p>We use cookies to enhance user experience and analyze platform performance. You can manage cookie preferences through your browser settings.</p>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">Changes to This Privacy Policy</h6>
                            <p>We may update this Privacy Policy from time to time. Any changes will be posted on our website with the updated effective date.</p>
                        </div>

                        <div class="has__item">
                            <h6 class="fw-semibold mb-3">Contact Us</h6>
                            <p>If you have any questions or concerns about this Privacy Policy, please contact us at:
                                <li>Email: [Insert Email]</li>
                                <li>Phone: [Insert Phone Number]</li>
                                <li>Website: [Insert Website URL]</li>
                            </p>
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