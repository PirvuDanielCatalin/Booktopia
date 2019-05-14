$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    initPanelSliding();
    initImageDragAndDrop();
    initAutoSizeTextArea();

});

function initPanelSliding() {
    $('form .card-body').slideDown('slow');

    $('form .card-header').on('click', function () {
        $el = $(this).closest('.card').find('.card-body');

        if ($el.css('display') !== 'block') {
            $el.slideDown();
            $(this).find('.caret-up').removeClass('d-none');
            $(this).find('.caret-down').addClass('d-none');
        } else {
            $el.slideUp();
            $(this).find('.caret-up').addClass('d-none');
            $(this).find('.caret-down').removeClass('d-none');
        }
    });
}

function initAutoSizeTextArea() {
    $('textarea').on('keyup', function () {
        $(this).css('height', 'auto').css('padding', 0);
        $(this).css('height', this.scrollHeight);
    });
}

function initImageDragAndDrop() {
    $dropzone = $('.image-dropzone');
    $dropzone.on({
        'dragover': function () {
            return false;
        },
        'drop': function (event) {
            event.preventDefault();
            event.stopPropagation();

            let imageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp'];
            $imgFile = event.originalEvent.dataTransfer.files[0];

            if (imageTypes.includes(event.originalEvent.dataTransfer.files[0].type)) {

                $img = $(this).find('img');

                var data = new FormData();
                data.append('file', $imgFile);

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "/books/drag-and-drop-upload",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function () {
                        if ($img.length) {
                            $img.attr('src', '/images/helpers/DraggedAndDropped.jpg?' + Math.random() * 10000);
                        } else {
                            var img = $('<img />', {
                                src: '/images/helpers/DraggedAndDropped.jpg?' + Math.random() * 10000,
                            });
                            $img.replaceWith(img);
                        }
                        toastr.success("Upload done!");
                    },
                    error: function () {
                        toastr.error("The image couldn't be uploaded!");
                    }
                });
            } else {
                toastr.warning("The file must be an image!");
            }
        }
    });
}