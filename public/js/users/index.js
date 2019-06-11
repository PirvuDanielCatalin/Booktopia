$(function () {
    $('#users-datatable').DataTable();

    $('.tbl-user-info').on('click', function () {
        $data = {};
        $data['user_id'] = $(this).find('.tbl-user-id').text();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "/users/get-user-role",
            data: $data,
            success: function (response) {
                $('.small-view .form input[type=hidden]').val(response.id);
                $('.small-view .form input[name=name]').val(response.name);
                $('.small-view .form input[name=email]').val(response.email);
                $('.small-view .form select#roleSelect option').toArray().forEach(function (elem) {
                    if ($(elem).text().trim() === response.roles[0].name)
                        $(elem).attr('selected', true);
                });

                $('.users_page_right_panel_img').hide('slow');
                $('.users_page_right_panel').show('slow');
            },
            error: function () {
                toastr.error('Error on getting user role!');
            }
        });
    });

    $('.update-user-role-btn').on('click', function () {
        let $data = {};
        $data['user_id'] = $('.small-view .form input[type=hidden]').val();
        $data['new_role'] = $('.small-view .form select#roleSelect').val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "/users/update-role",
            data: $data,
            success: function (response) {
                toastr.success(response.message);

                $('.users_page_right_panel').hide();
                $('.users_page_right_panel_img').show();
            },
            error: function () {
                toastr.error("Error on updating user role!");
            }
        });
    });
});