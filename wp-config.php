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
define( 'DB_NAME', 'wp_prishtinatrees' );

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
define( 'AUTH_KEY',         'nmb(1eKpkCs|v_JLy:UlFD@Kbg=ei1(Z+,^Q<>fH w,n nK0w`#k!KL2~zh]8o{x' );
define( 'SECURE_AUTH_KEY',  'wg9#f7X%Ps*RfSTp1Db9D9.Kt*tH%!/Q;b9b`N&n=;rh6cz]l58gLW||Qbbygykv' );
define( 'LOGGED_IN_KEY',    'JCF~nDIX?#O#.~r!NO9^>SqD*PhV fexT8@O*$Rg(/Xx1KT8*,!kc@q2(&Pe/?:3' );
define( 'NONCE_KEY',        'L^i3;71ASZJTrJ(R.(Wh,F7gVazl`7pNfZNG3A-^^skD`PI}IVn0I sS8waBA{N#' );
define( 'AUTH_SALT',        '$5~0A$+c7;{InZ*npH(9}|qn<_iVuHgtC9gW?J_)1zJmhDz]h!|ZI.T(/Z6KF!Ya' );
define( 'SECURE_AUTH_SALT', '!4/7To=Ewq_4X-XOww1(ID_Ta%sKC`6;?jQnsX:VwO)`O<73>-.0=o9rtc`Br+f|' );
define( 'LOGGED_IN_SALT',   '8?Yd5M;a39{tOTHGcm+[l.[vb36X^B(mJRQJv/|B,0LtFO,]Pgtj7T$!Q|z5%v1K' );
define( 'NONCE_SALT',       'PI[cjl:o_&l$m,-r=N_~R4UW3K?]?D2fI2U>=J/-2@feOlV[T;c=n_HQtCPDbbm}' );

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

define( 'WPCF7_UPLOADS_TMP_DIR', ABSPATH . 'DCIM/uploads/' );