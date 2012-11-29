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
define('DB_NAME', 'shinyuan_wordpress');

/** MySQL database username */
define('DB_USER', 'shinyuan_wu');

/** MySQL database password */
define('DB_PASSWORD', 'skk360Angelus');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'iXp9,}nkRG-{5OZrn,s{uH&<Z=S}b?fZc-Z~]?1Y35Bo:.So4 R|j:2~fDn?,0|T');
define('SECURE_AUTH_KEY',  'xzIX3`@ocx*8f?dbtMMH0-S-!+e*<Qkud148f,-IQ:-a@&2hd|+1&as!GqFW/CGQ');
define('LOGGED_IN_KEY',    '{^TBZlxG}TTuTAOdMEm*?| k`iq|% W69RhW+-Kz[GDncZV.+:2VHpP|<g!<uxLR');
define('NONCE_KEY',        'U,K%;|>G}cd-?My )1-UBqsCQ.X+Z?h*w;Z$M(5T_v;&>DuY=>US.bBEn~@S+DV(');
define('AUTH_SALT',        'd+NME:ow]? a?COcvSBw:([NKysv$>|avy@G|B+;n#3_9WYx):V>3=r.inz4jE-e');
define('SECURE_AUTH_SALT', 'dCc*tjRHd(]mtEX-VH+qHXSSiSf@YuBHWz[`moq&3O.tLT$r;CYrWu^#k]e@F+tN');
define('LOGGED_IN_SALT',   '}VsI`Une/u^+ok]zb:8^]>u7P7Tc6O,i|XdmHF8Ur~-^BhB<9.J G57~UotHCpW0');
define('NONCE_SALT',       ' +gQYLKN9TTNs(7F~kSM&4&4W)+/GVRUyz$RVh}-{*0 $}-)PGHGhA|cjRE(be1&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * Defines wordpress address URL
 */
define('WP_SITEURL', 'http://clarawu.com/blog');
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

define('WP_ALLOW_REPAIR', true);

