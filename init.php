<?php
/**
 *
 * @link              https://fgrweb.es/
 * @since             1.0.0
 * @package           WP_Query_Webminar
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Query Webminar
 * Plugin URI:        https://fgrweb.es/
 * Description:       Plugin for WP_Query Webminar.
 * Version:           1.0.0
 * Author:            F.GR
 * Author URI:        https://fgrweb.es/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-query
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_QUERY_WEBMINAR_VERSION', '1.0.0' );

! defined( 'PLUGIN_PATH' ) && define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
/**
 * Begins execution of the plugin.
 * @since    1.0.0
 */
if ( ! function_exists( 'run_wordpress_query_webminar' ) ) {
	function run_wordpress_query_webminar() {
		require_once PLUGIN_PATH . '/inc/class-wordpress-query-webminar.php';
		$plugin = new WordPress_Query_Webminar();
		$plugin->init();
	}
}
add_action( 'plugins_loaded', 'run_wordpress_query_webminar', 11 );

