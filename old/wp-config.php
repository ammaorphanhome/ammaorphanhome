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
define('DB_NAME', 'ammaorph_WPPNC');

/** MySQL database username */
define('DB_USER', 'ammaorph_WPPNC');

/** MySQL database password */
define('DB_PASSWORD', 'CNnqunU5MokDeXPWG');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '1ec5347f7d3592997a0798953254c0ea30a6a6f9d0368029399467b05e02c402');
define('SECURE_AUTH_KEY', '2b61eb0420610200c8fb2dfd9e715e160350798bde5789073bd3829f3c9e3817');
define('LOGGED_IN_KEY', 'afffb497f539615d7a2f617ce0dfda4abdf9f89e5030a34ff99fe33096510322');
define('NONCE_KEY', '670dde809f3c8f640d4738fb9509328538bf9e813c33da2bc57ad262a3692308');
define('AUTH_SALT', 'bb4908d06811a2aad42aa5c62ea9be9ad89c630663af2d569d1f18647b1b5ba7');
define('SECURE_AUTH_SALT', '73f1c4d4ad03ce8e6cdded106f725f8856bed4b92f5f91066d13ab157d86d975');
define('LOGGED_IN_SALT', '026624fe062c6d79ca7e16df13963cfae171397868bc13c4871946d995c8ef9b');
define('NONCE_SALT', 'b153e59797ff935baf0032540ba11131f2de5cb16246130ec9fbccc2dbf2abab');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '_PNC_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_CRON_LOCK_TIMEOUT', 120   ); 
define( 'AUTOSAVE_INTERVAL',    300   );
define( 'WP_POST_REVISIONS',    5     );
define( 'EMPTY_TRASH_DAYS',     7     );
define( 'WP_AUTO_UPDATE_CORE',  true  );


