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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ubback' );

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
define( 'AUTH_KEY',         'l[6f?/c6!5dPNIY_[}bq4Sb5MsPoskB`j1gy)W1GfIJcO:oU%CF]R&nO7f|Hmz<0' );
define( 'SECURE_AUTH_KEY',  'k}Z0%Z|/I{W@i<YI/nTn[qB+BGBIaBo|;WTZ`=m{t.HBjA;|}S26yj^7)48e]*g ' );
define( 'LOGGED_IN_KEY',    ']HWBOm{.cK+h|T<.jX9FCrB$/$.K6}gIM6EV-j_+is| .WXHi+j2C<MKcO;DLL1%' );
define( 'NONCE_KEY',        'KLA|7k/W:Kb8-f?9ZPP@:-Fm_Fi2*E(VJbfa>XS[1Br=zEry$Na3!PV#m?J/n:Dl' );
define( 'AUTH_SALT',        'i?GUMP7^DJOM >gL(ST/[r]5f+*Xz =)_&tW:}m|_f}F2~NeO7b@@k[9+V<lx V4' );
define( 'SECURE_AUTH_SALT', 'FYzZ-9ydRt Bhj7}n+)g~DWVF *jr-y^4>t3<cd)H3v;*vVVA_:@*)Lv,^ki4cY2' );
define( 'LOGGED_IN_SALT',   'dp6_?h1jp!cUi8&m|I<(M/0L>$MEU@~(?N7#-Wy{_i%sk[A13,%|S166mYw98]< ' );
define( 'NONCE_SALT',       '8c% V)3m[D=NYA{9(}PkQbOxN$>v>Xl&p=IC>#J-o_P8d*Zbqary.zS0KdQZ3g?H' );

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
