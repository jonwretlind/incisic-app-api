<?php 
/**
 * @package Calc_Suite
 * @version 1.8.2a
 */
/*
Plugin Name: Incisic Calculator Suite
Plugin URI: http://jonwretlind.com
Description: This is a custom plugin, created by Jon Wretlind for Longs Peak Education, LLC. This plugin includes custom financial calculators for determining actual ROR for investments based on historical S&P data and other tools used for education purposes. Created for exclusive use by Longs Peak Financial Education / Wisdomey.com (TM), copyright 2018. All rights reserved.
Author: Jon Wretlind
Version: 1.9.0a
Author URI: http://jonwretlind.com
*/

/* Security Check */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

if ( ! class_exists('wp_calc_suite') ) {

	class wp_calc_suite extends WP_Widget {

		private static $instance;

		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof wp_calc_suite ) ) {
	
				self::$instance = new wp_calc_suite();
				self::$instance->__construct();

				// setup some global variables.
				self::$instance->enqueue_calc_suite_scripts();
				self::$instance->actions();
			}
	
			return self::$instance;
		}

		// ENQEUE SCRIPTS AND CSS INTO Plugin
	    public static function enqueue_calc_suite_scripts() {
			// CSS
			wp_enqueue_style('calc_suite_css', plugin_dir_url(__FILE__) . '/css/calc-suite-styles.less');

			add_filter( 'style_loader_tag', 'make_stylesheet_less' );
			function make_stylesheet_less( $tag ) {
				return preg_replace( "/='stylesheet' id='calc_suite_css-css'/", "='stylesheet/less' id='calc_suite_css-css'", $tag );
			}
			
			wp_enqueue_style('jquery_ui', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css');
		
			
		}

		// ***************************
		// WIDGET CODE FOR CALCULATOR
		// ***************************

		// constructor
		public function __construct() {
			$widget_ops = array( 
				'classname' => 'calc_suite',
				'description' => 'Incisic Calculator Suite',
			);
			parent::__construct('calc_suite', 'wp_calc_suite', $widget_ops );
		}

		// widget form creation
		// FORM FOR BACK-END OF WORDPRESS WIDGET FOR FEATURES
		public function form($instance) {	
			/* ... */
		}

		// widget update
		// UPDATES WIDGET ON BACK-END
		public function update($new_instance, $old_instance) {
			/* ... */
		}

		// widget display
		// THIS IS WHAT DISPLAYS TO THE WEB USER
		public function widget($args, $instance) {
			/* ... */
			include( plugin_dir_path(__FILE__) . '/inc/calculator_dashboard.php');
		}
		public function register() {
			return register_widget( $this );
		}

		public function actions() {

			add_action('enqueue_calc_suite_scripts', $this);
			add_action('widgets_init', create_function('', 'return register_widget("wp_calc_suite");'));

		}


	} // ROR_Calc_Suite

	// return instance	
	function ROR() {
		return wp_calc_suite::instance();

		
	}

	// init
	$GLOBALS['wp_calc_suite'] = ROR();



} //ENDIF
?>