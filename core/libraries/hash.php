<?php
/**
 * Hash - Hashing passwords or other strings
 * @author Hashem Moghaddari <hashemm364@gmail.com>
 */
class Hash {
	/**
	 * Create Hash
	 * @param string $algo Algorithm for hashing
	 * @param string $data Data string pure
	 * @param string $salt Custom String for strongest hash
	 * @return string hashed_string
	 */
	public static function create($algo, $data, $salt){
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);
		return hash_final($context);
	}
}