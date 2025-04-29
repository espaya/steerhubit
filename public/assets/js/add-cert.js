$('#save-cert-form').on('click', function (e) {
    e.preventDefault();

    // Clear previous errors/messages
    $('#error-cert_institution_name, #error-cert_institution_location, #error-cert_year_started, #error-cert_year_completed, #cet-messages').text('');

    const formData = {
        cert_institution_name: $('#institution').val(),
        cert_institution_location: $('#location').val(),
        cert_year_started: $('#un').val(),
        cert_year_completed: $('#grade').val()
    };

    $.ajax({
        url: '/candidate-dashboard/resume/certification',
        method: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#cet-messages').text('Certification information saved successfully.').css('color', 'green');
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                if (errors.cert_institution_name) {
                    $('#error-cert_institution_name').text(errors.cert_institution_name[0]);
                }
                if (errors.cert_institution_location) {
                    $('#error-cert_institution_location').text(errors.cert_institution_location[0]);
                }
                if (errors.cert_year_started) {
                    $('#error-cert_year_started').text(errors.cert_year_started[0]);
                }
                if (errors.cert_year_completed) {
                    $('#error-cert_year_completed').text(errors.cert_year_completed[0]);
                }
            } else {
                $('#cet-messages').text('An error occurred while saving.').css('color', 'red');
            }
        }
    });
});
