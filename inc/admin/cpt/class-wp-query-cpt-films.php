<?php
/**
 * The Films CPT class.
 *
 * @since      1.0.0
 * @package    WP_Query_Webminar
 * @author     Fernando Garcia Rebolledo <info@fgrweb.es>
 */
if ( ! class_exists( 'WP_Query_CPT_Films' ) ) {
	class WP_Query_CPT_Films {
		/**
		 * The CPT name
		 * @since    1.0.0
		 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
		 * @static
		 */
		public static $films = 'fgr-films';

		public function __construct() {
			add_action( 'init', array( $this, 'register_films_post_type' ) );
		}
		/**
		 * Films post types.
		 */
		public function register_films_post_type() {
			if ( post_type_exists( self::$films ) ) {
				return;
			}

			do_action( 'fgr_register_post_type' );

			/*  RECIPES  */

				$labels = array(
					'name'               => __( 'Films', 'wp-query' ),
					'singular_name'      => __( 'Film', 'wp-query' ),
					'add_new'            => __( 'Add New Film', 'wp-query' ),
					'add_new_item'       => __( 'Add New Film', 'wp-query' ),
					'edit'               => __( 'Edit', 'wp-query' ),
					'edit_item'          => __( 'Edit Film', 'wp-query' ),
					'new_item'           => __( 'New Film', 'wp-query' ),
					'view'               => __( 'View Film', 'wp-query' ),
					'view_item'          => __( 'View Film', 'wp-query' ),
					'search_items'       => __( 'Search Film', 'wp-query' ),
					'not_found'          => __( 'Not found', 'wp-query' ),
					'not_found_in_trash' => __( 'Not found in trash', 'wp-query' ),
				);

				$films_post_type_args = array(
					'label'               => __( 'Films', 'wp-query' ),
					'labels'              => $labels,
					'description'         => __( 'This is where Films are stored.', 'wp-query' ),
					'public'              => true,
					'show_ui'             => true,
					'capability_type'     => 'post',
					'map_meta_cap'        => true,
					'publicly_queryable'  => true,
					'exclude_from_search' => true,
					'show_in_menu'        => true,
					'hierarchical'        => true,
					'show_in_nav_menus'   => true,
					'rewrite'             => false,
					'query_var'           => true,
					'supports'            => array( 'title', 'editor', 'thumbnail' ),
					'has_archive'         => false,
					'menu_icon'           => 'dashicons-format-video',
				);

				register_post_type( self::$films, $films_post_type_args );

				/**
				 * Register Taxonomy Genre
				 *
				 */
				$labels_tax = array(
					'name'          => __( 'Genres', 'wp-query' ),
					'singular_name' => __( 'Genre', 'wp-query' ),
					'search_items'  => __( 'Search Genre', 'wp-query' ),
					'all_items'     => __( 'All the Genres', 'wp-query' ),
					'edit_item'     => __( 'Edit Genre', 'wp-query' ),
					'update_item'   => __( 'Update Genre', 'wp-query' ),
					'add_new_item'  => __( 'Add New Genre', 'wp-query' ),
					'new_item_name' => __( 'New Genre', 'wp-query' ),
				);

				register_taxonomy( 'genre', array( self::$films ), array(
					'hierarchical'      => true,
					'labels'            => $labels_tax,
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'genre' ),
				));
		}
	}
	return new WP_Query_CPT_Films();
}
