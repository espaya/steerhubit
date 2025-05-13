$(document).ready(function() {
    // Role selection
    $(".tab__switch button").click(function() {
        $(".tab__switch button").removeClass("active");
        $(this).addClass("active");
        const role = $(this).attr("id") === "candidate-role" ? "Candidate" : "Employer";
        $("#role").val(role);
    }); 

    // Register form submission
    $("#candidate-register-form").submit(function(e) {
        e.preventDefault();

        // Clear previous errors
        $(".error-message").text("");
        $("#error-message").hide();

        const formData = {
            _token: $('meta[name="csrf-token"]').attr("content"),
            name: $("#sname").val(),
            email: $("#email").val(),
            password: $("#spassword").val(),
            password_confirmation: $("#password_confirmation").val(),
            role: $("#role").val()
        };

        $("#register-button").prop("disabled", true).text("Registering...");

        $.ajax({
            url: "/register-new-account",
            method: "POST",
            data: formData,
            success: function(response) {
                $("#register-button").prop("disabled", false).text("Register");

                if (response.success) {
                    window.location.href = response.redirect;
                } else {
                    $("#error-message").text("Registration failed. Please try again.").removeClass("d-none");
                }
            },
            error: function(xhr) {
                $("#register-button").prop("disabled", false).text("Register");
                handleRegistrationError(xhr);
            }
        });
    });


    function handleRegistrationError(xhr) {
        if (xhr.status === 422 && xhr.responseJSON?.errors) {
            const errors = xhr.responseJSON.errors;

            if (errors.name) {
                $("#name-error").text(errors.name[0]);
            }
            if (errors.email) {
                $("#email-error").text(errors.email[0]);
            }
            if (errors.password) {
                $("#password-error").text(errors.password[0]);
            }
            if (errors.password_confirmation) {
                $("#password_confirmation-error").text(errors.password_confirmation[0]);
            }
        } else if(xhr.status === 429) {
            window.location.href = '/429';
        }
        else {
            const fallbackMessage = xhr.responseJSON?.message || "Something went wrong.";
            $("#error-message").removeClass("d-none").text(fallbackMessage);
        }
    }
});
