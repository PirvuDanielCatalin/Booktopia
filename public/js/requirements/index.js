$(function () {
    $('#requirements-datatable').DataTable();

    $('.tbl-requirement-info').on('click', function () {
        $('.requirements_page_right_panel_img').hide('slow');
        $('.requirements_page_right_panel').show('slow');
    });
});