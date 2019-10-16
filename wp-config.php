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
define('DB_NAME', 'novon');

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
define('AUTH_KEY',         'i2_n]5BwS*|u|RyuPPRHuK=uO9rapa.Sx`nf2B>#/MFpuPguf)ck=-S3|7oVo-5R');
define('SECURE_AUTH_KEY',  '6s7`gm5B??^F8-tza%D`?A7Y5L>I-*! $3CCx92go,):Jq]`d IQuzAZSe(FD7]A');
define('LOGGED_IN_KEY',    't!Kl8|oMQ2!:i.{-e$BH~%GG4$A8@{!+ZC_@.}[wQhOc&dUHC6Sh{G3%(=WXij%:');
define('NONCE_KEY',        '~m=1}QHFq+RJ&R9=X!NRP(*k.+rRI&mCxopOu*A*PKb54GCw{wJ(B||v#H3I%D)n');
define('AUTH_SALT',        'AZI?16+C)KM>Yw==Ir*K1[NVb9(fTf??]fA;:}$Dq|IXiL#zrQt-1PlyP!gckuEB');
define('SECURE_AUTH_SALT', '+L][ O~8Y7m&/kc@5hyyFpVGa!cV:2)qGa9U}f%v ~7~lF/pa.@-~W2FgIi:t?]a');
define('LOGGED_IN_SALT',   'P2Uax8cvCAtE*Ls[&|4.,O`EWMz<A-[0Uz,% bPQsjU`a5F/MT9iZX<&[K7vJOcX');
define('NONCE_SALT',       '{nj.Z$ZXK~v?%0D;JPjhLE*M!tr]e.jsAmceMMe^:@0/Iy8=W<F}tuAi|I+]uY7w');

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
