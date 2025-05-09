$(document).ready(function() {
    $("#reset-password-form").submit(function(e) {
        e.preventDefault();
        
        // Clear previous errors
        $("#error-reset-email").text("");
        
        // Get form data
        let formData = {
            email: $("#fmail").val(),
            _token: $('meta[name="csrf-token"]').attr("content")
        };

        // // Validate email
        // if (!formData.email) {
        //     $("#error-reset-email").text("Email is required");
        //     return;
        // }

        // Disable button during request
        $(".rts__btn").prop("disabled", true).text("Processing...");

        $.ajax({
            url: "/reset-password/send-reset-link",
            type: "POST",
            data: formData,
            success: function(response) {
                $(".rts__btn").prop("disabled", false).text("Reset Password");
                if (response.success) {
                    // Mask the email (e.g., "te**@ex***.com")
                    const email = formData.email;
                    const [username, domain] = email.split('@');
                    const maskedUsername = username.substring(0, 2) + '*'.repeat(username.length - 2);
                    const [domainName, tld] = domain.split('.');
                    const maskedDomain = domainName.substring(0, 2) + '*'.repeat(domainName.length - 2);
                    const maskedEmail = `${maskedUsername}@${maskedDomain}.${tld}`;
                    
                    // Show success message with masked email
                    $("#messages").text("Password reset link has been sent to your email " + maskedEmail);
                    $("#fmail").val(""); // Clear email field
                    $('#loginModal').blur(); // or however you hide it

                    setTimeout(function(){
                        $('#forgotModal').fadeOut();
                        $('#resetModal').fadeIn();
                    }, 3000);

                    

                }
            },
            error: function(xhr) {
                $(".rts__btn").prop("disabled", false).text("Reset Password");
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.email) {
                        const emailError = Array.isArray(errors.email) ? errors.email[0] : errors.email;
                        $("#error-reset-email").text(emailError);
                    }
                }                
                 else if (xhr.status === 500) {
                    const message = xhr.responseJSON?.message || "Internal server error.";
                    $("#error-reset-email").text(message);
                }                
                 else {
                    $("#error-reset-email").text("Something went wrong. Please try again.");
                }
            }
        });
    });
});