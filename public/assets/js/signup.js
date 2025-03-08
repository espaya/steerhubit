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
                    console.log('Rezponze' + response.success);
                    window.location.href = response.redirect; // Redirect user
                    $("#success-message").html('<div class="alert alert-danger">Registration Successful. Please check your email inbox or spam to verify your account</div>').show();
                    // Optionally clear the form fields
                    $("#candidate-register-form")[0].reset();
                }
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    if (errors.name) $("#name-error").text(errors.name[0]);
                    if (errors.email) $("#email-error").text(errors.email[0]);
                    if (errors.password) $("#password-error").text(errors.password[0]);
                    if (errors.role) $("#role-error").text(errors.role[0]);

                    // Show general errors
                    let errorMessages = Object.values(errors).flat().join("<br>");
                    $("#error-message").html('<div class="alert alert-danger">' + errorMessages + '</div>').fadeIn();
                } else {
                    $("#error-message").html('<div class="alert alert-danger">An error occurred. Please try again.</div>').fadeIn();
                }
            }
        });
    });
});
