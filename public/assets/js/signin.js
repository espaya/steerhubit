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
                    window.location.href = response.redirect;
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
});

