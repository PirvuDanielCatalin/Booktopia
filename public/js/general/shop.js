$(function () {
    configLeafletMap();

    $('.shopping-cart-products-nr').text(Object.keys(sessionStorage).length);

    $('.shopping-cart-div').on('click', function () {
        window.location = "/shopping-cart?session=" + btoa(JSON.stringify(sessionStorage));// btoa = Base64 Encode
    });

    $('.search-bar-div button').on('click', function () {
        console.log(Object.keys(sessionStorage));
    });
});

function configLeafletMap() {
    var mymap = L.map('leaflet-map').setView([44.4306476, 26.051922699999977], 14);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '',
        id: 'mapbox.streets'
    }).addTo(mymap);
    var marker = L.marker([44.4306476, 26.051922699999977]).addTo(mymap);
    marker.bindPopup("<b>Program:</b><br>Monday - Saturday: 8:00 - 18:00<br>Sunday: Closed");
}