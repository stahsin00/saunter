<?php
    // Display errors
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Import functions
    require_once 'database/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saunter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <?php
            function loadSpecificContent($id) {
                if ($id < 1) {
                    echo "<div>Image not found</div>";
                }

                $result = get_content($id);
                
                if ($result) {
                    $description = "No description.";

                    if ($result['description']) {
                        $description = $result['description'];
                    }

                    echo '<div class="content-item">';
                    echo '<img src="'.$result['filename'].'" />';
                    echo '</div>';
                    echo '<div class="content-details">';
                    echo '<div class="content-location">'.$result['location']."</div>";
                    echo '<div class="content-source">'.$result['source']."</div>";
                    echo '<div class="content-description">'.$description."</div>";
                    echo '</div>';
                }
            }

            $id = isset($_GET['id']) ? $_GET['id'] : -1;
            loadSpecificContent($id);
        ?> 
        <div class="back"><a href="gallery.php">Back</a></div>
    </div>
</body>
</html>