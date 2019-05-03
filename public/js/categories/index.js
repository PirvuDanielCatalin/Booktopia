$(function () {
    $('.add-category-btn').on('click', function () {
        $('.categories_page_right_panel .category_id').val('');
        $formrows = $('.categories_page_right_panel .col-md-12.form-input.p-2');
        $formrows.eq(0).hide();
        $formrows.eq(1).find('input').val('').attr('disabled', false);
        $formrows.eq(2).hide();

        $('.categories_page_right_panel_img').hide('slow');
        $('.categories_page_right_panel').show('slow');
    });

    $('.category-btn').on('click', function () {
        $data = {};
        $data['category_id'] = $(this).attr('category-id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "/categories/get-category",
            data: $data,
            success: function (response) {
                $('.categories_page_right_panel .category_id').val(response.id);
                $formrows = $('.categories_page_right_panel .col-md-12.form-input.p-2');
                $formrows.eq(0).show();
                $formrows.eq(1).find('input').val(response.name).attr('disabled', true);
                $formrows.eq(2).show();

                $('.categories_page_right_panel_img').hide('slow');
                $('.categories_page_right_panel').show('slow');
            },
            error: function () {
                toastr.warning('Error on getting category data!');
            }
        });
    });

    $('.edit-category-btn').on('click', function () {
        $('.categories_page_right_panel .col-md-12.form-input.p-2 input').attr('disabled', false);
    });

    $('.delete-category-btn').on('click', function () {
        let name = $('.categories_page_right_panel .col-md-12.form-input.p-2').eq(1).find('input').val();
        let id = $('.categories_page_right_panel .category_id').val();
        $('#deleteCategoryModal .modal-body').text('Are you sure you want to delete ' + name + ' category?');
        $('#deleteCategoryModal #confirmDeleteCategory').attr('category-id', id);
    });

    $('#confirmDeleteCategory').on('click', function () {
        var categoryId = $(this).attr('category-id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "DELETE",
            url: "/categories/" + categoryId,
            success: function ($response) {
                console.log($response);
                window.location = "/categories";
            },
            error: function () {
                toastr.warning('Error on deleting category!');
            }
        });
    });
});