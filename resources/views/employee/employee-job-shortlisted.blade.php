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
    <link rel="shortcut-icon" href="{{asset('assets/img/favicon-16x16.png')}}" type="image/x-icon">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <title>Shortlisted Job(s) - SteerHubIT</title>
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

                <div class="applied__job__info radius-16">
                    <div class="job__filter">
                        <div class="search__job">
                            <div class="position-relative">
                                <form action="{{ route('employee.job.shortlisted.search') }}" method="get">
                                    <input type="text" id="search" placeholder="Search..." name="search" value="{{ request('search') }}" autocomplete="off">
                                    <i class="fa-light fa-magnifying-glass"></i>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="applied__job__list">

                        @forelse($shortlisted as $shortlist)
                        <!-- single job -->
                        <div class="single__applied__job">
                            <div class="single__applied__job__content">
                                <div class="icon">
                                    <img src="{{ $shortlist->job->user->avatar ? asset('uploads/avatars/' . $shortlist->job->user->avatar) : asset('assets/img/dashboard/profile.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <a href="{{ route('job.view', ['slug' => $shortlist->job->slug]) }}">
                                        <h6> {{ $shortlist->job->title }} </h6>
                                    </a>
                                    <div class="content__info">
                                        <span><i class="fa-light fa-location-dot"></i> {{ $shortlist->job->state . ', ' . $shortlist->job->country }}, </span>
                                        <span><i class="fa-light fa-briefcase"></i> {{ $shortlist->job->working_day }} </span>
                                        <span><i class="fa-light fa-clock"></i> {{ \Carbon\Carbon::parse($shortlist->job->created_at)->diffForHumans() }} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="{{ route('job.view', ['slug' => $shortlist->job->slug]) }}" class="action__btn">
                                    <svg width="22" height="16" viewbox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.544 7.045C20.848 7.471 21 7.685 21 8C21 8.316 20.848 8.529 20.544 8.955C19.178 10.871 15.689 15 11 15C6.31 15 2.822 10.87 1.456 8.955C1.152 8.529 1 8.315 1 8C1 7.684 1.152 7.471 1.456 7.045C2.822 5.129 6.311 1 11 1C15.69 1 19.178 5.13 20.544 7.045Z" stroke="#0B0D28" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M14 8C14 7.20435 13.6839 6.44129 13.1213 5.87868C12.5587 5.31607 11.7956 5 11 5C10.2044 5 9.44129 5.31607 8.87868 5.87868C8.31607 6.44129 8 7.20435 8 8C8 8.79565 8.31607 9.55871 8.87868 10.1213C9.44129 10.6839 10.2044 11 11 11C11.7956 11 12.5587 10.6839 13.1213 10.1213C13.6839 9.55871 14 8.79565 14 8Z" stroke="#0B0D28" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!--single job end  -->
                        @empty
                        <div class="alert alert-info">No Jobs Found</div>
                        @endforelse
                    </div>
                    <!-- pagination -->
                    <div class="rts__pagination d-block mx-auto pt-40 max-content">
                        @if ($shortlisted->hasPages())
                        <ul class="d-flex gap-2">
                            {{-- Previous Page Link --}}
                            <li>
                                @if ($shortlisted->onFirstPage())
                                <a class="inactive"><i class="rt-chevron-left"></i></a>
                                @else
                                <a href="{{ $shortlisted->previousPageUrl() }}"><i class="rt-chevron-left"></i></a>
                                @endif
                            </li>

                            {{-- Pagination Elements --}}
                            @foreach ($shortlisted->links()->elements[0] as $page => $url)
                            <li>
                                <a class="{{ $page == $shortlisted->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a>
                            </li>
                            @endforeach

                            {{-- Next Page Link --}}
                            <li>
                                @if ($shortlisted->hasMorePages())
                                <a href="{{ $shortlisted->nextPageUrl() }}"><i class="rt-chevron-right"></i></a>
                                @else
                                <a class="inactive"><i class="rt-chevron-right"></i></a>
                                @endif
                            </li>
                        </ul>
                        @endif

                    </div>
                    <!-- pagination end -->
                </div>
            </div>

            @include('employee/employee_temp/emp-footer')
        </div>
    </div>
    <!-- content area end -->


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


</body>

</html>