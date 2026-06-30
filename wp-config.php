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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'yourfirmgrowth' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Root@123' );

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
define( 'AUTH_KEY',         '-:koV<hBvc@49lTO9+jTU$QDgH0=1Q/XP1b$5oVXKE-:++]^K_,LI0F=m%vR(_+l' );
define( 'SECURE_AUTH_KEY',  'LN*4yA1|ozHR:2!Y>=_R4@uX3&A?k4Zj2Vnm46Q*0^amC ;M=Js^.P9awInC%ycf' );
define( 'LOGGED_IN_KEY',    'z~C%p0h%*||k0*BMdA,P-CgjX1*R,JEZH{OS1PNQ4&b#3Rj0cVRSrxUB ~Z9tOZS' );
define( 'NONCE_KEY',        '4E&ai^h}%}dj1J2$Q?BMBx&M2g?gq`R*#Vz@C%v1m&+,&Hi2p/8K&T{IzP=2Z|~t' );
define( 'AUTH_SALT',        'G^4.}O0uVs)ZVN4=vH*J3u?aGXbqNpz&odkw_~2#Vz 08x8=_1O`_Z:A%#D,MdMO' );
define( 'SECURE_AUTH_SALT', '!T}HIm{%*UjNQ!e*;A>T7--5=i_2Pcx3T`mDh}/]_k7KuEqJW1TB-m9n}-,Im{UE' );
define( 'LOGGED_IN_SALT',   '4^Jr=$@83>:9pm>SMhja_1/#k4(d3KA0vI18V^f70R`a!^J|-kO<^O97JUX+6(^q' );
define( 'NONCE_SALT',       ':9pPb IyY[76t9^D7fsiZD)6m{t?:=%gXd^-+kA.n(kbMO}j4rnM=G/>/djnaXP_' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
