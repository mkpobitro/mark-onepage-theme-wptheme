<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.
/**
 *
 * @package   Codestar Framework - WordPress Options Framework
 * @author    Codestar <info@codestarthemes.com>
 * @link      http://codestarframework.com
 * @copyright 2015-2021 Codestar
 *
 *
 * Plugin Name: Codestar Framework
 * Plugin URI: http://codestarframework.com/
 * Author: Codestar
 * Author URI: http://codestarthemes.com/
 * Version: 2.2.3
 * Description: A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 * Text Domain: mark
 * Domain Path: /languages
 *
 */
require_once plugin_dir_path( __FILE__ ) . 'classes/setup.class.php';

//require_once plugin_dir_path( __FILE__ ) .'metaboxes.php';
//
// Metaboxes
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/sections.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/page-sections.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/banner.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/mission.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/features.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/about.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/services.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/benefits.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/testimonials.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/image-info.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/counter.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/cta.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/team.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/portfolio.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/pricing.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/shop.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/blog.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/clients.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/subscription.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes/contact.php';



