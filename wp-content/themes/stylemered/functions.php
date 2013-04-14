<?php
// THEME SETUP
function smr_setup()
{
	global $theme;

	$theme = wp_get_theme();

	// Theme supports...
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	// Register primary nav
	register_nav_menu( 'primary', 'Primary Menu' );

	// Register image sizes
	add_image_size( 'home-slide', 730, 487 );
}
add_action( 'after_setup_theme', 'smr_setup' );

// LOAD STYLES/SCRIPTS
function smr_scripts_styles()
{
	// Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Load normalize/main stylesheets
	wp_enqueue_style( 'smr-google-fonts', 'http://fonts.googleapis.com/css?family=Merriweather:400,700|Lato:300' );
	wp_enqueue_style( 'smr-normalize', get_template_directory_uri().'/css/normalize.css' );
	wp_enqueue_style( 'smr-style', get_stylesheet_uri(), false, '140413' );

	// Load modernizr
	wp_enqueue_script( 'smr-modernizr', get_template_directory_uri().'/js/vendor/modernizr-2.6.2.min.js' );

	// Load footer scripts
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, false, true );
	wp_enqueue_script( 'jquery' );

	// FLEXSLIDER PAGES ------------------------------
	if ( is_front_page() )
	{
		wp_enqueue_style( 'flexslider', get_template_directory_uri().'/css/flexslider.css' );
		wp_enqueue_script( 'flexslider', get_template_directory_uri().'/js/vendor/jquery.flexslider-min.js', array( 'jquery' ), false, true );
	}

	wp_enqueue_script( 'smr-plugins', get_template_directory_uri().'/js/plugins.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'smr-script', get_template_directory_uri().'/js/main.js', array( 'jquery' ), '060313', true );
}
add_action( 'wp_enqueue_scripts', 'smr_scripts_styles' );

// LOAD ADMIN STYLES/SCRIPTS
function smr_admin_enqueue_scripts()
{
	wp_enqueue_style( 'smr-admin-style', get_template_directory_uri().'/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'smr_admin_enqueue_scripts' );

function smr_init()
{
	//Default arguments
	$args = array
	(
		'public' 				=> true,
		'publicly_queryable'	=> true,
		'show_ui' 				=> true, 
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post', 
		'hierarchical' 			=> false,
		'menu_position' 		=> NULL,
		'show_in_menu'			=> true
	);

	/* SLIDES ---------------------------------------------------- */
	
	$labels = array
	(
		'name' 					=> 'Slides',
		'singular_name' 		=> 'Slide',
		'add_new' 				=> 'Add New',
		'add_new_item' 			=> 'Add New Slide',
		'edit_item' 			=> 'Edit Slide',
		'new_item' 				=> 'New Slide',
		'view_item' 			=> 'View Slide',
		'search_items' 			=> 'Search Slides',
		'not_found' 			=> 'No Slides found',
		'not_found_in_trash'	=> 'No Slides found in Trash',
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Slides'
	);
	
	$args['labels'] 			= $labels;
	$args['supports'] 			= array( 'title', 'thumbnail', 'page-attributes' );
	$args['has_archive']		= false;
	$args['menu_icon']			= get_bloginfo( 'template_directory' ).'/custom/img/slides.png';
	
	register_post_type( 'slide', $args);

	/* EDITORIALS ---------------------------------------------------- */
	
	$labels = array
	(
		'name' 					=> 'Editorials',
		'singular_name' 		=> 'Editorial',
		'add_new' 				=> 'Add New',
		'add_new_item' 			=> 'Add New Editorial',
		'edit_item' 			=> 'Edit Editorial',
		'new_item' 				=> 'New Editorial',
		'view_item' 			=> 'View Editorial',
		'search_items' 			=> 'Search Editorials',
		'not_found' 			=> 'No Editorials found',
		'not_found_in_trash'	=> 'No Editorials found in Trash',
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Editorials'
	);
	
	$args['labels'] 			= $labels;
	$args['supports'] 			= array( 'title', 'page-attributes' );
	$args['has_archive']		= false;
	$args['menu_icon']			= get_bloginfo( 'template_directory' ).'/custom/img/editorials.png';
	
	register_post_type( 'editorial', $args);

	/* TESTIMONIALS ---------------------------------------------------- */
	
	$labels = array
	(
		'name' 					=> 'Testimonials',
		'singular_name' 		=> 'Testimonial',
		'add_new' 				=> 'Add New',
		'add_new_item' 			=> 'Add New Testimonial',
		'edit_item' 			=> 'Edit Testimonial',
		'new_item' 				=> 'New Testimonial',
		'view_item' 			=> 'View Testimonial',
		'search_items' 			=> 'Search Testimonials',
		'not_found' 			=> 'No Testimonials found',
		'not_found_in_trash'	=> 'No Testimonials found in Trash',
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Testimonials'
	);
	
	$args['labels'] 			= $labels;
	$args['supports'] 			= array( 'title', 'editor', 'page-attributes', 'thumbnail' );
	$args['has_archive']		= false;
	$args['menu_icon']			= get_bloginfo( 'template_directory' ).'/custom/img/testimonials.png';
	
	register_post_type( 'testimonial', $args);
}
add_action( 'init', 'smr_init' );

// CREATE META BOXES
function smr_add_meta_boxes()
{
	add_meta_box( 'editorial-details', "Editorial Details", 'meta_views', 'editorial', 'advanced', 'default', array( 'id' => 'editorial-details' ) );
	add_meta_box( 'testimonial-details', "Testimonial Details", 'meta_views', 'testimonial', 'advanced', 'default', array( 'id' => 'testimonial-details' ) );
}
add_action( 'add_meta_boxes', 'smr_add_meta_boxes' );

// CREATE HTML FOR META BOXES
function meta_views( $post, $metabox )
{
	// Create nonce field for security
	wp_nonce_field( 'smr-save-post', 'smr-nonce' );

	// Get all meta for this post
	$vals = get_post_custom( $post->ID );

	// Get all attachments for this post (excluding featured image)
	$args = array(

		'post_type' 		=> 'attachment',
		'posts_per_page'	=> -1,
		'post_parent'		=> $post->ID,
		'exclude'			=> get_post_thumbnail_id( $post->ID )
	);
	$attachments = get_posts( $args );

	// Render meta box html
	include( 'meta-boxes/'.$metabox['args']['id'].'.php' );
}

// SAVE POST DATA
function smr_save_post( $post_id )
{
	// If WP is doing an autosave OR nonce doesn't match, don't update any meta fields
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ( !empty( $_POST ) && !wp_verify_nonce( $_REQUEST['smr-nonce'], 'smr-save-post' ) ) ) 
	{
		return;
	}

	// Array to hold meta field names for updating
	$vals = array();

	// Add meta field names to array, dependant on post type
	switch( $_POST['post_type'] )
	{
		case 'testimonial':

			array_push( $vals, 'job-title' );
			break;
	}

	// For each meta field in array, update
	foreach( $vals as $v )
	{
		update_post_meta( $post_id, $v, $_POST[$v] );
	}

	// If pdf file has been uploaded
	if ( $_FILES['download']['error'] == UPLOAD_ERR_OK )
	{
		// Get current attachments
		$args = array(

			'post_type' 		=> 'attachment',
			'posts_per_page'	=> -1,
			'post_parent'		=> $post_id,
			'exclude'			=> get_post_thumbnail_id( $post_id )
		);
		$attachments = get_posts( $args );

		// Delete each attachment
		foreach( $attachments as $a )
		{
			wp_delete_attachment( $a->ID, true );
		}

		// Upload file
		$file = wp_handle_upload( $_FILES['download'], array( 'test_form' => false ) );

		// If uploaded successfully
		if ( $file )
		{
			// Create attachment record for uploaded file
			$data = array(

				'post_title'		=> preg_replace( '/\.[^.]+$/', '', basename( $file['file'] ) ),
				'post_content'		=> '',
				'post_mime_type'	=> $file['type'],
				'post_status'		=> 'inherit'
			);
			$attach_id = wp_insert_attachment( $data, $file['file'], $post_id );

			// Generate required meta data for attachment
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			$attach_data = wp_generate_attachment_metadata( $attach_id, $file['file'] );
			wp_update_attachment_metadata( $attach_id, $attach_data );
		}
	}
}
add_action( 'save_post', 'smr_save_post' );

// STOP WP PUTTING P TAGS AROUND IMGS IN CONTENT
/*function smr_the_content( $content )
{
	// Remove <p> tags around images
	$html = preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
	
	// Remove width/height attributes
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	
	return $html;
}
add_filter( 'the_content', 'smr_the_content' );*/

// MAKE SURE ADMIN POST FORM ACCEPTS FILES
function smr_post_edit_form_tag()
{
    echo ' enctype="multipart/form-data"';
}
add_action( 'post_edit_form_tag', 'smr_post_edit_form_tag' );

// CHANGE EXCERPT LENGTH
function smr_excerpt_length( $length )
{
	return 25;
}
add_filter( 'excerpt_length', 'smr_excerpt_length', 999 );

// CHANGE EXCERPT MORE
function smr_excerpt_more( $more )
{
	return '&hellip;';
}
add_filter( 'excerpt_more', 'smr_excerpt_more' );
?>