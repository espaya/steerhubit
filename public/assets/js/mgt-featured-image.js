$(document).ready(function() {
    const $featuredImageInput = $('#featured-image');
    const $displayImage = $('#display-featured-image');
    const $fileNameDisplay = $('<small class="d-block mt-2 text-muted"></small>').insertAfter($featuredImageInput);

    // Handle file selection via input
    $featuredImageInput.on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            displayImagePreview(file);
            $fileNameDisplay.text(`Selected file: ${file.name}`);
        }
    });

    // Drag and drop functionality
    const $dropZone = $featuredImageInput.closest('.mb-25');

    // Highlight drop zone on drag enter
    $dropZone.on('dragover', function(e) {
        e.preventDefault();
        $(this).addClass('border border-primary');
    });

    // Remove highlight on drag leave
    $dropZone.on('dragleave', function(e) {
        e.preventDefault();
        $(this).removeClass('border border-primary');
    });

    // Handle dropped file
    $dropZone.on('drop', function(e) {
        e.preventDefault();
        $(this).removeClass('border border-primary');
        
        const file = e.originalEvent.dataTransfer.files[0];
        if (file && file.type.match('image.*')) {
            $featuredImageInput[0].files = e.originalEvent.dataTransfer.files;
            displayImagePreview(file);
            $fileNameDisplay.text(`Dropped file: ${file.name}`);
        } else {
            alert('Please select an image file (JPEG, PNG, etc.)');
        }
    });

    // Display image preview
    function displayImagePreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $displayImage.attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
    }
});