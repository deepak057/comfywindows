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
define('AUTH_KEY',         'eD__*-d8hjJR@._g!_fDv|7uZx=^){B10`Sh<]`6(bQP*>cYlw-8#_wP~K-VYDDi');
define('SECURE_AUTH_KEY',  '3{r>R TH+lpi@AQzI]g2txXV~&#*H+2RNI6ssWQDsl}.Wtp6py9(}t& =|O{X$,[');
define('LOGGED_IN_KEY',    '~gT4+j2e#-h2ddx`d[-Wq!Yi^(_Njh[Vj|5tj7OIHRbqhgVhI|?J1L=%[?Uh$pAQ');
define('NONCE_KEY',        'm`g9vM|~=T:2_wCXaNezez^kWIlO9dfn=@rVox#4WL1Tx@GXo%z@p?KwEUh]*uL`');
define('AUTH_SALT',        'c*2wf[TYB!kxN_y @EYvx,0e?1^.##y?tgR);88/UEd>~YZ%4/dRcEwu#/(0=nj/');
define('SECURE_AUTH_SALT', 'mw/O#A#q)4r}}#K&hjV}}1P$[M-cXJsldBD#th9YEa&Z??J<wE&wvSkY1d9ffd+I');
define('LOGGED_IN_SALT',   '{ms$uo<@<^^`@EPd3`O8Gr,K$y68hM&$W }gcZoiy_aFX?{8S?*_:}/SJC*~UbR,');
define('NONCE_SALT',       'vMKc~}d;Rn7xP5v4DOULdS1kxAqeq={O c;g(DHs.oQsr!4&df(GjyAU{[c6#-!3');

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
