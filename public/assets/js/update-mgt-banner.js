$(document).ready(function () {
    $('#file-upload1').change(function () {
        let formData = new FormData();
        formData.append('bannerImg', $('#file-upload1')[0].files[0]); // Append file

        $.ajax({
            url: "/0246520325/management/settings/update-admin-banner-picture",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                showModal("Uploading...", "Please wait while your file is being uploaded.", "info");
            },
            success: function (response) {
                if (response.success) {
                    $('#mgt-banner').attr('src', response.bannerImg); // Update banner image
                    showModal("Success!", response.message, "success");
                } else {
                    showModal("Upload Failed", response.message, "warning");
                }
            },
            error: function (xhr) {
                let errorMessage = "An error occurred.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showModal("Error!", errorMessage, "danger");
            }
        });
    });

    // Function to show the modal with server response
    function showModal(title, message, type) {
        $('#modal-title').text(title);
        $('#modal-message').text(message);

        // Set icon class based on type
        let iconClass = "info"; // Default
        if (type === "success") iconClass = "success";
        else if (type === "warning") iconClass = "warning";
        else if (type === "danger") iconClass = "danger";

        $('.modal-info-icon').removeClass("info warning success danger").addClass(iconClass);

        // Show modal
        $('#modal-info-confirmed').modal('show');
    }
});
