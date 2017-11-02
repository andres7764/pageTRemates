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
set_time_limit (500);
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WPLANG','es_ES');
define('DB_NAME', 'tusremates');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '(bl`5-SPxEQ4+j;*b(gHXRJr-Sk>Pw0kJC6J8vA!@#g,cZ|Ft}z6;5M{xfkUxgrE');
define('SECURE_AUTH_KEY',  'bF26,(<R.  Z%oit%EO;E1b!E/nP]!d>tPu%$$IEn|hZVo%FoV2)Z07ukOG/Xh9`');
define('LOGGED_IN_KEY',    ':]fBcwaq%<::2vEXn4h# _-< rNYPPMh/jMG%mCK4XagyS2S3SK;++!M(P#dO;2V');
define('NONCE_KEY',        '*jlU#uAG.QU4R7bm`URZKM#%=~5N[fmMR+eK=vSEWUNELGXV[*{-4uD42c%,4!!#');
define('AUTH_SALT',        '7P:q6~H@-JAtt!/$4a;~~Ek.|F*?D5?1=;[Jeh]|/6,iOV IWxd3c{<yQmNz3>nj');
define('SECURE_AUTH_SALT', '@k28HBHT6ui2e4#IHc>) 3Zb8&fW.-G) h%xa<w}rOenIdaFK/*r|>WTXWd2Un!s');
define('LOGGED_IN_SALT',   'ERRsXoH{62![>m!Hvof <w8zs<jS.)$Dmd/Z?~md[+M67pJXKA0IG5RFpC8&V&)T');
define('NONCE_SALT',       'f 8d1/`57>Q0xq0A6$XD`X.!JBHi`&t8;%rMm|2D?H&l~BVL+nu}A/8>~axmPuBM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_trmt';

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
