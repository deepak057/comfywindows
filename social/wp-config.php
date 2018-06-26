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
define('AUTH_KEY',         'B!uBz^kS~`?OCdl@3]_DS Y.,+gOiuYm.On_TwoEqQ#0.#/Y((?&!^+-8)3]=/Qb');
define('SECURE_AUTH_KEY',  '`ZDokqbe:nvcl8m8d<Q6T?&1sQXmO^ viEQ3ik(Vb}8Fi?0f)lL_!~9vK8x;lrBg');
define('LOGGED_IN_KEY',    'KrM/R/ Jl~G+:0VkOgvQ^ATv|i~a$|Y}!K$X;&,j5!.$>+VZzQ.}grff!&2@/tV#');
define('NONCE_KEY',        'i .%ERPh?4E=E5s2<Xd:g/[H,^4b]BQ+%*)8p.#l%6a&Q,Mn(/lI!cZm#e}7b%iK');
define('AUTH_SALT',        'FV Rk](xyGJ4?0.R01e4,5 V|:PZ^$-LY|70oqmv!9&@:<g!Z_)q!]b|~$YssKS;');
define('SECURE_AUTH_SALT', 'Nl2wd<}$>BE;*NF]qw7OP~7xF2:Wx=:(Ki{6b9?]hWH`Vv*CoCy5}~Q$^h+(~mOs');
define('LOGGED_IN_SALT',   'lo2p<LeuJ |.TIMUZptI]()Ika1zOnq>b>aykKY9P~rDw|[ i*x-M^:.*%AP:jrX');
define('NONCE_SALT',       'RQyang2@]1SD}}`vPD9Neem-[Tl~a]Gw&=s}N26TQIOW3V}(Ov1;h}uC[eEj5r%o');

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
