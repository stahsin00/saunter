<?php
    require_once '../../database/database.php';

    $result = get_random_image();

    header('Content-Type: application/json');
    echo json_encode($result);
?>