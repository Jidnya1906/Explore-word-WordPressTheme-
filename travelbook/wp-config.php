<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'travelbook' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '$#P+27{7fAS<0v3Y2Z.u{C&RisdgaZjC#r}y4*y&Vd3Vy%-A*iI,ErZA21c->m}D' );
define( 'SECURE_AUTH_KEY',  'kPSJ>2u=c*=RrD:oHoH}*6:_u+jl.TC9UxgsTh2,f8#)pe C,cI$iz<O;^VE}8FF' );
define( 'LOGGED_IN_KEY',    '[#Hr{{u<L,bnVrxZsA,R0m-68f~S#pzXbbh}2JX ,C^ZQ8Te=E6{inxPhj<48*Z^' );
define( 'NONCE_KEY',        ']Z|FW^#mk[f5& a; 92A^DTl3lF3!v4C0*J|iWvUs@WRyBK-B9}Uaf]sfh=Iw|t;' );
define( 'AUTH_SALT',        'CeFCL0+6Z=-L7wK7;9=fe^]9d*XHKlR^>mM&{0`_f~OfI(:lZmkc6P|:y&kYE8D_' );
define( 'SECURE_AUTH_SALT', '2Q1sXH(K1}!kAm4BhWo=hYwJ~;N1RRs4JCb24RFS2=Y8c8FIme).9S-YqHIUBF%d' );
define( 'LOGGED_IN_SALT',   'Kw};?bc#v%`baj6Pog@F`umg/ sQ+%tjN<hKn/rqM,c<;ryknS0:z3q^wr$L=a8=' );
define( 'NONCE_SALT',       ']NIbS*3Wmg5ah,4eEt2b$HFeLOJ%c/Q-qD;.[8epTV{10j2NW[6@7)/5UpB{QO5!' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
