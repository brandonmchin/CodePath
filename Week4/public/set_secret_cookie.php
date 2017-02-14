<?php
	const CIPHER_METHOD = 'AES-256-CBC';
	
	function encrypt_string($plaintext) {
		$key = 'secret';
		$key = str_pad($key, 32, '*');		// pad key to 32 characters (256 bits)

		$iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
		$iv = openssl_random_pseudo_bytes($iv_length);

		$ciphertext = openssl_encrypt($plaintext, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);

		// concatenate IV to beginning of string 
		return $iv . $ciphertext;
	}

	function create_checksum($string) {
		$salt = 'a1b2c3d4A5B6C7D8';
		return hash('sha1', $string, $salt);
	}

	function sign_string($string) {
		return $string . '--' . create_checksum($string);
	}

	$plaintext = 'I have a secret to tell.';

	$scrt = encrypt_string($plaintext);		// ENCRYPT

	$signed_scrt = sign_string($scrt);		// SIGN

	setcookie('scrt', base64_encode($signed_scrt));		// encode characters to be viewable/savable
	
	if(isset($_COOKIE['scrt'])) {
		print_r($_COOKIE['scrt']);
	}
?>