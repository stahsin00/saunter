<?php
	// Display Errors
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Import functions
	require_once 'database/database.php';
    require_once 'templates/functions/upload-validation.php';

    // Validate form submission
	if ($_SERVER["REQUEST_METHOD"] == "POST" && validate()) {
        $img_name = $_FILES['my_image']['name'];
        $tmp_name = $_FILES['my_image']['tmp_name'];

        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
        $img_upload_path = 'uploads/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        // Insert data into the database
        $name = $img_upload_path;
        $description = $_POST["description"];
        $source = $_POST["source"];
        $location = $_POST["locationInput"];

        upload_image($name, $description, $source, $location);
    }

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
        <main class="form">
            <h2>Upload</h2>

            <form action="http://localhost/saunter/upload.php" method="post" enctype="multipart/form-data">

                <label for="my_image">  <span class="required-field">*</span>Choose File:
                    <input type="file" name="my_image" id="my_image" required>
                </label>
                <?php the_validation_message('my_image'); ?>

                <label for="source">  <span class="required-field">*</span>Source:
                    <input type="text" name="source" id="source" class="textInput" required>
                </label>
                <?php the_validation_message('source'); ?>

                <label for="locationInput">  <span class="required-field">*</span>Location:
                    <input type="text" name="locationInput" id="locationInput" class="textInput" placeholder="Enter location" required/>
                </label>
                <?php the_validation_message('location'); ?>

                <label for="description"> Description:
                    <textarea id="description" class="textInput" name="description" rows="4"></textarea>
                </label>

                <div class="buttons">
                    <button type="submit" name="submit" value="Upload">Upload</button>
                </div>

            </form>
            <?php the_results(); ?>
        </main>
        <script>
            async function initMap() {
                const locationInput = document.getElementById('locationInput');
                const autocomplete = new google.maps.places.Autocomplete(locationInput, {
                    types: ['geocode'],
                });

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    let near_place = autocomplete.getPlace();
                });
            }
        </script>
    </div>
</body>
</html>