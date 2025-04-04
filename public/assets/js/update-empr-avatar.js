$(document).ready(function() {
    $('#file').on('change', function(event) {
        let file = event.target.files[0];

        var csrfToken = $('meta[name="csrf-token"]').attr('content');


        if (!file) return; // If no file selected, exit

        let formData = new FormData();
        formData.append('employer_avatar', file);

        $.ajax({
            url: "/employer-dashboard/company-profile/update-company-avatar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": csrfToken // Ensure CSRF protection
            },
            beforeSend: function() {
                $('#avatar-error-messages')
                    .removeClass('alert-success alert-danger')
                    .text('Uploading...')
                    .show();
            },
            success: function(response) {
                if (response.success) {
                    $('#avatar-error-messages')
                        .removeClass('alert-danger')
                        .addClass('alert-success')
                        .text(response.message)
                        .show();

                    // Update profile image
                    $('.author__image img').attr('src', response.avatar_url);
                    $('#company-header-avatar').attr('src', response.avatar_url);

                    // Hide the message after 3 seconds
                    setTimeout(function() {
                        $('#avatar-error-messages').fadeOut();
                    }, 3000);
                } else {
                    $('#avatar-error-messages')
                        .removeClass('alert-success')
                        .addClass('alert-danger')
                        .text(response.message)
                        .show();

                    // Hide the message after 3 seconds
                    setTimeout(function() {
                        $('#avatar-error-messages').fadeOut();
                    }, 3000);
                }
            },
            error: function(xhr) {
                let errorMessage = "An error occurred. Please try again.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                    // Hide the message after 3 seconds
                    setTimeout(function() {
                        $('#avatar-error-messages').fadeOut();
                    }, 3000);
                }

                $('#avatar-error-messages')
                    .removeClass('alert-success')
                    .addClass('alert-danger')
                    .text(errorMessage)
                    .show();
            }
        });
    });

    $(document).ready(function () {
        $("#remove-avatar").click(function () {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            if (!confirm("Are you sure you want to remove the company logo?")) {
                return;
            }
    
            $.ajax({
                url: "/employer-dashboard/company-profile/remove-company-avatar",
                type: "POST",
                data: {
                    _token: csrfToken
                },
                success: function (response) {
                    let messageDiv = $("#avatar-error-messages");
    
                    if (response.success) {
                        messageDiv
                            .removeClass("alert-danger")
                            .addClass("alert-success")
                            .text(response.message)
                            .fadeIn();
    
                        // Replace the main profile image with the default placeholder
                        $(".author__image img").attr("src", "/assets/img/placeholder.avif");

                        // Replace the company header image with the default one
                        $('#company-header-avatar').attr('src', "/assets/img/dashboard/profile.png");

                    } else {
                        messageDiv
                            .removeClass("alert-success")
                            .addClass("alert-danger")
                            .text(response.message)
                            .fadeIn();
                    }
    
                    // Hide the message after 5 seconds
                    setTimeout(function () {
                        messageDiv.fadeOut();
                    }, 5000);
                },
                error: function (xhr) {
                    let messageDiv = $("#avatar-error-messages");
                    let errorMessage = "An unexpected error occurred.";
    
                    if (xhr.status === 404) {
                        errorMessage = "Error 404: Company logo not found.";
                    } else if (xhr.status === 500) {
                        errorMessage = "Error 500: Internal Server Error. Please try again later.";
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
    
                    messageDiv
                        .removeClass("alert-success")
                        .addClass("alert-danger")
                        .text(errorMessage)
                        .fadeIn();
    
                    // Hide the message after 5 seconds
                    setTimeout(function () {
                        messageDiv.fadeOut();
                    }, 5000);
                }
            });
        });
    });    

});
