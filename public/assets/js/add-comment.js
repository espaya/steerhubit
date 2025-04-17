
    $(document).ready(function () {

        // Set CSRF token for all Ajax requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#post-comment-form').on('submit', function (e) {
            e.preventDefault();

            // Clear previous errors
            $('#error-comment_name, #error-comment_email, #error-comment').text('');
            $('#comment-response').removeClass('alert-success alert-danger').addClass('d-none').text('');

            // Prepare form data
            const formData = {
                comment_name: $('#comment-name').val(),
                comment_email: $('#comment-email').val(),
                comment: $('#comment').val()
            };

            const slug = $('#post-slug').text();
            const id = $('#post-id').text();

            // Update action URL dynamically
            const formAction = "/blog/"+slug+"/comment/"+id;

            $.ajax({
                type: 'POST',
                url: formAction,
                data: formData,
                success: function (response) {
                    if (response.success) {
                        $('#comment-response')
                            .removeClass('d-none alert-danger')
                            .addClass('alert alert-success')
                            .text(response.message);

                        $('#post-comment-form')[0].reset(); // Reset form
                    } else {
                        $('#comment-response')
                            .removeClass('d-none alert-success')
                            .addClass('alert alert-danger')
                            .text(response.message);
                    }

                    // Hide after 5 seconds
                    setTimeout(() => {
                        $('#comment-response').fadeOut(500, function () {
                            $(this).addClass('d-none').removeClass('alert alert-success alert-danger').text('').show();
                        });
                    }, 5000);
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        if (errors.comment_name) {
                            $('#error-comment_name').text(errors.comment_name[0]);
                        }
                        if (errors.comment_email) {
                            $('#error-comment_email').text(errors.comment_email[0]);
                        }
                        if (errors.comment) {
                            $('#error-comment').text(errors.comment[0]);
                        }
                    } else if (xhr.status === 404 || xhr.status === 500) {
                        // Use server-provided message if available
                        const message = xhr.responseJSON?.message || 'Something went wrong. Please try again.';
                        $('#comment-response')
                            .removeClass('d-none alert-success')
                            .addClass('alert alert-danger')
                            .text(message);
                
                        setTimeout(() => {
                            $('#comment-response').fadeOut(500, function () {
                                $(this).addClass('d-none').removeClass('alert alert-danger').text('').show();
                            });
                        }, 5000);
                    } else {
                        $('#comment-response')
                            .removeClass('d-none alert-success')
                            .addClass('alert alert-danger')
                            .text('An unexpected error occurred. Please try again later.');
                
                        setTimeout(() => {
                            $('#comment-response').fadeOut(500, function () {
                                $(this).addClass('d-none').removeClass('alert alert-danger').text('').show();
                            });
                        }, 5000);
                    }
                }                               
            });
        });
    });
