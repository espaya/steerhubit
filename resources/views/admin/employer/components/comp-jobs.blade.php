<div class="col-lg-12">
    <!-- Product Table -->
    <div class="card mt-25 mb-40">
        <div class="card-header  px-md-25 px-3">
            <h6>Recent Product(s)</h6>
        </div>

        <div class="col-lg-12">
            <div class="userDatatable p-30 bg-white radius-xl w-100 mb-30">
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
                                    <span class="userDatatable-title">pay</span>
                                </th>
                                <th>
                                    <span class="userDatatable-title">created</span>
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
                                                <h6> {{ $job->address }} </h6>
                                            </a>
                                            <p class="d-block mb-0">
                                                {{ $job->state . ', ' . $job->country . ', ' . $job->postal_code }}
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
                                        ${{ $job->pay }}
                                    </div>
                                </td>
                                <td>
                                    <div class="userDatatable-content">
                                        {{ \Carbon\Carbon::parse($job->created_at)->format('F j, Y') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="userDatatable-content d-inline-block">
                                        <span class="{{ $job->status == 'APPROVED' ? 'bg-opacity-success  color-success' : 'bg-opacity-warning  color-warning' }} rounded-pill userDatatable-content-status active">{{ $job->status }}</span>
                                    </div>
                                </td>
                                <td>
                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                        <li>
                                            <a href="{{ route('job.view', ['slug' => $job->slug]) }}" class="view">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
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
            </div>
        </div>

    </div>
    <!-- Product Table End -->
</div>