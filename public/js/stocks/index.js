$(function () {
    $('#stocks-datatable').DataTable();

    $('.tbl-book-info').on('click', function () {
        $('.stocks_page_right_panel_img').hide('slow');
        $('.stocks_page_right_panel').show('slow');
    });
});