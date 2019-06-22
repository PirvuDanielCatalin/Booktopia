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

    $('.export-PDF').on('click', function () {
        $form = $('<form method="post" action="/invoices/exportPDF" class="d-none">' +
            '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
            '<input type="text" name="invoice_id" value="' + $(this).attr('invoice-id') + '">' +
            '</form>');
        $(this).parent().append($form);
        $form.submit();
    });
});