
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
                                                <button id="generate" type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">Generate</button>
                                                <button id="save-invoice" type="button" class="btn btn-primary btn-default btn-squared px-30">save</button>
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
    <!-- endinject-->

    <script>
        $(document).ready(function() {
            // Clone product row functionality
            $('#generate').click(function() {
                const clone = $('.repeatable-group:first').clone();
                clone.find('input').val('');
                $('#repeatable-area').append(clone);
                calculateTotals(); // Recalculate after adding new row
            });
            
            // Remove product row
            $(document).on('click', '.remove-btn', function() {
                if ($('.repeatable-group').length > 1) {
                    $(this).closest('.repeatable-group').remove();
                    calculateTotals(); // Recalculate after removal
                }
            });
            
            // Calculate individual row total
            $(document).on('input', 'input[name="price[]"], input[name="quantity[]"]', function() {
                const group = $(this).closest('.repeatable-group');
                const price = parseFloat(group.find('input[name="price[]"]').val()) || 0;
                const quantity = parseInt(group.find('input[name="quantity[]"]').val()) || 0;
                const orderTotalInput = group.find('input[name="order_total[]"]');
                
                const rowTotal = price * quantity;
                orderTotalInput.val(rowTotal.toFixed(2));
                
                calculateTotals(); // Update subtotal and total
            });
            
            // Calculate discount and totals
            $(document).on('input', 'input[name="discount"]', function() {
                calculateTotals();
            });
            
            // Function to calculate all totals
            function calculateTotals() {
                let subtotal = 0;
                
                // Calculate subtotal from all product rows
                $('input[name="order_total[]"]').each(function() {
                    subtotal += parseFloat($(this).val()) || 0;
                });
                
                // Apply discount
                const discount = parseFloat($('input[name="discount"]').val()) || 0;
                const total = subtotal - discount;
                
                // Update the fields
                $('input[name="subtotal"]').val(subtotal.toFixed(2));
                $('input[name="total"]').val(total.toFixed(2));
            }
            
            // Form submission
            $('#save-invoice').click(function(e) {
                e.preventDefault();
                
                // Clear previous errors
                $('small[id^="error-"]').text('');
                
                // Calculate totals one last time before submission
                calculateTotals();
                
                // Prepare form data
                const formData = {
                    recipient: {
                        name: $('input[name="recipient_name"]').val(),
                        phone: $('input[name="recipient_phone"]').val(),
                        email: $('input[name="recipient_email"]').val()
                    },
                    products: [],
                    discount: $('input[name="discount"]').val(),
                    subtotal: $('input[name="subtotal"]').val(),
                    total: $('input[name="total"]').val()
                };
                
                // Collect product data
                $('.repeatable-group').each(function() {
                    formData.products.push({
                        product: $(this).find('input[name="product[]"]').val(),
                        price: $(this).find('input[name="price[]"]').val(),
                        quantity: $(this).find('input[name="quantity[]"]').val(),
                        order_total: $(this).find('input[name="order_total[]"]').val()
                    });
                });
                
                // Submit via AJAX
                $.ajax({
                    url: '/0246520325/management/invoice/store',
                    type: 'POST',
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#invoice-form')[0].reset();
                                if (response.redirect_url) {
                                    window.location.href = response.redirect_url;
                            }
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Validation errors
                            const errors = xhr.responseJSON.errors;
                            for (const field in errors) {
                                const fieldName = field.replace('.', '_');
                                $(`#error-${fieldName}`).text(errors[field][0]);
                            }
                        } else {
                            $('#messages').text('An error occurred. Please try again').addClass('alert alert-danger');
                            // alert('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
     
</body>

</html>