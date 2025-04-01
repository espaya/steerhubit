$(document).ready(function () {
    $('#update-password-button').on('click', function (e) {
        e.preventDefault();

        var formData = new FormData($('#updatePasswordForm')[0]);

        $.ajax({
            url: "/0246520325/management/settings/update-password",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $('.error-old-password, .error-new-password, .error-repeat-password').text('');
                $('#response-message').addClass('d-none').text('');
            },
            success: function (response) {
                $('#response-message')
                    .removeClass('d-none text-danger')
                    .addClass('text-success')
                    .text(response.message);
            
                // Clear input fields
                $('#old-password, #new-password, #repeat-password').val('');
            
                setTimeout(function () {
                    $('#response-message').addClass('d-none');
                }, 5000);
            },            
            error: function (xhr) {
                var response = xhr.responseJSON;
                
                if (xhr.status === 422) {
                    if (response.errors) {
                        if (response.errors.old_password) {
                            $('.error-old-password').text(response.errors.old_password[0]);
                        }
                        if (response.errors.new_password) {
                            $('.error-new-password').text(response.errors.new_password[0]);
                        }
                        if (response.errors.repeat_password) {
                            $('.error-repeat-password').text(response.errors.repeat_password[0]);
                        }
                    }
                    if(response.message){
                        $('#response-message').removeClass('d-none text-success').addClass('text-danger').text(response.message);
                    }
                } else {
                    $('#response-message').removeClass('d-none text-success').addClass('text-danger').text(response.message || 'An unexpected error occurred.');
                }
                
                setTimeout(function () {
                    $('#response-message').addClass('d-none');
                }, 3000);
            }
        });
    });

    $(".toggle-password2").on("click", function () {
        var input = $(this).prev("input"); // Get the input field before the span
        if (input.attr("type") === "password") {
            input.attr("type", "text");
            $(this).removeClass("fa-eye-slash").addClass("fa-eye"); // Change icon
        } else {
            input.attr("type", "password");
            $(this).removeClass("fa-eye").addClass("fa-eye-slash"); // Change icon back
        }
    });

    $('#repeat-password').on('paste copy cut', function(e) {
        e.preventDefault();
    });

});
