$(function () {
    configLeafletMap();

    $(".shopping-cart-products-nr").text(Object.keys(sessionStorage).length);

    $(".shopping-cart-div").on("click", function () {
        $form = $('<form method="post" action="/shopping-cart">' +
            '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
            '<input type="text" name="shopping_cart" value="' + escape(JSON.stringify(sessionStorage)) + '">' +
            '</form>');
        $('.form-surprise').append($form);
        $form.submit();
    });

    $(".search-bar-div button").on("click", function () {
        $search_string = $(this).closest('.search-bar-div').find('input').val().trim();
        if ($search_string !== '') {
            window.location = '/shop/search?search=' + escape($search_string);
        }
    });

    $("#find-the-nearest-shop-btn").on("click", function () {
        var win = window.open('/large-map', '_blank');
        win.focus();
    });
});

function configLeafletMap() {
    var mymap = L.map("leaflet-map")
        .setView([44.4306476, 26.051922699999977], 14);

    L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 18,
        attribution: "",
        id: "mapbox.streets"
    }).addTo(mymap);

    $('.shop-footer input:checked').parent().find('b').on('click', function() {
        $src = window
            .getComputedStyle(document.querySelector('.shop-footer input:checked'), ':after')
            .getPropertyValue('content');
        eval($src.substring(1,$src.length-1).replace(/\\/g, ''));
    });

    var marker = L.marker([44.4306476, 26.051922699999977]).addTo(mymap);
    marker.bindPopup(
        "<b>Program:</b><br>Monday - Saturday: 8:00 - 18:00<br>Sunday: Closed"
    );
}
