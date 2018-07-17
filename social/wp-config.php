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
define('AUTH_KEY',         'M^);1l7Kjjpy---3|HFfJ$}3/f1M!W[8z>IkqI-VK:p1^uekkw1l57vtIV>|BqCt');
define('SECURE_AUTH_KEY',  '=_{?<!|I(}5m%g$L53JIX!a$RJ?O:;uPwLO-r^HE&U!:FzG|jMgPJV:f;#m+m;TH');
define('LOGGED_IN_KEY',    'T}@hq1v6+^Om=L!),k8X(y|qS[TS??4hYAy2eN2-be>+{XOm<EN@QO8#l<$q5[{Y');
define('NONCE_KEY',        'rve;zf)HiPww>*&viHs7n0d9Hl|NWYEESk_J=iZB;,cf~5Wsv@n0o4h)/<WBaJ9z');
define('AUTH_SALT',        '3/jLWxNVx?48nK6@-egp=y=E!*p>bQBj@r=,]dY@]PKU7~PUN$nhM:Ky=`(U#(eI');
define('SECURE_AUTH_SALT', ';V8TlhKjYA>Z;()Nt<+E2V2N?F)W-{i.UyDu2baEm+kPf.;(U=]<WAajg(w<uk}t');
define('LOGGED_IN_SALT',   'V9RCGI0c2~3O@rBo+E#zb*:&QJx~lNqS5ijYL;rUt<qGl82]Zp|SQ<,0muBn>$rL');
define('NONCE_SALT',       'A_j0Z,D@z/v4Zqu!i9&?VxS$ 1Qa5,$2y`vPOL>@P,xmT?UH)YO9V!iM>r/ToW($');

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
