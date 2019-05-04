$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    configRating();

    $(".add-to-cart-btn").on('click', function () {
        let bookId = $(this).closest('.col-md-8').find('input[type=hidden]').val();
        if (sessionStorage.getItem('book_' + bookId)) {
            let newValue = (parseInt(sessionStorage.getItem('book_' + bookId)) + 1);
            sessionStorage.setItem('book_' + bookId, newValue.toString());
        } else {
            sessionStorage.setItem('book_' + bookId, '1');
            $('.shopping-cart-products-nr').text(Object.keys(sessionStorage).length);
        }
    });

    $(".give-me-a-sample-btn").on('click', function () {
        alert('Google Books API')
    });

    $(".add-to-wishlist-btn").on('click', function () {
        alert('AJAX cu adaugare in wishlist')
    });

    initComments();
});

function configRating() {
    $('.star').on('click', function () {
        $stars = $('.star');
        $stars.removeClass('star-selected');
        var count = $(this).attr('name');
        for (var i = 0; i < count; i++) {
            $stars.eq(i).addClass('star-selected');
        }

        //// Ajax pt salvarea ratingului
    });
}

function initComments() {
    $textareadiv = $('.comment-textarea-div').hide();

    $('.add-comment-btn').on('click', function () {
        alert('Incepe sa scrii comentariu');
        $textareadiv.show();
    });

    $('.post-comment-btn').on('click', function () {
        alert('S-a postat');
        $textareadiv.hide();
    });

    $('.like-comment-btn').on('click', function () {
        alert('like');
    });

    $('.dislike-comment-btn').on('click', function () {
        alert('dislike');
    });

    $('.edit-comment-btn').on('click', function () {
        alert('edit');
    });

    $('.delete-comment-btn').on('click', function () {
        alert('delete');
    });

}