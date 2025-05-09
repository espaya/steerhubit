
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Category - SteerHubIT</title>

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
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Categories</h4>
                                </div>

                                <form action="{{ route('management.blog.category.search') }}" method="GET" class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                    @csrf
                                    <span data-feather="search"></span>
                                    <input name="search_category" autocomplete="off" class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Search by Name" aria-label="Search">
                                </form>

                            </div>
                            <div class="action-btn">
                                <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#new-member">
                                    <i class="las la-plus fs-16"></i>Add New Category</a>

                                <!-- Modal -->
                                <div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content  radius-xl">
                                            <div class="modal-header">
                                                <h6 class="modal-title fw-500" id="staticBackdropLabel">Create category</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span data-feather="x"></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="new-member-modal">
                                                    <div id="category-error-message"></div>
                                                    <form action="#" id="add-category-form" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="d-flex new-member-calendar">
                                                            <div class="form-group w-100 mr-sm-15 form-group-calender">
                                                                <label for="datepicker">name</label>
                                                                <div class="position-relative">
                                                                    <input name="category_name" type="text" class="form-control" id="category-name" autocomplete="off">
                                                                    <small id="error-category_name" style="color: red"></small>
                                                                </div>
                                                            </div>
                                                            <div class="form-group w-100 form-group-calender">
                                                                <label for="datepicker2">slug</label>
                                                                <div class="position-relative">
                                                                    <input name="category_slug" type="text" class="form-control" id="category-slug" autocomplete="off">
                                                                    <small id="error-category_slug" style="color: red"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <label for="datepicker2">description</label>
                                                            <textarea name="category_description" class="form-control" id="category-description" rows="3"></textarea>
                                                            <small id="error-category_description" style="color: red"></small>
                                                        </div>
                                                        <div class="button-group d-flex pt-25">
                                                            <button id="category-button" type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">add category
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->


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
                                                            <span class="checkbox-text userDatatable-title">name</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">description</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">slug</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">count</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title float-right">action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($categories as $category)
                                        <div class="action-btn">
                                            <!-- Modal -->
                                            <div class="modal fade new-member" id="update-category-{{ $category->id }}" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content  radius-xl">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title fw-500" id="staticBackdropLabel">Update category </h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span data-feather="x"></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="new-member-modal">
                                                                <div id="update-category-error-message"></div>
                                                                <form action="#" id="update-category-form-{{ $category->id }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <input type="hidden" class="category-id" name="id" value="{{ $category->id }}">
                                                                    <div class="d-flex new-member-calendar">
                                                                        <div class="form-group w-100 mr-sm-15 form-group-calender">
                                                                            <label for="datepicker">name</label>
                                                                            <div class="position-relative">
                                                                                <input value="{{ $category->category_name }}" name="category_name" type="text" class="form-control" id="category-name" autocomplete="off">
                                                                                <small id="error-category_name" style="color: red"></small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group w-100 form-group-calender">
                                                                            <label for="datepicker2">slug</label>
                                                                            <div class="position-relative">
                                                                                <input value="{{ $category->category_slug }}" name="category_slug" type="text" class="form-control" id="category-slug" autocomplete="off">
                                                                                <small id="error-category_slug" style="color: red"></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-20">
                                                                        <label for="datepicker2">description</label>
                                                                        <textarea name="category_description" class="form-control" id="category-description" rows="3">{{ $category->category_description }}</textarea>
                                                                        <small id="error-category_description" style="color: red"></small>
                                                                    </div>
                                                                    <div class="button-group d-flex pt-25">
                                                                        <button id="update-category-button" type="submit" class="btn btn-primary btn-default btn-squared text-capitalize">Save Changes
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                        </div>
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
                                                            <h6>{{ $category->category_name }}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $category->category_description }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-conten">
                                                    {{ $category->category_slug }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                {{ $category->category_count }}
                                                </div>
                                            </td>
                                            <td>
                                            @if(strtolower($category->category_name) != 'uncategorized')
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a data-id="{{ $category->id }}" data-name="{{ $category->category_name }}" data-slug="{{ $category->category_slug }}" data-description="{{ $category->category_description }}" href="#" class="edit-category" data-toggle="modal" data-target="#update-category-{{ $category->id }}">
                                                            <span data-feather="edit"></span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" 
                                                        onclick="event.preventDefault(); 
                                                                    if(confirm('Are you sure you want to permanently delete this category? Any post assigned to this category will be assigned to Uncategorized ')) {
                                                                        document.getElementById('category-delete-form-{{ $category->id }}').submit();
                                                                    }" 
                                                        title="Delete this category" 
                                                        class="edit">
                                                            <span data-feather="trash-2"></span>
                                                        </a>

                                                        <form id="category-delete-form-{{ $category->id }}" 
                                                            action="{{ route('management.job.approve', ['id' => $category->id]) }}" 
                                                            method="POST" 
                                                            style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                @endif
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty 
                                        <div class="alert alert-info">No category found</div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                                        

                            @if ($categories->hasPages())
                                <div class="d-flex justify-content-end pt-30">
                                    <nav class="atbd-page">
                                        <ul class="atbd-pagination d-flex">

                                            {{-- Previous Page Link --}}
                                            @if ($categories->onFirstPage())
                                                <li class="atbd-pagination__item disabled"><span class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></span></li>
                                            @else
                                                <li class="atbd-pagination__item">
                                                    <a href="{{ $categories->previousPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                                <li class="atbd-pagination__item">
                                                    <a href="{{ $url }}" class="atbd-pagination__link {{ $page == $categories->currentPage() ? 'active' : '' }}">
                                                        <span class="page-number">{{ $page }}</span>
                                                    </a>
                                                </li>
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($categories->hasMorePages())
                                                <li class="atbd-pagination__item">
                                                    <a href="{{ $categories->nextPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
                                                </li>
                                            @else
                                                <li class="atbd-pagination__item disabled"><span class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></span></li>
                                            @endif

                                            {{-- Page selection --}}
                                            <li class="atbd-pagination__item">
                                                <div class="paging-option">
                                                    <select name="per_page" class="page-selection"
                                                            onchange="
                                                                let params = new URLSearchParams(window.location.search);
                                                                params.set('per_page', this.value);
                                                                window.location.search = params.toString();
                                                            ">
                                                        @foreach ($perPageOptions as $option)
                                                            <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>
                                                                {{ $option }}/page
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            @endif

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
    <script src="{{asset('assets/js/mgt-add-category.js')}}"></script>
    <script src="{{asset('assets/js/mgt-update-category.js')}}"></script>
    <!-- endinject-->
</body>

</html>