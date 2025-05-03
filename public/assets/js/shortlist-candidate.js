$(document).ready(function () {
    $('#shortlistBtn').on('click', function (e) {
        e.preventDefault(); // Prevent anchor default behavior

        if (!confirm('Are you sure you want to shortlist this candidate for this job?')) {
            return; // Exit if user cancels
        }

        let applicant_id = $('#applicant_id').text().trim();
        let slug = $('#slug').text().trim();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#messages').html('').show(); // Clear and ensure visibility

        $.ajax({
            url: '/employer-dashboard/applied-job/shortlist-candidate',
            method: 'POST',
            data: {
                applicant_id: applicant_id,
                slug: slug,
                _token: csrfToken
            },
            success: function (response) {
                $('#messages').html(`<div class="alert alert-success">${response.message}</div>`);

                setTimeout(() => {
                    $('#messages').fadeOut('slow', function () {
                        $(this).html('').show();
                    });
                }, 4000);

                window.location.reload();
            },
            error: function (xhr) {
                let msg = 'An error occurred.';

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }

                $('#messages').html(`<div class="alert alert-danger">${msg}</div>`);

                setTimeout(() => {
                    $('#messages').fadeOut('slow', function () {
                        $(this).html('').show();
                    });
                }, 4000);
            }
        });
    });
});
