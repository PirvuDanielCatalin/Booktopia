$(function () {
    configRating();

    $(".add-product-btn").on('click', function () {
        let bookId = $(this).attr('book-id');
        if (sessionStorage.getItem('book_' + bookId)) {
            let newValue = (parseInt(sessionStorage.getItem('book_' + bookId)) + 1);
            sessionStorage.setItem('book_' + bookId, newValue.toString());
        } else {
            sessionStorage.setItem('book_' + bookId, '1');
            $('.shopping-cart-products-nr').text(Object.keys(sessionStorage).length);
        }
    });
});

function configRating() {
    $('.star').on('click', function () {
        $('.star').removeClass('star-selected');
        var count = $(this).attr('name');
        for (var i = 0; i < count; i++) {
            $('.star').eq(i).addClass('star-selected');
        }
    });
}