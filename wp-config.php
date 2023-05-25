<?php
/**
 * #ddev-generated: Automatically generated WordPress settings file.
 * ddev manages this file and may delete or overwrite the file unless this comment is removed.
 * It is recommended that you leave this file alone.
 *
 * @package ddevapp
 */

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Authentication Unique Keys and Salts. */
define( 'AUTH_KEY', 'pFmAPYUZnGmEzLaZilGcHBWoHXPhEryiXiraVHzmkjhiUlSgbaBlFiGPAPaKjZAi' );
define( 'SECURE_AUTH_KEY', 'SoYhftWYsmFDWmalNvevzvCbuHuaerUwHbLePmRoksNHBenXUkNsDJqszYOaSPKt' );
define( 'LOGGED_IN_KEY', 'xAPuwgEWNvzkoceODyBlDbTphcXMdIGTMHsQUxsNZEZfZNbCTQAYcilFttGfamXL' );
define( 'NONCE_KEY', 'hApqxgqHxZgEbshdCGAkmPNvsUJLXdkvOgmJHaeefGNZbYOxCQGlpnLASoPXvUZx' );
define( 'AUTH_SALT', 'hRoXvoQwhmAZcQihSLLoDqsbdtBpenApsoisForXWzubOGlnqvgiPnSBOcGlKhbN' );
define( 'SECURE_AUTH_SALT', 'DWAQDxmjXWHhBbzMvHMpaivUtoZMpCxYNsWoWgEdKASyfGgScbZjAiRnOJdGkKkZ' );
define( 'LOGGED_IN_SALT', 'ryyiVRKEDLaVEQpkPRhaaWVKuFBuQOhRxMzxPCeUiHdIvhaoawqVWLtHRdBqeCoW' );
define( 'NONCE_SALT', 'mDLMVyalARHoxqgWLbNmaCseNAWaqfVgNKgBZjJCSuUcbSRozOGCJbloPFGhQeCg' );

/** Absolute path to the WordPress directory. */
defined( 'ABSPATH' ) || define( 'ABSPATH', dirname( __FILE__ ) . '/' );

// Include for settings managed by ddev.
$ddev_settings = dirname( __FILE__ ) . '/wp-config-ddev.php';
if ( is_readable( $ddev_settings ) && ! defined( 'DB_USER' ) && getenv( 'IS_DDEV_PROJECT' ) == 'true' ) {
	require_once( $ddev_settings );
}

/** Include wp-settings.php */
if ( file_exists( ABSPATH . '/wp-settings.php' ) ) {
	require_once ABSPATH . '/wp-settings.php';
}
