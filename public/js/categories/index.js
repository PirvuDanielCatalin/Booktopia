$(function () {
    toastr.options = {"timeOut": "5000"};

    // Getter
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
                $formrows.eq(3).hide();

                $('.categories_page_right_panel_img').hide('slow');
                $('.categories_page_right_panel').show('slow');
            },
            error: function () {
                toastr.warning('Error on getting category data!');
            }
        });
    });

    // Create
    $('.add-category-btn').on('click', function () {
        $('.categories_page_right_panel .category_id').val('');
        $formrows = $('.categories_page_right_panel .col-md-12.form-input.p-2');
        $formrows.eq(0).hide();
        $formrows.eq(1).find('input').val('').attr('disabled', false);
        $formrows.eq(2).hide();
        $formrows.eq(3).show();

        $('.categories_page_right_panel_img').hide('slow');
        $('.categories_page_right_panel').show('slow');
    });

    // Edit
    $('.edit-category-btn').on('click', function () {
        $formrows = $('.categories_page_right_panel .col-md-12.form-input.p-2');
        $formrows.eq(1).find('input').attr('disabled', false);
        $formrows.eq(3).show();
        toastr.info("Category can be modified now!");
    });

    // Store && Update
    $('.save-category-btn').on('click', function () {
        $data = {};
        $data['name'] = $('.categories_page_right_panel .col-md-12.form-input.p-2 input').val();

        // Store
        if ($('.categories_page_right_panel .col-md-12.form-input.p-2').eq(0).css('display') === "none") {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: '/categories',
                data: $data,
                success: function (response) {
                    if (response.status === "success") {
                        toastr.success(response.message);
                        setTimeout(function () {
                            window.location = "/categories";
                        }, 1000);
                    } else if (response.status === "error") {
                        Object.keys(response.errors).forEach(function (key) {
                            response.errors[key].forEach(function (message) {
                                toastr.error(message);
                            });
                        });
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.warning('Error on saving category!');
                }
            });
        } else {
            let categoryId = $('.categories_page_right_panel .category_id').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "PUT",
                url: "/categories/" + categoryId,
                data: $data,
                success: function (response) {
                    if (response.status === "success") {
                        toastr.success(response.message);
                        setTimeout(function () {
                            window.location = "/categories";
                        }, 1000);
                    } else if (response.status === "error") {
                        Object.keys(response.errors).forEach(function (key) {
                            response.errors[key].forEach(function (message) {
                                toastr.error(message);
                            });
                        });
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.warning('Error on updating category!');
                }
            });
        }
    });

    // Delete
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
            success: function (response) {
                toastr.success(response.message);
                setTimeout(function () {
                    window.location = "/categories";
                }, 1000);
            },
            error: function () {
                toastr.warning('Error on deleting category!');
            }
        });
    });
});