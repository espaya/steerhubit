
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts - SteerHubIT</title>

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
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Contacts</h4>
                                </div>

                                <form action="{{ route('management.contact.search') }}" method="GET" class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                    <span data-feather="search"></span>
                                    <input name="search" autocomplete="off" class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
                                </form>

                            </div>
                            <div class="action-btn">
                                <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#new-member">
                                    <i class="las la-plus fs-16"></i>Export</a>

                                <!-- Modal -->
                                <div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content  radius-xl">
                                            <div class="modal-header">
                                                <h6 class="modal-title fw-500" id="staticBackdropLabel">Create project</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span data-feather="x"></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="new-member-modal">
                                                    <form>
                                                        <div class="form-group mb-20">
                                                            <input type="text" class="form-control" placeholder="Duran Clayton">
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <div class="category-member">
                                                                <select class="js-example-basic-single js-states form-control" id="category-member">
                                                                    <option value="JAN">1</option>
                                                                    <option value="FBR">2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Project description"></textarea>
                                                        </div>
                                                        <div class="form-group textarea-group">
                                                            <label class="mb-15">status</label>
                                                            <div class="d-flex">
                                                                <div class="project-task-list__left d-flex align-items-center">
                                                                    <div class="checkbox-group d-flex mr-50 pr-10">
                                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                            <input class="checkbox" type="checkbox" id="check-grp-1" checked="">
                                                                            <label for="check-grp-1" class="fs-14 color-light strikethrough">
                                                                                status
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="checkbox-group d-flex mr-50 pr-10">
                                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                            <input class="checkbox" type="checkbox" id="check-grp-2">
                                                                            <label for="check-grp-2" class="fs-14 color-light strikethrough">
                                                                                Deactivated
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="checkbox-group d-flex">
                                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                            <input class="checkbox" type="checkbox" id="check-grp-3">
                                                                            <label for="check-grp-3" class="fs-14 color-light strikethrough">
                                                                                bloked
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-25">
                                                            <div class="form-group mb-10">
                                                                <label for="name47">project member</label>
                                                                <input type="text" class="form-control" id="name47" placeholder="Search members">
                                                            </div>
                                                            <ul class="d-flex flex-wrap mb-20 user-group-people__parent">
                                                                <li>
                                                                    <a href="#"><img class="rounded-circle wh-34" src="img/tm1.png" alt="author"></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><img class="rounded-circle wh-34" src="img/tm2.png" alt="author"></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><img class="rounded-circle wh-34" src="img/tm3.png" alt="author"></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><img class="rounded-circle wh-34" src="img/tm4.png" alt="author"></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><img class="rounded-circle wh-34" src="img/tm5.png" alt="author"></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="d-flex new-member-calendar">
                                                            <div class="form-group w-100 mr-sm-15 form-group-calender">
                                                                <label for="datepicker">start Date</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" id="datepicker" placeholder="mm/dd/yyyy">
                                                                    <a href="#">
                                                                        <span data-feather="calendar"></span></a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group w-100 form-group-calender">
                                                                <label for="datepicker2">End Date</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" id="datepicker2" placeholder="mm/dd/yyyy">
                                                                    <a href="#">
                                                                        <span data-feather="calendar"></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="button-group d-flex pt-25">



                                                            <button class="btn btn-primary btn-default btn-squared text-capitalize">add new project
                                                            </button>








                                                            <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light">cancel
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

                @php
                    $alertType = session('success') ? 'success' : (session('error') ? 'danger' : null);
                    $alertMessage = session('success') ?? session('error');
                @endphp

                @if($alertType && $alertMessage)
                    <div class="alert alert-{{ $alertType }} alert-dismissible fade show" role="alert">
                        <div class="alert-content">
                            <p>{{ $alertMessage }}</p>
                            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
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
                                                <span class="userDatatable-title">message</span>
                                            </th>
                                            
                                            <th>
                                                <span class="userDatatable-title">join date</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title float-right">action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($contacts as $contact)

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
                                                        @php
                                                            $email = strtolower(trim($contact->contact_email));
                                                            $gravatarHash = md5($email);
                                                            $gravatarUrl = "https://www.gravatar.com/avatar/$gravatarHash?s=80&d=mp"; // 'mp' shows a mystery person if not found
                                                        @endphp

                                                        <a href="#" class="profile-image rounded-circle d-block m-0 wh-38"
                                                        style="background-image:url('{{ $gravatarUrl }}'); background-size: cover;"></a>

                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>{{ $contact->contact_name }}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                {{ $contact->contact_email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                {{ $contact->contact_message }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                {{ \Carbon\Carbon::parse($contact->created_at)->format('F j, Y') }}
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
                                                        <a href="#" class="remove"
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this message?')) document.getElementById('delete-contact-{{ $contact->id }}').submit();">
                                                            <span data-feather="trash-2"></span>
                                                        </a>

                                                        <form id="delete-contact-{{ $contact->id }}" action="{{ route('management.contact.delete', ['id' => $contact->id]) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                    @empty 
                                        <p class="alert alert-info">No Message(s) Found</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end pt-30">

                                <nav class="atbd-page ">
                                <ul class="atbd-pagination d-flex">
                                        <li class="atbd-pagination__item">
                                            {{-- Previous Button --}}
                                            @if ($contacts->onFirstPage())
                                                <a class="atbd-pagination__link pagination-control disabled"><span class="la la-angle-left"></span></a>
                                            @else
                                                <a href="{{ $contacts->previousPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                            @endif

                                            {{-- Page Numbers --}}
                                            @foreach ($contacts->getUrlRange(1, $contacts->lastPage()) as $page => $url)
                                                @if ($page == $contacts->currentPage())
                                                    <a class="atbd-pagination__link active"><span class="page-number">{{ $page }}</span></a>
                                                @elseif ($page == 1 || $page == $contacts->lastPage() || abs($page - $contacts->currentPage()) <= 1)
                                                    <a href="{{ $url }}" class="atbd-pagination__link"><span class="page-number">{{ $page }}</span></a>
                                                @elseif ($page == $contacts->currentPage() - 2 || $page == $contacts->currentPage() + 2)
                                                    <a class="atbd-pagination__link pagination-control"><span class="page-number">...</span></a>
                                                @endif
                                            @endforeach

                                            {{-- Next Button --}}
                                            @if ($contacts->hasMorePages())
                                                <a href="{{ $contacts->nextPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
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