<?php
	// error reporting
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Import functions
	require_once 'templates/functions/contact-validation.php';
    require_once 'database/database.php';

	// Validate form submission
	if ($_SERVER["REQUEST_METHOD"] == "POST" && validate()) {
        // Get form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
    
        // Insert data into the database
        submit_feedback($name, $email, $message);
    }
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
        <main class="form">
            <h2>Feedback</h2>

            <form action="http://localhost/saunter/contact.php" method="post">

                <label for="name">  <span class="required-field">*</span>Name:
                    <input type="text" name="name" id="name" class="textInput" required>
                </label>
                <?php the_validation_message('name'); ?>

                <br>

                <label for="email">  <span class="required-field">*</span>Email:
                    <input type="text" name="email" id="email" class="textInput" required>
                </label>
                <?php the_validation_message('email'); ?>

                <br>

                <label for="message"> <span class="required-field">*</span>Message:
                    <textarea id="message" name="message" rows="4" class="textInput" required></textarea>
                </label>
                <?php the_validation_message('message'); ?>

                <br>

                <div class="buttons">
                    <button type="reset" name="reset" value="Reset">Reset</button>
                    <button type="submit" name="submit" value="Submit">Submit</button>
                </div>

            </form>
            <?php the_results(); ?>
        </main>
    </div>
</body>
</html>