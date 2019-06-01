$(function () {
    $('.filter-panel-title').on('click', function () {
        $panel = $(this).closest('.filter-panel').find('.filter-panel-div');
        $panel.slideToggle(300);
    });

    $('input[type=checkbox]').on('click', function () {
        $applyFiltersBtn = $('.apply-filters-div');
        $applyFiltersBtn.show();
        // $checked = $('input[type=checkbox]:checked');
        // if ($checked.length === 0)
        //     $applyFiltersBtn.hide();
    });

    // $('.apply-filters-btn').on('click', function () {
    //     $checked = $('input[type=checkbox]:checked');
    //     $data = {};
    //     $data['price_filters'] = [];
    //     $data['category_filters'] = [];
    //     for (let i = 0; i < $checked.length; i++) {
    //         $filter = $checked.eq(i).closest('label').text().trim();
    //         if ($checked.eq(i).closest('.filter-panel').hasClass('category-filters-panel'))
    //             $data['category_filters'].push($filter);
    //         if ($checked.eq(i).closest('.filter-panel').hasClass('price-filters-panel'))
    //             $data['price_filters'].push($filter);
    //     }
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         type: "POST",
    //         url: "/shop/filters",
    //         data: $data,
    //         success: function (response) {
    //
    //         },
    //         error: function () {
    //
    //         }
    //     });
    // });
});