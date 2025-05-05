$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#change-password-form').on('submit', function(e) {
    e.preventDefault();

    // Clear previous messages
    $('#messages').text('');
    $('#error-currentPassword').text('');
    $('#error-newPassword').text('');
    $('#error-retypePassword').text('');

    $.ajax({
        url: '/employer-dashboard/change-password/update',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            $('#messages').css('color', 'green').text(response.message || 'Password changed successfully.');
            $('#change-password-form')[0].reset();

            // reload after 2sec
            setTimeout(() => window.location.reload(), 2000);
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                if (errors.currentPassword) {
                    $('#error-currentPassword').text(errors.currentPassword[0]);
                }
                if (errors.newPassword) {
                    $('#error-newPassword').text(errors.newPassword[0]);
                }
                if (errors.retypePassword) {
                    $('#error-retypePassword').text(errors.retypePassword[0]);
                }
            } else {
                $('#messages').css('color', 'red').text('An error occurred. Please try again.');
            }
        }
    });
});
