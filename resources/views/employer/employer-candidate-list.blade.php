
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
    <link href="../../css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <title>Candidate List - SteerHubIT</title>
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
                <!-- sidebar menu -->
                <div class="sidebar__menu d-md-block d-lg-none">
                    <div class="sidebar__action"><i class="fa-sharp fa-regular fa-bars"></i> Sidebar</div>
                </div>
                <!-- sidebar menu end -->

                <!-- <h6 class="fw-semibold mb-30">Candidate Shortlist</h6> -->
                <div class="candidate__filter__area" style="background-color: transparent !important; ">
                    <h6 class="fw-semibold mb-30">Candidate List</h6>
                    <div class="candidate__filter">
                        <ul class="candidate__filter__shorting" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Total: {{ $totalApplicants }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <div class="search__item">
                                <div class="position-relative">
                                    <form method="GET" action="{{ route('employer.candidate.list.search') }}">
                                        <input type="text" name="search" id="search" placeholder="Search Candidate" autocomplete="off">
                                        <i class="fa-light fa-magnifying-glass"></i>
                                    </form>
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="short__list__candidate">
                            <!-- single item -->
                             @forelse($candidates as $candidate)
                            <div class="single__shortlist__item">
                                <div class="author__info">
                                    <div class="author__meta">
                                        <div class="author__image">
                                            <img src="{{ optional($candidate->user)->avatar ? asset('uploads/avatars/' . $candidate->user->avatar) : asset('assets/img/dashboard/profile.png') }}" alt="">
                                        </div>
                                        <div class="author__name">
                                            <h6 class="fw-semibold mb-1"> {{ $candidate->fullname }} </h6>
                                        </div>
                                    </div>
                                    <div class="author__info__list">
                                        <span><i class="fa-light fa-location-dot"></i> {{ $candidate->present_address .', '. $candidate->state . ', ' . $candidate->country }} </span>
                                        <span><i class="fa-light fa-phone"></i> {{ $candidate->phone }}</span>
                                    </div>
                                </div>
        
                                <div class="shortlist__action">
                                    <a href="{{ route('public.candidates.show', ['id' => $candidate->userID ]) }}" class="action__item">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 12C1 12 5 5 12 5C19 5 23 12 23 12C23 12 19 19 12 19C5 19 1 12 1 12Z" stroke="#939393" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <circle cx="12" cy="12" r="3" stroke="#939393" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @empty 
                            <p class="alert alert-info">No Candidates Found</p>
                            @endforelse 
                            <!-- single item end -->
                            
                            <!-- pagination -->
                            <div class="rts__pagination d-block mx-auto pt-40 max-content">
                                @if ($candidates->hasPages())
                                    <div class="rts__pagination d-block mx-auto pt-40 max-content">
                                        <ul class="d-flex gap-2">
                                            {{-- Previous Page Link --}}
                                            @if ($candidates->onFirstPage())
                                                <li><a href="#" class="inactive"><i class="rt-chevron-left"></i></a></li>
                                            @else
                                                <li><a href="{{ $candidates->previousPageUrl() }}"><i class="rt-chevron-left"></i></a></li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($elements = $candidates->links()->paginator->elements() as $element)
                                                {{-- "Three Dots" Separator --}}
                                                @if (is_string($element))
                                                    <li><a href="#" class="inactive">{{ $element }}</a></li>
                                                @endif

                                                {{-- Array Of Links --}}
                                                @if (is_array($element))
                                                    @foreach ($element as $page => $url)
                                                        @if ($page == $candidates->currentPage())
                                                            <li><a class="active" href="#">{{ $page }}</a></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($candidates->hasMorePages())
                                                <li><a href="{{ $candidates->nextPageUrl() }}"><i class="rt-chevron-right"></i></a></li>
                                            @else
                                                <li><a href="#" class="inactive"><i class="rt-chevron-right"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif

                            </div>
                            <!-- pagination end -->

                        </div>
                    </div>
                    
                </div>
                
            </div>

            @include('employer/employer_temp/footer')
            
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