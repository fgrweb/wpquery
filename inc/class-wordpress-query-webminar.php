<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that core attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://fgrweb.es/
 * @since      1.0.0
 *
 * @package    WP_Query_Webminar
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    WP_Query_Webminar
 * @author     Fernando Garcia Rebolledo <info@fgrweb.es>
 */
if ( ! class_exists( 'WordPress_Query_Webminar' ) ) {
	class WordPress_Query_Webminar {

		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
		 */
		protected $plugin_name;

		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $version    The current version of the plugin.
		 */
		protected $version;

		/**
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {
			if ( defined( 'WP_QUERY_WEBMINAR_VERSION' ) ) {
				$this->version = WP_QUERY_WEBMINAR_VERSION;
			} else {
				$this->version = '1.0.0';
			}
			$this->plugin_name = 'wpquery';
		}

		/**
		 * Run the init.
		 *
		 * @since    1.0.0
		 */
		public function init() {
			require_once PLUGIN_PATH . 'inc/admin/class-wordpress-query-webminar-admin.php';
			require_once PLUGIN_PATH . 'inc/admin/cpt/class-wp-query-cpt-films.php';
		}

		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the plugin.
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}

		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_version() {
			return $this->version;
		}

	}
}
