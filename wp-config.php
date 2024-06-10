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
define( 'DB_NAME', 'wp_guestpost' );

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
define( 'AUTH_KEY',         'xw@T(/AZW.)t In`oU1+gO*s<0smGy9qNdOgI;<xS!7s2ME{fR~xMVr a]G=v%.3' );
define( 'SECURE_AUTH_KEY',  'ad;$B9a67<+3,<LeDA{Ue9%/yEMqr2^&~U,gaYk1=3+y9%<1rA4!`/_:tB&3%[~X' );
define( 'LOGGED_IN_KEY',    '?K<WjP.vx~Lv8oFlhajPy/-UBo_d1=GZoT:ICwn<jH$2_0|hxXnK4@*,=b#kaG/9' );
define( 'NONCE_KEY',        'HB%$aM^4tZ~Q4OoR~1U,)Eb064voChXJ-#8a^)Dx-11d6Ctjk:uu9_,6GvQJH,YG' );
define( 'AUTH_SALT',        'J5E0$-sG~__J}m(?x:^eK_(uM3YOE)z(yaa=9)kj#[:@?lz4IYO8pgR>Oj!2DlCN' );
define( 'SECURE_AUTH_SALT', 'vXE}[#a/4MXhv#d?e$,U4,}v7vX%9D_3/s]%>&BwZ5{H^R&ahbbFH*(FrqlOiha<' );
define( 'LOGGED_IN_SALT',   'UKR%#!lFJk~8E?SM#=`m|QlPY~OG7kwlX6[ y1@1Hfm?*)$P?0!u6@w%ON>136vC' );
define( 'NONCE_SALT',       '&Z$+WH.:w`RxZE*(de.i!x,#.!8)eiQ9RFqTD]^XiE(nPC/-WSJOrBZYWFcpdu}=' );

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
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
