
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Invoice - SteerHubIT</title>

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

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Create Invoice</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                                <div id="messages"></div>
                            </div>
                            <div class="card-body py-md-30">
                                <form id="invoice-form" method="POST">
                                    <div class="row">
                                        <div class="col-md-4 mb-25">
                                            <input name="recipient_name" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Recipient's Name" autocomplete="off">
                                            <small id="error-recipient_name" style="color: red !important;"></small>
                                        </div>
                                        <div class="col-md-4 mb-25">
                                            <input name="recipient_phone" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Recipient's Phone" autocomplete="off">
                                            <small id="error-recipient_phone" style="color: red !important;"></small>
                                        </div>
                                        <div class="col-md-4 mb-25">
                                            <input name="recipient_email" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Recipient's Email" autocomplete="off">
                                            <small id="error-recipient_email" style="color: red !important;"></small>
                                        </div>

                                        <hr>
                                        
                                        <div class="row col-md-12" id="repeatable-area">
                                            <!-- Initial set of inputs -->
                                                <div id="repeatable-group" class="row col-md-12 repeatable-group">
                                                    <div class="col-md-3 mb-25">
                                                        <label for="">Product</label>
                                                        <input type="text" name="product[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Product" autocomplete="off">
                                                        <small id="error-product" style="color: red !important;"></small>
                                                    </div>
                                                    
                                                    <div class="col-md-3 mb-25">
                                                        <label for="">Price Per Unit</label>
                                                        <input type="text" name="price[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="15" autocomplete="off">
                                                        <small id="error-price" style="color: red !important;"></small>
                                                    </div>
                                                    <div class="col-md-3 mb-25">
                                                        <label for="">Quantity</label>
                                                        <input type="text" name="quantity[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="3" autocomplete="off">
                                                        <small id="error-quantity" style="color: red !important;"></small>
                                                    </div>
                                                    <div class="col-md-3 mb-25">
                                                        <label for="">Order Total</label>
                                                        <input type="text" name="order_total[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="45.7" autocomplete="off">
                                                        <small id="error-total" style="color: red !important;"></small>
                                                        <button type="button" class="btn btn-danger btn-xs remove-btn" style="margin-top: 5px;">Remove</button>
                                                    </div>
                                                </div>
                                        </div>

                                        <hr>

                                        <div class="col-md-4 mb-25">
                                            <label for="">Discount</label>
                                            <input name="discount" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="3" autocomplete="off">
                                            <small id="error-discount" style="color: red !important;"></small>
                                        </div>

                                        <div class="col-md-4 mb-25">
                                            <label for="">Subtotal</label>
                                            <input readonly name="subtotal" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="0.00" autocomplete="off">
                                            <small id="error-subtotal" style="color: red !important;"></small>
                                        </div>

                                        <div class="col-md-4 mb-25">
                                            <label for="">Total</label>
                                            <input readonly name="total" type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="0.00" autocomplete="off">
                                            <small id="error-total" style="color: red !important;"></small>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="layout-button mt-0">
                                                <button id="generate" type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">Add Row</button>
                                                <button id="save-invoice" type="button" class="btn btn-primary btn-default btn-squared px-30">Generate Invoice</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- ends: .card -->

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
    <script src="{{ asset('assets/js/generate-invoice.js') }}"></script>
    <!-- endinject-->

     
</body>

</html>