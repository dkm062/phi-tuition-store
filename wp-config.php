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
define( 'DB_NAME', 'phi-tuition-store' );

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
define( 'AUTH_KEY',         '+3GR|1Ykz1rD8d j+4U3o5/Hk={%-xD.I|J/ >b;2yT IF~|G5/a,rZMS:(Y3j3g' );
define( 'SECURE_AUTH_KEY',  '4f8m#!ioB;mcXm6Qz9(Rn64tKs7M.L1P[@BmJTd;Z:U%c}T{`p&ggk#`F`@A3{SR' );
define( 'LOGGED_IN_KEY',    't7$au*/5~1:<dWPsgj:%<~YZ8-3AoM)|G(d,KJk|*IExzj0.O^,tZ)4zW(6n4X4;' );
define( 'NONCE_KEY',        '=2]D|Lo)+^9tc4ipT|YGno=8j8cJP Va;fREIoAyfcaNyq&zj[OyW`+IF1%K5JMR' );
define( 'AUTH_SALT',        'U$@_ CrKzbVxBiJa_LAs@8J<Go}kp]2=|WxorO):f1:3I&fU^2Wl+LV#l*$<M-Us' );
define( 'SECURE_AUTH_SALT', '1QdGq#)q`XH7Kupe/DeiKr41h*K4N4P5Er>[CiOM/6fJ#Ipg[}0KdNxhnYJrL?=~' );
define( 'LOGGED_IN_SALT',   'ITf(d[z9q9 .a?!ihH2<Fj>xgLzH@|3!~~B.#)=4b3N{*pkx2(mgA#/GflFB@{ZY' );
define( 'NONCE_SALT',       'E!e6*+))pFZ:s]-xZi8 f:X3Cw|-kvXGiTa~0V^3.aVo=6LIJTbVhle]QGc9eCT|' );

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
