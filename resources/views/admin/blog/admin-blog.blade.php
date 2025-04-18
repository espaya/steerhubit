
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog - SteerHubIT</title>

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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main user-member justify-content-sm-between ">
                            <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Blog</h4>
                                    <span class="sub-title ml-sm-25 pl-sm-25">0 Post(s)</span>
                                </div>

                            </div>
                            <div class="action-btn">
                                <a href="{{ route('management.blog.create') }}" class="btn px-15 btn-primary">
                                    <i class="las la-plus fs-16"></i>Add New Post</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="project-top-wrapper project-top-progress d-flex justify-content-between flex-wrap">
                            <div class="project-top-left d-flex flex-wrap justify-content-lg-between justify-content-center mt-n10">
                                <div class="project-tap global-shadow order-lg-1 order-2 my-10">
                                    <ul class="nav px-1" id="ap-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="ap-overview-tab" data-toggle="pill" href="#ap-overview" role="tab" aria-controls="ap-overview" aria-selected="true">all posts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="timeline-tab" data-toggle="pill" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">draft</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="activity-tab" data-toggle="pill" href="#activity" role="tab" aria-controls="activity" aria-selected="false">comments</a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="{{ route('management.blog') }}" method="GET" class="d-flex align-items-center user-member__form">
                                    <span data-feather="search"></span>
                                    <input class="form-control mr-sm-2 border-0 box-shadow-none" type="search" name="search" value="{{ request('search') }}" placeholder="Search by Title" aria-label="Search"
                                    >
                                </form>
                            </div><!-- End: .project-top-left -->
                            <div class="project-top-right d-flex flex-wrap">
                                <div class="project-category">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 mr-10 fs-14 color-light">sort by:</p>
                                        <div class="project-category__select">
                                            <select class="js-example-basic-single js-states form-control" id="event-category">
                                                <option value="all" selected="">project category</option>
                                                <option value="JAN">event</option>
                                                <option value="FBR">Venues</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- End: .project-category -->
                            </div><!-- End: .project-top-right -->
                        </div><!-- End: .project-top-wrapper -->
                    </div><!-- End: .col -->
                </div>
                <!-- Tab Menu End -->
                 @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                 @endif

                 @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                 @endif
                <div class="projects-tab-content">
                    <div class="tab-content mt-25" id="ap-tabContent">
                        <div class="tab-pane fade show active" id="ap-overview" role="tabpanel" aria-labelledby="ap-overview-tab">
                            <div class="row">

                                <div class="userDatatable projectDatatable project-table global-shadow border p-30 bg-white radius-xl w-100 mx-15">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                    <th>
                                                        <span class="projectDatatable-title">title</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">category</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">date</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">tags</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">status</span>
                                                    </th>
                                                    <th>
                                                        <span class="projectDatatable-title">action</span>
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @forelse($posts as $post)

                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                                <a href="#" class="text-dark fw-500">
                                                                    <h6> {{ $post->title }} </h6>
                                                                </a>
                                                                <p class="pt-1 d-block mb-0">
                                                                    <!-- Web Design -->
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{ $post->categoryName->category_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}
                                                        </div>
                                                    </td>
                                                    <td>

                                                    <ul class="d-flex user-group-people__parent align-content-center">
                                                        @if($post && $post->tags)
                                                            @php
                                                                $tags = json_decode($post->tags, true); // decode JSON to PHP array
                                                                $tagsToShow = array_slice($tags, 0, 3); // Get the first 3 tags
                                                            @endphp
                                                            @if(is_array($tagsToShow))
                                                                @foreach($tagsToShow as $tag)
                                                                    <li><a href="#">{{ $tag }}</a></li>
                                                                @endforeach
                                                                @if(count($tags) > 3)
                                                                    <li><a href="#">...</a></li> <!-- Optionally show an ellipsis if there are more than 3 tags -->
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </ul>

                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block">
                                                            @if($post->status == 'Publish')
                                                            <span class="media-badge color-white bg-success">published</span>
                                                            @endif
                                                            @if($post->status == 'Draft')
                                                            <span class="media-badge color-white bg-info">draft</span>
                                                            @endif
                                                            @if($post->status == 'Schedule')
                                                            <span class="media-badge color-white bg-warning">scheduled</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a target="_blank" title="view this job" href="{{ route('blog.view.single', ['slug' => $post->slug]) }}" class="view">
                                                                    <span data-feather="eye"></span></a>
                                                            </li>

                                                            <li>
                                                                <a href="#" 
                                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to move this post to trash?')) document.getElementById('delete-post-{{ $post->id }}').submit();" 
                                                                title="Move to trash" 
                                                                class="remove">
                                                                    <span data-feather="trash"></span>
                                                                </a>

                                                                <form id="delete-post-{{ $post->id }}" action="{{ route('management.blog.destroy', ['id' => $post->id]) }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty 
                                                <div class="alert alert-info">No Post found</div>
                                            @endforelse
                                            </tbody>
                                        </table><!-- End: .table -->
                                    </div>
                                </div><!-- End: .userDatatable -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex mt-30 mb-30">
                                <nav class="atbd-page">
                                    <ul class="atbd-pagination d-flex">
                                        <li class="atbd-pagination__item">
                                            {{-- Previous Button --}}
                                            @if ($posts->onFirstPage())
                                                <a class="atbd-pagination__link pagination-control disabled"><span class="la la-angle-left"></span></a>
                                            @else
                                                <a href="{{ $posts->previousPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                            @endif

                                            {{-- Page Numbers --}}
                                            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                                @if ($page == $posts->currentPage())
                                                    <a class="atbd-pagination__link active"><span class="page-number">{{ $page }}</span></a>
                                                @elseif ($page == 1 || $page == $posts->lastPage() || abs($page - $posts->currentPage()) <= 1)
                                                    <a href="{{ $url }}" class="atbd-pagination__link"><span class="page-number">{{ $page }}</span></a>
                                                @elseif ($page == $posts->currentPage() - 2 || $page == $posts->currentPage() + 2)
                                                    <a class="atbd-pagination__link pagination-control"><span class="page-number">...</span></a>
                                                @endif
                                            @endforeach

                                            {{-- Next Button --}}
                                            @if ($posts->hasMorePages())
                                                <a href="{{ $posts->nextPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
                                            @else
                                                <a class="atbd-pagination__link pagination-control disabled"><span class="la la-angle-right"></span></a>
                                            @endif
                                        </li>

                                        {{-- Per Page Selector --}}
                                        <li class="atbd-pagination__item">
                                            <div class="paging-option">
                                                <form method="GET" action="{{ route('management.blog') }}">
                                                    {{-- Keep search value --}}
                                                    @if(request('search'))
                                                        <input type="hidden" name="search" value="{{ request('search') }}">
                                                    @endif
                                                    {{-- Keep current page (optional) --}}
                                                    <select name="per_page" class="page-selection" onchange="this.form.submit()">
                                                        @foreach($perPageOptions as $option)
                                                            <option value="{{ $option }}" {{ request('per_page', 10) == $option ? 'selected' : '' }}>
                                                                {{ $option }}/page
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div><!-- End: .project-tap-content -->
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