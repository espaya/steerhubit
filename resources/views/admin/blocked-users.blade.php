<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blocked Users - SteerHubIt</title>

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
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Blocked Users</h4>
                                    <span class="sub-title ml-sm-25 pl-sm-25">{{ $totalEmployees }}</span>
                                </div>

                                <form method="GET" enctype="multipart/form-data" action="{{ route('management.blocked.users') }}" class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                    @csrf
                                    <span data-feather="search"></span>
                                    <input name="search" autocomplete="off" class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
                                </form>

                            </div>

                            <div class="action-btn">
                                <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#new-member">
                                    <i class="las la-plus fs-16"></i>Add New Member</a>
                            </div>
                        </div>

                    </div>
                </div>
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
                                                            <span class="checkbox-text userDatatable-title">user</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">emaill</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">password</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">account type</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">join date</span>
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

                                    @forelse($employees as $employee)

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
                                                        <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('{{ Auth::user()->avatar ?? asset('assets/img/dashboard/profile.png') }}'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>{{ $employee->name}}</h6>
                                                        </a>
                                                        <p class="d-block mb-0">
                                                            {{ strtolower($employee->role) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ strtolower($employee->email) }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    ***********************
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $employee->role }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ \Carbon\Carbon::parse($employee->created_at)->format('F d, Y') }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <div class="row">
                                                        <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        @if($employee && $employee->is_otp_verified)
                                                        <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">online</span>
                                                        @else 
                                                        <span class="bg-opacity-info  color-info rounded-pill userDatatable-content-status active">offline</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="#" class="view">
                                                            <span data-feather="eye"></span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="edit">
                                                            <span data-feather="edit"></span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="remove">
                                                            <span data-feather="trash-2"></span></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-info">No Blocked Found</div>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end pt-30">

                            <nav class="atbd-page">
                                <ul class="atbd-pagination d-flex">
                                    {{-- Previous Page Link --}}
                                    @if ($employees->onFirstPage())
                                        <li class="atbd-pagination__item disabled">
                                            <span class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></span>
                                        </li>
                                    @else
                                        <li class="atbd-pagination__item">
                                            <a href="{{ $employees->previousPageUrl() }}" class="atbd-pagination__link pagination-control">
                                                <span class="la la-angle-left"></span>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($employees->getUrlRange(1, $employees->lastPage()) as $page => $url)
                                        @if ($page == $employees->currentPage())
                                            <li class="atbd-pagination__item">
                                                <a href="{{ $url }}" class="atbd-pagination__link active"><span class="page-number">{{ $page }}</span></a>
                                            </li>
                                        @else
                                            <li class="atbd-pagination__item">
                                                <a href="{{ $url }}" class="atbd-pagination__link"><span class="page-number">{{ $page }}</span></a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($employees->hasMorePages())
                                        <li class="atbd-pagination__item">
                                            <a href="{{ $employees->nextPageUrl() }}" class="atbd-pagination__link pagination-control">
                                                <span class="la la-angle-right"></span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="atbd-pagination__item disabled">
                                            <span class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></span>
                                        </li>
                                    @endif

                                {{-- Pagination Page Selection --}}
                                    <li class="atbd-pagination__item">
                                        <div class="paging-option">
                                            <select name="per_page" class="page-selection" onchange="window.location.href=this.value">
                                                @foreach($limits as $limit)
                                                    <option value="{{ request()->fullUrlWithQuery(['per_page' => $limit]) }}" 
                                                        {{ request('per_page', 10) == $limit ? 'selected' : '' }}>
                                                        {{ $limit }}/page
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </li>
                                </ul>

                            </nav>

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
    <script>
        function updatePerPage(select) {
            window.location.href = select.value;
        }
    </script>
</body>

</html>