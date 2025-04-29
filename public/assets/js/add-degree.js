$('#save-degree-info').on('click', function(e) {
    e.preventDefault();

    // Clear previous error messages
    $('#error-degree_institution_name, #error-degree_institution_location, #error-degree_year_started, #error-degree_year_completed, #message').text('');

    const formData = {
        degree_institution_name: $('#degree_institution_name').val(),
        degree_institution_location: $('#location').val(),
        degree_year_started: $('#un').val(),
        degree_year_completed: $('#grade').val()
    };

    $.ajax({
        url: '/candidate-dashboard/resume/degree',
        method: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#message').text('Degree information saved successfully.').css('color', 'green');
            // Optionally reset or update UI
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                if (errors.degree_institution_name) {
                    $('#error-degree_institution_name').text(errors.degree_institution_name[0]);
                }
                if (errors.degree_institution_location) {
                    $('#error-degree_institution_location').text(errors.degree_institution_location[0]);
                }
                if (errors.degree_year_started) {
                    $('#error-degree_year_started').text(errors.degree_year_started[0]);
                }
                if (errors.degree_year_completed) {
                    $('#error-degree_year_completed').text(errors.degree_year_completed[0]);
                }
            } else {
                $('#message').text('An error occurred while saving.').css('color', 'red');
            }
        }
    });
});
