<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $employer ? $employer->employer_name : $user->name }} - SteerHubIT</title>
    <link rel="stylesheet" href="{{asset('assets/mgt/css/plugin.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/mgt/style.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
</head>

<body class="layout-light side-menu overlayScroll">
    <div class="mobile-search">
        <form class="search-form">
            <span data-feather="search"></span>
            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
        </form>
    </div>

    <div class="mobile-author-actions"></div>
    @include('admin/admin_temp/header')
    <main class="main-content">

        @include('admin/admin_temp/sidebar')

        <div class="contents">

            <div class="container-fluid">
                <div class="profile-content mb-50">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="breadcrumb-main">
                                <h4 class="text-capitalize breadcrumb-title">My profile</h4>
                            </div>

                        </div>
                        <div class="cos-lg-3 col-md-4  ">
                            <aside class="profile-sider">
                                <!-- Profile Acoount -->
                                <div class="card mb-25">
                                    <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0">

                                        <div class="account-profile">
                                            <div class="ap-img w-100 d-flex justify-content-center">
                                                <!-- Profile picture image-->
                                                <img class="ap-img__main rounded-circle mb-3  wh-120 d-flex bg-opacity-primary" src="{{ $user->avatar ? asset('uploads/avatars/' . $user->avatar) : asset('assets/img/dashboard/profile.png')}}" alt="profile">
                                            </div>
                                            <div class="ap-nameAddress pb-3 pt-1">
                                                <h5 class="ap-nameAddress__title">
                                                    {{ $employer ? $employer->employer_name : $user->name }}
                                                </h5>
                                                <p class="ap-nameAddress__subTitle fs-14 m-0">
                                                    {{ $user->role }} | {{ $employer ? $employer->employer_category : 'N/A' }}
                                                </p>
                                                <p class="ap-nameAddress__subTitle fs-14 m-0">
                                                    <span data-feather="map-pin"></span>
                                                    {{ $employer ? $employer->employer_state : 'N/A' }}, {{ $employer ? $employer->employer_country : 'N/A' }}
                                                </p>
                                            </div>
                                            <div class="ap-button button-group d-flex justify-content-center flex-wrap mt-20">
                                                <button type="button" class="border text-capitalize px-25 color-gray transparent shadow2 radius-md">
                                                    <span data-feather="mail"></span>message</button>

                                                <button class="btn btn-danger btn-default btn-squared text-capitalize  px-25">
                                                    <span data-feather="user-minus"></span>
                                                    Block this user
                                                </button>

                                            </div>
                                        </div>

                                        <div class="mt-10 pt-20 pb-20 px-0"></div>
                                    </div>
                                </div>
                                <!-- Profile Acoount End -->

                                <!-- Profile User Bio -->
                                <div class="card mb-25">
                                    <div class="user-info border-bottom">
                                        <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                            <div class="profile-header-title">
                                                Contact info
                                            </div>
                                        </div>
                                        <div class="card-body pt-md-1 pt-0">
                                            <div class="user-content-info">
                                                <p class="user-content-info__item">
                                                    <span data-feather="mail"></span> {{ $employer ? $employer->employer_email : 'N/A' }}
                                                </p>
                                                <p class="user-content-info__item">
                                                    <span data-feather="phone"></span> {{ $employer ? $employer->employer_phone : 'N/A' }}
                                                </p>
                                                <p class="user-content-info__item mb-0">
                                                    <span data-feather="globe"></span> {{ $employer ? $employer->employer_website : 'N/A' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="db-social border-bottom">
                                        <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                            <div class="profile-header-title">
                                                Social Profiles
                                            </div>
                                        </div>
                                        <div class="card-body pt-md-1 pt-0">
                                            <ul class="db-social-parent mb-0">
                                                <li class="db-social-parent__item">
                                                    <a class="color-facebook hover-facebook wh-44 fs-22" href="{{ $employer ? $employer->employer_facebook : 'N/A' }}">
                                                        <i class="lab la-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li class="db-social-parent__item">
                                                    <a class="color-ruby hover-ruby  wh-44 fs-22" href="{{ $employer ? $employer->employer_linkedin : 'N/A' }}">
                                                        <i class="lab la-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li class="db-social-parent__item">
                                                    <a class="color-instagram hover-instagram wh-44 fs-22" href="{{ $employer ? $employer->employer_instagram : 'N/A' }}">
                                                        <i class="lab la-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Profile User Bio End -->
                            </aside>
                        </div>

                        <div class="col">
                            <!-- Tab Menu -->
                            <div class="ap-tab ap-tab-header">
                                <div class="ap-tab-wrapper">
                                    <ul class="nav px-25 ap-tab-main" id="ap-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="ap-overview-tab" data-toggle="pill" href="#ap-overview" role="tab" aria-controls="ap-overview" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="job-tab" data-toggle="pill" href="#job" role="tab" aria-controls="job" aria-selected="false">Jobs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="activity-tab" data-toggle="pill" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Activity</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Tab Menu End -->
                            <div class="tab-content mt-25" id="ap-tabContent">
                                <div class="tab-pane fade show active" id="ap-overview" role="tabpanel" aria-labelledby="ap-overview-tab">
                                    <div class="ap-content-wrapper">
                                        <div class="row">
                                            <div class="col-lg-4 mb-25">
                                                <!-- Card 1 -->
                                                <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                    <div>

                                                        <div class="overview-content">
                                                            <h1> {{ $countJobs }} </h1>
                                                            <p>Jobs</p>
                                                            <div class="ap-po-details-time">
                                                                <span class="color-success"><i class="las la-arrow-up"></i>
                                                                    <strong>25%</strong></span>
                                                                <small>Since last week</small>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="ap-po-timeChart">
                                                        <div class="overview-single__chart d-md-flex align-items-end">
                                                            <div class="parentContainer">

                                                                <div>
                                                                    <canvas id="mychart8"></canvas>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card 1 End -->
                                            </div>
                                            <div class="col-lg-4 mb-25">
                                                <!-- Card 2 End  -->
                                                <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                    <div>

                                                        <div class="overview-content">
                                                            <h1> {{ $countShortlists }} </h1>
                                                            <p>Applied Jobs</p>
                                                            <div class="ap-po-details-time">
                                                                <span class="color-success"><i class="las la-arrow-up"></i>
                                                                    <strong>25%</strong></span>
                                                                <small>Since last week</small>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="ap-po-timeChart">
                                                        <div class="overview-single__chart d-md-flex align-items-end">
                                                            <div class="parentContainer">


                                                                <div>
                                                                    <canvas id="mychart9"></canvas>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card 2 End  -->
                                            </div>
                                            <div class="col-lg-4 mb-25">
                                                <!-- Card 3 -->
                                                <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                    <div>

                                                        <div class="overview-content">
                                                            <h1> {{ $countApplicants ? (int)$countApplicants : '0' }} </h1>
                                                            <p>Applicants</p>
                                                            <div class="ap-po-details-time">
                                                                <span class="color-danger"><i class="las la-arrow-down"></i>
                                                                    <strong>25%</strong></span>
                                                                <small>Since last week</small>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="ap-po-timeChart">
                                                        <div class="overview-single__chart d-md-flex align-items-end">
                                                            <div class="parentContainer">


                                                                <div>
                                                                    <canvas id="mychart10"></canvas>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card 3 End -->
                                            </div>
                                            <div class="col-lg-12">
                                                <!-- Statistics Charts -->
                                                <div class="card">
                                                    <div class="card-header text-capitalize px-md-25 px-3">
                                                        <h6>General Statistics</h6>
                                                        <div class="dropdown">
                                                            <a href="#" role="button" id="statistics1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                                <span data-feather="more-horizontal"></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="statistics1">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="ap-statistics-charts">
                                                            <div class="parentContainer">


                                                                <div>
                                                                    <canvas id="profile-chart"></canvas>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Statistics Charts End -->
                                            </div>

                                            @include('admin/employer/components/comp-jobs')
                                        </div>
                                    </div>
                                </div>
                                @include('admin/employer/components/comp-alljobs')
                                <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                                    <div class="ap-post-content">
                                        <div class="row">
                                            <div class="col-xxl-8">
                                                <!-- Friend post -->
                                                <div class="card global-shadow mb-25">
                                                    <div class="friends-widget">
                                                        <div class="card-header px-md-25 px-3">
                                                            <h6>Friends</h6>
                                                        </div>
                                                        <div class="card-body p-0 py-10">
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-primary bg-opacity-primary">
                                                                            <span data-feather="inbox"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">James</span> sent you a
                                                                                message
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-secondary bg-opacity-secondary">
                                                                            <span data-feather="upload"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">Adam </span>upload
                                                                                website template for sale
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-success bg-opacity-success">
                                                                            <span data-feather="log-in"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">Mumtahin </span>has
                                                                                registered
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-info bg-opacity-info">
                                                                            <span data-feather="at-sign"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/2.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">James </span>Send you a
                                                                                message
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex align">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-danger bg-opacity-danger">
                                                                            <span data-feather="heart"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/3.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">Adam </span>upload
                                                                                website template for sale
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-warning bg-opacity-warning">
                                                                            <span data-feather="message-square"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">James</span> sent you a
                                                                                message
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-secondary bg-opacity-secondary">
                                                                            <span data-feather="upload"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0" style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">Shreyu Neu</span> sent
                                                                                you a
                                                                                message
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-success bg-opacity-success">
                                                                            <span data-feather="log-in"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">Mumtahin </span>has
                                                                                registered
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-info bg-opacity-info">
                                                                            <span data-feather="at-sign"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/2.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">James </span>Send you a
                                                                                message
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex align">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-danger bg-opacity-danger">
                                                                            <span data-feather="heart"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/3.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">Adam </span>upload
                                                                                website template for sale
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-warning bg-opacity-warning">
                                                                            <span data-feather="message-square"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">James</span> sent you a
                                                                                message
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                                <div class="d-flex">
                                                                    <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                        <span class="ffp__icon color-secondary bg-opacity-secondary">
                                                                            <span data-feather="upload"></span></span>
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0" style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffp__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>
                                                                                <span class="color-primary">Shreyu Neu</span> sent
                                                                                you a
                                                                                message
                                                                            </h6>
                                                                        </a>
                                                                        <p class="d-block">
                                                                            5 hours ago
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ffp__button">


                                                                    <div class="dropdown  dropdown-click ">

                                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <span data-feather="more-horizontal"></span>
                                                                        </button>


                                                                        <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Item One</a>
                                                                            <a class="dropdown-item" href="#">Item Two</a>
                                                                            <a class="dropdown-item" href="#">Item Three</a>

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Friend Post End -->
                                            </div>
                                            <div class="col-xxl-4">
                                                <!-- Friend Widgets -->
                                                <div class="card global-shadow mb-25">
                                                    <div class="friends-widget">
                                                        <div class="card-header px-md-25 px-3">
                                                            <h6>Friends</h6>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="ffw d-flex justify-content-between">
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="mr-3 ffw__imgWrapper">
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffw__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>Meyri Carles</h6>
                                                                        </a>
                                                                        <span class="d-block">
                                                                            UI Designer
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div>




                                                                    <button class="btn btn-default btn-squared btn-outline-light friends-follow">follow
                                                                    </button>




                                                                </div>
                                                            </div>
                                                            <div class="ffw d-flex justify-content-between">
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="mr-3 ffw__imgWrapper">
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffw__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>Shreyu Neu</h6>
                                                                        </a>
                                                                        <span class="d-block">
                                                                            Product Designer
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="ffw__button">




                                                                    <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                        follow
                                                                    </button>




                                                                </div>
                                                            </div>
                                                            <div class="ffw d-flex justify-content-between">
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="mr-3 ffw__imgWrapper">
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffw__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>Domnic Harris</h6>
                                                                        </a>
                                                                        <span class="d-block">
                                                                            Executive Assistant
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="ffw__button">




                                                                    <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                        follow
                                                                    </button>




                                                                </div>
                                                            </div>
                                                            <div class="ffw d-flex justify-content-between">
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="mr-3 ffw__imgWrapper">
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/2.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffw__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>Khalid Hasan</h6>
                                                                        </a>
                                                                        <span class="d-block">
                                                                            UI director
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="ffw__button">




                                                                    <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                        follow
                                                                    </button>




                                                                </div>
                                                            </div>
                                                            <div class="ffw d-flex justify-content-between">
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="mr-3 ffw__imgWrapper">
                                                                        <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/3.jpg'); background-size: cover;"></span>
                                                                    </div>
                                                                    <div class="ffw__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>Tuhin Molla</h6>
                                                                        </a>
                                                                        <span class="d-block">
                                                                            System Administrator
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="ffw__button">




                                                                    <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                        follow
                                                                    </button>




                                                                </div>
                                                            </div>
                                                            <a class="view-more-comment color-primary fs-13 fw-500 px-25 pb-20" href="#">Load more friends</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Friend Widgets End -->

                                                <!-- Gallery Image -->
                                                <div class="card global-shadow mb-25">
                                                    <div class="photo-gallery-widget">
                                                        <div class="card-header justify-content-between d-flex flex-wrap px-md-25 px-3">
                                                            <h6>photos</h6>
                                                            <a class="color-primary fs-13 fw-500 mt-lg-0 mt-1" href="#">see all</a>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="wig">
                                                                <div class="wig__item">
                                                                    <img src="img/315.png" alt="gallery">
                                                                </div>
                                                                <div class="wig__item">
                                                                    <img src="img/325.png" alt="gallery">
                                                                </div>
                                                                <div class="wig__item">
                                                                    <img src="img/design.png" alt="gallery">
                                                                </div>
                                                                <div class="wig__item">
                                                                    <img src="img/99.png" alt="gallery">
                                                                </div>
                                                                <div class="wig__item">
                                                                    <img src="img/166.png" alt="gallery">
                                                                </div>
                                                                <div class="wig__item">
                                                                    <img src="img/287.png" alt="gallery">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Gallery Image End -->

                                                <!-- Gallery Video Popup -->
                                                <div class="card global-shadow mb-25">
                                                    <div class="video-gallery-widget">
                                                        <div class="card-header justify-content-between d-flex flex-wrap px-md-25 px-3">
                                                            <h6>videos</h6>
                                                            <a class="color-primary fs-13 fw-500 mt-lg-0 mt-1" href="#">see all</a>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="wig">
                                                                <div class="wig__item wig-overlay">
                                                                    <img src="img/juice-2.png" alt="gallery">
                                                                    <div class="wig-overlay__content">
                                                                        <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                            <img class="svg" src="img/svg/play.svg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="wig__item wig-overlay">
                                                                    <img src="img/cup-card.png" alt="gallery">
                                                                    <div class="wig-overlay__content">
                                                                        <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                            <img class="svg" src="img/svg/play.svg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="wig__item wig-overlay">
                                                                    <img src="img/round-box.png" alt="gallery">
                                                                    <div class="wig-overlay__content">
                                                                        <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                            <img class="svg" src="img/svg/play.svg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="wig__item wig-overlay">
                                                                    <img src="img/glass.png" alt="gallery">
                                                                    <div class="wig-overlay__content">
                                                                        <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                            <img class="svg" src="img/svg/play.svg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="wig__item wig-overlay">
                                                                    <img src="img/bottles.png" alt="gallery">
                                                                    <div class="wig-overlay__content">
                                                                        <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                            <img class="svg" src="img/svg/play.svg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="wig__item wig-overlay">
                                                                    <img src="img/325.png" alt="gallery">
                                                                    <div class="wig-overlay__content">
                                                                        <a class="wig-overlay__iconWrapper" href="#">
                                                                            <img class="svg" src="img/svg/play.svg" alt="img">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Gallery Video Popup End -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('admin/admin_temp/footer')
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>

    <!-- inject:js-->
    <script src="{{asset('assets/mgt/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/mgt/js/script.min.js')}}"></script>
    <!-- endinject-->
</body>

</html>