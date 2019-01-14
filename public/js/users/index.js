$(function () {
    $('#users-datatable').DataTable();

    $('.exportExcel-users-btn').on('click', function () {
        window.location = '/users/exportExcel';
    });
    $('.exportPDF-users-btn').on('click', function () {
        window.location = '/users/exportPDF';
    });

    $('.update-users-roles-btn').on('click', function () {
        let $data = {};
        $('.tbl-user-info').toArray().forEach(function (info) {
            let $userId = $(info).find('.tbl-user-id').text();
            let $roleId = $(info).find('.tbl-user-roles #roleSelect').val();
            $data[$userId] = $roleId;
        });
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "/users/update-roles",
            data: $data,
            success: function (response) {
                $('.alert').text(response).show().delay(5000).hide(500);
                console.log(response);
            },
            error: function () {
                $('.alert').text('Error on updating users roles!').show().delay(5000).hide(500);
                console.log('Error on updating users roles!');
            }
        });
    });
});