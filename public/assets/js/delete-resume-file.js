document.addEventListener('DOMContentLoaded', function() {
    // Handle file deletion when X icon is clicked
    $(document).on('click', '.single__item .fa-xmark', function() {
        const fileItem = $(this).closest('.single__item');
        const fileId = fileItem.find('[data-id]').data('id');
        
        if (confirm('Are you sure you want to delete this resume?')) {
            deleteResumeFile(fileId, fileItem);
        }
    });

    function deleteResumeFile(fileId, fileElement) {
        $.ajax({
            url: '/candidate-dashboard/resume/delete-file',
            type: 'POST',
            data: { 
                id: fileId,
                _token: $('meta[name="csrf-token"]').attr('content') 
            },
            beforeSend: function() {
                // Show loading state if needed
                fileElement.addClass('deleting');
            },
            success: function(response) {
                if (response.success) {
                    // Remove the file element from DOM
                    fileElement.fadeOut(300, function() {
                        $(this).remove();
                        
                        // Check if no files left and show empty state
                        if ($('.single__item').length === 0) {
                            $('.file__container').append('<p class="text-muted">No resume uploaded</p>');
                        }
                    });
                    
                    // Show success message
                    showMessage(response.message);
                    window.location.reload();
                } else {
                    showMessage(response.message || 'Failed to delete file', true);
                }
            },
            error: function(xhr) {
                fileElement.removeClass('deleting');
                let message = 'Failed to delete file. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                showMessage(message, true);
            }
        });
    }

    // Reuse the showMessage function from previous implementation
    function showMessage(message, isError = false) {
        const $messageDiv = $('#skill-messge'); // Reusing the same message div
        const color = isError ? 'red' : 'green';
        $messageDiv.html(`<div style="color: ${color};">${message}</div>`);
        
        setTimeout(() => {
            $messageDiv.html('');
        }, 3000);
    }
});