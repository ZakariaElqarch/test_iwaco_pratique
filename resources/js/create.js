$(document).ready(function() {
    $('#createForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Get the CSRF token
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        // Send AJAX request to update the product
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: new FormData(this),
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            processData: false,
            contentType: false,
            success: function(responseData, textStatus, xhr) {
                toastr.success('Product updated successfully');
                window.location.href = productsIndexUrl; // Redirect to products index page
            },
            error: function(xhr, textStatus, errorThrown) {
                var errors = xhr.responseJSON.errors;
                // Display validation errors
                $.each(errors, function(fieldName, errorMessages) {
                    $.each(errorMessages, function(index, errorMessage) {
                        toastr.error(errorMessage);
                    });
                });
            }
        });
    });
});
