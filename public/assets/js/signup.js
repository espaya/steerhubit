$(document).ready(function() {
    let role = "Candidate"; // Default role

    // Toggle role selection inside the popup modal
    $(".tab__switch button").click(function() {
        $(".tab__switch button").removeClass("active"); // Remove active class
        $(this).addClass("active"); // Add active class to clicked button

        role = ($(this).attr("id") === "candidate-role") ? "Candidate" : "EMPLOYER";
        $("#role").val(role); // Update hidden input value
    });


    // Ensure role is updated before form submission
    $("form").submit(function(e) {
        console.log("Final Submitted Role:", $("#role").val());
    });

    // Register button inside the popup modal
    $("#register-button").click(function(e) { 
        e.preventDefault(); // Prevent default button behavior
        $("#candidate-register-form").submit(); // Manually trigger form submission
    });

    // Handle modal form submission via AJAX
    $("#candidate-register-form").submit(function(e) {
        e.preventDefault(); // Prevent default form submission


        let formData = {
            _token: $('meta[name="csrf-token"]').attr("content"), // Ensure CSRF is included
            name: $("#sname").val(),
            email: $("#email").val(),
            password: $("#spassword").val(),
            password_confirmation: $("#password_confirmation").val(),
            role: $("#role").val(),
        };

        $(".error-message").text(""); // Clear previous error messages

        $.ajax({
            url: "/register-new-account", // Your backend registration route
            type: "POST", 
            data: formData,
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
                    
                    $("#signupModal").modal("hide");
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
                $("#register-button").prop("disabled", false).text("Register");
                
                let errorHtml = '<div class="alert alert-danger">';
                if (xhr.status === 422 && xhr.responseJSON?.errors) {
                    const errors = xhr.responseJSON.errors;
                    // Field-specific errors
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
