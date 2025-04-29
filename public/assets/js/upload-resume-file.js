// Reusable function for uploading
function uploadResumeFile(file) {
    let $button = $('#upload-resume-file');
    let originalText = $button.text();
    let formData = new FormData();

    formData.append('file', file);

    $button.text('Uploading...').attr('disabled', true);
    $('#error-file').text('');
    $('#success-div').text('');

    $.ajax({
        url: '/candidate-dashboard/resume/file',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#success-div').text('File uploaded successfully').css('color', 'green');
            $button.text(originalText).attr('disabled', false);
            $('#file').val('');
            setTimeout(() => {
                $('#success-div').fadeOut();
                window.location.reload();
            }, 1500);
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                if (errors.file) {
                    $('#error-file').text(errors.file[0]);
                }
            } else {
                $('#error-file').text('An error occurred while uploading.');
            }
            $button.text(originalText).attr('disabled', false);
        }
    });
}

// Click upload
$('#upload-resume-file').on('click', function (e) {
    e.preventDefault();
    let file = $('#file')[0].files[0];
    if (!file) {
        $('#error-file').text('Please select a file.');
        return;
    }
    uploadResumeFile(file);
});

// Auto upload on file selection
$('#file').on('change', function () {
    let file = this.files[0];
    if (!file) return;
    uploadResumeFile(file);
});

// Handle drag & drop on label or its parent
$('.select__image').on('dragover', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragging'); // Optional: add style
});

$('.select__image').on('dragleave', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragging'); // Optional: remove style
});

$('.select__image').on('drop', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragging');

    const file = e.originalEvent.dataTransfer.files[0];
    if (!file) return;

    // Assign the file to the input for consistency
    $('#file')[0].files = e.originalEvent.dataTransfer.files;

    // Trigger upload
    uploadResumeFile(file);
});
