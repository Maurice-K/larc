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

define('DB_NAME', 'louisid3_wrd48');

/* Switch this value between true and false to enable and disable debugging */
define('WP_DEBUG', true);

/* This will log all errors notices and warnings to a file called debug.log in wp-content only when WP_DEBUG is true */
if (WP_DEBUG) {
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);
    @ini_set('display_errors', 0);
    @ini_set('error_reporting', E_ALL & ~E_NOTICE );
    @error_reporting(E_ALL & ~E_NOTICE);
}

/** MySQL database username */

define('DB_USER', 'louisid3_wrd48');



/** MySQL database password */

define('DB_PASSWORD', '7AjHTZz1UQ');



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


define('AUTH_KEY',         'NhFaFN5ZzLUPzCmkndx7RFIRPqapaLKBuaqXDizbEoeaC4ep6DJZFABiRr5SkU1O');

define('SECURE_AUTH_KEY',  'kdwc4L98Dj6HG3yblj22cw7S5GXDUmKMPMTys8CrWguSycrCicK2AZu4OZUlijOX');

define('LOGGED_IN_KEY',    'erntQnWwCPGc0pcmcAFOqkwTM9ijooEjxlY3XGR8ocIkQQX7wQzYu8HQrw3JATzf');

define('NONCE_KEY',        'VOt2ByOGp6dEG0QG8jvVAaixoF8XPD6sXVkjDRVsoVRmmi9A7OXfj5zRBuGDPLa3');

define('AUTH_SALT',        'dW5YRO7rtibXnKLSEiRwRptRdqmSQJR4XHZUqbFJRht1oHLme13JYUUyi4MaFGZG');

define('SECURE_AUTH_SALT', '1TsjuQemlzTpaIyPXx0rKnWEYiUBumohhrFA2H8k5NnXmH6PuytRGxdmPlvMLwMI');

define('LOGGED_IN_SALT',   'nNEpe1JW1k6Q6rCBF6ACIC3IJANkg0bbbjTpDXg4AAMOsAVoqXTxwWarDipmuLsN');

define('NONCE_SALT',       'UlXRk19xI9ulP20B38hBWZs4qM7R7Ggt3xb7jsu82yn8ggk9NDJTVTv22aA0QoPC');



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

/* sets memory allocated for PHP to wordPress lol */
define('WP_MEMORY_LIMIT','128M');
define('WP_MAX_MEMORY_LIMIT','256M');

/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

