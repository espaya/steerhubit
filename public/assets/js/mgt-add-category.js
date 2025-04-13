$(document).ready(function () {
    $('#add-category-form').on('submit', function (e) {
        e.preventDefault();

        // Clear previous error messages
        $('small[id^="error-"]').text('');
        $('#category-error-message').html('');

        // Prepare form data
        let formData = new FormData(this);

        $.ajax({
            url: "/0246520325/management/blog/category/store", // Laravel route
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF Token
            },
            success: function (response) {
                if(response.success){
                    $('#category-error-message').html(
                        `<div class="alert alert-success">${response.message}</div>`
                    );
                }

                setTimeout(() => {
                    $('#category-error-message').fadeOut();
                    // reload the page
                    window.location.reload();
                }, 4000);

                $('#add-category-form')[0].reset();

            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function (field, messages) {
                        $(`#error-${field}`).text(messages[0]);
                    });
            
                    $('#category-error-message').html(
                        `<div class="alert alert-danger">Please fix the errors below.</div>`
                    );
                    setTimeout(() => {
                        $('#category-error-message').fadeOut();
                    }, 4000);
            
                } else if (xhr.status === 404 || xhr.status === 500) {
                    const message = xhr.responseJSON && xhr.responseJSON.message 
                        ? xhr.responseJSON.message 
                        : 'An unexpected error occurred.';
            
                    $('#category-error-message').html(
                        `<div class="alert alert-danger">${message}</div>`
                    );
                    setTimeout(() => {
                        $('#category-error-message').fadeOut();
                    }, 4000);
                } else {
                    const fallbackMsg = xhr.responseJSON && xhr.responseJSON.message 
                        ? xhr.responseJSON.message 
                        : 'Something went wrong. Try again.';
            
                    $('#category-error-message').html(
                        `<div class="alert alert-danger">${fallbackMsg}</div>`
                    );
                    setTimeout(() => {
                        $('#category-error-message').fadeOut();
                    }, 4000);
                }
            }            
        });
    });
});
