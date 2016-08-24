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
define('DB_NAME', 'wysac-beta');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'aY.w}XlEdX_XTF.|y=Zh2ZuhiU0zx,Gf{01??d8K40R-?nu(6lm(p~F,xBk;nskm');
define('SECURE_AUTH_KEY',  'Gb@,7_K&uTVSqm(h`fyF()YkrwUkV}j/; +j n,he}h%W9m<Jz<v5:GAzahIZ>BC');
define('LOGGED_IN_KEY',    '5Zo7l>(JKZTKwd7B.X0,});#Il8YtF8g}n-u1op2WJ I-M.AQ%^axY(F4rJ%E_yl');
define('NONCE_KEY',        '_NE|:5N~GM/?(zsLq[nx0J5MZHbXV![pvC0Nl2h;8*`}hJWAdh7Jw+(W-ph1|$Nr');
define('AUTH_SALT',        ';38V{uV1D[]-G0D8H%c6}2dM]3/-}Pf>gB4$*C50)/~lp D<BvR`ubjql-fz(4l1');
define('SECURE_AUTH_SALT', '``bL((R[hFoel(PpK8by{UYfSN8MP!%?>6t kV2FQJ1b&G@A+xRZCRGaJqLJ&bx=');
define('LOGGED_IN_SALT',   '2h+uvbyCdnDXJ(4~ar}Vr]{l1+NYv3J^Gi](;X#`PDD#3GCkFM6zU5!*&u-nrNlK');
define('NONCE_SALT',       'GU:N`E#g1ubLrDi_/CPj-_tq54;wr::`R`(;=+tTsKiA_Nwt&L],:.Koq-rWtX_V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
