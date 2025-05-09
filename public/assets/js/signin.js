$(document).ready(function() {
    // Initialize modals
    const otpModal = new bootstrap.Modal(document.getElementById('otpModal'));

    // Check if OTP modal should be shown on page load
    if (localStorage.getItem("showOtpModal") === "true") {
        console.log("Reopening OTP Modal after refresh");
        otpModal.show();
        preventNavigation();
        disableRightClick();
    }

    // Login form submission
    $("#login-button").click(function(e) {
        e.preventDefault();

        let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        let formData = {
            timezone: timezone,
            email: $("#login-email").val(),
            password: $("#login-password").val(),
            remember: $("#remember").is(":checked") ? 1 : 0,
            _token: $('meta[name="csrf-token"]').attr("content"),
            recaptcha: grecaptcha.getResponse() // Make sure to include recaptcha
        };

        let loginUrl = $('meta[name="login-route"]').attr("content");

        // Clear previous errors
        $("#login-form-ajax .text-danger").text("");

        // Validate recaptcha
        if (!formData.recaptcha) {
            $("#login-error-recaptcha").text("Please complete the reCAPTCHA");
            return;
        }

        $.ajax({
            url: loginUrl,
            type: "POST",
            data: formData,
            beforeSend: function() {
                $("#login-button").prop("disabled", true).text("Logging in...");
            },
            success: function(response) {                
                $("#login-button").prop("disabled", false).text("Login");
                
                if (response.success) {
                    localStorage.setItem("showOtpModal", "true");
                    otpModal.show();
                    $("#loginModal").modal("hide");
                    preventNavigation();
                    disableRightClick();
                }
            },            
            error: function(xhr) {
                $("#login-button").prop("disabled", false).text("Login");
                
                // Clear previous errors
                $("#login-error-email, #login-error-password, #login-error-recaptcha, #login-error-message").text("");
            
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    
                    // Handle recaptcha error
                    if (errors.recaptcha) {
                        $("#login-error-recaptcha").text(errors.recaptcha[0]);
                        grecaptcha.reset(); // Reset recaptcha widget
                        return;
                    }
            
                    // Show field-specific errors
                    if (errors.email) $("#login-error-email").text(errors.email[0]);
                    if (errors.password) $("#login-error-password").text(errors.password[0]);
                    
                } else if (xhr.status === 401) {
                    let errorMessage = xhr.responseJSON?.message || "Incorrect email or password.";
                    $("#login-error-message").html('<div class="alert alert-danger">' + errorMessage + '</div>');
                } else {
                    $("#login-error-message").html('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
                }
            }                       
        });
    });

    function preventNavigation() {
        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.pushState(null, null, location.href);
        };
        setInterval(function() {
            history.pushState(null, null, location.href);
        }, 500);
    }

    function disableRightClick() {
        $(document).on("contextmenu", function(e) {
            e.preventDefault();
        });
    }
});