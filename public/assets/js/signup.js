$(document).ready(function() {
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
        console.log("Reopening OTP Modal after refresh");
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

        let formData = {
            _token: $('meta[name="csrf-token"]').attr("content"),
            name: $("#sname").val(),
            email: $("#email").val(),
            password: $("#spassword").val(),
            password_confirmation: $("#password_confirmation").val(),
            role: $("#role").val(),
        };

        $(".error-message").text(""); // Clear previous errors
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
                
                // Increment failed attempts
                failedAttempts++;
                localStorage.setItem('failedRegisterAttempts', failedAttempts);
                
                // Check if we've reached max attempts
                if (failedAttempts >= MAX_ATTEMPTS) {
                    handleRateLimit(60); // 60 second timeout
                    return;
                }
                
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
        let errorHtml = '<div class="alert alert-danger">';
        
        if (xhr.status === 422 && xhr.responseJSON?.errors) {
            const errors = xhr.responseJSON.errors;
            $.each(errors, function(field, messages) {
                $(`#${field}-error`).text(messages[0]);
            });
            errorHtml += Object.values(errors).flat().join("<br>");
        } else if (xhr.responseJSON?.message) {
            errorHtml += xhr.responseJSON.message;
        } else {
            errorHtml += 'Registration failed. Please try again.';
        }
        
        errorHtml += '</div>';
        $("#error-message").html(errorHtml).fadeIn();
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