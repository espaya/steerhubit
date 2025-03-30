$(document).ready(function () {
    $("#sendNewOtp").click(function (e) {
        e.preventDefault();
        let $link = $(this);
        $link.addClass("disabled").css("pointer-events", "none").text("Sending...");

        $.ajax({
            url: "/send-new-otp",
            type: "POST",
            dataType: 'json',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                if (response && response.success) {
                    $("#otp-message").html(
                        '<div class="alert alert-success">' + (response.message || 'OTP sent successfully') + '</div>'
                    );
                } else {
                    $("#otp-message").html(
                        '<div class="alert alert-danger">' + (response.message || 'Failed to send OTP') + '</div>'
                    );
                }
            },
            error: function (xhr) 
            {
                let errorMessage = "An error occurred. Please try again later.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                $("#otp-message").html(
                    '<div class="alert alert-danger">' + errorMessage + '</div>'
                );
            },
            complete: function () {
                $link.removeClass("disabled").css("pointer-events", "auto").text("Request new code");
            }
        });
    });
});