<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'webknack_WPV5R');

/** Database username */
define('DB_USER', 'webknack_WPV5R');

/** Database password */
define('DB_PASSWORD', 'tXg(SrXcjamHqAX38');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '333b97189d82994607e27a821ee0c33999bffa96b3bffa028c0544244628812a');
define('SECURE_AUTH_KEY', '0f6d1a6666b36e8b9d86d7ad7ccf173c5339cda1d3d04fdef054e90057b25b26');
define('LOGGED_IN_KEY', '342b20672d3d8417648611b349f03028ed05d1a6c979ddf4ba2f83e8e09f7bfc');
define('NONCE_KEY', '79a47e7cb02ffe8113a7360fa63f167b6da213003922dc075d3ba4b1fef4c02e');
define('AUTH_SALT', 'c80a77b5e2e0d1b2f8713da65b694c2f6ed014f5ec92cec9d1450e7e95bca91b');
define('SECURE_AUTH_SALT', '2d1312823bfa3d40be42b258d8059659cdc7021037fcd7cd6a211ce5bb518380');
define('LOGGED_IN_SALT', 'aea98187e60369ece5f9a9a8a85ed4f192a085815eb73edc2f75944445304703');
define('NONCE_SALT', '6b60302c04cfd676d74ac45ebf1a563ad8d860e5c236beba789b7b99ec5dd6a3');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Aud_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 20);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
