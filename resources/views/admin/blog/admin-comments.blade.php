
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments - SteerHubIT</title>

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
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Post Comments</h4>
                                </div>

                                <form action="/" class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                    <span data-feather="search"></span>
                                    <input class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Search by Name" aria-label="Search">
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

                @if(session('error'))
                <div class=" alert alert-warning  alert-dismissible fade show " role="alert">
                    <div class="alert-content">
                        <p> {{ session('error') }} </p>
                        <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                </div>
                @endif

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
                                                <span class="userDatatable-title">emaill</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Post</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">date</span>
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

                                    @forelse($comments as $comment)

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
                                                            <h6>{{ $comment->comment_name }}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                {{ $comment->comment_email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    <a target="_blank" href="{{ route('blog.view.single', ['slug' => $comment->post->slug]) }}" >{{ $comment->post->title }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ \Carbon\Carbon::parse($comment->created_at)->format('F j, Y') }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    @if($comment->status == 'PENDING')
                                                    <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">{{ $comment->status }}</span>
                                                    @endif
                                                    @if($comment->status == 'APPROVED')
                                                    <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">{{ $comment->status }}</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="#" class="view">
                                                            <span data-feather="eye"></span></a>
                                                    </li>
                                                    <li>
                                                        <form id="approve-form-{{ $comment->id }}" method="POST" action="{{ route('admin.comments.approve', ['id' => $comment->id]) }}" style="display: none;">
                                                            @csrf
                                                            @method('POST')
                                                        </form>

                                                        <a href="#" 
                                                        onclick="event.preventDefault(); 
                                                                    if (confirm('Are you sure you want to approve this comment?')) {
                                                                        document.getElementById('approve-form-{{ $comment->id }}').submit();
                                                                    }" 
                                                        title="Approve this comment" 
                                                        class="edit">
                                                            <span data-feather="check"></span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="remove">
                                                            <span data-feather="trash-2"></span></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty 
                                        <div class="alert alert-info"></div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end pt-30">

                                <nav class="atbd-page ">
                                    <ul class="atbd-pagination d-flex">
                                        <li class="atbd-pagination__item">
                                            <a href="#" class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                            <a href="#" class="atbd-pagination__link"><span class="page-number">1</span></a>
                                            <a href="#" class="atbd-pagination__link active"><span class="page-number">2</span></a>
                                            <a href="#" class="atbd-pagination__link"><span class="page-number">3</span></a>
                                            <a href="#" class="atbd-pagination__link pagination-control"><span class="page-number">...</span></a>
                                            <a href="#" class="atbd-pagination__link"><span class="page-number">12</span></a>
                                            <a href="#" class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
                                            <a href="#" class="atbd-pagination__option">
                                            </a>
                                        </li>
                                        <li class="atbd-pagination__item">
                                            <div class="paging-option">
                                                <select name="page-number" class="page-selection">
                                                    <option value="20">20/page</option>
                                                    <option value="40">40/page</option>
                                                    <option value="60">60/page</option>
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
</body>

</html>