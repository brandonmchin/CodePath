<?php
	const CIPHER_METHOD = 'AES-256-CBC';

	function create_checksum($string) {
		$salt = 'a1b2c3d4A5B6C7D8';
		return hash('sha1', $string, $salt);
	}

	function checksum_is_valid($array) {
		if(count($array) != 2) {
			return false;
		}
		else {
			$new_checksum = create_checksum($array[0]);
			return ($new_checksum === $array[1]);
		}
	}

	function decrypt_string($string) {
		$key = 'secret';
		$key = str_pad($key, 32, '*');		// pad key to 32 characters (256 bits)

		$iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
		$iv = substr($string, 0, $iv_length);
		$ciphertext = substr($string, $iv_length);

		return openssl_decrypt($ciphertext, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);
	}

	if(isset($_COOKIE['scrt'])) {

		$signed_scrt = base64_decode($_COOKIE['scrt']);

		$array = explode('--', $signed_scrt);

		if (checksum_is_valid($array)) {
			$plaintext = decrypt_string($array[0]);
			echo $plaintext;
		}
		else {
			echo "Error: Secret integrity compromised.";
		}
	}
	else {
		echo "Error: Secret cannot be found.";
	}
?>