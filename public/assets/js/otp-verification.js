$(document).ready(function () {

    $("#otp-form-ajax").submit(function (e) {
        e.preventDefault();

        let otp = $("#login-otp").val();
        let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        let token = $('meta[name="csrf-token"]').attr("content");

        $("#otp-button").prop("disabled", true).text("Verifying...");

        $.ajax({
            url: "/verify-otp/submit",
            type: "POST",
            data: {
                otp: otp,
                timezone: timezone,
                _token: token
            },
            success: function (response) {
                if (response.success) {
                    // Show success message
                    $("#otp-message").html(
                        '<div class="alert alert-success">' + response.message + '</div>'
                    );
            
                    setTimeout(() => {
                        window.location.href = response.redirect;
                    }, 2000);
                }
            },
            error: function (xhr) {
                $("#otp-button").prop("disabled", false).text("Submit");
                let errorMessage = xhr.responseJSON?.message || "An error occurred. Please try again.";
                $("#otp-message").html('<div class="alert alert-danger">' + errorMessage + '</div>');
            }
        });
    });
});