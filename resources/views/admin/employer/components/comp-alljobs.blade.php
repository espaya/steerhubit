<div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="job-tab">
    <div class="ap-post-content">
        <div class="row">
            <div class="col-xxl-12">
                <!-- Post Area -->
                <div class="ap-post-form">
                    <div class="card border mb-25">
                        <div class="card-body p-0 px-25">
                            <div class="col-lg-12">
                                <div class="userDatatable  p-30 bg-white radius-xl w-100 mb-30">
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

                                                @forelse($allJobs as $allJob)
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
                                                                    <h6> {{ $allJob->address }} </h6>
                                                                </a>
                                                                <p class="d-block mb-0">
                                                                    {{ $allJob->state . ', ' . $allJob->country . ' ' . $allJob->postal_code }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{ $allJob->title }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{ $allJob->working_schedule }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{ $allJob->working_day }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{ '$' . number_format($allJob->pay, 2) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{ \Carbon\Carbon::parse($allJob->created_at)->format('F j, Y') }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="{{ $allJob->status == 'APPROVED' ? 'bg-opacity-success  color-success' : 'bg-opacity-warning  color-warning' }} rounded-pill userDatatable-content-status active"> {{ $allJob->status }} </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="{{ route('job.view', ['slug' => $allJob->slug]) }}" class="view">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                        <circle cx="12" cy="12" r="3"></circle>
                                                                    </svg></a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="remove">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    </svg></a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                @empty
                                                <p class="alert alert-info">No job(s) found</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end pt-30">

                                        @if ($allJobs->hasPages())
                                        <nav class="atbd-page">
                                            <ul class="atbd-pagination d-flex">
                                                {{-- Previous Page Link --}}
                                                @if ($allJobs->onFirstPage())
                                                <li class="atbd-pagination__item disabled">
                                                    <span class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></span>
                                                </li>
                                                @else
                                                <li class="atbd-pagination__item">
                                                    <a href="{{ $allJobs->previousPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                                </li>
                                                @endif

                                                {{-- Pagination Elements --}}
                                                @foreach ($elements as $element)
                                                @if (is_string($element))
                                                <li class="atbd-pagination__item disabled">
                                                    <span class="atbd-pagination__link"><span class="page-number">{{ $element }}</span></span>
                                                </li>
                                                @endif

                                                @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                @if ($page == $allJobs->currentPage())
                                                <li class="atbd-pagination__item">
                                                    <a class="atbd-pagination__link active"><span class="page-number">{{ $page }}</span></a>
                                                </li>
                                                @else
                                                <li class="atbd-pagination__item">
                                                    <a href="{{ $url }}" class="atbd-pagination__link"><span class="page-number">{{ $page }}</span></a>
                                                </li>
                                                @endif
                                                @endforeach
                                                @endif
                                                @endforeach

                                                {{-- Next Page Link --}}
                                                @if ($allJobs->hasMorePages())
                                                <li class="atbd-pagination__item">
                                                    <a href="{{ $allJobs->nextPageUrl() }}" class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
                                                </li>
                                                @else
                                                <li class="atbd-pagination__item disabled">
                                                    <span class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></span>
                                                </li>
                                                @endif
                                            </ul>
                                        </nav>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post Area End -->
            </div>

        </div>
    </div>
</div>