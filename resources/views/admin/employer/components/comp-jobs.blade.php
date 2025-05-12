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
                                                <h6>Kellie Marquot</h6>
                                            </a>
                                            <p class="d-block mb-0">
                                                San Francisco, CA
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="userDatatable-content">
                                        john-keller@gmail.com
                                    </div>
                                </td>
                                <td>
                                    <div class="userDatatable-content">
                                        $20.9
                                    </div>
                                </td>
                                <td>
                                    <div class="userDatatable-content">
                                        January 20, 2020
                                    </div>
                                </td>
                                <td>
                                    <div class="userDatatable-content d-inline-block">
                                        <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                    </div>
                                </td>
                                <td>
                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                        <li>
                                            <a href="#" class="view">
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
            </div>
        </div>

    </div>
    <!-- Product Table End -->
</div>