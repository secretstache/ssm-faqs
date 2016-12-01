<?php
/**
 * SSM FAQs
 *
 * @package   SSM_FAQs
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package SSM_FAQs
 */
class SSM_FAQs_Registrations {

	public $post_type = 'faq';

	// public $taxonomies = array( 'faq-category' );

	public function init() {
		// Add the SSM FAQs and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses SSM_FAQs_Registrations::register_post_type()
	 * @uses SSM_FAQs_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		//$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'FAQs', 'ssm-faqs' ),
			'singular_name'      => __( 'FAQs', 'ssm-faqs' ),
			'add_new'            => __( 'Add FAQ', 'ssm-faqs' ),
			'add_new_item'       => __( 'Add FAQ', 'ssm-faqs' ),
			'edit_item'          => __( 'Edit FAQ', 'ssm-faqs' ),
			'new_item'           => __( 'New FAQ', 'ssm-faqs' ),
			'view_item'          => __( 'View FAQ', 'ssm-faqs' ),
			'search_items'       => __( 'Search FAQ', 'ssm-faqs' ),
			'not_found'          => __( 'No FAQs found', 'ssm-faqs' ),
			'not_found_in_trash' => __( 'No FAQs in the trash', 'ssm-faqs' ),
		);

		$supports = array(
			'title',
			'editor',
		);

		$args = array(
			'labels'          		=> $labels,
			'supports'        		=> $supports,
			'public'          		=> false,
			'capability_type' 		=> 'page',
			'publicly_queriable'	=> true,
			'show_ui' 						=> true,
			'show_in_nav_menus' 	=> false,
			'rewrite'         		=> false,
			'menu_position'   		=> 30,
			'menu_icon'       		=> 'dashicons-format-status',
			'has_archive'					=> false,
			'exclude_from_search'	=> true,
		);

		$args = apply_filters( 'SSM_FAQs_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	// protected function register_taxonomy_category() {
	// 	$labels = array(
	// 		'name'                       => __( 'FAQ Categories', 'ssm-faqs' ),
	// 		'singular_name'              => __( 'FAQ Category', 'ssm-faqs' ),
	// 		'menu_name'                  => __( 'Category', 'ssm-faqs' ),
	// 		'edit_item'                  => __( 'Edit FAQ Category', 'ssm-faqs' ),
	// 		'update_item'                => __( 'Update FAQ Category', 'ssm-faqs' ),
	// 		'add_new_item'               => __( 'Add New FAQ Category', 'ssm-faqs' ),
	// 		'new_item_name'              => __( 'New FAQ Category Name', 'ssm-faqs' ),
	// 		'parent_item'                => __( 'Parent FAQ Category', 'ssm-faqs' ),
	// 		'parent_item_colon'          => __( 'Parent FAQ Category:', 'ssm-faqs' ),
	// 		'all_items'                  => __( 'All FAQ Categories', 'ssm-faqs' ),
	// 		'search_items'               => __( 'Search FAQ Categories', 'ssm-faqs' ),
	// 		'popular_items'              => __( 'Popular FAQ Categories', 'ssm-faqs' ),
	// 		'separate_items_with_commas' => __( 'Separate FAQ categories with commas', 'ssm-faqs' ),
	// 		'add_or_remove_items'        => __( 'Add or remove FAQ categories', 'ssm-faqs' ),
	// 		'choose_from_most_used'      => __( 'Choose from the most used FAQ categories', 'ssm-faqs' ),
	// 		'not_found'                  => __( 'No FAQ categories found.', 'ssm-faqs' ),
	// 	);

	// 	$args = array(
	// 		'labels'            => $labels,
	// 		'public'            => true,
	// 		'show_in_nav_menus' => true,
	// 		'show_ui'           => true,
	// 		'show_tagcloud'     => true,
	// 		'hierarchical'      => true,
	// 		'rewrite'           => array( 'slug' => 'faq-category' ),
	// 		'show_admin_column' => true,
	// 		'query_var'         => true,
	// 	);

	// 	$args = apply_filters( 'SSM_FAQs_category_args', $args );

	// 	register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	// }
}