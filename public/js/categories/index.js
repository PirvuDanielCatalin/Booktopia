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

                $formrows.eq(2).find('.books-panel').empty();
                response.books.forEach(function (elem) {
                    $div = $('<div class="d-flex p-2 book-panel" book-id="' + elem.id + '">\n' +
                        '<div class="book-panel-info">\n' +
                        elem.title + '\n' +
                        '</div>\n' +
                        '<div class="book-panel-btn">\n' +
                        '<button class="btn btn-outline-danger remove-book-from-category"\n' +
                        'data-target="#removeBookFromCategoryModal"\n' +
                        'data-toggle="modal">\n' +
                        '<i class="far fa-trash-alt"></i>\n' +
                        '</button>\n' +
                        '</div>\n' +
                        '</div>');
                    $formrows.eq(2).find('.books-panel').append($div);
                });

                $('.remove-book-from-category').on('click', function () {
                    let categoryName = $('.categories_page_right_panel .col-md-12.form-input.p-2').eq(1).find('input').val();
                    let categoryId = $('.categories_page_right_panel .category_id').val();
                    let bookId = $(this).closest('.book-panel').attr('book-id');
                    let bookName = $(this).closest('.book-panel').find('.book-panel-info').text().trim();
                    let question = 'Are you sure you want to remove book ' + bookName + ' from ' + categoryName + ' category?';
                    $('#removeBookFromCategoryModal .modal-body').text(question);
                    $('#removeBookFromCategoryModal #confirmRemoveBookFromCategory').attr('category-id', categoryId).attr('book-id', bookId);
                });

                $('#confirmRemoveBookFromCategory').on('click', function () {
                    $data = {};
                    $data['categoryId'] = $(this).attr('category-id');
                    $data['bookId'] = $(this).attr('book-id');
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: "POST",
                        url: "/categories/remove-book",
                        data: $data,
                        success: function (response) {
                            if (response.status === "success") {
                                $('#removeBookFromCategoryModal').modal('toggle');
                                toastr.success(response.message);
                                $('.books-panel .book-panel[book-id=' + $data['bookId'] + ']').remove();
                            } else if (response.status === "error") {
                                $('#removeBookFromCategoryModal').modal('toggle');
                                toastr.error(response.message);
                            }
                        },
                        error: function () {
                            toastr.warning('Error on removing book from category!');
                        }
                    });
                });


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
                if (response.status === "success") {
                    toastr.success(response.message);
                    setTimeout(function () {
                        window.location = "/categories";
                    }, 1000);
                } else if (response.status === "error") {
                    toastr.error(response.message);
                }
            },
            error: function () {
                toastr.warning('Error on deleting category!');
            }
        });
    });
});