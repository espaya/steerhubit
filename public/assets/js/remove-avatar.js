$(document).ready(function () {
    // Open modal when clicking the delete icon
    $(".delete__data").click(function () {
        $("#remove-avatar-Modal").modal("show"); // Show the modal
    });

    // Handle form submission (confirm delete)
    $("#remove--form-ajax").submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        let button = $("#otp-button");
        button.prop("disabled", true).text("Deleting...");

        $.ajax({
            url: "/candidate/dashboard/profile/delete-avatar",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content") // CSRF token
            },
            success: function (response) {
                if (response.success) {
                    $("#remove-avatar-message").html(
                        '<div class="alert alert-success">' + response.message + "</div>"
                    );

                    // Reset profile image to default avatar
                    let defaultAvatar = "/assets/img/dashboard/profile.png";
                    $("#profile-avatar").attr("src", defaultAvatar);
                    $("#header-avatar").attr("src", defaultAvatar);

                    setTimeout(() => {
                        $("#remove-avatar-Modal").modal("hide"); // Close modal after success
                        $("#remove-avatar-message").html(""); // Clear message
                    }, 2000);
                }
            },
            error: function (xhr) {
                let errorMessage = "Error deleting profile image. Please try again.";

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                $("#remove-avatar-message").html(
                    '<div class="alert alert-danger">' + errorMessage + "</div>"
                );
            },
            complete: function () {
                button.prop("disabled", false).text("Yes");
            }
        });
    });
});
