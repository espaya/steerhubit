$(document).ready(function () {
    $('#company-profile-form').submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        let formData = new FormData(this); // Get form data

        // Clear previous error messages
        $('.error-message').html('');

        $.ajax({
            url: '/0246520325/management/settings/update-admin-update-company-profile', // Update URL as needed
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $('#company-profile-button').prop('disabled', true).text('Updating...');
                $('#response-message').removeClass('alert-success alert-danger').html('');
            },
            success: function (response) {
                $('#response-message').addClass('alert alert-success').html(response.message);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Show validation errors
                    let errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        $('#' + field + '-error').html(errors[field][0]);
                    }
                } else {
                    // Show server error message
                    $('#response-message').addClass('alert alert-danger').html(xhr.responseJSON.message || 'An unexpected error occurred.');
                }
            },
            complete: function () {
                $('#company-profile-button').prop('disabled', false).text('Update Profile');
            }
        });
    });
});
