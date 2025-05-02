
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $invoice->invoice_number }} - SteerHubIT</title>

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
                        <div class="shop-breadcrumb">

                            <div class="breadcrumb-main">
                                <h4 class="text-capitalize breadcrumb-title">{{ $invoice->invoice_number }}</h4>
                                <div class="action-btn">
                                <a href="{{ route('management.invoice.create') }}" class="btn px-15 btn-primary">
                                    <i class="las la-plus fs-16"></i>Generate New Invoice</a>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-invoice global-shadow border bg-white radius-xl w-100 mb-30">
                            <div id="invoice-body" class="payment-invoice__body">
                                <div class="payment-invoice-address d-flex justify-content-sm-between">
                                    <div class="payment-invoice-logo">
                                        <a href="#"><img width="25%" class="svg dark" src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                                    </div>
                                    <div class="payment-invoice-address__area">
                                        <address>SteerHubIT<br> info@steerhubit.com<br> +1 (848) 330-9298
                                        </address>
                                    </div>
                                </div><!-- End: .payment-invoice-address -->
                                <div class="payment-invoice-qr d-flex justify-content-between mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
                                    <div class="d-flex justify-content-center mb-lg-0 mb-25">
                                        <div class="payment-invoice-qr__number">
                                            <div class="display-3">
                                                Invoice
                                            </div>
                                            <p>No : <span>{{ $invoice->invoice_number }}</span></p>
                                            <p>Date : <span>{{ $invoice->created_at }}</span></p>
                                        </div>
                                    </div><!-- End: .d-flex -->
                                    
                                    <div class="d-flex justify-content-center">
                                        <div class="payment-invoice-qr__address">
                                            <p>Invoice To:</p>
                                            <span>{{ $invoice->recipient_name }}</span><br>
                                            <i>{{ $invoice->recipient_email }}</i><br>
                                            <span>{{ $invoice->recipient_phone }}</span>
                                        </div>
                                    </div><!-- End: .d-flex -->
                                </div><!-- End: .payment-invoice-qr -->
                                <div class="payment-invoice-table">
                                    <div class="table-responsive">
                                        <table id="cart" class="table table-borderless">
                                            <thead>
                                                <tr class="product-cart__header">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col" class="text-right">Price Per Unit</th>
                                                    <th scope="col" class="text-right">Quantity</th>
                                                    <th scope="col" class="text-right">Order Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($invoice->items as $index => $item)
                                                    <tr>
                                                        <th>{{ $index + 1 }}</th>
                                                        <td class="Product-cart-title">
                                                            <div class="media align-items-center">
                                                                <div class="media-body">
                                                                    <h5 class="mt-0">{{ $item->product_name }}</h5>
                                                                    <div class="d-flex">
                                                                        @if($item->size)
                                                                            <p>Size: <span>{{ $item->size }}</span></p>
                                                                        @endif
                                                                        @if($item->color)
                                                                            <p>Color: <span>{{ $item->color }}</span></p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="unit text-right">${{ number_format($item->price, 2) }}</td>
                                                        <td class="invoice-quantity text-right">{{ $item->quantity }}</td>
                                                        <td class="text-right order">${{ number_format($item->order_total, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="order-summery float-right">
                                                        <div class="total">
                                                            <div class="subtotalTotal mb-0 text-right">
                                                                Subtotal :
                                                            </div>
                                                            <div class="taxes mb-0 text-right">
                                                                discount :
                                                            </div>
                                                        </div>
                                                        <div class="total-money d-flex justify-content-between align-items-center mt-2 text-right float-right">
                                                            <h6>Total :</h6>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="total-order float-right text-right fs-14 fw-500">
                                                            <p>{{ $invoice->subtotal }}</p>
                                                            <p> {{ $invoice->discount ? $invoice->discount : '0%' }} </p>
                                                            <h5 class="text-primary"> {{ $invoice->total }} </h5>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="payment-invoice__btn mt-lg-50 pt-lg-30 mt-30 pt-20">
                                        <button id="print-invoice" type="button" class="btn-primary btn rounded-pill px-25 text-white download">
                                            <span data-feather="printer"></span>Print
                                        </button>
                                    </div>
                                </div><!-- End: .payment-invoice-table -->
                            </div><!-- End: .payment-invoice__body -->
                        </div><!-- End: .payment-invoice -->
                    </div><!-- End: .col -->
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
     <script>
        $(document).ready(function() {
            $('#print-invoice').click(function() {
                // Store original content
                var originalContent = $('body').html();
                
                // Get just the invoice content
                var invoiceContent = $('#invoice-body').html();
                
                // Replace body with invoice content
                $('body').html(invoiceContent);
                
                // Add print styles
                $('head').append(`
                    <style>
                        @media print {
                            body { padding: 20px; font-size: 12pt; }
                            .no-print { display: none !important; }
                        }
                    </style>
                `);
                
                // Print and restore
                window.print();
                $('body').html(originalContent);
            });
        });
     </script>
</body>

</html>