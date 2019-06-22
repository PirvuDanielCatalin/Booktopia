$(function () {
    $('.tbl-requirement-info').on('click', function () {
        $data = {};
        $data['requirement_id'] = $(this).attr('requirement-id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "/requirements/get-requirement",
            data: $data,
            success: function (response) {
                $('.small-view .requirement_id').val(response.requirement_id);
                $('.small-view input[name=title]').val(response.book.title);
                $('.small-view input[name=name]').val(response.user.name);

                if (response.increment === 0)
                    $('.small-view input[name=quantity]').val(response.increment + ' ( Book creation )');
                if (response.increment < 0)
                    $('.small-view input[name=quantity]').val(response.increment + ' ( Decreasing stock )');
                if (response.increment > 0)
                    $('.small-view input[name=quantity]').val(response.increment + ' ( Increasing stock )');

                if (response.status !== 0) {
                    $('.accept-requirement-btn, .deny-requirement-btn').hide();
                    $('.delete-requirement-btn').hide();
                } else {
                    $('.accept-requirement-btn, .deny-requirement-btn').show();
                    $('.delete-requirement-btn').show();
                }

                $('.show-requirement-btn').on('click', function () {
                    var win = window.open('/books/' + response.book.book_id, '_blank');
                    win.focus();
                });

                $modal = $('#RequirementModal');
                $modal.find('.btn-success').attr('requirement-id', response.requirement_id);

                $('.accept-requirement-btn').on('click', function () {
                    $modal.find('#RequirementModalLabel').text('Accept requirement');
                    $modal.find('.modal-body').text('Are you sure you want to accept this?');
                    $modal.find('.btn-success').text('Accept');
                });

                $('.deny-requirement-btn').on('click', function () {
                    $modal.find('#RequirementModalLabel').text('Deny requirement');
                    $modal.find('.modal-body').text('Are you sure you want to deny this?');
                    $modal.find('.btn-success').text('Deny');
                });

                $modal.find('.btn-success').on('click', function () {
                    $data = {};
                    $data['action'] = $(this).text();
                    $data['requirement'] = $(this).attr('requirement-id');
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: "PUT",
                        url: "/requirements/" + $data['requirement'],
                        data: $data,
                        success: function (inner_response) {
                            if (inner_response.status === "success") {
                                $modal.modal('toggle');
                                toastr.success(inner_response.message);
                                window.location.reload();
                            } else {
                                $modal.modal('toggle');
                                toastr.error(inner_response.message);
                            }
                        },
                        error: function () {
                            $modal.modal('toggle');
                            toastr.error('Requirement status change failed!');
                        }
                    });
                });

                $('.delete-requirement-btn').on('click', function () {
                    $('#deleteRequirementModal')
                        .find('#confirmDeleteRequirement')
                        .attr('requirement-id', response.requirement_id);
                });

                $('#confirmDeleteRequirement').on('click', function () {
                    $data = {};
                    $data['requirement'] = $(this).attr('requirement-id');
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: "DELETE",
                        url: "/requirements/" + $data['requirement'],
                        data: $data,
                        success: function (inner_response) {
                            if (inner_response.status === "success") {
                                $('#deleteRequirementModal').modal('toggle');
                                toastr.success(inner_response.message);
                                window.location.reload();
                            } else {
                                $('#deleteRequirementModal').modal('toggle');
                                toastr.error(inner_response.message);
                            }
                        },
                        error: function () {
                            $('#deleteRequirementModal').modal('toggle');
                            toastr.error('Requirement status change failed!');
                        }
                    });
                });

                $('.requirements_page_right_panel_img').hide('slow');
                $('.requirements_page_right_panel').show('slow');
            },
            error: function () {
                toastr.error('Error trying to get requirement data!');
            }
        });

    });

    $('#requirements-datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [10, 20]
    });
});