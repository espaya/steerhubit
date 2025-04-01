    $(document).ready(function() {
        // Submit form via AJAX when the "Update Social Profiles" button is clicked
        $('#socials-button').click(function(e) {
            e.preventDefault();

            // Clear previous error messages
            $('.error-message').html('');
            $('#form-error').addClass('d-none');
            $('#form-success').addClass('d-none');

            // Prepare form data
            var formData = new FormData($('#socials-form')[0]);

            // Make the AJAX request
            $.ajax({
                url: '/0246520325/management/settings/update-admin-social-profiles',  // Replace with your route
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // If the response indicates success, show a success message
                    if (response.success) {
                        $('#form-success').removeClass('d-none').text(response.message);
                    } else {
                        // If there's an error, show the error message
                        $('#form-success').removeClass('d-none').text(response.message);
                    }
                },
                error: function(xhr) {
                    // Handle validation errors (422)
                    if (xhr.status === 422) {
                        // Show field validation errors
                        var errors = xhr.responseJSON.errors;
                        for (var field in errors) {
                            $('#' + field + '-error').html(errors[field][0]);
                        }
                    } else if (xhr.status === 500) {
                        // Handle server error (500) - returned from server
                        $('#form-error').removeClass('d-none').text(xhr.responseJSON.message || 'An internal server error occurred. Please try again later.');
                    } else {
                        // Show general error message for other status codes
                        $('#form-error').removeClass('d-none').text('An unexpected error occurred. Please try again.');
                    }
                }                
            });
        });
    });