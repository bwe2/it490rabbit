<?php
if (isset($_POST["zip"])) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Order Shops</title>
</head>

<body>
<div style="width:100%;height:100vh" id="map">
</div>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script>
var map;
var infowindow;

function initMap() {
    const geocode_api = "https://maps.googleapis.com/maps/api/geocode/json?address="+"<?= $_POST['zip'] ?>"+"&key=AIzaSyDfyOPopzHTpSq03NZKF2LeyaRPK8CETzE";
    $.ajax({
        url: geocode_api, 
        success: function(data) {
            if (data && data.results.length>0)
            {
                const pyrmont = data.results[0].geometry.location;
                map = new google.maps.Map(document.getElementById('map'), {
                    center: pyrmont,
                    zoom: 10
                });

                infowindow = new google.maps.InfoWindow();
                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch({
                    location: pyrmont,
                    radius: 30000,
                    type: ['store']
                }, callback);
            }

        }
    });
}

function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map : map,
        position : place.geometry.location
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    });
}
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5Pu9ujufgXi8YdHlBTaCtBuawJjRMeiM&libraries=places&callback=initMap"
    async defer></script>
</body>

</html>

<?php } ?>