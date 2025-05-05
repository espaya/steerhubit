
$(document).ready(function () {
    $('#delete-employer-account').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Clear previous messages
        $('#messages').html('');
        $('#error-currentPassword').text('');

        $.ajax({
            url: '/employer-dashboard/company-profile/delete-account',
            type: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-HTTP-Method-Override', 'DELETE');
            },
            success: function (response) {
                $('#messages').html('<div class="alert alert-success text-center">Your account has been successfully deleted. Redirecting...</div>');

                setTimeout(function () {
                    window.location.href = response.redirect_url;
                }, 3000); // Redirect after 2 seconds
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Validation error
                    const errors = xhr.responseJSON.errors;
                    if (errors.currentPassword) {
                        $('#error-currentPassword').text(errors.currentPassword[0]);
                    }
                } else {
                    // General error
                    $('#messages').html('<div class="alert alert-danger text-center">Something went wrong. Please try again later.</div>');
                }
            }
        });
    });
});
