$(function () {
    $('.add-book-btn').on('click', function () {
        window.location = '/books/create';
    });
    $('.import-books-btn').on('click', function () {
        window.location = '/books/import-from-CSV';
    });

    $('.modal-opener').on('click', function () {
        $('#confirmDeleteBook').attr('book-id', $(this).attr('book-id'));
        let bookTitle = $(this).closest('tr').find('td').eq(2).text();
        $('#deleteBookModal .modal-body').text("Are you sure you want to delete book " + bookTitle + " ?");
    });

    $('#confirmDeleteBook').on('click', function () {
        var bookId = $(this).attr('book-id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "DELETE",
            url: "/books/" + bookId,
            success: function (response) {
                if (response.status === "success") {
                    toastr.success(response.message);
                    setTimeout(function () {
                        window.location = "/books";
                    }, 1000);
                } else if (response.status === "error") {
                    toastr.error(response.message);
                }
            },
            error: function () {
                toastr.error('Error trying to delete book!');
            }
        });
    });

    $('#books-datatable').DataTable();

});

