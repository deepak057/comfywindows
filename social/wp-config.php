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
define('AUTH_KEY',         't78RgAD4CT]! U1=0B^FurL+D:GS xLKo )[B@N]vYu;5p1p;t,QrbzCI%2_W{85');
define('SECURE_AUTH_KEY',  '%/A,vuG0hHZ69 if+p!R]~>?Z<4iRtzkqE&xUIH D>vUw1W=_j|uKyxobv$-+H7w');
define('LOGGED_IN_KEY',    'KV`ogVTMA,PLdCFbfcX<qofni:hV:pb>7n1J]Mr~#n5`>iyNv<*z c@!e=/QUozg');
define('NONCE_KEY',        'G?`G,L|^.f,Y6EI<`WR,;J:M}<bT,~z_dXu[/}8?;!,^$RLosCyRNm>Jbf5rC/8M');
define('AUTH_SALT',        'MQ}|1@+rc(ul-&3v`teMW9wx%_55&B1}RWioKgL`)uTN<|&(jaW4Ef:DYt%y>z9g');
define('SECURE_AUTH_SALT', 'a==X&2nOm%,BC=O]f1zOoIGK{^E@R6fv/YD>P$>^Xww! /vauSp|Hlo`&tW?D/|^');
define('LOGGED_IN_SALT',   '8S`CC0^z80:`bR:*q,6H*rd,ivgzjFxm9E]njFUop/M`Ql#l~tE%Vh^]wH3]agEo');
define('NONCE_SALT',       '% !+;(ki/.?frjM|pxKe[i`H)W/cX!vz&O*U;Yi|Nx[9W[BJ5VXDx78:hiakExNt');

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
