<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140318', true );

	$font_url = twentytwelve_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function twentytwelve_mce_css( $mce_css ) {
	$font_url = twentytwelve_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<div class="sidebar-nav">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<div class="sidebar-nav">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<div class="sidebar-nav">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	) );
        register_sidebar( array(
		'name' => __( 'Footer-bottom-1', 'twentytwelve' ),
		'id' => 'Footer-bottom-1',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	) );
        register_sidebar( array(
		'name' => __( 'Footer-bottom-2', 'twentytwelve' ),
		'id' => 'Footer-bottom-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	) );
        register_sidebar( array(
		'name' => __( 'Footer-bottom-3', 'twentytwelve' ),
		'id' => 'Footer-bottom-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_customize_preview_js() {
	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );

function my_custom_post_product() {
  $labels = array(
    'name'               => _x( 'Custom-Post', 'post type general name' ),
    'singular_name'      => _x( 'Custom-Post', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Custom Post' ),
    'add_new_item'       => __( 'Add New Custom Post' ),
    'edit_item'          => __( 'Edit Custom Post' ),
    'new_item'           => __( 'New Custom Post' ),
    'all_items'          => __( 'All Custom Posts' ),
    'view_item'          => __( 'View Custom Post' ),
    'search_items'       => __( 'Search Custom Post' ),
    'not_found'          => __( 'No products found' ),
    'not_found_in_trash' => __( 'No products found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'CustomPost'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our custom posts types specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => true,
  );
  register_post_type( 'custompost', $args ); 
}
add_action( 'init', 'my_custom_post_product' );
function my_taxonomies_product() {
  $labels = array(
    'name'              => _x( 'Custompost Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Custompost Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Custompost Categories' ),
    'all_items'         => __( 'All Custompost Categories' ),
    'parent_item'       => __( 'Parent Custompost Category' ),
    'parent_item_colon' => __( 'Parent Custompost Category:' ),
    'edit_item'         => __( 'Edit Custompost Category' ), 
    'update_item'       => __( 'Update Custompost Category' ),
    'add_new_item'      => __( 'Add New Custompost Category' ),
    'new_item_name'     => __( 'New Custompost Category' ),
    'menu_name'         => __( 'Custompost Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'Custompost_category', 'custompost', $args );
}
add_action( 'init', 'my_taxonomies_product', 0 );
function my_testimonialpost_post_product() {
  $labels = array(
    'name'               => _x( 'Testimonial-Post', 'post type general name' ),
    'singular_name'      => _x( 'Testimonial-Post', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Testimonial Post' ),
    'add_new_item'       => __( 'Add New Testimonial Post' ),
    'edit_item'          => __( 'Edit Testimonial Post' ),
    'new_item'           => __( 'New Testimonial Post' ),
    'all_items'          => __( 'All Testimonial Posts' ),
    'view_item'          => __( 'View Testimonial Post' ),
    'search_items'       => __( 'Search Testimonial Post' ),
    'not_found'          => __( 'No products found' ),
    'not_found_in_trash' => __( 'No products found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Testimonial'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our testimonial posts types specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor','excerpt'),
    'has_archive'   => true,
  );
  register_post_type( 'testimonialpost', $args ); 
}
add_action( 'init', 'my_testimonialpost_post_product' );
function my_testtaxonomies_product() {
  $labels = array(
    'name'              => _x( 'Testimonial Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Testimonial Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Testimonial Categories' ),
    'all_items'         => __( 'All Testimonial Categories' ),
    'parent_item'       => __( 'Parent Testimonial Category' ),
    'parent_item_colon' => __( 'Parent Testimonial Category:' ),
    'edit_item'         => __( 'Edit Testimonial Category' ), 
    'update_item'       => __( 'Update Testimonial Category' ),
    'add_new_item'      => __( 'Add New Testimonial Category' ),
    'new_item_name'     => __( 'New Testimonial Category' ),
    'menu_name'         => __( 'Testimonial Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'Testimonial_category', 'testimonialpost', $args );
}
add_action( 'init', 'my_testtaxonomies_product', 0 );
add_action('admin_menu', 'create_theme_options_page');
function create_theme_options_page() {  
    add_options_page('Theme Options', 'Theme Options', 'administrator', __FILE__, 'build_options_page');
}
function build_options_page() { ?>  
<div id="theme-options-wrap" class="widefat">    
    <div class="icon32" id="icon-tools"><br/></div>   
    <h2>Home Page Options</h2>   
    <p>Take control of your theme, by overriding the default settings for Home page.</p>    
    <form method="post" action="options.php" enctype="multipart/form-data"> 
        <?php settings_fields('plugin_options'); ?>  <?php do_settings_sections(__FILE__); ?>
        <p class="submit">        
            <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /> 
        </p>    
    </form>  
</div><?php } 
add_action('admin_init', 'register_and_build_fields');
function register_and_build_fields() 
{   register_setting('plugin_options', 'plugin_options', 'validate_setting');
    add_settings_section('main_section', 'Main Settings', 'section_cb', __FILE__);
    add_settings_field('logo', 'Header Logo:', 'logo_setting', __FILE__, 'main_section'); // LOGO
    add_settings_field('address', 'Address Field:', 'address_setting', __FILE__, 'main_section'); // LOGO
    add_settings_field('slidertext_heading', 'Slider Text:', 'slidertext_box_setting', __FILE__, 'main_section');
    add_settings_field('service1_heading', 'Service1 Heading:', 'service1_heading_setting', __FILE__, 'main_section');
    add_settings_field('servicebox1_heading', 'Services Box1:', 'service1_box_setting', __FILE__, 'main_section');
    add_settings_field('service2_heading', 'Service2 Heading:', 'service2_heading_setting', __FILE__, 'main_section');
    add_settings_field('servicebox2_heading', 'Services Box2:', 'service2_box_setting', __FILE__, 'main_section');
    add_settings_field('servlogo1', 'Service First Logo:', 'servicelogo1_setting', __FILE__, 'main_section'); // LOGO
    add_settings_field('servlogoheading1', 'Service First Logo Heading:', 'servicelogoheading1_setting', __FILE__, 'main_section'); // LOGO
    add_settings_field('servlogo2', 'Service Second Logo:', 'servicelogo2_setting', __FILE__, 'main_section'); // LOGO
    add_settings_field('servlogoheading2', 'Service Second Logo Heading:', 'servicelogoheading2_setting', __FILE__, 'main_section'); // LOGO
    add_settings_field('service3_heading', 'Service3 Heading:', 'service3_heading_setting', __FILE__, 'main_section');
    add_settings_field('servicebox3_heading', 'Services Box3:', 'service3_box_setting', __FILE__, 'main_section');
    add_settings_field('service4_heading', 'Service4 Heading:', 'service4_heading_setting', __FILE__, 'main_section');
    add_settings_field('servicebox4_heading', 'Services Box4:', 'service4_box_setting', __FILE__, 'main_section');
    add_settings_field('seller_heading', 'For Sellers Text:', 'seller_box_setting', __FILE__, 'main_section');
    add_settings_field('buyer_heading', 'For Buyers Text:', 'buyer_box_setting', __FILE__, 'main_section');
   
 }
function section_cb() {}
function validate_setting($plugin_options) { 
    $keys = array_keys($_FILES); $i = 0; 
    foreach ( $_FILES as $image ) 
        { 
            if ($image['size']) 
            {    
            if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) 
                {       
                    $override = array('test_form' => false);       
                    $file = wp_handle_upload( $image, $override ); // save the file, and store an array, containing its location in $file       
                    $plugin_options[$keys[$i]] = $file['url'];     
                } else 
                {               
                    $options = get_option('plugin_options');// Not an image.       
                    $plugin_options[$keys[$i]] = $options[$logo];       
                    wp_die('No image was uploaded.');// Die and let the user know that they made a mistake.     
                }   
            }  
        else{     
                $options = get_option('plugin_options');     
                $plugin_options[$keys[$i]] = $options[$keys[$i]];   
            }   
        $i++; 
   } 
   return $plugin_options;
   }
function servicelogoheading1_setting() 
    {  $options = get_option('plugin_options');  
       echo "<input name='plugin_options[servlogoheading1]' type='text' value='{$options['servlogoheading1']}' />";
    }
function servicelogoheading2_setting() 
    {  $options = get_option('plugin_options');  
       echo "<input name='plugin_options[servlogoheading2]' type='text' value='{$options['servlogoheading2']}' />";
    }
function address_setting() 
    {  $options = get_option('plugin_options');  
       echo "<textarea name='plugin_options[address]'>{$options['address']}</textarea>";
    }
function service1_heading_setting() 
    {  $options = get_option('plugin_options');  
        echo "<input name='plugin_options[service1_heading]' type='text' value='{$options['service1_heading']}' />";
    }
function service2_heading_setting() 
    {  $options = get_option('plugin_options');  
        echo "<input name='plugin_options[service2_heading]' type='text' value='{$options['service2_heading']}' />";
    }
function service3_heading_setting() 
    {  $options = get_option('plugin_options');  
        echo "<input name='plugin_options[service3_heading]' type='text' value='{$options['service3_heading']}' />";
    }
function service4_heading_setting() 
    {  $options = get_option('plugin_options');  
        echo "<input name='plugin_options[service4_heading]' type='text' value='{$options['service4_heading']}' />";
    }
function service1_box_setting() 
    {  $options = get_option('plugin_options');  
      echo "<textarea name='plugin_options[servicebox1_heading]'>{$options['servicebox1_heading']}</textarea>";
    }
function service2_box_setting() 
    {  $options = get_option('plugin_options');  
        echo "<textarea name='plugin_options[servicebox2_heading]'>{$options['servicebox2_heading']}</textarea>";
    }
function service3_box_setting() 
{  $options = get_option('plugin_options');  
   echo "<textarea name='plugin_options[servicebox3_heading]'>{$options['servicebox3_heading']}</textarea>";
}
function service4_box_setting() 
{  $options = get_option('plugin_options');  
   echo "<textarea name='plugin_options[servicebox4_heading]'>{$options['servicebox4_heading']}</textarea>";
}
function logo_setting() 
{   echo '<input type="file" name="logo" value="" />';
}
function servicelogo1_setting() 
{  echo '<input type="file" name="servlogo1" value="" />';
}
function servicelogo2_setting() 
{  echo '<input type="file" name="servlogo2" value="" />';
}
function slidertext_box_setting() 
{  $options = get_option('plugin_options');  
   echo "<textarea name='plugin_options[slidertext_heading]'>{$options['slidertext_heading']}</textarea>";
}
function seller_box_setting() 
{  $options = get_option('plugin_options');  
   echo "<textarea name='plugin_options[seller_heading]'>{$options['seller_heading']}</textarea>";
}
function buyer_box_setting() 
{  $options = get_option('plugin_options');  
   echo "<textarea name='plugin_options[buyer_heading]'>{$options['buyer_heading']}</textarea>";
}

