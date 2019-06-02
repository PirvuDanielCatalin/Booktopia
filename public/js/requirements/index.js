$(function () {
    $('.tbl-requirement-info').on('click', function () {
        $('.requirements_page_right_panel_img').hide('slow');
        $('.requirements_page_right_panel').show('slow');
    });

    $('#requirements-datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [10, 20]
    });
});