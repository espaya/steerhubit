$(document).ready(function () {
    // Initialize modal properly (Bootstrap 5)
    const otpModalEl = document.getElementById('otpModal');
    if (!otpModalEl) {
        console.error('OTP Modal element not found!');
        return;
    }
    
    const otpModal = new bootstrap.Modal(otpModalEl, {
        backdrop: 'static',
        keyboard: false
    });

    // Show modal if needed
    if (localStorage.getItem("showOtpModal") === "true") {
        otpModal.show();
    }

    $("#otp-form-ajax").submit(function (e) {
        e.preventDefault();

        let otp = $("#login-otp").val();
        let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        let token = $('meta[name="csrf-token"]').attr("content");

        console.log("CSRF Token:", token);

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
                    localStorage.removeItem("showOtpModal");

                    // Show success message
                    $("#otp-message").html(
                        '<div class="alert alert-success">' + response.message + '</div>'
                    );
            
                    // Close modal using Bootstrap 5 method
                    otpModal.hide();
            
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