<?php
    // Display Errors
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Import functions
    require_once '../../database/database.php';

    function loadContent($page) {
        $contentCount = 5;
        $offset = $page * $contentCount;
        $result = load_images($offset, $contentCount);
        
        if ($result) {
            foreach ($result as $item) {
                echo '<div class="gallery-item">';
                echo '<a href="content-details.php?id=' . $item['id'] . '">';
                echo '<img src="'.$item['filename'].'"/>';
                echo '</a>';
                echo '</div>';
            }
        }
    }

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    loadContent($page);
?>