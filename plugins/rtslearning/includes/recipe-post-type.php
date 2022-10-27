<?php

function up_recipe_post_type() {
    $labels = array(
		'name'                  => _x( 'recipes', 'Post type general name', 'rtslearning' ),
		'singular_name'         => _x( 'recipe', 'Post type singular name', 'rtslearning' ),
		'menu_name'             => _x( 'recipes', 'Admin Menu text', 'rtslearning' ),
		'name_admin_bar'        => _x( 'recipe', 'Add New on Toolbar', 'rtslearning' ),
		'add_new'               => __( 'Add New', 'rtslearning' ),
		'add_new_item'          => __( 'Add New recipe', 'rtslearning' ),
		'new_item'              => __( 'New recipe', 'rtslearning' ),
		'edit_item'             => __( 'Edit recipe', 'rtslearning' ),
		'view_item'             => __( 'View recipe', 'rtslearning' ),
		'all_items'             => __( 'All recipes', 'rtslearning' ),
		'search_items'          => __( 'Search recipes', 'rtslearning' ),
		'parent_item_colon'     => __( 'Parent recipes:', 'rtslearning' ),
		'not_found'             => __( 'No recipes found.', 'rtslearning' ),
		'not_found_in_trash'    => __( 'No recipes found in Trash.', 'rtslearning' ),
		'featured_image'        => _x( 'recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'rtslearning' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'rtslearning' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'rtslearning' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'rtslearning' ),
		'archives'              => _x( 'recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'rtslearning' ),
		'insert_into_item'      => _x( 'Insert into recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'rtslearning' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'rtslearning' ),
		'filter_items_list'     => _x( 'Filter recipes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'rtslearning' ),
		'items_list_navigation' => _x( 'recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'rtslearning' ),
		'items_list'            => _x( 'recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'rtslearning' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // ?tutorial=pizza
		'rewrite'            => array( 'slug' => 'recipe' ), // /recipe/pizza
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
        'description'        => __('A custom post type for recipes', 'rtslearning'),
        'taxonomies'         => ['category', 'post_tag']
	);

	register_post_type( 'recipe', $args );

    register_taxonomy('cuisine', 'recipe', [
        'label' => __('Cuisine', 'rtslearning'),
        'rewrite' => ['slug' => 'cuisine'],
        'show_in_rest' => true
    ]);

	register_term_meta('cuisine', 'more_info_url', [
	'type' => 'string',
	'description' => __('A URL for more information on a cuisine', 'rtslearning'),
	'single' => true,
	'show_in_rest' => true,
	'default' => '#'
	]);

	register_post_meta('recipe', 'recipe_rating', [
		'type' => 'number',
		'description' => __('The Rating for a recipe', 'rtslearning'),
		'single' => true,
		'default' => 0,
		'show_in_rest' => true
	]);

}