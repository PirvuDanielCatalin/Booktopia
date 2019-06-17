$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    setTotalPrice();

    $('.products-total-price-checkout-btn').on('click', function () {
        if ($(this).attr('user-logged') === 'false') {
            window.location = '/login';
        } else {
            $('form').fadeIn();
        }
    });

    $('#paymentDoneBtn').on('click', function () {
        $.session.clear();
        $('.shopping-cart-div').click();
    });

    initQuantityCmd();
});

function setTotalPrice() {
    let $total = 0.0;
    $('.tbl-book-price input').toArray().forEach(function (price) {
        $total += parseFloat($(price).val());
    });

    if ($total === 0) {
        $('.table').remove();
        $('.user-points-div').parent().remove();
        $('.no-products-h').show();
    } else {
        $('.products-total-price-value b').text((Math.round($total * 100) / 100) + ' RON');
    }

    $(".shopping-cart-products-nr").text(Object.keys(sessionStorage).length);
}

function initQuantityCmd() {
    $('.quantity-minus').on('click', function () {
        let $quantity_container = $(this).closest('.tbl-book-quantity');
        let $quantity = parseInt($quantity_container.find('input[type=number]').val());

        if ($quantity > 1) {
            let book_id = $(this).closest('tr').find('.tbl-book-id').text();
            $.session.set('book_' + book_id, parseInt($.session.get('book_' + book_id)) - 1);

            let $price = parseFloat($quantity_container.find('input[type=hidden]').attr('book-price'));
            $quantity_container.find('input[type=number]').val($quantity - 1);

            let $rowTotal = parseFloat($quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val());
            $quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val(Math.round(($rowTotal - $price) * 100) / 100);

            setTotalPrice();
        } else if ($quantity === 1) {
            let book_id = $(this).closest('tr').find('.tbl-book-id').text();
            $.session.remove('book_' + book_id);

            $(this).closest('tr').remove();

            setTotalPrice();
        }
    });

    $('.quantity-plus').on('click', function () {
        let $quantity_container = $(this).closest('.tbl-book-quantity');
        let $quantity = parseInt($quantity_container.find('input[type=number]').val());

        let book_id = $(this).closest('tr').find('.tbl-book-id').text();
        $.session.set('book_' + book_id, parseInt($.session.get('book_' + book_id)) + 1);

        let $price = parseFloat($quantity_container.find('input[type=hidden]').attr('book-price'));
        $quantity_container.find('input[type=number]').val($quantity + 1);

        let $rowTotal = parseFloat($quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val());
        $quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val(Math.round(($rowTotal + $price) * 100) / 100);

        setTotalPrice();
    });
}