$(function () {
    $('.modal-openner').on('click', function () {
        $('#confirmDeleteBook').attr('book-id', $(this).attr('book-id'))
    });

    $('#confirmDeleteBook').on('click', function () {
        var bookId = $(this).attr('book-id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "DELETE",
            url: "/books/" + bookId,
            success: function ($response) {
                console.log($response);
                window.location.replace("/books/create");
            },
            error: function () {
                console.log('Eroare la stergere!');
            }
        });
    })
});

