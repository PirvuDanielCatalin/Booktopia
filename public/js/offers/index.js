$(function () {
    $('#offers-datatable').DataTable();

    $('.tbl-book-info').on('click', function () {
        $('.offers_page_right_panel_img').hide('slow');
        $('.offers_page_right_panel').show('slow');
    });
});