$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    configRating();

    $(".add-to-cart-btn").on('click', function () {
        let bookId = $(this).closest('.col-md-8').find('input[type=hidden]').val();
        if (sessionStorage.getItem('book_' + bookId)) {
            let newValue = (parseInt(sessionStorage.getItem('book_' + bookId)) + 1);
            sessionStorage.setItem('book_' + bookId, newValue.toString());
        } else {
            sessionStorage.setItem('book_' + bookId, '1');
            $('.shopping-cart-products-nr').text(Object.keys(sessionStorage).length);
        }
    });

    $(".give-me-a-sample-btn").on('click', function () {
        alert('Google Books API')
    });

    $(".add-to-wishlist-btn").on('click', function () {
        alert('AJAX cu adaugare in wishlist')
    });

    initComments();
});

function configRating() {
    $('.star').on('click', function () {
        $stars = $('.star');
        $stars.removeClass('star-selected');
        var count = $(this).attr('name');
        for (var i = 0; i < count; i++) {
            $stars.eq(i).addClass('star-selected');
        }

        //// Ajax pt salvarea ratingului
    });
}

function initComments() {
    $textareadiv = $('.comment-textarea-div').hide();

    $('.add-comment-btn').on('click', function () {
        $textareadiv.show();
    });

    $('.post-comment-btn').on('click', function () {
        $data = {};
        $data['bookId'] = $('input[name=book-id]').val();
        $data['text'] = $(this).closest('.comment-textarea-div').find('textarea').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "/comments",
            data: $data,
            success: function (response) {
                if (response.status === "success") {
                    toastr.success(response.message);
                    $textareadiv.hide();
                    setTimeout(function () {
                        window.location.reload();
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
                toastr.error('Error on posting comment!');
            }
        });
    });

    $('.edit-comment-btn').on('click', function () {
        if ($('textarea.comment-text').length === 0) {
            $div = $(this).closest('.comment-div').find('.comment-text');
            $text = $div.text().trim();
            $textarea = $('<textarea class="pl-3 pr-3 comment-text">' + $text + '</textarea>');
            $div.replaceWith($textarea);
            $textarea.focus();
            $(this).hide();
            $(this).closest('.edit-delete-btns').find('.save-comment-btn').show();
            toastr.info('The comment can be edited!');
        } else {
            toastr.error('You can edit one comment at a time!');
        }
    });

    $('.save-comment-btn').on('click', function () {
        $data = {};
        $data['text'] = $('textarea.comment-text').val();
        let commentId = $(this).attr('book-comment');

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "PUT",
            url: "/comments/" + commentId,
            data: $data,
            success: function (response) {
                if (response.status === "success") {
                    toastr.success(response.message);
                    setTimeout(function () {
                        window.location.reload();
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
                toastr.error('Error on updating comment!');
            }
        });
    });

    $('.delete-comment-btn').on('click', function () {
        alert('delete');
    });

    $('.like-comment-btn').on('click', function () {
        alert('like');
    });

    $('.dislike-comment-btn').on('click', function () {
        alert('dislike');
    });
}