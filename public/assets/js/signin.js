$(document).ready(function() {
    $("#login-button").click(function(e) {
        e.preventDefault(); // Prevent default form submission

       // Get timezone
       let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
       

        let formData = {
            timezone: timezone,
            email: $("#login-email").val(),
            password: $("#login-password").val(),
            remember: $("#remember").is(":checked") ? 1 : 0,
            _token: $('meta[name="csrf-token"]').attr("content") // Fetch CSRF token
        };

        let loginUrl = $('meta[name="login-route"]').attr("content"); // Fetch login route

        // Clear previous errors
        $("#login-form-ajax .text-danger").text("");

        $.ajax({
            url: loginUrl, // Use the dynamically fetched route
            type: "POST",
            data: formData,
            beforeSend: function() {
                $("#login-button").prop("disabled", true).text("Logging in...");
            },
            success: function(response) {
                if (response.success) {
                    console.log("Showing OTP Modal");
                    
                    // Set flag in localStorage
                    localStorage.setItem("showOtpModal", "true");
                    
                    // Initialize modal with jQuery
                    $("#otpModal").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    
                    $("#loginModal").modal("hide");
                    $("#otpModal").modal("show");
                    
                    // Prefill email field
                    $("#login-email").val($("#login-email").val());
                    
                    // Disable right-click
                    $(document).on("contextmenu", function(e) {
                        e.preventDefault();
                    });
                    
                    // Disable back/forward navigation
                    (function() {
                        history.pushState(null, null, location.href);
                        window.onpopstate = function() {
                            history.pushState(null, null, location.href);
                        };
                        setInterval(function() {
                            history.pushState(null, null, location.href);
                        }, 500);
                    })();
                }
            },            
            error: function(xhr) {
                $("#login-button").prop("disabled", false).text("Login");
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    if (errors.email) {
                        $("#login-error-email").text(errors.email[0]);
                    }
                    if (errors.password) {
                        $("#login-error-password").text(errors.password[0]);
                    }
                } else if (xhr.status === 401) {
                    let errorMessage = xhr.responseJSON?.message || "There are errors in the form. Please try again.";
                    $("#login-error-message").html('<div class="alert alert-danger">' + errorMessage + '</div>');
                }                
                 else {
                    $("#login-error-message").html('<div class="alert alert-danger">Invalid credentials</div>');
                }
            }
        });
    });

    if (localStorage.getItem("showOtpModal") === "true") {
        console.log("Reopening OTP Modal after refresh");

        // Disable right-click
        $(document).on("contextmenu", function(e) {
            e.preventDefault();
        });

        // Disable browser back and forward navigation
        (function () {
            // Disable back button navigation
            history.pushState(null, null, location.href);
            
            window.onpopstate = function () {
                history.pushState(null, null, location.href);
            };
        
            // Keep preventing navigation even if the user keeps pressing back
            setInterval(function () {
                history.pushState(null, null, location.href);
            }, 500);
        })();


        // Show OTP modal
        $("#otpModal").modal({
            backdrop: 'static',
            keyboard: false
        });

        $("#otpModal").modal("show");
    }

});

