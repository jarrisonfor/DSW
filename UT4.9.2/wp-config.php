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
define( 'DB_NAME', 'UT4.9.2' );

/** MySQL database username */
define( 'DB_USER', 'yeray' );

/** MySQL database password */
define( 'DB_PASSWORD', 'csas1234' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'yS4aECn(B?m*}9^Mq[<;p1,kxxMH*)/lCov{;O2CP5o%1UJ!`>)!{;#W9Px8!H,I' );
define( 'SECURE_AUTH_KEY',  '.^5cAHBjr8:D:e$V8A8O**V=e.1LD=w/s>B0.+o/aSOF6MlYYfxW|cwjd%Zh3O8a' );
define( 'LOGGED_IN_KEY',    'ztPVI]=#Z9PaHmwUEJ3zt&5Vv%i7b#La$NT&V{9BMO3$=!u/( R/XS^rh_klv)f~' );
define( 'NONCE_KEY',        '_<d%*Q66{0kC)?zJ6LtiXEgc~_ubrhj>HRKI~e?g7vsY?V1yF3E}swYW@8xGs;Wv' );
define( 'AUTH_SALT',        '1J:@0R?|C>@]p<K{gfT1<5E?*e-=m&h=9|.9k~<[%jY7/..qeVql;5wJ^6*qza2e' );
define( 'SECURE_AUTH_SALT', 'VVido8D}%#MMA/nkhU1S/f}%,=-T+qN1vI;93Vp9=LD5~=:W-#}@|9unM~^upGiH' );
define( 'LOGGED_IN_SALT',   '7$=ZY%?I4yb:HVWRLWw?#YN-$lcDKg=S|Ik&E+/x?}1y%Q^}ZDINK[;R(gcJM!)C' );
define( 'NONCE_SALT',       'qhM5tB&3VCL_o$i}<l%hVc1w|hsS__^ZD41/54CEp7v/8Bn7rkP^<AX!qE,F4fNV' );

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

define('FS_METHOD', 'direct');
