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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'flame' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^`5XyF{^>6=J*cVFBJA<2j3|T/R+t+Hkh(mdA:N/N0/KLdf =ayJ>Jce^VZHnxCQ' );
define( 'SECURE_AUTH_KEY',  'W EsHAO)A8|5/}g4 Wt/J^IBCB#!/Wb].1=BP-zU|-CZ%@=rGAh!jRW=g+[A4A4k' );
define( 'LOGGED_IN_KEY',    'c*6YD-O=j% xSn|qO0^!(7)|Xb-2G,{2} .x3>PB~n*n4:8:|] |_.@=1QvpgXFO' );
define( 'NONCE_KEY',        '|XM!V:pY,,yqXGe3M^9>c=xeE_qE/(4R+/0481/9gjP~,G?H)ps<Q+Qo`]X7Pao&' );
define( 'AUTH_SALT',        '2bly]{TYh/B7lhW3.-iU|C7M[FS2/sqLZ5Fhb!OLWS1[tmEamC^%&r(`76,lUK;c' );
define( 'SECURE_AUTH_SALT', 'im(2Zk]!xxaCz7k*hh89Bt$m1?!q*q-)NvdQ2s5(&.xARTd+h7co|YQ4Sh5Y+u#F' );
define( 'LOGGED_IN_SALT',   'O;jln8~rgcD( g`K>;W{oru{WV{_^$PkWPgHGeU;IMA/y$.{X}^:[|Z<%@CBYgv.' );
define( 'NONCE_SALT',       '| S&6,B>KVKEp>Ozo*h 6hiO3d<m4nyadYQ!<6YQI?0Y?jj]zN P^ICokk(2(zYC' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
