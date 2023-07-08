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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', '5d76c7d193491d76455983bc95bcc62c16ac351efc31c3e2' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'IbJjF,x7FDTD1~vj3ONcfnsO|<;F:7[7]+#Y%T-HNQ}URMy.;0wc&3YFUq[/is1}' );
define( 'SECURE_AUTH_KEY',  '}(o`B<ZKW3G/+&+A$[BHKs[.XZ J|<aG`VQ_/ifbA_3e4R#m<oL{b^ S`DUOXfEH' );
define( 'LOGGED_IN_KEY',    'c/+q.cWh`KktM61.t@Qp$J3@ryHu%q;U5 H1oOPrq~r(;lL>D `B+e(}uhklDf%8' );
define( 'NONCE_KEY',        'e<Ew=Q$zL*TX5M?&TG$]G(131a2o:|y}<vXS%UgowcWJc tlUDS5cdQG+{2ATgm|' );
define( 'AUTH_SALT',        '~5b?CrLpQFj35XaE):x,6K5bEl6m{L(4YG~fM/`CmlOM!5P>d+mZvT5*f%H;{##c' );
define( 'SECURE_AUTH_SALT', 'bI2wc7h`Ifw#zSCNuzZx*+/#)ffX:vUC2GsiFx$z?[Di^!#L;Bzl wN*X??#tltk' );
define( 'LOGGED_IN_SALT',   '1%Tb ad(exjDFRgh>&[Zo2c7({!8ho//^U`:c)pFJVrsJZM*Fqhu,@${$;L)s[c(' );
define( 'NONCE_SALT',       'y,dDGbHL?pw-oRF<MG@Q]S!6C8ZHWH !9n;e+xm!I&,WJQ5*-cV<U/>sQy|],=(K' );

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
