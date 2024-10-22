<?php
	// Display Errors
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

    $google_maps_api_key = getenv('GOOGLE_MAPS_API_KEY') ?? '';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saunter</title>
    <link rel="stylesheet" href="style.css">
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo htmlspecialchars($google_maps_api_key); ?>"
        defer
    ></script>
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'; ?>
        <main>
            <div id="map"></div>
        </main>
    </div>
    <script>
        async function initMap() {
            const { Map } = await google.maps.importLibrary("maps");

            map = new Map(document.getElementById("map"), {
                mapId: "db7527f7cd819057",
                center: { lat: 49.2827, lng: -123.1207 },
                zoom: 8,
            });

            let geocoder = new google.maps.Geocoder();

            try {
                const response = await fetch(`templates/functions/locations.php`);
                
                if (!response.ok) {
                    throw new Error('Network error.');
                }

                const content = await response.json();

                content.forEach( (location) => {
                    geocoder.geocode( { 'address': location.location }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            newAddress = results[0].geometry.location;
                            let latlng = new google.maps.LatLng(parseFloat(newAddress.lat()),parseFloat(newAddress.lng()));
                            const marker = new google.maps.Marker({
                                position: latlng,
                                map: map,
                                title: location.location,
                            });
                        }
                    });
                });
            } catch (error) {
                console.error('Error fetching content:', error);
            }
        }
    </script>
    
</body>
</html>