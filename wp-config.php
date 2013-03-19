<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'stylemered');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'ffWk4@[[0xx&-?hKgPFr19%n8_sUVZ(QPER=KR.{({N>X:JzNsUf9dFc)69;g`fQ');
define('SECURE_AUTH_KEY',  'vV+bAyu(~~fv:PF#DDqh]M+8-CM&?%aP46o3smP{yRC1C~S~MQq/)nt1!Wlh8SN6');
define('LOGGED_IN_KEY',    'q?Qj0.BlM0xQ6~3O~AKYmjn)JSxDgoN}|4jO3sy`|JBfgk Ew3b<P-1mm)KB@7$6');
define('NONCE_KEY',        'EgtG=r1@{E|cL aF(mIK)EIz}9M9WDaJ$uQ]:9D.!p53Hv+jTHh_.&DZt^HZ@+yW');
define('AUTH_SALT',        'Og:#mw,RQwDR3yW8oOsZ:Ic0UjqISfi9DD(Vd{r8I,tC#~*spVUF&|&2D@=b<gaU');
define('SECURE_AUTH_SALT', 'E>LsBc1$$9j7_VvQ8gxp0uxqmjI43)u2I/Q?+[d6Y<W{4M[n!4eE6)^tJ)yp2.vp');
define('LOGGED_IN_SALT',   'LTR 2B`Fd/&xP;he<PqwHKppk+Nm: WPyq+k5l$))ozCcx RpTWesyJ=UnpU8a.k');
define('NONCE_SALT',       'Z#MTN!:tJrUEX5kE{M /_vP~n=9|Fp#$U[iYs$ U:)SXWr$Ha[[t=;uxV/yl]=]y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
