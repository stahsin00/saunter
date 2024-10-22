<?php
// Global result of form validation
$valid = false;

// Global array of validation messages. For valid fields, message is ""
$val_messages = Array();

// Output the results if all fields are valid.
function the_results()
{
  global $valid;

    // Validate form submission
	if ($_SERVER["REQUEST_METHOD"] == "POST" && $valid) {
        echo "<div class=\"success-message\">File uploaded.</div>";
    }
}

// Check each field to make sure submitted data is valid. 
function validate()
{
    global $valid;
    global $val_messages;

    // Validate form submission
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $checkValid = true;

        if (!isset($_FILES['my_image'])) {
            $checkValid = false;
            $val_messages['my_image'] = "Please choose a file.";
        } else if ( $_FILES['my_image']['error'] != 0) {
            $checkValid = false;
            $val_messages['my_image'] = "An error occured with file upload.";
        } else if ($_FILES['my_image']['size'] > 7000000) {
            $checkValid = false;
            $val_messages['my_image'] = "File size too large.";
        } else {
            $img_ex = pathinfo($_FILES['my_image']['name'], PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (!in_array($img_ex_lc, $allowed_exs)) {
                $checkValid = false;
                $val_messages['my_image'] = 'File must be of type jpg, jpeg, png.';
            } else {
                $val_messages['my_image'] = '';
            }
        }

        if (preg_match('#^$#', $_POST['source']) == true) {
            $checkValid = false;
            $val_messages['source'] = 'Image source is required.';
        } else {
            $val_messages['source'] = '';
        }

        if (preg_match('#^$#', $_POST['locationInput']) == true) {
            $checkValid = false;
            $val_messages['location'] = 'Image location is required.';
        } else {
            $address = urlencode($_POST['locationInput']);
            $apiKey = urlencode(getenv('API_KEY') ?? '');

            $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$apiKey}";

            $response = file_get_contents($url);

            if ($response === false) {
                $checkValid = false;
                $val_messages['location'] = 'Network error.';
            }

            $data = json_decode($response, true);

            if ($data['status'] != 'OK') {
                $checkValid = false;
                $val_messages['location'] = 'Please enter a valid location.';
            } else {
                $val_messages['location'] = '';
            }
        }

        $valid = $checkValid;
        return $valid;
    }
}

// Display error message if field not valid. Displays nothing if the field is valid.
function the_validation_message($type) {

  global $val_messages;

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $message = $val_messages[$type];
    if ($message != "") {
      echo "<div class=\"failure-message\">$message</div>";
    }
  }
}
