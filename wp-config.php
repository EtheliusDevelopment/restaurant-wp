<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Cgnhw+DgnGsGPmNiK1/9xwKWnRyyHW6X2LiudauYX3Xij0LMhBWjEl78Db6qts4eGq/GBHMn3vRwgsTKQx0xXw==');
define('SECURE_AUTH_KEY',  'IlNL8vhBZ0a2BHPsFMZtVaiZykhVosxCriD9OByaw5B7yHifi2yz9MVxSUO+wsvwKYx7odQjNzWfSxyJkkRhmA==');
define('LOGGED_IN_KEY',    'bQtiYDJOPN4PH/LJJ+AYaEW6wcOK6mi04ZPXwuwJY4aaWboXhfK+uAoW53aScc6CVvkkxhPW8o0EF3qUSE3UWQ==');
define('NONCE_KEY',        'LXsOs63nuPGJgZAkhvtMrkO0+WetIECZlD+qVBdSSnjiY7vfI33/p5pYNbV/2nFmuyuJocTOZ+CFIAZUuZ/HLA==');
define('AUTH_SALT',        'YuGTIRTS7mEtVzVCLiLH8USyoNNQNeKlErfby0h5Mb8O3MogHYcSq66TeSwOsm3KhQZdXJx8HjBgp5lrzNTGHw==');
define('SECURE_AUTH_SALT', '4vRs0ZbJDZTHK3Grcns3WacDYRy6ON1uCkJW7kDJuiL/ibddaesqargjGk8oP8KZGccDNthAFpLh+akH33TRrw==');
define('LOGGED_IN_SALT',   'lU0qg+QO+uepVjC0CzepeIJkqHzIgz/XwrwYmhJel0YH1pyouAE/mvRk+5yDb+GahB5lY52Y7pg0Z/0wp1cYNg==');
define('NONCE_SALT',       '97thEPIxyTv9di+HPcw/7GGrnXKMP3Bux6xDBOmOtrP63+JLkBDkV6v6SyDgTlGSnwtLIGFhGCOofkWtsKYuNg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
