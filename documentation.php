<?php
	// error reporting
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
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
        <main class="documentation">
            <div>
                <h2>Documentation</h2>
                <hr>
                <h3>How To Use</h3>
                <p>Saunter is an app meant to "stroll" through photos from across the world. 
                    Head to the <a href="gallery.php">gallery</a> to view all photos from the 
                    database. You can click on any image there to be directed to a page with more 
                    details on the image. You can also head to the <a href="upload.php">upload</a> 
                    page to contribute your own content. The <a href="map.php">map</a> page shows 
                    you all the locations with images currently in the database. Try to get photos 
                    from all over the world!</p>
                <hr>
                <h3>Features</h3>
                <div>
                    <h4>Content that is stored in and fetched from the database:</h4>
                    All image information are stored and retrieved from the database. <br>
                    <img src="uploads/IMG-656d509f7a8c17.44871437.jpg" alt="photo from the database"/><br>
                    <br>
                    <hr>
                    <h4>Pages: </h4>
                    The pages in the nav as well as a <a href="content-details.php?id=36">content details</a> page for specific image details.<br>
                    <img src="images/Capture5.png" alt="pages" class="documentation-img"/><br>
                    <br>
                    <hr>
                    <h4>Form, with validation: </h4>
                    The <a href="upload.php">upload</a> form and <a href="contact.php">feedback</a> form are both validated. <br>
                    <a href="contact.php"><img src="images/Capture9.png" alt="feedback form" class="documentation-img"/></a><br>
                    <br>
                    <hr>
                    <h4>Way for the user to add records in the database: </h4>
                    Users can <a href="upload.php">upload</a> images with the corresponding information to the database. <br>
                    <a href="upload.php"><img src="images/Capture6.png" alt="upload form" class="documentation-img"/></a><br>
                    <br>
                    <hr>
                    <h4>Element that uses CSS transitions: </h4>
                    All buttons gradually transitions their background color when hovered above.<br>
                    <img src="images/Capture7.png" alt="button" class="documentation-img"/><br>
                    <img src="images/Capture8.png" alt="button on hover" class="documentation-img"/><br>
                    <br>
                    <hr>
                    <h4>@keyframes animation: </h4>
                    The <a href="index.php">home page</a> features images from the database that have a keyframe animation to zoom in and out. <br>
                    <a href="index.php"><img src="images/Capture4.png" alt="home page" class="documentation-img"/></a><br>
                    <br>
                    <hr>
                    <h4>A layout that uses CSS Flexbox: </h4>
                    The nav menu as well as the <a href="upload.php">forms</a> use CSS Flexbox to place their contents in a column. <br>
                    <img src="images/Capture3.png" alt="nav menu" class="documentation-img"/><br>
                    <br>
                    <hr>
                    <h4>JavaScript functionality: </h4>
                    The nav menu is made visible through a button click when using a small screen size. Also,
                    the <a hre="gallery.php">gallery</a> page uses javascript to keep track of when the user has reached the bottom of the page 
                    so that more content can be loaded.<br>
                    <img src="images/Capture.png" alt="menu button" class="documentation-img"/><br>
                    <img src="images/Capture2.png" alt="open menu" class="documentation-img"/><br>
                    <hr>
                    <h4>Feature that I'm proud of: </h4>
                    I worked with the Google maps API to implement the <a href="map.php">maps</a> page and allow location 
                    autocomplete in the <a href="upload.php">upload</a> form. I'm also proud to learn how to implement an 
                    "endless scrolling" feature in the <a href="gallery.php">gallery</a> page.<br>
                    <a href="map.php"><img src="images/Capture10.png" alt="menu button" class="documentation-img"/></a><br>
                    <a href="upload.php"><img src="images/Capture11.png" alt="open menu" class="documentation-img"/></a><br>
                </div>
                <hr>
                <h3>Validation Screenshots</h3>
                The pages are all written in php files.<br>
                <img src="images/Capture12.png" alt="css validation" class="documentation-img"/><br>
                <hr>
                <h3>References</h3>
                <ul>
                    <li>https://www.youtube.com/watch?v=onu3w8kqASU</li>
                    <li>https://www.youtube.com/watch?v=qpUfj4zPxWQ</li>
                    <li>https://www.youtube.com/watch?v=Q_GraCZJRiQ</li>
                    <li>https://www.youtube.com/watch?v=c3MjU9E9buQ</li>
                    <li>https://developers.google.com/maps/documentation/javascript/place-autocomplete</li>
                    <li>https://developers.google.com/maps/documentation/javascript/overview#javascript</li>
                    <li>https://www.youtube.com/watch?v=Npclb_oa0wQ</li>
                    <li>https://www.youtube.com/watch?v=CdDXbvBFXLY</li>
                    <li>https://stackoverflow.com/questions/18932560/google-maps-insert-markers-by-city-name</li>
                    <li>https://developers.google.com/maps/documentation/javascript/custom-markers</li>
                    <li>https://stackoverflow.com/questions/12009367/javascript-event-handling-scroll-event-with-a-delay</li>
                    <li>Image sources on image pages</li>
                </ul>
            </div>
        </main>
    </div>
</body>
</html>