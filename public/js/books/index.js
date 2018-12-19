$(function () {
    $('.modal-openner').on('click',function () {
        $('#confirmDeleteBook').attr('book-id', $(this).attr('book-id'))
    })

    $('#confirmDeleteBook').on('click', function () {
        var bookId = $(this).attr('book-id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "DELETE",
            url: "/books/" + bookId,
            success: function ($message) {
                console.log($message);
                window.location.replace("/books/create");
                //$('.success-msg').show().delay(2000).hide(500);
            },
            error: function () {
                console.log('Eroare');
                //$('.error-msg').show().delay(2000).hide(500);
            }
        });
    })
});

