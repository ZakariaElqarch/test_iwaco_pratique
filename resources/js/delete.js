$('#deleteProductBtn').click(function () {
    $('#deleteConfirmationModal').removeClass('hidden');
});

// Hide Delete Confirmation Modal on Cancel
$('#cancelDeleteBtn').click(function () {
    $('#deleteConfirmationModal').addClass('hidden');
});

// Perform Product Deletion on Confirmation


// $('#confirmDeleteBtn').click(function () {
//     var productId = $(this).data('product-id');
//     var deleteUrl = $(this).data('delete-url');
//     var csrfToken = $('meta[name="csrf-token"]').attr('content');
//     console.log('first', deleteUrl)
//     $.ajax({
//         url: deleteUrl,
//         method: 'DELETE',
//         headers: {
//             'X-CSRF-TOKEN': csrfToken
//         },
//         success: function (response) {
//             toastr.success('Product deleted successfully');
//             window.location.href = productsIndexUrl;
//         },
//         error: function (xhr, textStatus, errorThrown) {
//             toastr.error('Failed to delete product');
//             console.error('Error:', errorThrown);
//         }
//     });
// });

// $('#deleteForm').submit(function (event) {
//     event.preventDefault(); // Prevent default form submission

//     // Get the CSRF token
//     var csrfToken = $('meta[name="csrf-token"]').attr('content');

//     // Send AJAX request to delete the product
//     $.ajax({
//         url: $(this).attr('action'),
//         method: 'DELETE',
//         headers: {
//             'X-CSRF-TOKEN': csrfToken
//         },
//         success: function (responseData, textStatus, xhr) {
//             toastr.success('Product deleted successfully');
//             window.location.href = productsIndexUrl; // Redirect to products index page
//         },
//         error: function (xhr, textStatus, errorThrown) {
//             toastr.error('Failed to delete product');
//             console.error('Error:', errorThrown);
//         }
//     });

// });

