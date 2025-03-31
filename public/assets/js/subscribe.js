
    $(document).ready(function() {
        $('#subscribeForm').submit(function(e) {
            e.preventDefault(); // Prevent page reload

            let semail = $('#semail').val();
            let token = $('input[name="_token"]').val(); // Get CSRF token

            $.ajax({
                url: "/subscribe-to-our-mailing-list", // Adjust if necessary
                type: "POST",
                data: {
                    _token: token,
                    subscribe_email: semail
                },
                success: function(response) {
                    $('#subscribeMessage').html('<div class="alert alert-success">Subscribed successfully!</div>');
                    $('#semail').val(""); // Clear input field
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    if (errors && errors.subscribe_email) {
                        $('#subscribeMessage').html('<div class="alert alert-danger">' + errors.subscribe_email[0] + '</div>');
                    } else {
                        $('#subscribeMessage').html('<div class="alert alert-danger">Something went wrong. Try again.</div>');
                    }
                }
            });
        });
    });