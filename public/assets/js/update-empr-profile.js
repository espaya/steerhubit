$(document).ready(function() {
    // Get CSRF token from meta tag (Laravel automatically includes it in the <head> section)
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('#company-profile-buttom').on('click', function(e) {
        e.preventDefault();  // Prevent default button behavior

        // Trigger the form submit manually
        $('#company-profile-form').submit();
    });

    $('#company-profile-form').on('submit', function(e) {
        e.preventDefault();  // Prevent default form submission

        // Clear previous error messages
        $('small').text('');
        $('#error-messages').hide().text(''); // Hide and clear the error messages

        // Perform the AJAX request to submit the form
        $.ajax({
            url: '/employer-dashboard/company-profile/update',
            method: 'POST',
            data: new FormData(this), // Sending the form data
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken  // Add the CSRF token to the request headers
            },
            success: function(response) {
                // Handle success response (HTTP 200)
                $('#error-messages').removeClass('alert-danger').addClass('alert-success')
                    .text(response.message).show();
            
                // Optionally, you can redirect:
                // window.location.href = response.redirectUrl;
            
                // Set a timer to hide the response message after 5 seconds (5000ms)
                setTimeout(function() {
                    $('#error-messages').fadeOut();  // Fades out the message
                }, 5000); // 5000 milliseconds = 5 seconds
            },
            error: function(xhr) {
                // Handle error responses (422, 500, etc.)
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    // Loop through the errors and display them next to the respective fields
                    for (let field in errors) {
                        let errorMessage = errors[field][0]; // Assuming only one error message per field
                        $('#error-' + field).text(errorMessage).css('color', 'red');
                    }
                } else if (xhr.status === 500) {
                    $('#error-messages').removeClass('alert-success').addClass('alert-danger')
                        .text('Internal Server Error. Please try again later.').show();
                } else if(xhr.status === 404) {
                    // For other errors, display a general message
                    $('#error-messages').removeClass('alert-success').addClass('alert-danger')
                        .text(xhr.responseJSON.message).show();
                }

                setTimeout(function(){
                    $('#error-messages').fadeOut();  // Fades out the message
                }, 5000);

            }
        });
    });
});
