<?php
    // Display errors
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
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
        <?php include 'header.php'; ?>
        <main>
            <div id="random-content">
                <img id="rotating-image" src="uploads/IMG-656d4444175ec8.56856589.jpg" alt="Changing Photos from around the world.">
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rotatingImage = document.getElementById('rotating-image');

            async function fetchRandomImage() {
                try {
                    const response = await fetch('templates/functions/random-image.php');
                    if (!response.ok) {
                        throw new Error('Network error.');
                    }
                    const data = await response.json();
                    return data.filename;
                } catch (error) {
                    console.error('Error fetching random image:', error);
                }
            }

            async function rotateImages() {
                setInterval(async () => {
                    const filename = await fetchRandomImage();
                    rotatingImage.src = filename;
                }, 5000);
            }

            rotateImages();
        });
    </script>
</body>
</html>