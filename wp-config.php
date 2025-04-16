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
define( 'DB_NAME', 'test-archie' );

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
define( 'AUTH_KEY',         '5[LP/@R_8:t8xm-JHSzOCQ4Q0eb&.zXJf6_SkK9-fKd0D`4-.Wuo75y4lXHe@-}j' );
define( 'SECURE_AUTH_KEY',  'rr4~!)+GVFe=bsRR#& ,(okwA H7FHY6Q1Dl^4I-tF<0xWpazfwOv+`:]5[@U78s' );
define( 'LOGGED_IN_KEY',    '0+^^4x-Z)V`l37/g]~kia.&KvmJ;:Q4OVq.wqwuMGO;%7N9tG~Jm6^8>Mb.her:I' );
define( 'NONCE_KEY',        '</nCqM6=P#TP+#a*FnV:/Fp:v|zAwDaF0,|%]rp@HnjPMM702%jU-IvuW:Vk684V' );
define( 'AUTH_SALT',        'a5iG6O?OVcx*E,Jw%SJ$T]FY>^xAA<D|MrLkQHWgX-=_)LJ6=yX%(b:z*@tO-nC_' );
define( 'SECURE_AUTH_SALT', ';&AfkVzmY&[)?r[fPc?|Qd|ir$Kv~`cU~w;mtm@cEa]bLCQ;i7i{+@ahuj@+p&+u' );
define( 'LOGGED_IN_SALT',   'O`@#}( l~x[:D:1!Hi]Ug&&MhcD;K)(XV+mX&%V{}z{N=}YKplntPhDGsGIp_*]m' );
define( 'NONCE_SALT',       'd*|e_tVoEWxfQex3wH3wwUnzgG*&Hu)cZ8>l+c%J!=bW#17o&LR$<gSlPimC4Bdl' );

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
