$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $("#file").change(function () {
        let formData = new FormData();
        let file = $("#file")[0].files[0];

        if (!file) return; // Stop if no file is selected

        formData.append("file", file);
        formData.append("_token", $('meta[name="csrf-token"]').attr("content")); // CSRF token

        $(".file-upload__label").text("Uploading...").prop("disabled", true);

        $.ajax({
            url: "/candidate/dashboard/profile/update",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {

                    // $("#avatar-message").html(
                    //     '<div class="alert alert-success">' + response.message + "</div>"
                    // );

                    // Update the profile image dynamically
                    $("#profile-avatar").attr("src", response.avatar);
                    $("#header-avatar").attr("src", response.avatar);

                    $(".file-upload__label").text("Upload New Photo").prop("disabled", false);
                }
            },
            error: function (xhr) {
                let errorMessage = "Error updating profile image. Please try again.";

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                $("#avatar-message").html(
                    '<div class="alert alert-danger">' + errorMessage + "</div>"
                );

                $(".file-upload__label").text("Upload New Photo").prop("disabled", false);
            }
        });
    });
});
