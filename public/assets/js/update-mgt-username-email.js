$(document).ready(function () {
    $('#saveEmailUsernameChanges').on('click', function (e) {
        e.preventDefault();

        var formData = new FormData($('#updateEmailUsernameForm')[0]);

        $.ajax({
            url: "/0246520325/management/settings/update-email-username",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF Token
            },
            beforeSend: function () {
                $('.error-name, .error-email').text(''); // Clear previous errors
                $('#success-message').addClass('d-none').text(''); // Hide success message
            },
            success: function (response) {
                console.log("Full Response:", response);
                if (response && response.message) {
                    $('#success-message').removeClass('d-none').text(response.message);
                    
                    // Hide the success message after 5 seconds
                    setTimeout(function() {
                        $('#success-message').addClass('d-none').text('');
                    }, 3000); // 3000ms = 5 seconds
                } else {
                    console.log("Message key missing in response");
                }
            },
            error: function (xhr) {
                var response = xhr.responseJSON;

                if (xhr.status === 422) {
                    // Validation errors
                    if (response.errors) {
                        if (response.errors.name) {
                            $('.error-name').text(response.errors.name[0]);
                        }
                        if (response.errors.email) {
                            $('.error-email').text(response.errors.email[0]);
                        }
                    }
                }
                else if (xhr.status === 400) {
                    // Other errors like "No changes detected", "User not found", or server errors
                    $('#success-message').removeClass('d-none text-success').addClass('text-success').text(response.message);
                    
                    // Hide the message after 5 seconds
                    setTimeout(function() {
                        $('#success-message').addClass('d-none').text('');
                    }, 3000); // 3000ms = 5 seconds
                }
                else if (xhr.status === 404 || xhr.status === 500) {
                    // Other errors like "No changes detected", "User not found", or server errors
                    $('#success-message').removeClass('d-none text-success').addClass('text-danger').text(response.message);
                    
                    // Hide the message after 5 seconds
                    setTimeout(function() {
                        $('#success-message').addClass('d-none').text('');
                    }, 3000); // 3000ms = 5 seconds
                } else {
                    // Fallback for unexpected errors
                    $('#success-message').removeClass('d-none text-success').addClass('text-danger').text('An unexpected error occurred.');
                    
                    // Hide the message after 5 seconds
                    setTimeout(function() {
                        $('#success-message').addClass('d-none').text('');
                    }, 3000); // 3000ms = 5 seconds
                }
            }
        });
    });
});
