<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'SkyCulture' );

/** Database username */
define( 'DB_USER', 'Rakesh' );

/** Database password */
define( 'DB_PASSWORD', '@pue@Z/0RMhT0Gd.' );

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
define( 'AUTH_KEY',         'ye!vV%VW$&;b3b,5;q^6XDRs6U^XAJ/qTM 0`~qeM)Evp>{ma@>m,$+Veg+^-EhN' );
define( 'SECURE_AUTH_KEY',  '20,!DVrAj?FgzX%wU{8 r_;MuNM1W-Qdcp;;sY6%LY2{aITxMePrOZS/HG|3g!8@' );
define( 'LOGGED_IN_KEY',    '#L511iXY{,B1WA2j_JO,lWn8G_Xb>*l6ojeP%MZ,DGKk?vNSK9|yfyW13E=[} At' );
define( 'NONCE_KEY',        'IT0! r4%[:5L.dZlL.9R<<HVuO&?_<M^#iU`09K~DD=OVklur>|f7.{4q|0K`/y6' );
define( 'AUTH_SALT',        'm<sCI8]dhrAFMTOa*`YWHQTk2F3JsL_r3/=B:dYo$xl)N{l3R311+Auhle8|;xc}' );
define( 'SECURE_AUTH_SALT', 'Z=kc@D>zoSE?:HW([G #]ZBV>1Lz~kc_k%EY@MfJN!cFEjKTOB%lg<&q40@mN_, ' );
define( 'LOGGED_IN_SALT',   'M(F;</o=%(xvqlmyK6jJ IcuqO:Jk&7dF(}]Ehu,ekJeF8REok;rV-v:hRzO9hf=' );
define( 'NONCE_SALT',       'r:,kXd0aZ2b^ %I5vI`Jzi)VQ`ExYTkm?p-q_*m4C.k#;R9NX{3#lH S7etrQYr2' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
