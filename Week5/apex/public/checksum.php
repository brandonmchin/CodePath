<?php

  require_once('../private/initialize.php');

  $message = '';
  $result_checksum = '';
  $checksum = '';
  $result_text = '';

  if(isset($_POST['submit'])) {
  
    if(!isset($_POST['checksum'])) {
    
      // This is a create checksum request
      $message = isset($_POST['message']) ? $_POST['message'] : nil;
      $result_checksum = hash('sha512', $message);
      $checksum = $result_checksum;
    
    } else {
    
      // This is a verify checksum request
      $message = isset($_POST['message']) ? $_POST['message'] : nil;
      $checksum = isset($_POST['checksum']) ? $_POST['checksum'] : nil;
      $result = ($checksum == hash('sha512', $message));
      $result_text = $result == 1 ? 'Valid' : 'Not valid';
    }
  }

?>

<!doctype html>

<html lang="en">
  <head>
    <title>Symmetric Encryption: Create/Verify Checksum</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="includes/styles.css" />
  </head>
  <body>
    
    <a href="index.php">Main menu</a>
    <br/>

    <h1>Symmetric Encryption</h1>
    
    <div id="encoder">
      <h2>Create Checksum</h2>

      <form action="" method="post">
        <div>
          <label for="message">Message</label>
          <textarea name="message"><?php echo h($message); ?></textarea>
        </div>
        <div>
          <input type="submit" name="submit" value="Generate">
        </div>
      </form>
    
      <div class="result"><?php echo h($result_checksum); ?></div>
      <div style="clear:both;"></div>
    </div>
    
    <hr />
    
    <div id="decoder">
      <h2>Verify Checksum</h2>

      <form action="" method="post">
        <div>
          <label for="message">Message</label>
          <textarea name="message"><?php echo h($message); ?></textarea>
        </div>
        <div>
          <label for="checksum">Checksum</label>
          <textarea name="checksum"><?php echo h($checksum); ?></textarea>
        </div>
        <div>
          <input type="submit" name="submit" value="Verify">
        </div>
      </form>

      <div class="result"><?php echo h($result_text); ?></div>
      <div style="clear:both;"></div>
    </div>
    
  </body>
</html>
