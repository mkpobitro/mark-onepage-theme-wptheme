<?php

require_once get_theme_file_path() . '/library/csf/codestar-framework.php';
require_once get_theme_file_path() . '/inc/tgm.php';


// after setup theme
if ( ! function_exists( 'mark_theme_setup' ) ) {

	function mark_theme_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'mark', get_template_directory_uri() . '/languages' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array( 'style', 'script', ) );
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		register_nav_menus( array(
			'top_menu'    => __( 'Top Menu', 'mark' ),
			'footer_menu' => __( 'Footer Menu', 'mark' ),
		) );


		// custom logo
		$defaults = array(
			'height'               => 100,
			'width'                => 400,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => true,
		);
		add_theme_support( 'custom-logo', $defaults );

		add_image_size( 'mark_landscape_one', 583, 383, true );

	}

}
add_action( 'after_setup_theme', 'mark_theme_setup' );


if ( ! function_exists( 'mark_widgets' ) ) {
	function mark_widgets() {

		register_sidebar( array(
			'name'          => __( 'Footer Left Sidebar', 'mark' ),
			'id'            => 'ftr_left_sidebar',
			'description'   => __( 'Widgets in this area will be shown in footer left section.', 'mark' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h5 class="">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Middle Sidebar', 'mark' ),
			'id'            => 'ftr_middle_sidebar',
			'description'   => __( 'Widgets in this area will be shown in footer Middle section.', 'mark' ),
			'before_widget' => '<div class="media-body "><li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li></div>',
			'before_title'  => '<div class="footer-title"><h5>',
			'after_title'   => '</h5></div>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Right Sidebar', 'mark' ),
			'id'            => 'ftr_right_sidebar',
			'description'   => __( 'Widgets in this area will be shown in footer Right section.', 'mark' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<div class="footer-title"><h5>',
			'after_title'   => '</h5></div>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Bottom Sidebar', 'mark' ),
			'id'            => 'ftr_bottom_sidebar',
			'description'   => __( 'Widgets in this area will be shown in footer bottom section.', 'mark' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h5 class="">',
			'after_title'   => '</h5>',
		) );

	}

}
add_action( 'widgets_init', 'mark_widgets' );


define( "VERSION", time() );
define( "ASSETS_DIR", get_template_directory_uri() . "/assets/" );

// mark assets
if ( ! function_exists( 'mark_assets' ) ) {

	function mark_assets() {
		$css_files = array(
			'google-fonts'          => '//fonts.googleapis.com/css?family=Cabin|Open+Sans:300,400,600,700',
			'bootstrap-css'         => ASSETS_DIR . 'vendor/bootstrap/css/bootstrap.min.css',
			'fontawesome-css'       => ASSETS_DIR . 'vendor/font-awesome/css/font-awesome.min.css',
			'bicon-css'             => ASSETS_DIR . 'vendor/bicon/css/bicon.css',
			'owlcarousel-css'       => ASSETS_DIR . 'vendor/owl/assets/owl.carousel.min.css',
			'owlcarousel-theme-css' => ASSETS_DIR . 'vendor/owl/assets/owl.theme.default.min.css',
			'magnific-popup-css'    => ASSETS_DIR . 'vendor/magnific-popup/magnific-popup.css',
			'animate-css'           => ASSETS_DIR . 'vendor/animate.css',
			'mark-main-css'         => ASSETS_DIR . 'css/main.css',
		);

		foreach ( $css_files as $handle => $css_file ) {
			wp_enqueue_style( $handle, $css_file, null, VERSION );
		}

		wp_enqueue_style( 'mark-css', get_stylesheet_uri(), null, VERSION );


		$js_files = array(
			'bootstrap-js'      => array(
				'src' => ASSETS_DIR . 'bootstrap.min.js',
				'dep' => array( 'jquery' )
			),
			'owl-carousel-js'   => array(
				'src' => ASSETS_DIR . 'vendor/owl/owl.carousel.min.js',
				'dep' => array( 'jquery' )
			),
			'magnific-popup-js' => array(
				'src' => ASSETS_DIR . 'vendor/magnific-popup/jquery.magnific-popup.min.js',
				'dep' => array( 'jquery' )
			),
			'wow-js'            => array(
				'src' => ASSETS_DIR . 'vendor/wow.min.js',
				'dep' => array( 'jquery' )
			),
			'visible-js'        => array(
				'src' => ASSETS_DIR . 'vendor/visible.js',
				'dep' => array( 'jquery' )
			),
			'animateNumber-js'  => array(
				'src' => ASSETS_DIR . 'vendor/jquery.animateNumber.min.js',
				//            'dep'   => array('jquery')
			),
			'isotope-js'        => array(
				'src' => ASSETS_DIR . 'vendor/jquery.isotope.js',
				'dep' => array( 'jquery' )
			),
			'imagesloaded-js'   => array(
				'src' => ASSETS_DIR . 'vendor/imagesloaded.js',
				'dep' => array( 'jquery' )
			),
			'mark-js'           => array(
				'src' => ASSETS_DIR . 'js/scripts.js',
				'dep' => array( 'jquery' )
			)

		);

		foreach ( $js_files as $handle => $js_file ) {
			wp_enqueue_script( $handle, $js_file['src'], isset( $js_file['dep'] ) ? $js_file['dep'] : null, VERSION, true );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'mark_assets' );


function mark_get_social_fields() {
	$fields          = array();
	$social_profiles = apply_filters( 'mark_social_profiles', array( 'facebook', 'twitter', 'youtube', 'linkedin' ) );
	foreach ( $social_profiles as $social_profile ) {
		$field = array(
			'id'    => $social_profile,
			'type'  => 'text',
			'title' => ucfirst( $social_profile ),
		);
		array_push( $fields, $field );
	}

	return $fields;
}


// class add into <li> in wp nav menu
// 2 method
function add_additional_class_on_li( $classes, $item, $args ) {

//    if(isset($args->add_li_class)) {
//        $classes[] = $args->add_li_class;
//    }


	if ( 'top_menu' == $args->theme_location ) {
		$classes[] = 'nav-item';
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 10, 3 );


//Add a class in <ul> in wp nav menu widgets class
function mark_widget_nav_menu_args( $nav_menu_args, $nav_menu, $args, $instance ) {
	$nav_menu_args['menu_class'] = 'menu list-unstyled short-links';

	return $nav_menu_args;
}

add_filter( 'widget_nav_menu_args', 'mark_widget_nav_menu_args', 10, 4 );


// front page nav menu url change to url to #id ( localhost/mark/section/id to localhost/mark/#id )
function mark_change_nav_menu( $menus ) {
	$string_to_replace = home_url( "/" ) . "section/";
	if ( is_front_page() ) {
		foreach ( $menus as $menu ) {
			$new_url   = str_replace( $string_to_replace, '#', $menu->url );
			$menu->url = rtrim( $new_url, "/" );
		}
	}

	return $menus;
}

add_filter( 'wp_nav_menu_objects', 'mark_change_nav_menu' );