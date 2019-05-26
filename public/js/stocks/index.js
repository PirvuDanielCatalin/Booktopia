$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.tbl-book-info').on('click', function () {
        $data = {};
        $data['book_id'] = $(this).find('.tbl-book-id').text();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "/stocks/get-stock",
            data: $data,
            success: function (response) {
                $('.small-view .form input[type=hidden]').val(response.stock.id);
                $('.small-view .form input[name=title]').val(response.title);
                $('.small-view .form input[name=quantity]').val(response.stock.amount);
                $('.small-view .form input[name=plus-minus-quantity]').attr('min', -response.stock.amount);

                $('.stocks_page_right_panel_img').hide('slow');
                $('.stocks_page_right_panel').show('slow');
            },
            error: function () {
                toastr.warning('Error on getting user role!');
            }
        });
    });

    $('.edit-stock-btn').on('click', function () {
        $('.small-view .form input[name=plus-minus-quantity]').attr('disabled', false);
        toastr.info('You can edit the value wich will modify the stock!');
    });

    $('.update-stock-btn').on('click', function () {
        let $data = {};
        $data['stock_id'] = $('.small-view .form input[type=hidden]').val();
        $data['update_quantity'] = $('.small-view .form input[name=plus-minus-quantity]').val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "PUT",
            url: "/stocks/" + $data['stock_id'],
            data: $data,
            success: function (response) {
                if (response.status === "success") {
                    toastr.success(response.message);

                    $('.stocks_page_right_panel').hide();
                    $('.stocks_page_right_panel_img').show();
                    $('.small-view .form input[name=plus-minus-quantity]').val("").attr('disabled', true);
                } else if (response.status === "error") {
                    toastr.error(response.message);
                }
            },
            error: function () {
                toastr.error("Error on updating stock!");
            }
        });
    });

    $('#stocks-datatable').DataTable();
});