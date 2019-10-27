$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.edit-profile-btn').on('click', function () {
        $(this).hide();
        $('.save-profile-btn').show();
        $('.profile-info-input').attr('disabled', false);
        toastr.info('Now you can edit profile info!');
    });

    $('.save-profile-btn').on('click', function () {
        $(this).hide();
        $('.edit-profile-btn').show();
        $('.profile-info-input').attr('disabled', true);

        $profileId = $('input[name=profile-id]').val();
        $data = {};
        $data['first_name'] = $('input[name=first_name]').val().trim();
        $data['last_name'] = $('input[name=last_name]').val().trim();
        $data['phone'] = $('input[name=phone]').val().trim();
        $data['adress'] = $('input[name=adress]').val().trim();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "PUT",
            url: "/profiles/" + $profileId,
            data: $data,
            success: function (response) {
                if (response.status === "success") {
                    toastr.success(response.message);
                } else if (response.status === "error") {
                    toastr.error(response.message);
                }
            },
            error: function () {
                toastr.warning('Error on updating profile!');
            }
        });
    });

    $('.wishlist-div > div:first-child').on('click', function () {
        $('.wishlist-sliding-panel').slideToggle();
    });

    $('.purchase-history-div > div:first-child').on('click', function () {
        $('.purchase-history-sliding-panel').slideToggle();
    });

    if ($('.thanks-for-purchases img').attr('alt') === "1")
    {
        $('.thanks-for-purchases img').on('click', function () {
            alert("Surprise");
            window.location = '/surprise';
        })
    }

    $('.thank-you-for-purchases-reload').on('click', function () {
        window.location = window.location.href;
    });

    $('.td.thrd-clmn span').on('click', function () {
        $id = $(this).closest('.tr').find('input[type=hidden]').val();
        var win = window.open('/invoices/' + $id, '_blank');
        win.focus();
    });

    $('.shop-footer').on('hover', function () {
       alert('dsds');
    });
});
