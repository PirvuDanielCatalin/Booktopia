$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $(".add-to-cart-btn").on('click', function () {
        let bookId = $(this).closest('.col-md-8.card.border-0').find('input[type=hidden]').val();
        if ($.session.get('book_' + bookId)) {
            let newValue = parseInt($.session.get('book_' + bookId)) + 1;
            $.session.set('book_' + bookId, newValue);
            toastr.info('The product was added in your shopping cart!');
        } else {
            $.session.set('book_' + bookId, 1);
            $('.shopping-cart-products-nr').text(Object.keys(sessionStorage).length);
            toastr.info('The product was added in your shopping cart!');
        }
    });

    $(".give-me-a-sample-btn").on('click', function () {
        alert('Google Books API')
    });

    $(".add-to-wishlist-btn").on('click', function () {
        $userId = $('.rating-bar-div').find('input[type=hidden]').val();
        if($userId){
            $data = {};
            $data['bookId'] = $('input[name=book-id]').val();
            $data['userId'] = $userId;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "/profiles/add-to-wishlist",
                data: $data,
                success: function (response) {
                    if (response.status === "success") {
                        toastr.success(response.message);
                    } else if (response.status === "error") {
                        toastr.info(response.message);
                    }
                },
                error: function () {
                    toastr.error('Error on adding book to wishlist!');
                }
            });
        }else {
            toastr.warning('You must be logged in to add the book to wishlist!');
        }
    });

    configRating();
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

        $userId = $('.rating-bar-div').find('input[type=hidden]').val();
        if($userId){
            $data = {};
            $data['bookId'] = $('input[name=book-id]').val();
            $data['userId'] = $userId;
            $data['stars'] = count;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "/books/rate",
                data: $data,
                success: function (response) {
                    if (response.status === "success") {
                        toastr.success(response.message);
                    } else if (response.status === "error") {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('Error on rating book!');
                }
            });
        }
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
        $('#confirmDeleteComment').attr('book-comment', $(this).attr('book-comment'));
        let commentText = $(this).closest('.comment-div').find('.comment-text').text();
        $('#deleteCommentModal .modal-body').text("Are you sure you want to delete comment '" + commentText + "' ?");
    });

    $('#confirmDeleteComment').on('click', function () {
        var commentId = $(this).attr('book-comment');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "DELETE",
            url: "/comments/" + commentId,
            success: function (response) {
                if (response.status === "success") {
                    $('#deleteCommentModal').modal('toggle');
                    toastr.success(response.message);
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                } else if (response.status === "error") {
                    $('#deleteCommentModal').modal('toggle');
                    toastr.error(response.message);
                }
            },
            error: function () {
                toastr.error('Error trying to delete comment!');
            }
        });
    });

    $('.like-comment-btn, .dislike-comment-btn').on('click', function () {
        if (!$.cookie('comment_rate_status')) {
            $data = {};
            $data['commentId'] = $(this).closest('.comment-div').attr('book-comment');
            if ($(this).hasClass('like-comment-btn')) {
                $data['action'] = 'like';
            } else if ($(this).hasClass('dislike-comment-btn')) {
                $data['action'] = 'dislike';
            }

            $.cookie('comment_rate_status', 'rated');

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "/comments/rate",
                data: $data,
                success: function (response) {
                    if (response.status === "success") {
                        toastr.success(response.message);
                        window.location.reload();
                    } else if (response.status === "error") {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('Error trying to rate comment!');
                }
            });
        }
    });
}