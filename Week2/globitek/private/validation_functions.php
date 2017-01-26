<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // contains only letters, numbers, underscores
  function has_valid_username_format($value){
    if(preg_match("/^[A-Za-z0-9\_]+$/", $value))
      return true;
    else
      return false;
  }

  // contains only numbers, spaces, dashes, parenthesis
  function has_valid_phone_format($value) {
    if(preg_match("/^([0-9]{3}|\([0-9]{3}\))(-|\s*)[0-9]{3}(-|\s*)[0-9]{4}$/", $value))
      return true;
    else
      return false;
  }

  // contains valid email format ('test@test.com')
  function has_valid_email_format($value) {
    if(filter_var($value, FILTER_VALIDATE_EMAIL))
      return true;
    else
      return false;
  }

?>
