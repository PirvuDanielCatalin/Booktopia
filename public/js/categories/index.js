$(function () {
    $('.category-btn').on('click', function () {
        let categoryId = $(this).attr('category-id');
        $('#infoCategoryModal').attr('category-id', categoryId);
        $('#deleteCategoryModal').attr('category-id', categoryId);
    });
});