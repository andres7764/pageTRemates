<?php
/**
 * Theme Customizer.
 *
 * @package Easy_Commerce
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function easy_commerce_customize_register( $wp_customize ) {

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/control.php';

	// Register custom controls.
	$wp_customize->register_control_type( 'Easy_Commerce_Heading_Control' );
	$wp_customize->register_control_type( 'Easy_Commerce_Message_Control' );
	$wp_customize->register_control_type( 'Easy_Commerce_Dropdown_Taxonomies_Control' );

	// Load customize helpers.
	require get_template_directory() . '/inc/helper/options.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/callback.php';

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Load customize option.
	require get_template_directory() . '/inc/customizer/option.php';

	// Load customize featured option.
	require get_template_directory() . '/inc/customizer/featured.php';

	// Modify default customizer options.
	$wp_customize->get_control( 'background_color' )->description = __( 'Note: Background Color is applicable only if no image is set as Background Image.', 'easy-commerce' );

	// Register custom section types.
	$wp_customize->register_section_type( 'Easy_Commerce_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Easy_Commerce_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Easy Commerce Pro', 'easy-commerce' ),
				'pro_text' => esc_html__( 'Buy Pro', 'easy-commerce' ),
				'pro_url'  => 'http://themepalace.com/downloads/easy-commerce-pro/',
				'priority'  => 1,
			)
		)
	);

}

add_action( 'customize_register', 'easy_commerce_customize_register' );

/**
 * Customizer partials.
 *
 * @since 1.0.0
 */
function easy_commerce_customizer_partials( WP_Customize_Manager $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->get_setting( 'blogname' )->transport                      = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport               = 'refresh';
		$wp_customize->get_setting( 'theme_options[copyright_text]' )->transport = 'refresh';
        return;

    }

    // Load customizer partials callback.
    require get_template_directory() . '/inc/customizer/partials.php';

    // Partial blogname.
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
    	'selector' => '.site-title a',
    	'container_inclusive' => false,
    	'render_callback' => 'easy_commerce_customize_partial_blogname',
    ) );

    // Partial blogdescription.
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
    	'selector' => '.site-description',
    	'container_inclusive' => false,
    	'render_callback' => 'easy_commerce_customize_partial_blogdescription',
    ) );

    // Partial copyright_text.
    $wp_customize->selective_refresh->add_partial( 'copyright_text', array(
		'selector'            => '#colophon .copyright',
		'container_inclusive' => false,
		'settings'            => array( 'theme_options[copyright_text]' ),
		'render_callback'     => 'easy_commerce_render_partial_copyright_text',
    ) );

}

add_action( 'customize_register', 'easy_commerce_customizer_partials', 99 );

/**
 * Register customizer controls scripts.
 *
 * @since 1.0.0
 */
function easy_commerce_customize_controls_register_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'easy-commerce-customize-controls', get_template_directory_uri() . '/css/customize-controls' . $min . '.css' );
	wp_register_script( 'easy-commerce-customize-controls', get_template_directory_uri() . '/js/customize-controls' . $min . '.js', array( 'jquery', 'customize-controls' ), '1.0.0', true );

}

add_action( 'customize_controls_enqueue_scripts', 'easy_commerce_customize_controls_register_scripts', 0 );
