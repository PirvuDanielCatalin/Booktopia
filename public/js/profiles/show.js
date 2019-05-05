$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.wishlist-div > div:first-child').on('click', function () {
        alert('Wishlist')
    });

    $('.purchase-history-div > div:first-child').on('click', function () {
        alert('Purchase history')
    });
});