<?php
// Global result of form validation
$valid = false;

// Global array of validation messages. For valid fields, message is ""
$val_messages = Array();

// Output the results if all fields are valid.
function the_results()
{
  global $valid;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if ($valid) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      
      echo "<div class=\"success-message\">Thank you for your feedback! :)</div>";
    }
  }
}

// Check each field to make sure submitted data is valid. 
function validate()
{
    global $valid;
    global $val_messages;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

      $checkValid = true;

      if (preg_match('#^$#', $_POST['name']) == true) {
        $checkValid = false;
        $val_messages['name'] = "Please provide an name";
      } else {
        $val_messages['name'] = "";
      }

      if (preg_match('#^$#', $_POST['email']) == true) {
        $checkValid = false;
        $val_messages['email'] = "Please provide an email";
      } else if (preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $_POST['email']) == false) {
        $checkValid = false;
        $val_messages['email'] = "Please enter a valid email address";
      } else {
        $val_messages['email'] = "";
      }

      if (preg_match('#^$#', $_POST['message']) == true) {
        $checkValid = false;
        $val_messages['message'] = "Please provide a message";
      } else {
        $val_messages['message'] = "";
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
