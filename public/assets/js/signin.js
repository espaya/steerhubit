$(document).ready(function() {
    // Initialize modals
    const rateLimitModal = new bootstrap.Modal(document.getElementById('rateLimitModal'));
    const otpModal = new bootstrap.Modal(document.getElementById('otpModal'));
    
    // Track failed attempts
    let failedAttempts = localStorage.getItem('failedAttempts') ? parseInt(localStorage.getItem('failedAttempts')) : 0;
    const MAX_ATTEMPTS = 3;

    // Check if we should show the rate limit modal on page load
    if (localStorage.getItem('rateLimitActive') === 'true') {
        const remainingTime = parseInt(localStorage.getItem('rateLimitRemaining')) || 60;
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
            recaptcha: $('#g-recaptcha-response').val() 
        };

        let loginUrl = $('meta[name="login-route"]').attr("content");

        // Clear previous errors
        $("#login-form-ajax .text-danger").text("");

        $.ajax({
            url: loginUrl,
            type: "POST",
            data: formData,
            beforeSend: function() {
                $("#login-button").prop("disabled", true).text("Logging in...");
            },
            success: function(response) {
                // Reset failed attempts on success
                failedAttempts = 0;
                localStorage.removeItem('failedAttempts');
                
                $("#login-button").prop("disabled", false).text("Login");
                
                if (response.success) {
                    handleSuccessfulLogin();
                }
            },            
            error: function(xhr) {
                $("#login-button").prop("disabled", false).text("Login");
                
                // Handle 429 errors first
                if (xhr.status === 429) {
                    const retryAfter = xhr.getResponseHeader('Retry-After') || 60;
                    handleRateLimit(retryAfter);
                    return;
                }
                
                // Only count non-429 errors
                if (xhr.status !== 429) {
                    failedAttempts++;
                    localStorage.setItem('failedAttempts', failedAttempts);
                    
                    if (failedAttempts >= MAX_ATTEMPTS) {
                        handleRateLimit(60);
                        return;
                    }
                }
                
                handleLoginError(xhr);
            }                       
        });
    });

    function handleSuccessfulLogin() {
        localStorage.setItem("showOtpModal", "true");
        otpModal.show();
        $("#loginModal").modal("hide");
        preventNavigation();
        disableRightClick();
    }

    function handleLoginError(xhr) {
        if (xhr.status === 422) {
            let errors = xhr.responseJSON.errors;
            if (errors.email) $("#login-error-email").text(errors.email[0]);
            if (errors.password) $("#login-error-password").text(errors.password[0]);
            if (errors.recaptcha) {
                $("#login-error-recaptcha").text(errors.recaptcha[0]);
                if (errors.recaptcha[0].toLowerCase().includes("expired")) {
                    $("#login-button").prop("disabled", false).text("Login");
                }
            }
        } else if (xhr.status === 401) {
            let errorMessage = xhr.responseJSON?.message || "There are errors in the form. Please try again.";
            $("#login-error-message").html('<div class="alert alert-danger">' + errorMessage + '</div>');
        } else {
            $("#login-error-message").html('<div class="alert alert-danger">Invalid credentials</div>');
        }
    }

    function handleRateLimit(retryAfter) {
        localStorage.setItem('rateLimitActive', 'true');
        localStorage.setItem('rateLimitRemaining', retryAfter);
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
            localStorage.setItem('rateLimitRemaining', seconds);
            
            if (seconds <= 0) {
                clearInterval(interval);
                countdown.style.display = 'none';
                reloadBtn.classList.remove('d-none');
                
                // Clear rate limit state
                localStorage.removeItem('rateLimitActive');
                localStorage.removeItem('rateLimitRemaining');
                localStorage.removeItem('failedAttempts');
                
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