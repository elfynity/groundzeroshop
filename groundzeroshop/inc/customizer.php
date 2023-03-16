<?php
/**
 * Twenty Sixteen Customizer functionality
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

 
 
 
/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since Twenty Sixteen 1.0
 *
 * @see twentysixteen_header_style()
 */
function twentysixteen_custom_header_and_background() {
	$default_background_color = trim( $color_scheme[0], '#' );

	/**
	 * Filter the arguments used when adding 'custom-background' support in Twenty Sixteen.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'twentysixteen_custom_background_args', array(
		'default-color' => $default_background_color,
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support in Twenty Sixteen.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'twentysixteen_custom_header_args', array(
		'default-text-color'     => $default_text_color,
		'width'                  => 1200,
		'height'                 => 280,
		'flex-height'            => true,
		'wp-head-callback'       => 'twentysixteen_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'twentysixteen_custom_header_and_background' );

if ( ! function_exists( 'twentysixteen_header_style' ) ) :
/**
 * Styles the header text displayed on the site.
 *
 * Create your own twentysixteen_header_style() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @see twentysixteen_custom_header_and_background().
 */
function twentysixteen_header_style() {
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
	<style type="text/css" id="twentysixteen-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-branding .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php
}
endif; // twentysixteen_header_style










/**
 * Adds postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function twentysixteen_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'twentysixteen_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'twentysixteen_customize_partial_blogdescription',
		) );
	}

	// Add page background color setting and control.
	$wp_customize->add_setting( 'page_background_color', array(
		'default'           => $color_scheme[1],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_background_color', array(
		'label'       => __( 'Page Background Color', 'twentysixteen' ),
		'section'     => 'colors',
	) ) );
	
		// Add main text color setting and control.
	$wp_customize->add_setting( 'main_text_color', array(
		'default'           => $color_scheme[3],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_text_color', array(
		'label'       => __( 'Main Text Color', 'twentysixteen' ),
		'section'     => 'colors',
	) ) );
	
	// Add page background color setting and control.
	$wp_customize->add_setting( 'footer_background_color', array(
		'default'           => $color_scheme[1],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
		'label'       => __( 'Footer Background Color', 'twentysixteen' ),
		'section'     => 'colors',
	) ) );	


	
		



		

/*
	$wp_customize->add_section( 'fonts',
		 array(
				'title' => __( 'Fonts' ),
				'description' => esc_html__( 'These are an example of Customizer Custom Controls.' ),
				'panel' => '', // Only needed if adding your Section to a Panel
				'priority' => 160, // Not typically needed. Default is 160
				'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
				'theme_supports' => '', // Rarely needed
				'active_callback' => '', // Rarely needed
				'description_hidden' => 'false', // Rarely needed. Default is False
		 )
	);


	$wp_customize->add_setting( 'select_fonts_id', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'themeslug_sanitize_select',
		'default' => 'value1',
	) );

	$wp_customize->add_control( 'select_fonts_id', array(
		'type' => 'select',
		'section' => 'fonts', // Add a default or your own section
		'label' => __( 'Font Family' ),
		'description' => __( 'This is a custom select option.' ),
		'choices' => array(
			'roboto' => __( 'roboto' ),
			'montserrat' => __( 'montserrat' ),
			'raleway' => __( 'raleway' ),
		),
	) );

	function themeslug_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	} */


	
	
	
	

}
add_action( 'customize_register', 'twentysixteen_customize_register', 11 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Twenty Sixteen 1.2
 * @see twentysixteen_customize_register()
 *
 * @return void
 */
function twentysixteen_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Twenty Sixteen 1.2
 * @see twentysixteen_customize_register()
 *
 * @return void
 */
function twentysixteen_customize_partial_blogdescription() {
	bloginfo( 'description' );
}



if ( ! function_exists( 'twentysixteen_get_color_scheme_choices' ) ) :
/**
 * Retrieves an array of color scheme choices registered for Twenty Sixteen.
 *
 * Create your own twentysixteen_get_color_scheme_choices() function to override
 * in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return array Array of color schemes.
 */
function twentysixteen_get_color_scheme_choices() {
	$color_schemes                = twentysixteen_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}
endif; // twentysixteen_get_color_scheme_choices


if ( ! function_exists( 'twentysixteen_sanitize_color_scheme' ) ) :
/**
 * Handles sanitization for Twenty Sixteen color schemes.
 *
 * Create your own twentysixteen_sanitize_color_scheme() function to override
 * in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function twentysixteen_sanitize_color_scheme( $value ) {
	$color_schemes = twentysixteen_get_color_scheme_choices();

	if ( ! array_key_exists( $value, $color_schemes ) ) {
		return 'default';
	}

	return $value;
}
endif; // twentysixteen_sanitize_color_scheme

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @see wp_add_inline_style()
 */


/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20160412', true );

}
add_action( 'customize_controls_enqueue_scripts', 'twentysixteen_customize_control_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_customize_preview_js() {
	wp_enqueue_script( 'twentysixteen-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20160412', true );
}
add_action( 'customize_preview_init', 'twentysixteen_customize_preview_js' );

/**
 * Returns CSS for the color schemes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function twentysixteen_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'background_color'      => '',
	) );

	return <<<CSS
	/* Color Scheme */

	/* Background Color */
	body {
		background-color: {$colors['background_color']};
	}

	
CSS;
}


/**
 * Outputs an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_color_scheme_css_template() {
	$colors = array(
		'background_color'      => '{{ data.background_color }}',
	);
	?>
	<script type="text/html" id="tmpl-twentysixteen-color-scheme">
		<?php echo twentysixteen_get_color_scheme_css( $colors ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'twentysixteen_color_scheme_css_template' );




