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
define('DB_NAME', 'comfywindows');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '6%hHByeMdSC=A=3E');

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
define('AUTH_KEY',         'HX>_/,,19/.Mm =s70lFM^gjNJy|,+i0[H|C{f}sO!l(d?HrGaP9iQ+t]nl 5jHa');
define('SECURE_AUTH_KEY',  ';kh , |v@^p*%{bbJ.Avi9`z*u7|6_T!$:_3N^-j}]%b1ns[[)g8.4*:NPh(26ut');
define('LOGGED_IN_KEY',    'gcP%H4oSKQ)`M!8x*Dkxw}AAVl)TDxBXzdsjlv@bi1IPh[W7YpATq{(U} Nh;_{9');
define('NONCE_KEY',        '(utXMCwy?ehjpP2OA~R7:RTa*kQH+YAb@BVLEFd?9SA=G:FxLi=yuem>Cf],b*6B');
define('AUTH_SALT',        'd|*O1s;lQZrs@}i]f2:T5z3i{V]Z|<|1M`}xCh$3[AYO5g0.JwoHn <_/<*^ka{>');
define('SECURE_AUTH_SALT', '+&OiO6U>l:>B}f@TpnJXtX}]ib(iwBip+3`-E(DQ2eo[7tvvV2SAEy,D:.&K%Zn%');
define('LOGGED_IN_SALT',   'K5ch.lyPzRA]sK7b$MI`wR:ApXIm2^Rgl6vZ+PMr;3zC_#Cdol{?6f2uRQtL!6HY');
define('NONCE_SALT',       '`*j74{.]By38hk7kB*?#tYOGVCr7(G%AK?b^I]>S#gIp$_2+u~egyx*~BVI.C* R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cw_';

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
