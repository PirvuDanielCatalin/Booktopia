$(function () {
    setTotalPrice();

    $('.products-total-price-checkout-btn').on('click',function () {
        if($(this).attr('user-logged') == 'false')
            window.location = '/login';
    });

    $('#paymentDoneBtn').on('click', function () {
        sessionStorage.clear();
        $('.shopping-cart-div').click();
    });

    $('.quantity-minus').on('click', function () {
        let $quantity_container = $(this).closest('.tbl-book-quantity');

        // Get the curent quantity value
        let $quantity = parseInt($quantity_container.find('input[type=number]').val());

        if ($quantity > 1) {
            // Get the price of the book
            let $price = parseFloat($quantity_container.find('input[type=hidden]').attr('book-price'));

            // Update the quantity value in the input
            $quantity_container.find('input[type=number]').val($quantity - 1);

            // Calculate the new row total price and update the disabled input value
            let $rowTotal = parseFloat($quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val());
            $quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val($rowTotal - $price);
            setTotalPrice();
        }
    });

    $('.quantity-plus').on('click', function () {
        let $quantity_container = $(this).closest('.tbl-book-quantity');
        let $quantity = parseInt($quantity_container.find('input[type=number]').val());
        let $price = parseFloat($quantity_container.find('input[type=hidden]').attr('book-price'));
        $quantity_container.find('input[type=number]').val($quantity + 1);
        let $rowTotal = parseFloat($quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val());
        $quantity_container.closest('tr').find('.tbl-book-price input[type=number]').val($rowTotal + $price);
        setTotalPrice();
    });
});

function setTotalPrice() {
    let $total = 0.0;
    $('.tbl-book-price input').toArray().forEach(function (price) {
        $total += parseFloat($(price).val());
    });
    $('.products-total-price-value b').text($total + ' lei');
}