<?php

function hash_password(
		#[\SensitiveParameter]
		string $password
	) {
    if ( strlen( $password ) > 4096 ) {
        return '*';
    }

    /**
     * Filters the hashing algorithm to use in the password_hash() and password_needs_rehash() functions.
     *
     * The default is the value of the `PASSWORD_BCRYPT` constant which means bcrypt is used.
     *
     * **Important:** The only password hashing algorithm that is guaranteed to be available across PHP
     * installations is bcrypt. If you use any other algorithm you must make sure that it is available on
     * the server. The `password_algos()` function can be used to check which hashing algorithms are available.
     *
     * The hashing options can be controlled via the {@see 'wp_hash_password_options'} filter.
     *
     * Other available constants include:
     *
     * - `PASSWORD_ARGON2I`
     * - `PASSWORD_ARGON2ID`
     * - `PASSWORD_DEFAULT`
     *
     * The values of the algorithm constants are strings in PHP 7.4+ and integers in PHP 7.3 and earlier.
     *
     * @since 6.8.0
     *
     * @param string|int $algorithm The hashing algorithm. Default is the value of the `PASSWORD_BCRYPT` constant.
     */
    $algorithm = PASSWORD_BCRYPT;

    /**
     * Filters the options passed to the password_hash() and password_needs_rehash() functions.
     *
     * The default hashing algorithm is bcrypt, but this can be changed via the {@see 'wp_hash_password_algorithm'}
     * filter. You must ensure that the options are appropriate for the algorithm in use.
     *
     * The values of the algorithm constants are strings in PHP 7.4+ and integers in PHP 7.3 and earlier.
     *
     * @since 6.8.0
     *
     * @param array      $options   Array of options to pass to the password hashing functions.
     *                              By default this is an empty array which means the default
     *                              options will be used.
     * @param string|int $algorithm The hashing algorithm in use.
     */
    $options = [];

    // Use SHA-384 to retain entropy from a password that's longer than 72 bytes, and a `wp-sha384` key for domain separation.
    $password_to_hash = base64_encode( hash_hmac( 'sha384', trim( $password ), 'wp-sha384', true ) );

    // Add a prefix to facilitate distinguishing vanilla bcrypt hashes.
    return '$wp' . password_hash( $password_to_hash, $algorithm, $options );
}

function generate_password(int $length = 12) : string {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}|;:,.<>?';
    $password = '';
    $max_index = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, $max_index)];
    }
    return $password;
}


