<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trashed Jobs - SteerHubIT</title>

    <link href="../../../../css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

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
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Trashed Jobs</h4>
                                    <!-- <span class="sub-title ml-sm-25 pl-sm-25">274 Users</span> -->
                                </div>

                                <form action="{{ route('management.jobs.search') }}" method="get" class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                    <span data-feather="search"></span>
                                    <input name="search" autocomplete="off" class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Search by Title" aria-label="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                <div class=" alert alert-success  alert-dismissible fade show " role="alert">
                    <div class="alert-content">
                        <p> {{ session('success') }} </p>
                            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class=" alert alert-danger  alert-dismissible fade show " role="alert">
                    <div class="alert-content">
                        <p> {{ session('error') }} </p>
                            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="userDatatable global-shadow border p-30 bg-white radius-xl w-100 mb-30">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <div class="custom-checkbox  check-all">
                                                        <input class="checkbox" type="checkbox" id="check-3">
                                                        <label for="check-3">
                                                            <span class="checkbox-text userDatatable-title">address</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">title</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">working schedule</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">working day</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">pay</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">date created</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">status</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title float-right">action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($jobs as $job)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <div class="checkbox-group-wrapper">
                                                            <div class="checkbox-group d-flex">
                                                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                    <input class="checkbox" type="checkbox" id="check-grp-12">
                                                                    <label for="check-grp-12"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>{{ $job->address }}</h6>
                                                        </a>
                                                        <p class="d-block mb-0">
                                                            {{ $job->country }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $job->title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $job->working_schedule }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $job->working_day }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    ${{ number_format($job->pay, 2) }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ \Carbon\Carbon::parse($job->created_at)->format('F j, Y') }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <div class="row">
                                                        @if($job->status == 'PENDING')
                                                        <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">Pending</span>
                                                        @endif

                                                        @if($job->status == 'APPROVED')
                                                        <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">Approved</span>
                                                        @endif

                                                        @if($job->status == 'REJECTED')
                                                        <span class="bg-opacity-danger  color-danger rounded-pill userDatatable-content-status active">Rejected</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a title="view this job" href="{{ route('job.view', ['slug' => $job->slug]) }}" class="view">
                                                            <span data-feather="eye"></span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" 
                                                        onclick="event.preventDefault(); 
                                                                    if(confirm('Are you sure you want to approve this job?')) {
                                                                        document.getElementById('approve-form-{{ $job->id }}').submit();
                                                                    }" 
                                                        title="Approve this job" 
                                                        class="edit">
                                                            <span data-feather="check"></span>
                                                        </a>

                                                        <form id="approve-form-{{ $job->id }}" 
                                                            action="{{ route('management.job.approve', ['id' => $job->id]) }}" 
                                                            method="POST" 
                                                            style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>



                                                    <form id="delete-job-form-{{ $job->id }}" action="{{ route('management.job.delete', ['id' => $job->id]) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <li>
                                                        <a href="javascript:void(0)"
                                                        onclick="if(confirm('Are you sure you want to permanently delete this job?')) { event.preventDefault(); document.getElementById('delete-job-form-{{ $job->id }}').submit(); }"
                                                        title="Permanently delete this job"
                                                        class="edit">
                                                            <span data-feather="trash-2"></span>
                                                        </a>
                                                    </li>


                                                </ul>
                                            </td>
                                        </tr>
                                    @empty 
                                        <div class="alert alert-info">No Jobs Found</div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end pt-30">

                            @if ($jobs->hasPages())
                                <nav class="atbd-page">
                                    <ul class="atbd-pagination d-flex">

                                        {{-- Previous Page Link --}}
                                        @if ($jobs->onFirstPage())
                                            <li class="atbd-pagination__item disabled">
                                                <span class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></span>
                                            </li>
                                        @else
                                            <li class="atbd-pagination__item">
                                                <a href="{{ $jobs->previousPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($jobs->links()->elements[0] as $page => $url)
                                            @if ($page == $jobs->currentPage())
                                                <li class="atbd-pagination__item">
                                                    <a href="#" class="atbd-pagination__link active"><span class="page-number">{{ $page }}</span></a>
                                                </li>
                                            @else
                                                <li class="atbd-pagination__item">
                                                    <a href="{{ $url }}" class="atbd-pagination__link"><span class="page-number">{{ $page }}</span></a>
                                                </li>
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($jobs->hasMorePages())
                                            <li class="atbd-pagination__item">
                                                <a href="{{ $jobs->nextPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
                                            </li>
                                        @else
                                            <li class="atbd-pagination__item disabled">
                                                <span class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></span>
                                            </li>
                                        @endif

                                        {{-- Optional: Page Size Selector --}}
                                        <li class="atbd-pagination__item">
                                            <div class="paging-option">
                                                <form method="GET" action="{{ request()->url() }}">
                                                    <select name="per_page" class="page-selection" onchange="this.form.submit()">
                                                        @php
                                                            // Define an array of available page sizes
                                                            $pageSizes = [10, 20, 30, 40, 50];
                                                        @endphp

                                                        @foreach ($pageSizes as $size)
                                                            <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>
                                                                {{ $size }}/page
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
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
    <<script src="{{asset('assets/mgt/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/mgt/js/script.min.js')}}"></script>
    <!-- endinject-->
</body>

</html>