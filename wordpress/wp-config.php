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
define('DB_NAME', 'wordPress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'wordpressPWD');

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
define('AUTH_KEY',         'u`Sz4Vp=||5RVda#e}PZ0d|>w2cpT$wRxhfv{LYU$1KeAJ9zFM+Jamb@CzY]87.-');
define('SECURE_AUTH_KEY',  'r1>^0:pk0L-H1!a*_@.f<H~>jIzXKP&BEx* p-28H49&dR+<pZ5W!juz+#}0MNJ;');
define('LOGGED_IN_KEY',    '(8Okg/|3`[?.+?d5C{<x6dIjJxBSCA[s#E|QP4!<Ml*/TOg.f^H8BIX7]&:M|M{+');
define('NONCE_KEY',        '}^-9?8MS{J$xiEYCsdZ_^=r[6n(E|rZSuw[w++v(aL-Iu_[/N*b~%M}%q^:Cgc^L');
define('AUTH_SALT',        'FjY^P&{*CY2wzide?au=MY]LuXqN5(cJCN9kSH|>447K7h}}<SfjThyP.:6F]0Jh');
define('SECURE_AUTH_SALT', 'DqJ(<7Y^+~xAW~7NoQDv%0c[d4mb||1H?<FNsv|Ijg)j^4]T(8T$o4O]}M,YwU%E');
define('LOGGED_IN_SALT',   'gK~{TLj;!U$>,v$r[Qc)>Mi pWO4|(^cRNBVoB$/f?G0mM~m~94/s/?)6pK.`n1E');
define('NONCE_SALT',       'qo!Cv=AnaM2KzARaUa{(o^y#OQI$%=Rkk^}8o?MSEoN#cF UeHqkOfxC`(~SMCc3');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

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
