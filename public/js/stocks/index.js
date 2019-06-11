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
                $('.small-view .form input[type=hidden].stock_id').val(response.book.stock.stock_id);
                $('.small-view .form input[type=hidden].book_id').val(response.book.book_id);
                $('.small-view .form input[name=title]').val(response.book.title);
                $('.small-view .form input[name=quantity]').val(response.book.stock.amount);
                $('.small-view .form input[name=plus-minus-quantity]').attr('min', -response.book.stock.amount);

                $('.update-stock-btn').hide();
                if (response.requirement_status) {
                    $('.edit-stock-btn, .update-stock-btn').attr('disabled', true)
                        .parent().attr({
                        'data-placement': "top",
                        'data-toggle': "tooltip",
                        'title': "You already have a request submitted! If you want to edit, go to your request panel from Control Panel"
                    }).tooltip("enable");
                } else {
                    $('.edit-stock-btn, .update-stock-btn').attr('disabled', false)
                        .parent().attr({
                        'data-placement': "top",
                        'data-toggle': "tooltip",
                        'title': null
                    }).tooltip("disable");
                }

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
        $('.update-stock-btn').show();
        toastr.info('You can edit the value which will modify the stock!');

    });

    $('.update-stock-btn').on('click', function () {
        let $data = {};
        $data['stock_id'] = $('.small-view .form input[type=hidden].stock_id').val();
        $data['book_id'] = $('.small-view .form input[type=hidden].book_id').val();
        $data['update_quantity'] = $('.small-view .form input[name=plus-minus-quantity]').val();

        if($data['update_quantity'] != 0){
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
        } else {
            toastr.warning("The quantity must be a positive or negative number different from 0");
        }
    });

    $('#stocks-datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [10, 20]
    });
});