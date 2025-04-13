$(document).ready(function () {
    // When an edit button is clicked
    $('.edit-category').on('click', function () {
        const categoryId = $(this).data('id');
        const name = $(this).data('name');
        const slug = $(this).data('slug');
        const description = $(this).data('description');

        const modal = $(`#update-category-${categoryId}`);
        
        // Set values inside modal fields
        modal.find('.category-id').val(categoryId);
        modal.find('#category-name').val(name);
        modal.find('#category-slug').val(slug);
        modal.find('#category-description').val(description);
        
        // Clear previous messages
        modal.find('#update-category-error-message').html('');
        modal.find('small[id^="error-"]').text('');
    });

    // Attach submit handler to all update forms
    $(document).on('submit', 'form[id^="update-category-form"]', function (e) {
        e.preventDefault();

        const form = $(this);
        
        // Try to get categoryId from hidden input first
        let categoryId = form.find('.category-id').val();
        
        // If undefined, extract from form ID (e.g., "update-category-form-6" → "6")
        if (!categoryId) {
            const formId = form.attr('id'); // "update-category-form-6"
            categoryId = formId.split('-').pop(); // "6"
            console.log("Extracted categoryId from form ID:", categoryId);
        }
        
        if (!categoryId) {
            console.error("Category ID is missing! Form:", form);
            return;
        }

        const modal = $(`#update-category-${categoryId}`);
        const errorMsgDiv = modal.find('#update-category-error-message');

        // Clear previous errors
        errorMsgDiv.html('');
        form.find('small[id^="error-"]').text('');

        const formData = new FormData(this);

        $.ajax({
            url: `/0246520325/management/blog/category/update/${categoryId}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    errorMsgDiv.html(`<div class="alert alert-success">${response.message}</div>`);
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function (field, messages) {
                        form.find(`#error-${field}`).text(messages[0]);
                    });
                    errorMsgDiv.html(`<div class="alert alert-danger">Please fix the errors below.</div>`);
                } else {
                    const message = xhr.responseJSON?.message || 'Something went wrong.';
                    errorMsgDiv.html(`<div class="alert alert-danger">${message}</div>`);
                }
            }
        });
    });
});