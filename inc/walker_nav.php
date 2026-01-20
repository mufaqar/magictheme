<?php
class Walker_Nav_Menu_Bootstrap extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'nav-item'; // Add Bootstrap nav-item to all <li>

        if ( in_array( 'current-menu-item', $classes ) ) {
            $classes[] = 'active'; // Mark active item
        }
        // Custom badge logic: Add 'position-relative' and badge span if menu item title is 'Poster'
        $badge = '';
        if ( 'Poster' === $item->title ) {
            $classes[] = 'position-relative';
            $badge = '<span class="vm-new-badge">New</span>';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a class="nav-link' . ( in_array( 'active', $classes ) ? ' active' : '' ) . '" ' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $badge; // Append badge if applicable
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}



function cptui_register_my_cpts_prints() {

	/**
	 * Post Type: Prints.
	 */

	$labels = [
		"name" => esc_html__( "Prints", "hello-elementor" ),
		"singular_name" => esc_html__( "Print", "hello-elementor" ),
	];

	$args = [
		"label" => esc_html__( "Prints", "hello-elementor" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "prints", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "prints", $args );
}

add_action( 'init', 'cptui_register_my_cpts_prints' );

function cptui_register_my_taxes_print_types() {

	/**
	 * Taxonomy: Types.
	 */

	$labels = [
		"name" => esc_html__( "Types", "hello-elementor" ),
		"singular_name" => esc_html__( "Type", "hello-elementor" ),
	];

	
	$args = [
		"label" => esc_html__( "Types", "hello-elementor" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'print_types', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "print_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "print_types", [ "prints" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_print_types' );