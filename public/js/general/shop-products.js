$(function () {
    $('.filter-panel-title').on('click', function () {
        $panel = $(this).closest('.filter-panel').find('.filter-panel-div');
        if ($panel.css('display') === 'block') {
            $panel.slideUp(300);
        } else {
            $panel.slideDown(300);
        }
    });
});