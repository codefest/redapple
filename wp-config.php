<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'redapple');

/** MySQL database username */
define('DB_USER', 'rauser');

/** MySQL database password */
define('DB_PASSWORD', 'secure');

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
define('AUTH_KEY',         'A[}h#aK^lR4:Si-`*y32F2{42J,([nIDx(4SurfmKiQ.a?kE-M8W[|;-;lGy#+yB');
define('SECURE_AUTH_KEY',  'xVA^bh_H_!}3lQ+%5$74|,--j9W^ur szkm||g3hyo T+>>[=JUaPbx7M31QAp|j');
define('LOGGED_IN_KEY',    'BLEmcCL7{&5wuSE?JeWpHhP(j+`:qj^F+Y%Q@4AD3dEB@iVTk}6l|`]e?Zv]YJ|7');
define('NONCE_KEY',        'W!^-*C1|&C+ZZ(A}(_}m4x1k!w.u(*m_Q%Ka%ZzOYxSs+RI#)y#cBX~`;8n5h_7O');
define('AUTH_SALT',        '%iV%+[*6FC:Y;b8^lN5F?%t~6X<vrcyAx Xgbg4{X)CB$mUftsA&+:RX)W|nv+-R');
define('SECURE_AUTH_SALT', 'lEu4+vb=9piI-H+)T(+M/cLm{LR|=,f.v4o`zB?TZLv*$BR{iI;B:?GTG4&+o^47');
define('LOGGED_IN_SALT',   'bV0)(>jc`-HNF`m4MdomE zA,%|r`^SR(j?(J*j:of>lewI~7X2PKWo03Yv!ycWo');
define('NONCE_SALT',       '-.,f9/!E+BG8UD4[i5cYq}.[i8]Du4JC]mUL@?Y]b$/uPk:.E%3V+J5rPo0x2+!]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
