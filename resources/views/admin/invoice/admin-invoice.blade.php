
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - SteerHubIT</title>

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
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Invoice</h4>
                                </div>

                                <form action="{{ route('management.invoice.search') }}" method="GET" class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                    <span data-feather="search"></span>
                                    <input value="{{ request('search') }}" name="search" autocomplete="off" class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
                                </form>

                            </div>
                            <div class="action-btn">
                                <a href="{{ route('management.invoice.create') }}" class="btn px-15 btn-primary">
                                    <i class="las la-plus fs-16"></i>Generate New Invoice</a>
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
                                                            <span class="checkbox-text userDatatable-title">Invoice #</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Recipient</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Phone</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">email</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">discount</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">subtotal</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">total</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title float-right">action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($invoices as $invoice)
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
                                                        <a href="{{ route('management.invoice.show', ['invoice_number' => $invoice->invoice_number]) }}" class="text-dark fw-500">
                                                            <h6>{{ $invoice->invoice_number }}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $invoice->recipient_name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $invoice->recipient_phone }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $invoice->recipient_email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                   {{ $invoice->discount ? $invoice->discount . '%' : '' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    {{ $invoice->subtotal }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    {{ $invoice->total }}
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{ route('management.invoice.show', ['invoice_number' => $invoice->invoice_number]) }}" class="view">
                                                            <span data-feather="eye"></span></a>
                                                    </li>
                                                    <li>
                                                    <a href="#" class="remove" onclick="event.preventDefault(); 
                                                        if(confirm('Are you sure you want to permanently delete Invoice #{{ $invoice->invoice_number }}?')) {
                                                        document.getElementById('delete-invoice-{{ $invoice->id }}').submit();
                                                                    }">
                                                            <span data-feather="trash-2"></span>
                                                        </a>

                                                        <form id="delete-invoice-{{ $invoice->id }}" 
                                                            action="{{ route('management.invoice.destroy', ['id' => $invoice->id]) }}" 
                                                            method="POST" 
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty 
                                    <p class="alert alert-info">No Invoice(s) Found</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end pt-30">

                            <nav class="atbd-page">
                                <ul class="atbd-pagination d-flex">
                                    <li class="atbd-pagination__item">
                                        {{-- Previous Page Link --}}
                                        @if ($invoices->onFirstPage())
                                            <span class="atbd-pagination__link pagination-control disabled"><span class="la la-angle-left"></span></span>
                                        @else
                                            <a href="{{ $invoices->previousPageUrl() }}&per_page={{ $perPage }}{{ request('search') ? '&search='.request('search') : '' }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($invoices->getUrlRange(1, $invoices->lastPage()) as $page => $url)
                                            @if ($page == $invoices->currentPage())
                                                <a href="#" class="atbd-pagination__link active"><span class="page-number">{{ $page }}</span></a>
                                            @else
                                                <a href="{{ $url }}&per_page={{ $perPage }}{{ request('search') ? '&search='.request('search') : '' }}" class="atbd-pagination__link"><span class="page-number">{{ $page }}</span></a>
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($invoices->hasMorePages())
                                            <a href="{{ $invoices->nextPageUrl() }}&per_page={{ $perPage }}{{ request('search') ? '&search='.request('search') : '' }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
                                        @else
                                            <span class="atbd-pagination__link pagination-control disabled"><span class="la la-angle-right"></span></span>
                                        @endif
                                    </li>
                                    <li class="atbd-pagination__item">
                                        <div class="paging-option">
                                        <select name="page-number" class="page-selection"
                                                onchange="window.location.href = '{{ request()->url() }}?per_page=' + this.value + '{{ request('search') ? '&search='.request('search') : '' }}'">
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

    <script src="{{asset('assets/mgt/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/mgt/js/script.min.js')}}"></script>
    <!-- endinject-->
</body>

</html>