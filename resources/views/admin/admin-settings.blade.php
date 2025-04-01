
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Settings - SteerHubIT</title>

    <!-- inject:css-->

    <link rel="stylesheet" href="{{asset('assets/mgt/css/plugin.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/mgt/style.css')}}">

    <!-- endinject -->

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

            <div class="profile-setting ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="breadcrumb-main">
                                <h4 class="text-capitalize breadcrumb-title">Settings</h4>
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <div class="action-btn">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-5">
                            <!-- Profile Acoount -->
                            <div class="card mb-25">
                                <div class="card-body text-center p-0">

                                    <div class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
                                        <div class="ap-img mb-20 pro_img_wrapper">
                                            <form id="avatar-form" action="{{ route('update.mgt.avatar') }}" method="post">
                                                @csrf
                                                <input id="file-upload" type="file" name="fileUpload" class="d-none">
                                                <label for="file-upload">
                                                    <!-- Profile picture image-->
                                                    <img id="profile-img" class="ap-img__main rounded-circle wh-120" src="{{ Auth::check() && Auth::user()->avatar ? asset('uploads/avatars/' . Auth::user()->avatar) : asset('assets/img/dashboard/profile.png') }}" alt="profile">

                                                    <span class="cross" id="remove_pro_pic">
                                                        <span data-feather="camera"></span>
                                                    </span>
                                                </label>
                                            </form>
                                        </div>
                                        <div class="ap-nameAddress pb-3">
                                            <h5 class="ap-nameAddress__title">{{ Auth::check() ? ucfirst(Auth::user()->name) : '' }}</h5>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0">{{ Auth::check() ? Auth::user()->role : '' }}</p>
                                        </div>
                                    </div>
                                    <div class="ps-tab p-20 pb-25">
                                        <div class="nav flex-column text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                <span data-feather="user"></span>Edit profile</a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                <span data-feather="settings"></span>Account
                                                setting</a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                                <span data-feather="key"></span>change password</a>
                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                                <span data-feather="users"></span>social profiles</a>
                                            <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab" aria-controls="v-pills-notification" aria-selected="false">
                                                <span data-feather="bell"></span>notification</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Profile Acoount End -->
                        </div>
                        <div class="col-xxl-9 col-lg-8 col-sm-7">
                            <div class="as-cover">
                                <div class="as-cover__imgWrapper">
                                    <input id="file-upload1" type="file" name="bannerImg" class="d-none">
                                    <label for="file-upload1">
                                        <img style="height: 300px; object-fit:cover" id="mgt-banner" src="{{ Auth::check() && Auth::user()->bannerImg ? asset('uploads/' . Auth::user()->bannerImg) : asset('assets/mgt/img/ap-header.png')}}" alt="image" class="w-100">
                                        <span class="ap-cover__changeImgBtn">
                                            <span class="btn btn-outline-primary cover-btn">
                                                <span data-feather="camera"></span>Change
                                                Cover</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-50">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <!-- Edit Profile -->
                                        <div class="edit-profile mt-25">
                                            <div class="card">
                                                <div class="card-header px-sm-25 px-3">
                                                    <div class="edit-profile__title">
                                                        <h6>Edit Profile</h6>
                                                        <span class="fs-13 color-light fw-400">Set up your personal
                                                            information</span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                            <div class="edit-profile__body mx-lg-20">
                                                                <form id="company-profile-form" action="" method="POST" enctype="multipart/form-data">
                                                                    <div class="form-group mb-20">
                                                                        <label for="names">company name</label>
                                                                        <input name="company_name" value="" autocomplete="" type="text" class="form-control" id="names" placeholder="Company name">
                                                                    </div>
                                                                    <div class="form-group mb-20">
                                                                        <label for="phoneNumber1">Company phone number</label>
                                                                        <input name="company_phone" value="" autocomplete="off" type="tel" class="form-control" id="company-phone" placeholder="Company phone">
                                                                    </div>
                                                                    <div class="form-group mb-20">
                                                                        <label for="address">Company Address</label>
                                                                        <input name="company_address" autocomplete="off" type="text" class="form-control" id="company-address" placeholder="Company Address">
                                                                    </div>
                                                                    <div class="form-group mb-20">
                                                                        <label for="city">Company City</label>
                                                                        <input name="company_city" value="" autocomplete="off" type="text" class="form-control" id="company-city" placeholder="Company city">
                                                                    </div>
                                                                    <div class="form-group mb-20">
                                                                        <label for="state">Company state</label>
                                                                        <input name="company_state" autocomplete="off" value="" type="text" class="form-control" id="company-state" placeholder="Company State">
                                                                    </div>
                                                                    <div class="form-group mb-20">
                                                                        <label for="state">Company Zip</label>
                                                                        <input value="" autocomplete="off" name="company_zip" type="text" class="form-control" id="company-zip" placeholder="Company Zip">
                                                                    </div>
                                                                    <div class="form-group mb-20">
                                                                        <label for="state">Company Country</label>
                                                                        <input name="company_country" autocomplete="off" type="text" class="form-control" id="company-country" placeholder="Company Country">
                                                                    </div>

                                                                    <div class="button-group d-flex flex-wrap pt-30 mb-15">

                                                                        <button id="company-profile-button" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">update profile
                                                                        </button>

                                                                        <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                                                        </button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Profile End -->
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <!-- Edit Profile -->
                                        <div class="edit-profile mt-25">
                                            <div class="card">
                                                <div class="card-header  px-sm-25 px-3">
                                                    <div class="edit-profile__title">
                                                        <h6>Account setting</h6>
                                                        <span class="fs-13 color-light fw-400">Update your username and manage your
                                                            account</span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                            <div class="edit-profile__body mx-lg-20">
                                                                <div id="success-message" class="alert alert-success d-none"></div>
                                                                <form id="updateEmailUsernameForm" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group mb-20">
                                                                        <label for="name1">username</label>
                                                                        <input name="name" type="text" value="{{ Auth::check() ? Auth::user()->name : '' }}" class="form-control" id="name1">
                                                                        <div class="text-danger error-name"></div> <!-- Error message for username -->
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label for="email45">email</label>
                                                                        <input name="email" type="text" value="{{ Auth::check() ? Auth::user()->email : '' }}" class="form-control" id="email45">
                                                                        <div class="text-danger error-email"></div> <!-- Error message for email -->
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row justify-content-center align-items-center">
                                                        <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                            <div class="button-group d-flex flex-wrap pt-35 mb-35">
                                                                <button type="button" id="saveEmailUsernameChanges" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize"> Save Changes</button>

                                                                <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Profile End -->
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <!-- Edit Profile -->
                                        <div class="edit-profile mt-25">
                                            <div class="card">
                                                <div class="card-header  px-sm-25 px-3">
                                                    <div class="edit-profile__title">
                                                        <h6>change password</h6>
                                                        <span class="fs-13 color-light fw-400">Change or reset your account
                                                            password</span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                            <div class="edit-profile__body mx-lg-20">
                                                            <div id="response-message" class="alert d-none"></div>
                                                                <form action="#" id="updatePasswordForm" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group mb-20">
                                                                        <label for="name">old passowrd</label>
                                                                        <div class="position-relative">
                                                                            <input name="old_password" type="password" class="form-control" id="old-password">
                                                                            <span class="fa fa-fw fa-eye-slash text-light fs-16 field-icon toggle-password2"></span>
                                                                        </div>
                                                                        <small class="text-danger error-old-password"></small>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label for="password-field">new password</label>
                                                                        <div class="position-relative">
                                                                            <input id="new-password" type="password" class="form-control pr-50" name="new_password">
                                                                            <span class="fa fa-fw fa-eye-slash text-light fs-16 field-icon toggle-password2"></span>
                                                                        </div>
                                                                        <small class="text-danger error-new-password"></small>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label for="password-field">repeat password</label>
                                                                        <div class="position-relative">
                                                                        <input id="repeat-password" type="password" class="form-control pr-50" name="repeat_password" onpaste="return false;" oncopy="return false;" oncut="return false;">

                                                                            <span class="fa fa-fw fa-eye-slash text-light fs-16 field-icon toggle-password2"></span>
                                                                        </div>
                                                                        <small class="text-danger error-repeat-password"></small>
                                                                    </div>
                                                                    <div class="button-group d-flex flex-wrap pt-45 mb-35">

                                                                        <button id="update-password-button" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">Save Changes
                                                                        </button>

                                                                        <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                                                        </button>





                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Profile End -->
                                    </div>
                                    <div class="tab-pane fade " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <!-- Edit Profile -->
                                        <div class="edit-profile edit-social mt-25">
                                            <div class="card">
                                                <div class="card-header  px-sm-25 px-3">
                                                    <div class="edit-profile__title">
                                                        <h6>social profiles</h6>
                                                        <span class="fs-13 color-light fw-400">Add elsewhere links to your
                                                            profile</span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                            <div class="edit-profile__body mx-lg-20">
                                                            <!-- Error and success message div -->
                                                            <div id="form-error" class="alert alert-danger d-none"></div>
                                                            <div id="form-success" class="alert alert-success d-none"></div>

                                                            <form id="socials-form" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-30">
                                                                    <label for="socialUrl">Facebook</label>
                                                                    <div class="input-group flex-nowrap">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text border-facebook bg-facebook text-white wh-44 radius-xs justify-content-center" id="addon-wrapping1">
                                                                                <i class="lab la-facebook-f fs-18"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input value="{{ $socials && $socials->facebook ? $socials->facebook : ''  }}" name="facebook" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping1" id="facebook">
                                                                        <div id="facebook-error" class="error-message text-danger"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-30">
                                                                    <label for="twitterUrl">Twitter</label>
                                                                    <div class="input-group flex-nowrap">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text border-twitter bg-twitter text-white wh-44 radius-xs justify-content-center" id="addon-wrapping2">
                                                                                <i class="lab la-twitter fs-18"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input value="{{ $socials && $socials->twitter ? $socials->twitter : ''  }}" name="twitter" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping2" id="twitter">
                                                                        <div id="twitter-error" class="error-message text-danger"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-30">
                                                                    <label for="instagramUrl">Instagram</label>
                                                                    <div class="input-group flex-nowrap">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text border-instagram bg-instagram text-white wh-44 radius-xs justify-content-center" id="addon-wrapping4">
                                                                                <i class="lab la-instagram fs-18"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input value="{{ $socials && $socials->instagram ? $socials->instagram : ''  }}" name="instagram" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-describedby="addon-wrapping4" id="instagram">
                                                                        <div id="instagram-error" class="error-message text-danger"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-30">
                                                                    <label for="githubUrl">YouTube</label>
                                                                    <div class="input-group flex-nowrap">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text border-youtube bg-youtube text-white wh-44 radius-xs justify-content-center" id="addon-wrapping5">
                                                                                <i class="lab la-youtube fs-18"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input value="{{ $socials && $socials->youtube ? $socials->youtube : ''  }}" name="youtube" type="text" class="form-control form-control--social" autocomplete="off" placeholder="Url" aria-label="Username" aria-describedby="addon-wrapping5" id="youtube">
                                                                        <div id="youtube-error" class="error-message text-danger"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="button-group d-flex flex-wrap pt-50 mb-15">
                                                                    <button type="button" id="socials-button" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">Update Social Profiles</button>
                                                                    <button type="button" class="btn btn-light btn-default btn-squared fw-400 text-capitalize">Cancel</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Profile End -->
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab">
                                        <!-- Edit Profile -->
                                        <div class="edit-profile edit-social mt-25">
                                            <div class="card">
                                                <div class="card-header px-sm-25 px-3">
                                                    <div class="edit-profile__title">
                                                        <h6>social profiles</h6>
                                                        <span class="fs-13 color-light fw-400">Add elsewhere links to your
                                                            profile</span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="notification-content p-25 border mb-25">
                                                        <div class="notification-content__title d-flex justify-content-between flex-wrap pb-20 text-capitalize">
                                                            <h6 class="fs-15 text-light fw-500 lh-normal">Notifications</h6>
                                                            <a class="text-primary fs-13" href="#">toggle all</a>
                                                        </div>
                                                        <div class="global-shadow radius-xl bg-white">
                                                            <div class="notification-content__body p-25 border-bottom">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Company News</h6>
                                                                        <span>Get company news, announcements, and product
                                                                            updates</span>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc1">
                                                                        <label class="custom-control-label" for="nc1"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="notification-content__body p-25 border-bottom">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Meetups Near You</h6>
                                                                        <span>Get company news, announcements, and product
                                                                            updates</span>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc2">
                                                                        <label class="custom-control-label" for="nc2"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="notification-content__body p-25 border-bottom">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Opportunities</h6>
                                                                        <span>Get company news, announcements, and product
                                                                            updates</span>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc3">
                                                                        <label class="custom-control-label" for="nc3"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="notification-content__body p-25">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Weekly Newsletters</h6>
                                                                        <span>Get company news, announcements, and product
                                                                            updates</span>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc4">
                                                                        <label class="custom-control-label" for="nc4"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="notification-content p-25 border mb-25">
                                                        <div class="notification-content__title d-flex justify-content-between flex-wrap pb-20 text-capitalize">
                                                            <h6 class="fs-15 text-light fw-500 lh-normal">Account Activity</h6>
                                                            <a class="text-primary fs-13" href="#">toggle all</a>
                                                        </div>
                                                        <div class="global-shadow radius-xl bg-white">
                                                            <div class="notification-content__body p-25 border-bottom">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Anyone seeing my profile page</h6>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc5">
                                                                        <label class="custom-control-label" for="nc5"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="notification-content__body p-25 border-bottom">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Anyone follow me</h6>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc6">
                                                                        <label class="custom-control-label" for="nc6"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="notification-content__body p-25 border-bottom">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Someone mentions me</h6>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc7">
                                                                        <label class="custom-control-label" for="nc7"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="notification-content__body p-25 border-bottom">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Someone accepts my invitation</h6>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc8">
                                                                        <label class="custom-control-label" for="nc8"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="notification-content__body p-25">
                                                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                                                    <div class="div">
                                                                        <h6>Anyone send me a message</h6>
                                                                    </div>
                                                                    <div class="custom-control custom-switch my-lg-0 my-10">
                                                                        <input type="checkbox" class="custom-control-input" id="nc9">
                                                                        <label class="custom-control-label" for="nc9"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="button-group d-flex flex-wrap pt-25 mb-25">



                                                        <button class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">Update notification Profiles
                                                        </button>








                                                        <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                                        </button>





                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Edit Profile End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-info-confirmed modal fade" id="modal-info-confirmed" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-info" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-info-body d-flex">
                                <div class="modal-info-icon warning">
                                    <span data-feather="info"></span>
                                </div>
                                <div class="modal-info-text">
                                    <h6 id="modal-title">Do you want to delete these items?</h6>
                                    <p id="modal-message">Some descriptions</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light btn-outlined btn-sm" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-info btn-sm" id="confirm-delete-btn">Ok</button>
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
    <script src="{{ asset('assets/js/update-mgt-username-email.js') }}"></script>
    <script src="{{ asset('assets/js/update-mgt-password.js') }}"></script>
    <script src="{{ asset('assets/js/update-mgt-avatar.js') }}"></script>
    <script src="{{ asset('assets/js/update-mgt-banner.js') }}"></script>
    <script src="{{ asset('assets/js/update-mgt-socials.js') }}"></script>
    <!-- endinject-->
</body>

</html>