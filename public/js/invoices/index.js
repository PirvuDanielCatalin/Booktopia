$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.invoice-products-panel .card-header').on('click', function () {
        $panel = $(this).closest('.card').find('.card-body');
        if ($panel.css('display') === 'none') {
            $panel.slideDown();
        } else {
            $panel.slideUp();
        }
    });
});