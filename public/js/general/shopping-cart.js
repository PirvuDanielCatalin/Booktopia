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

    $('.billing_address_card .card-header, ' +
        '.delivery_address_card .card-header, ' +
        '.payment_method_card .card-header, ' +
        '.price_card .card-header').on('click', function () {
        $card = $(this).closest('.card');
        if ($card.find('.card-body').css('display') === 'none') {
            $card.find('.caret-up').css('display', 'block');
            $card.find('.caret-down').css('display', 'none');
            $card.find('.card-body').slideDown();
        } else {
            $card.find('.caret-down').css('display', 'block');
            $card.find('.caret-up').css('display', 'none');
            $card.find('.card-body').slideUp();
        }
    });

    $('.user-points-btn').on('click', function () {
        $('#usePointsModal').find('.modal-body')
            .html("Are you sure you want to use fidelity points from your wallet?<br>This action is irreversible.")
    });

    $('#confirmUsePoints').on('click', function () {
        $.cookie('user-used-points', 1);
        $('input[name=user_used_points]').val(true);
        $('#usePointsModal').modal();
    });

    initQuantityCmd();
});

function setTotalPrice() {
    let $total = 0.0;
    $('.tbl-book-price input').toArray().forEach(function (price) {
        $total += parseFloat($(price).val());
    });

    $total_with_decimals = Math.round($total * 100) / 100;
    if ($total === 0) {
        $('.table').remove();
        $('.user-points-div').parent().remove();
        $('.no-products-h').show();
    } else {
        $('.products-total-price-value b').text($total_with_decimals + ' RON');
    }

    $(".shopping-cart-products-nr").text(Object.keys(sessionStorage).length);

    $btn = $('.user-points-btn');
    $fidelity_points = parseInt($btn.closest('.user-points-div').find('.user-points-value b').text());

    if ($fidelity_points < Math.ceil($total_with_decimals)) {
        $btn.attr('disabled', true);
        $btn.closest('span').removeAttr('data-toggle').removeAttr('data-target');
    }

    $('.price_card .card-body div.col-md-12.p-4').text('Total: ' + $total_with_decimals + ' RON');
    $('form input[name=shopping_cart]').val(escape(JSON.stringify(sessionStorage)));
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
        let $max_quantity = $quantity_container.find('input[type=number]').attr('max');

        if ($quantity < $max_quantity) {
            let book_id = $(this).closest('tr').find('.tbl-book-id').text();
            $.session.set('book_' + book_id, parseInt($.session.get('book_' + book_id)) + 1);

            let $price = parseFloat($quantity_container.find('input[type=hidden]').attr('book-price'));
            $quantity_container.find('input[type=number]').val($quantity + 1);

            let $rowTotal = parseFloat($quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val());
            $quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val(Math.round(($rowTotal + $price) * 100) / 100);

            setTotalPrice();
        } else {
            toastr.warning('This book has a limited stock!');
        }
    });
}