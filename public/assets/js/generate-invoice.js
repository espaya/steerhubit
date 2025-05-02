
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
        
        // Change button to spinner
        const $btn = $(this);
        const originalText = $btn.html();
        $btn.html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Saving...
        `).prop('disabled', true);
        
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
                }
            },
            complete: function() {
                // Restore original button text
                $btn.html(originalText).prop('disabled', false);
            }
        });
    });

});