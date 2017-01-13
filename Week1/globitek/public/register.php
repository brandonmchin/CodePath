<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.
  $first_name = "";
  $last_name = "";
  $email = "";
  $username = "";

  $errors = [];     // initialize an empty array to store any possible errors

  // if this is a POST request, process the form
  // Hint: private/functions.php can help
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // Confirm that POST values are present before accessing them.

    // Perform Validations
    // Hint: Write these in private/validation_functions.php

    //First Name
    if(is_blank($_POST["first_name"]))
      $errors[] = "First name cannot be blank.";
    else
    {
      $first_name = htmlentities($_POST["first_name"]);
      if(!has_length($first_name, ["min"=>2, "max"=>255]))
        $errors[] = "First name must be between 2 and 255 characters.";
      else if(!preg_match('/\A[A-Za-z\s\-,\.\']+\Z/', $first_name))
        $errors[] = "First name must contain letters, spaces, dashes (-), commas (,), periods (.), or single-quotes (')";
    }

    // Last Name
    if(is_blank($_POST["last_name"]))
      $errors[] = "Last name cannot be blank.";
    else
    {
      $last_name = htmlentities($_POST["last_name"]);
      if(!has_length($last_name, ["min"=>2, "max"=>255]))
        $errors[] = "Last name must be between 2 and 255 characters.";
      else if(!preg_match('/\A[A-Za-z\s\-,\.\']+\Z/', $last_name))
        $errors[] = "Last name must contain letters, spaces, dashes (-), commas (,), periods (.), or single-quotes (')";
    }

    // Email
    if(is_blank($_POST["email"]))
      $errors[] = "Email cannot be blank.";
    else
    {
      $email = htmlentities($_POST["email"]);
      if(!has_length($email, ["max"=>255]))
        $errors[] = "Email must not exceed 255 characters.";
      else if(!has_valid_email_format($email))
        $errors[] = "Email must have valid format.";
      else if(!preg_match('/\A[A-Za-z0-9\_\@\.]+\Z/', $email))
        $errors[] = "Email must contain letters, numbers, underscore (_), period (.), or symbol (@)";
    }

    // Username
    if(is_blank($_POST["username"]))
      $errors[] = "Username cannot be blank.";
    else
    {
      $username = htmlentities($_POST["username"]);
      if(!has_length($username, ["max"=>255]))
        $errors[] = "Username must not exceed 255 characters.";
      else if(!has_length($username, ["min"=>8]))
        $errors[] = "Username must have at least 8 characters.";
      else if(!preg_match('/\A[A-Za-z0-9\_]+\Z/', $username))
        $errors[] = "Username must contain letters, numbers, or underscore (_)";
    }

    // if there were no errors, submit data to database
    if (empty($errors))
    {
      // Write SQL INSERT statement, insert record if its username doesn't already exist
      $sql = "INSERT INTO users (first_name, last_name, email, username) ";
      $sql .= "SELECT * FROM (SELECT '$first_name', '$last_name', '$email', '$username') AS tmp ";
      $sql .= "WHERE NOT EXISTS (SELECT '$username' FROM users WHERE username = '$username') LIMIT 1";

      // For INSERT statments, $result is just true/false
      $result = db_query($db, $sql);
      if($result) 
      {
        db_close($db);

        // TODO redirect user to success page
        header("Location: ../public/registration_success.php");
      }
      else 
      {
        // The SQL INSERT statement failed.
        // Just show the error, not the form
        echo db_error($db);
        db_close($db);
      }
      exit;
    }
  }

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
    echo display_errors($errors);
  ?>

  <!-- TODO: HTML form goes here -->
  <form action="../public/register.php" method="post" autocomplete="off">
    First Name: <br>
    <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br>
    Last Name: <br>
    <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br>
    Email: <br>
    <input type="text" name="email" value="<?php echo $email; ?>"><br>
    Username: <br>
    <input type="text" name="username" value="<?php echo $username; ?>"><br>
    <br>
    <input type="submit" value="Submit">
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
