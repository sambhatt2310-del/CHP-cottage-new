<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u253819986_Q2Kvo' );

/** Database username */
define( 'DB_USER', 'u253819986_PSro0' );

/** Database password */
define( 'DB_PASSWORD', 'EHpx7vAaXE' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Dj_HmZ^p/J.=DX=G4PQrqq*QZPAZ[)U.Ku+RV1;9XN|i7jn=/Y`Oty1z#pgX&fD*' );
define( 'SECURE_AUTH_KEY',   '^!q)v]L~)AAl)eg}f!M Yy8tkI4<B!7S3PimLajt7TP@^*Rqn?ZJ1*OEnu;*kGuX' );
define( 'LOGGED_IN_KEY',     'm0sAT!5H3bmrc;PaVdl}+{Ve,e.;_z+tmPka^_50W0_Q|rslV:b_/#~GU>Gfu8Q?' );
define( 'NONCE_KEY',         'e;Ic,GuC?|LN8]h<6<X}FG0t)q;@ f/o_cl~1rwlwE-7`=)S8TJWCpVK0HEUdbu<' );
define( 'AUTH_SALT',         'KYi*sOr73$q#Q?5}X+[P`HsaZSZko=11ifKy?H<-K(E8P)3poHCzCp0R:dfJ0kU.' );
define( 'SECURE_AUTH_SALT',  'h]-Hg q6Z5)^j1[.C/G;;>r,1i?YdI$k<PiTh)2TG4X#~y37%6VHXMn~/dznDE.d' );
define( 'LOGGED_IN_SALT',    '?w0 34NdQQRgFqh*gF[,sY[0n`(UMXK c8Qyy<=%`?w|+}paZC%A@Vk= q .*w`z' );
define( 'NONCE_SALT',        'XwuS+j2x2EfS*YeT3. Aer_E((NX?!QRbn5dP~^%I4}M,qL8S}~H#Cc|5^a}P}fq' );
define( 'WP_CACHE_KEY_SALT', 'lx`pU;&oOE *|Zgnlr[FOOij<|x&uXED!(2qvzn-i~E+cZeJc?=xBv>i8 Em6#8d' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
