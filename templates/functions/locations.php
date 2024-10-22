<?php
    // Display Errors
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Import functions
    require_once '../../database/database.php';

    $result = get_locations();
    if ($result) {
        $jsonLocations = json_encode($result);
        echo $jsonLocations;
    }
?>