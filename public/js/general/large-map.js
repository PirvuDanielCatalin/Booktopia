$(function () {
    var mylmap = L.map("leaflet-large-map")
        .invalidateSize()
        .setView([45.9511496866914, 24.873046875000004], 7);

    L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 18,
        attribution: "",
        id: "mapbox.streets"
    }).addTo(mylmap);

    var coords = [
        [44.4306476, 26.051922699999977],
        [44.4279188617435, 26.104556322097782],
        [45.45218339948006, 28.031272888183594],
        [46.77168060499864, 23.62644195556641]
    ];

    coords.forEach(function (position) {
        var marker = L.marker(position).addTo(mylmap);
        marker.bindPopup("<b>Program:</b><br>Monday - Saturday: 8:00 - 18:00<br>Sunday: Closed");
    });

    $('#find-closest-shop').on('click', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                let marker = 0;
                let minValue = 999;

                for (let i = 0; i < coords.length; i++) {
                    let xs = (coords[i][0] - position.coords.latitude) * (coords[i][0] - position.coords.latitude);
                    let ys = (coords[i][1] - position.coords.longitude) * (coords[i][1] - position.coords.longitude);
                    let distance = Math.sqrt(xs + ys);

                    if (distance < minValue) {
                        minValue = distance;
                        marker = i;
                    }
                }

                mylmap.panTo(new L.LatLng(coords[marker][0], coords[marker][1]));
                setTimeout(function () {
                    mylmap.setZoom(15);
                }, 1000);
            });
        } else {
            toastr.warning("Geolocation is not supported by this browser.");
        }
    });
});