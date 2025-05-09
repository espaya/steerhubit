$(document).ready(function() {
    // Initialize modals
    // Initialize modals
    const rateLimitModal = new bootstrap.Modal(document.getElementById('rateLimitModal'));
    const otpModal = new bootstrap.Modal(document.getElementById('otpModal'));
    const signupModal = new bootstrap.Modal(document.getElementById('signupModal'));
    
    // Track failed attempts
    let failedAttempts = localStorage.getItem('failedRegisterAttempts') ? parseInt(localStorage.getItem('failedRegisterAttempts')) : 0;
    const MAX_ATTEMPTS = 3;

    // Check if we should show the rate limit modal on page load
    if (localStorage.getItem('registerRateLimitActive') === 'true') {
        const remainingTime = parseInt(localStorage.getItem('registerRateLimitRemaining')) || 60;
        startRateLimitCountdown(remainingTime);
        rateLimitModal.show();
    }

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
        
        // Check if rate limited
        if (localStorage.getItem('registerRateLimitActive') === 'true') {
            return;
        }

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
        if (!isValid) {
            // Only count as failed attempt if fields were filled but invalid
            if ($("#email").val().trim() !== "" && $("#spassword").val().length > 0) {
                failedAttempts++;
                localStorage.setItem('failedRegisterAttempts', failedAttempts);
                
                if (failedAttempts >= MAX_ATTEMPTS) {
                    handleRateLimit(60);
                }
            }
            return;
        }

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
                    // Reset failed attempts on success
                    failedAttempts = 0;
                    localStorage.removeItem('failedRegisterAttempts');
                    handleSuccessfulRegistration();
                }
            },
            error: function(xhr) {
                $("#register-button").prop("disabled", false).text("Register");
                
                // Handle server-side rate limits (only rate limiting now)
                if (xhr.status === 429) {
                    const retryAfter = xhr.getResponseHeader('Retry-After') || 60;
                    handleRateLimit(retryAfter);
                    return;
                }
                
                // Show error messages
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

    function handleRateLimit(retryAfter) {
        localStorage.setItem('registerRateLimitActive', 'true');
        localStorage.setItem('registerRateLimitRemaining', retryAfter);
        startRateLimitCountdown(retryAfter);
        rateLimitModal.show();
        preventNavigation();
    }

    function startRateLimitCountdown(retryAfter) {
        const countdown = document.getElementById('countdown');
        const reloadBtn = document.getElementById('reloadBtn');
        
        let seconds = retryAfter;
        countdown.textContent = seconds;
        countdown.style.display = 'inline';
        reloadBtn.classList.add('d-none');
        
        const interval = setInterval(() => {
            seconds--;
            countdown.textContent = seconds;
            localStorage.setItem('registerRateLimitRemaining', seconds);
            
            if (seconds <= 0) {
                clearInterval(interval);
                countdown.style.display = 'none';
                reloadBtn.classList.remove('d-none');
                
                // Clear rate limit state
                localStorage.removeItem('registerRateLimitActive');
                localStorage.removeItem('registerRateLimitRemaining');
                localStorage.removeItem('failedRegisterAttempts');
                
                reloadBtn.onclick = function() {
                    rateLimitModal.hide();
                    window.location.reload();
                };
                
                setTimeout(() => {
                    rateLimitModal.hide();
                    window.location.reload();
                }, 1000);
            }
        }, 1000);
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