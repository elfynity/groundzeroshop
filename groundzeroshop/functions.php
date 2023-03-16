<?php
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<div class="woo">';
}

function my_theme_wrapper_end() {
    echo '</div>';
}






 	
// Remove p tags from category meta description
remove_filter('term_description','wpautop');



//REMOVE GUTENBERG BLOCK LIBRARY CSS FROM LOADING ON FRONTEND
function remove_wp_block_library_css(){
wp_dequeue_style( 'wp-block-library' );
wp_dequeue_style( 'wp-block-library-theme' );
wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS
wp_dequeue_style( 'global-styles' ); // REMOVE THEME.JSON
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );




// breadcrumbs
function get_breadcrumb() {
	echo '<a href=""'.home_url().'"" rel=""nofollow"">Home</a>';
	if (is_category() || is_single()) {
		echo "  »  ";
		the_category (' • ');
			if (is_single()) {
				echo "  »  "; ?>
				<span><?php the_title(); ?></span>
		<?php }
	
	} elseif (is_page()) {
			echo "  »  ";
			echo the_title();
	
	} elseif (is_search()) {
			echo "  »  ";
			echo '"<em>';
			echo the_search_query();
			echo '</em>"';
		}
}







// custom fields option pages menu items
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Your Settings'),
            'menu_title'  => __('Your Settings'),
						'icon_url' => 'dashicons-admin-appearance',
            'redirect'    => false,
        ));

					
					
					// Add sub page.
					$child = acf_add_options_sub_page(array(
							'page_title'  => __('Your SEO'),
							'menu_title'  => __('Your SEO'),
							'parent_slug' => $parent['menu_slug'],
					));
					

    }
}






// this allows svg support in the media library only not from within elementor.
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );




	
// add svg support	... again????
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');






// remove default sections and panels in customizer
function numag_remove_sections( $wp_customize ) {

	//$wp_customize->remove_section('header_image');
	//$wp_customize->remove_panel('nav_menus');
	//$wp_customize->remove_panel('widgets');
	//$wp_customize->remove_section('custom_css');	
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
	//$wp_customize->remove_section('static_front_page');	 
	//$wp_customize->remove_section('title_tagline');	
}
add_action( 'customize_register', 'numag_remove_sections');









// add custom widget to dashboard

  
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 


add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function custom_dashboard_help() { ?>
	<h3>Your Settings</h3>
	<p>Please click on Your Settings in the left menu bar to see custom built in options for your website.</p>
<?php }

wp_add_dashboard_widget('custom_help_widget', 'Welcome to your new website!', 'custom_dashboard_help');
}








/* Add Dashicons in WordPress Front-end */

function load_dashicons_front_end() {
	wp_enqueue_style( 'dashicons' );
}

add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );



function my_excerpt_length($length){
	return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');




// stops sending the stupid update emails
add_filter( 'auto_core_update_send_email', '__return_false' );









 





function my_header_video_settings( $settings ) {
	$settings['minWidth'] = 680;
	$settings['minHeight'] = 400;
	return $settings;
}


add_filter( 'header_video_settings', 'my_header_video_settings');


	

	

		
	
	
	
// comopletely disable emojis (smilies)
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}
// END completely disable emojis (smilies)





 






/* Set the $content_width for things such as video embeds. */
if (!isset($content_width)){
   $content_width = 900;
}


if (function_exists('add_theme_support')){
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );	
	add_theme_support('custom-logo');	
	

			

	
	
	// Add Thumbnail Theme Support
	add_theme_support('post-thumbnails');
		add_image_size('gallery-image', 600, 450, true);
		add_image_size('banner-image', 1900, 1900);
		add_image_size('square-image', 500, 500, true);
		add_image_size('tiny-thumbnail', 100, 100, true);
		
	//Show custom images in media library
	add_filter( 'image_size_names_choose', 'my_custom_sizes' );

	function my_custom_sizes( $sizes ) {
			return array_merge( $sizes, array(
					'gallery-image' => __('Gallery Image'),
					'banner-image' => __('Banner Image'),
					'square-image' => __('Square Image'),
					'tiny-thumbnail' => __('Tiny Thumbnail')
			) );
	}
	



	
	

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');


}


//	Functions


function groundzero_textdomain() {
    load_theme_textdomain( 'groundzero', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'groundzero_textdomain' );








function cyba_enqueue_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false ); 
	
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/responsive.css', false ); 
	
	wp_enqueue_style( 'scroll-effects-style', get_template_directory_uri() . '/scroll-effects/scroll-effects-style.css', false ); 
	
	wp_enqueue_script( 'scroll-effects-script', get_template_directory_uri() . '/scroll-effects/scroll-effects-script.js','','', true);

	wp_enqueue_style( 'style-flexible', get_template_directory_uri() . '/style-flexible.css', false ); 
	
	wp_enqueue_style( 'splide', get_template_directory_uri() . '/layouts/css/splide.min.css', false ); 
	
	wp_enqueue_script( 'splide.min', get_template_directory_uri() . '/layouts/js/splide.min.js','','', false);
	
	wp_enqueue_script( 'custom-accordion', get_template_directory_uri() . '/layouts/js/custom-accordion.js','','', true);
	
	wp_enqueue_style( 'woo-styles', get_template_directory_uri() . '/woo/woo-styles.css', false ); 
	
	wp_enqueue_style( 'woo-responsive', get_template_directory_uri() . '/woo/woo-responsive.css', false ); 
	
	//wp_enqueue_script( 'woo-select-buttons', get_template_directory_uri() . '/woo/woo-select-buttons.js','','', true);
	
//	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap.css', false ); 
	
}

add_action( 'wp_enqueue_scripts', 'cyba_enqueue_scripts' );







// menus
add_theme_support('menus');

// Register new menus
function cyba_register_menu(){
    register_nav_menus(array( 
        'primary' => __('Primary Menu'), 
        'mobile' => __('Mobile Menu'),
				'importantLinks' => __('Important Links Menu'), 
				'shop' => __('Shop Menu'), 
				'shop-mobile' => __('Shop Mobile Menu'),
    ));
}

add_action('init', 'cyba_register_menu'); 




// Sidebars
function devgirl_groundzero_sidebar() {

	register_sidebar(
			array (
				'name' => __( 'Footer', 'Cyba' ),
				'id' => 'footer',
				'description' => __( 'This is the sidebar found in the footer' ),
				'before_widget' => '<div class="widget-content">',
				'after_widget' => '</div>',
				'before_title' => '<p class="widget-title">',
				'after_title' => '</p>',
			)
	);
	
	
	register_sidebar(
			array (
				'name' => __( 'Category Pages', 'Cyba' ),
				'id' => 'category-pages',
				'description' => __( 'This is the sidebar found on the category pages' ),
				'before_widget' => '<div class="widget-content">',
				'after_widget' => '</div>',
				'before_title' => '<p class="widget-title">',
				'after_title' => '</p>',
			)
	);

	
}

add_action( 'widgets_init', 'devgirl_groundzero_sidebar' );








// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin

function gz2_pagination(){
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
				'prev_text'          => __( '&larr; Previous' ),
        'next_text'          => __( 'Next &rarr;' ),
    ));
}

add_action('init', 'gz2_pagination'); 












// Custom View Article link to Post
function html5_blank_view_article($more){
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar(){
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag){
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ){
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults){
    $myavatar = get_template_directory_uri() . '/images/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}


// Threaded Comments
function enable_threaded_comments(){
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments



// Custom Comments Callback
function html5blankcomments($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>

    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
  <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }





require get_template_directory() . '/inc/template-tags.php';













			


// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);






// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion

add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)

// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
// add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether







?>