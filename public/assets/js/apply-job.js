$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.apply-job', function(e) {
    e.preventDefault();
    var jobId = $(this).data('id');
    var $messageDiv = $('#apply-message');
    var $appliedText = $('#applied');

    $.ajax({
        url: '/candidate-dashboard/applied-job/apply/' + jobId,
        type: 'POST',
        success: function(response, textStatus, xhr) {
            // Check for 200 status code (success)
            if (xhr.status == 200) {
                if (response.success) {
                    $appliedText.html('Applied');
                    $messageDiv
                        .html('<div class="alert alert-success">' + response.message + '</div>')
                        .fadeIn();
                } else {
                    $messageDiv
                        .html('<div class="alert alert-info">' + response.message + '</div>')
                        .fadeIn();
                }
            }
            // Check for other success codes like 201 (Created)
            else if (xhr.status == 201) {
                $messageDiv
                    .html('<div class="alert alert-success">' + response.message + '</div>')
                    .fadeIn();
            }
            // Handle 409 conflict
            else if (xhr.status == 409) {
                $messageDiv
                    .html('<div class="alert alert-warning">' + response.message + '</div>')
                    .fadeIn();
            }
            // Handle other status codes (401 Unauthorized, etc.)
            else {
                $messageDiv
                    .html('<div class="alert alert-warning">' + response.message + '</div>')
                    .fadeIn();
            }

            // Auto-hide after 5 seconds
            setTimeout(function () {
                $messageDiv.fadeOut('slow', function () {
                    $messageDiv.html('').show(); // Clear message and reset div
                });
            }, 5000);
        },
        error: function(xhr) {
            let errorMsg = 'An error occurred. Please try again.';
            
            // Get the response JSON message from the server if available
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMsg = xhr.responseJSON.message;
            } 
            // Check for other status codes and handle them
            else if (xhr.status == 401) {
                errorMsg = 'You are not authorized to perform this action.';
            } else if (xhr.status == 403) {
                errorMsg = 'You do not have permission to access this resource.';
            } else if (xhr.status == 404) {
                errorMsg = 'The requested resource could not be found.';
            } else if (xhr.status == 500) {
                errorMsg = 'A server error occurred. Please try again later.';
            }

            // Display error message
            $messageDiv
                .html('<div class="alert alert-danger">' + errorMsg + '</div>')
                .fadeIn();

            // Auto-hide after 5 seconds
            setTimeout(function () {
                $messageDiv.fadeOut('slow', function () {
                    $messageDiv.html('').show(); // Reset div
                });
            }, 5000);
        }
    });
});
