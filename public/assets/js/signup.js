$(document).ready(function() {
    // Initialize modals
    const otpModal = new bootstrap.Modal(document.getElementById('otpModal'));
    const signupModal = new bootstrap.Modal(document.getElementById('signupModal'));

    // Check if OTP modal should be shown on page load
    if (localStorage.getItem("showOtpModal") === "true") {
        otpModal.show();
        preventNavigation();
        disableRightClick();
    }

    // Role selection
    $(".tab__switch button").click(function() {
        $(".tab__switch button").removeClass("active");
        $(this).addClass("active");
        $("#role").val($(this).attr("id") === "candidate-role" ? "Candidate" : "EMPLOYER");
    });

    // Register form submission
    $("#candidate-register-form").submit(function(e) {
        e.preventDefault();

        // First validate form fields client-side
        let isValid = true;
        $(".error-message").text(""); // Clear previous errors
        
        // Example validation - expand with your actual rules
        if ($("#email").val().trim() === "") {
            $("#email-error").text("Email is required");
            isValid = false;
        }
        
        if ($("#spassword").val().length < 8) {
            $("#spassword-error").text("Password must be at least 8 characters");
            isValid = false;
        }
        
        // Don't proceed if client-side validation fails
        if (!isValid) return;

        let formData = {
            _token: $('meta[name="csrf-token"]').attr("content"),
            name: $("#sname").val(),
            email: $("#email").val(),
            password: $("#spassword").val(),
            password_confirmation: $("#password_confirmation").val(),
            role: $("#role").val(), 
        };

        $("#register-button").prop("disabled", true).text("Registering...");

        $.ajax({
            url: "/register-new-account",
            type: "POST",
            data: formData,
            success: function(response) {
                $("#register-button").prop("disabled", false).text("Register");
                
                if (response.success) {
                    handleSuccessfulRegistration();
                }
            },
            error: function(xhr) {
                $("#register-button").prop("disabled", false).text("Register");
                handleRegistrationError(xhr);
            }
        });
    });

    function handleSuccessfulRegistration() {
        localStorage.setItem("showOtpModal", "true");
        otpModal.show();
        signupModal.hide();
        preventNavigation();
        disableRightClick();
    }

    function handleRegistrationError(xhr) {
        // Clear all previous error messages first
        $(".error-message").text("");
        
        if (xhr.status === 422 && xhr.responseJSON?.errors) {
            const errors = xhr.responseJSON.errors;
            
            // Display errors for each field
            if (errors.email) {
                $("#email-error").text(errors.email[0]).show();
            }
            if (errors.password) {
                $("#spassword-error").text(errors.password[0]).show();
            }
            if (errors.name) {
                $("#sname-error").text(errors.name[0]).show();
            }
            if (errors.password_confirmation) {
                $("#password_confirmation-error").text(errors.password_confirmation[0]).show();
            }
        } else {
            // Fallback for other errors
            let errorMessage = xhr.responseJSON?.message || 'Registration failed. Please try again.';
            $("#error-message").html('<div class="alert alert-danger">' + errorMessage + '</div>').show();
        }
    }

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