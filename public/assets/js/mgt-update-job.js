$(document).ready(function () {
    $('#update-job-form').on('submit', function (e) {
        e.preventDefault();

        // Clear previous error messages
        $('small[id^="error-"]').text('');
        $('#job-error-message').html('');

        // Prepare form data
        let formData = new FormData(this);

        // Dynamically get slug from the current URL
        const fullUrl = window.location.href;
        const slug = fullUrl.substring(fullUrl.lastIndexOf('/') + 1); // gets 'testing-job'

        $.ajax({
            url: `/0246520325/management/jobs/update/${slug}`, // Use dynamic slug here
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF Token
            },
            success: function (response) {
                if(response.success){
                    $('#job-error-message').html(
                        `<div class="alert alert-success">${response.message}</div>`
                    );
                }

                setTimeout(() => {
                    $('#job-error-message').fadeOut();
                }, 4000);

                $('#update-job-form')[0].reset();

                setTimeout(() => { window.location.reload() }, 2000);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function (field, messages) {
                        $(`#error-${field}`).text(messages[0]);
                    });
                    $('#job-error-message').html(
                        `<div class="alert alert-danger">Please fix the errors below.</div>`
                    );
                    setTimeout(() => {
                        $('#job-error-message').fadeOut();
                    }, 4000);
                } else if (xhr.status === 404 || xhr.status === 500) {
                    const message = xhr.responseJSON?.message || 'An unexpected error occurred.';
                    $('#job-error-message').html(
                        `<div class="alert alert-danger">${message}</div>`
                    );
                    setTimeout(() => {
                        $('#job-error-message').fadeOut();
                    }, 4000);
                } else {
                    const fallbackMsg = xhr.responseJSON?.message || 'Something went wrong. Try again.';
                    $('#job-error-message').html(
                        `<div class="alert alert-danger">${fallbackMsg}</div>`
                    );
                    setTimeout(() => {
                        $('#job-error-message').fadeOut();
                    }, 4000);
                }
            }
        });
    });
});
