<?php

// Symmetric Encryption

// Cipher method to use for symmetric encryption
const CIPHER_METHOD = 'AES-256-CBC';

function get_key_length($cipher_method=CIPHER_METHOD) {
  $key_length = 0;
  if($cipher_method == "AES-256-CBC") {
    $key_length = 32;
  } else if($cipher_method == "AES-128-CBC") {
    $key_length = 16;
  } else if($cipher_method == "DES-EDE3-CBC") {
    $key_length = 24;
  } else if($cipher_method == "BF-CBC") {
    $key_length = 56;
  }
  return $key_length;
}

function key_encrypt($string, $key, $cipher_method=CIPHER_METHOD) {
  $key_length = get_key_length($cipher_method);

  $key = str_pad($key, $key_length, '*');    // appends '*' to make key of specified length

  $iv_length = openssl_cipher_iv_length($cipher_method);
  $iv = openssl_random_pseudo_bytes($iv_length);     // create initialization vector

  $encrypted = openssl_encrypt($string, $cipher_method, $key, OPENSSL_RAW_DATA, $iv);

  $message = $iv . $encrypted;

  return base64_encode($message);
}

function key_decrypt($string, $key, $cipher_method=CIPHER_METHOD) {
  $key_length = get_key_length($cipher_method);

  $key = str_pad($key, $key_length, '*');    // appends '*' to make key of specified length

  $iv_with_ciphertext = base64_decode($string);

  $iv_length = openssl_cipher_iv_length($cipher_method);
  $iv = substr($iv_with_ciphertext, 0, $iv_length);
  $ciphertext = substr($iv_with_ciphertext, $iv_length);

  $plaintext = openssl_decrypt($ciphertext, $cipher_method, $key, OPENSSL_RAW_DATA, $iv);

  return $plaintext;
}


// Asymmetric Encryption / Public-Key Cryptography

// Cipher configuration to use for asymmetric encryption
const PUBLIC_KEY_CONFIG = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

function generate_keys($config=PUBLIC_KEY_CONFIG) {
  $resource = openssl_pkey_new($config);

  openssl_pkey_export($resource, $private_key);   // extract private key from the pair

  $key_details = openssl_pkey_get_details($resource);   // extract public key from the pair
  $public_key = $key_details["key"];

  return array('private' => $private_key, 'public' => $public_key);
}

function pkey_encrypt($string, $public_key) {
  openssl_public_encrypt($string, $encrypted, $public_key);
  return base64_encode($encrypted);
}

function pkey_decrypt($string, $private_key) {
  $ciphertext = base64_decode($string);
  openssl_private_decrypt($ciphertext, $decrypted, $private_key);
  return $decrypted;
}


// Digital signatures using public/private keys

function create_signature($data, $private_key) {
  openssl_sign($data, $raw_signature, $private_key);
  return base64_encode($raw_signature);
}

function verify_signature($data, $signature, $public_key) {
  $raw_signature = base64_decode($signature);
  return openssl_verify($data, $raw_signature, $public_key);   // return 1 if the data and signature match
}

?>
