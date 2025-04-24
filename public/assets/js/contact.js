$(document).ready(function () {
    $('#contact-form').submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        let formData = new FormData(this); // Get form data

        // Clear previous error messages
        $('.error-message').html('');

        $.ajax({
            url: '/contact-us/send', // Update URL as needed
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $('#contact-form-button').prop('disabled', true).text('Sending...');
                $('#contact-message').removeClass('alert-success alert-danger').html('');
            },
            success: function (response) {
                $('#contact-message')
                    .addClass('alert alert-success')
                    .html(response.message);
                $('#contact-form')[0].reset();

                // Hide alert after 5 seconds
                setTimeout(function () {
                    $('#contact-message').fadeOut();
                }, 3000);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Show validation errors
                    let errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        $('#' + field + '-error').html(errors[field][0]);
                    }
                } else {
                    $('#contact-message')
                        .addClass('alert alert-danger')
                        .html(xhr.responseJSON.message || 'An unexpected error occurred.')
                        .fadeIn();

                    // Hide alert after 5 seconds
                    setTimeout(function () {
                        $('#contact-message').fadeOut();
                    }, 3000);
                }
            },
            complete: function () {
                $('#contact-form-button').prop('disabled', false).text('Send Message');
            }
        });
    });
});
