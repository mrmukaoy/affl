<?php
function affl_register_my_taxes_show_thumbs() {

	/**
	 * Taxonomy: Featured Image Hooks.
	 */

	$labels = [
		"name"          => __( "Featured Image Hooks", "affl" ),
		"singular_name" => __( "Featured Image Hook", "affl" ),
	];

	$args = [
		"label"                 => __( "Featured Image Hooks", "affl" ),
		"labels"                => $labels,
		"public"                => true,
		"publicly_queryable"    => true,
		"hierarchical"          => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => false,
		"query_var"             => true,
		"rewrite"               => [
			'slug'       => 'show_thumbs',
			'with_front' => false, ],
		"show_admin_column"     => true,
		"show_in_rest"          => true,
		"rest_base"             => "show_thumbs",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit"    => false,
	];
	register_taxonomy( "show_thumbs", [ "post" ], $args );
}
add_action( 'init', 'affl_register_my_taxes_show_thumbs' );
