$(function () {
    var mylmap = L.map("leaflet-large-map")
        .invalidateSize()
        .setView([45.9511496866914, 24.873046875000004], 7);

    L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 18,
        attribution: "",
        id: "mapbox.streets"
    }).addTo(mylmap);

    var marker = L.marker([44.4306476, 26.051922699999977]).addTo(mylmap);
    marker.bindPopup("<b>Program:</b><br>Monday - Saturday: 8:00 - 18:00<br>Sunday: Closed");
    var marker = L.marker([44.4279188617435, 26.104556322097782]).addTo(mylmap);
    marker.bindPopup("<b>Program:</b><br>Monday - Saturday: 8:00 - 18:00<br>Sunday: Closed");
    var marker = L.marker([45.45218339948006, 28.031272888183594]).addTo(mylmap);
    marker.bindPopup("<b>Program:</b><br>Monday - Saturday: 8:00 - 18:00<br>Sunday: Closed");
    var marker = L.marker([46.77168060499864, 23.62644195556641]).addTo(mylmap);
    marker.bindPopup("<b>Program:</b><br>Monday - Saturday: 8:00 - 18:00<br>Sunday: Closed");

});