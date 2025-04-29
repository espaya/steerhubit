$('#save-high-school-resume').on('click', function (e) {
    e.preventDefault();

    // Clear previous messages and errors
    $('#error-high_school_name, #error-high_school_location, #error-high_school_year_started, #error-high_school_year_completed, #high-school-message').text('');

    const formData = {
        high_school_name: $('#high_school_name').val(),
        high_school_location: $('#high_school_location').val(),
        high_school_year_started: $('#high_school_year_started').val(),
        high_school_year_completed: $('#high_school_year_completed').val()
    };

    $.ajax({
        url: '/candidate-dashboard/resume/highschool',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#high-school-message').text('High school information saved successfully.').css('color', 'green');
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                if (errors.high_school_name) {
                    $('#error-high_school_name').text(errors.high_school_name[0]);
                }
                if (errors.high_school_location) {
                    $('#error-high_school_location').text(errors.high_school_location[0]);
                }
                if (errors.high_school_year_started) {
                    $('#error-high_school_year_started').text(errors.high_school_year_started[0]);
                }
                if (errors.high_school_year_completed) {
                    $('#error-high_school_year_completed').text(errors.high_school_year_completed[0]);
                }
            } else {
                $('#high-school-message').text('An error occurred while saving.').css('color', 'red');
            }
        }
    });
});
