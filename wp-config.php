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

$env_db_name = getenv('DB_NAME');
$env_db_user = getenv('DB_USER');
$env_db_password = getenv('DB_PASSWORD');
$env_db_host = getenv('DB_HOST');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $env_db_name);

/** MySQL database username */
define('DB_USER', $env_db_user);

/** MySQL database password */
define('DB_PASSWORD', $env_db_password);

/** MySQL hostname */
define('DB_HOST', $env_db_host);

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
define('AUTH_KEY',         'V<a}_ =v2rVqVd>`]56&UB*Y+4y{N!VeKQBl*4^p__OO#onb?C-a4x{Ji<ue~}:t');
define('SECURE_AUTH_KEY',  'b1dK;0-<})FbWgqq+RzjU[b;!U/{C[NLqrsL_dtK]3n!?Rk>&tDUP{iD/1prhP:?');
define('LOGGED_IN_KEY',    '#jZ6Z-AV Naf;4#GXE0Fw(+Z0AL1En0=urvHL&/GDp7lao&c<+Z?V{  Id[l(ls9');
define('NONCE_KEY',        '/Ee;9YhgI gq,j*.w,;pRZjQd:RJHm[B@~w+XKY]nep^DJPYx3unF__n#/?Q&:(s');
define('AUTH_SALT',        'O,;Ba!E4td{@cJO&Z*DPtesUFp3ZqsMuX;/+tjEK!1/9(nZ?T]400T? sd(`H,?F');
define('SECURE_AUTH_SALT', 'LHE3e7jn6G[RHX0(#l~wcp;Y; dl?140ZSu@toSoX3O5Fh1Cr10(!]z8.3Nb0(@F');
define('LOGGED_IN_SALT',   'Px5BL6|Fa+KEk-4FW7g[)c7>h.G&ABQ;ZQF)hsx@OGSvIYbCR=GK<+3Z?*4F;m^^');
define('NONCE_SALT',       'y{&qD f&p{>9z0eZ9&XoLk=}Y;A`>Uaj,L>(xVWCF&i}(dub<2 =>Swl,V7#ee8K');

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
