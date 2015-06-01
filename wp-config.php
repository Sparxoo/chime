<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'Chime');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tjpm=;vy7hn4Dx/NH$@z%PWnG(pc!aNK_11KZY4-.^$(^aP94`>lLq&_e`X/]}E2');
define('SECURE_AUTH_KEY',  '6Ol;5dp=P]JcMJ7Ub$,yh4Z2PHv!^[CH>j#& -<E[n>hU,V$c-nOyRK-43zl8*s ');
define('LOGGED_IN_KEY',    '+}D;oA&oxFF%[17}xmj6)6+dUFW?B=Jh4bhDdvfn[3cLnlpe(^!U.d?>vw0`.4|u');
define('NONCE_KEY',        'fX=bFYKdaZ.&J- 3Rwr ,^<p C|mB>E&2w]mR6GE?NH7N??yBS0.T0z:)|@]3GSe');
define('AUTH_SALT',        'Zq`o2R-5,R/x^dL2Ib]X(RiT4grXX`OI@rD]P;X-2C(Coy SM5o~=uz.@I*H:t5H');
define('SECURE_AUTH_SALT', 'W[6e|-1-=fw.@Yp_3V6DeN!$h;esZ7{T^[RR@JUZ76=|dTovS(<wWp57@G{?OM*.');
define('LOGGED_IN_SALT',   '?MA^B7plOI*k<+?-fV4@$.V_L_/74Ol;hyohBDm}--7J-p.Gu3xPk>JHL<]],TG7');
define('NONCE_SALT',       '`S?L)/A:.MShH8sR^R&r#6`94#EF6J+JF#d&_1 |AcMT/2?m),:aFtt2=AN*LU&-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
