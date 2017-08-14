<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/wp-swift-wordpress-plugins
 * @since      1.0.0
 *
 * @package    Wp_Swift_Visual_Sitemap
 * @subpackage Wp_Swift_Visual_Sitemap/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Swift_Visual_Sitemap
 * @subpackage Wp_Swift_Visual_Sitemap/public
 * @author     Gary Swift <garyswiftmail@gmail.com>
 */
class Wp_Swift_Visual_Sitemap_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode( 'sitemap', array($this, 'sitemap_func') );
	}

	// [sitemap foo="foo-value"]
	public function sitemap_func( $atts ) {
	    // $a = shortcode_atts( array(
	    //     'foo' => 'something',
	    //     'bar' => 'something else',
	    // ), $atts );
	    // return "foo = {$a['foo']}";
	    // $html='';		
		if (class_exists( 'Foundationpress_Mobile_Walker' ) && function_exists( 'foundationpress_sitemap_menu' )) {
			// ob_start();
			foundationpress_sitemap_menu();
			// $html = ob_get_contents();
			// ob_end_clean();
			// return $html;
			
		} else {
			require_once plugin_dir_path( __FILE__ ) . 'partials/wp-swift-visual-sitemap-public-display.php';
		}
		
		// return $html;
	}

}

/**
 * Slightly more modified version of the foundationpress_top_bar_right function
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( !function_exists( 'foundationpress_sitemap_menu' ) ) {

	/**
	 * Register Menus
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
	 * @package FoundationPress
	 * @since FoundationPress 1.0.0
	 */
	register_nav_menus(array(
		'sitemap-menu' => 'Sitemap',
	));

	function foundationpress_sitemap_menu() {
		if (class_exists( 'Foundationpress_Mobile_Walker' )) {
			wp_nav_menu( array(
				'container'      => false,
				'menu_class'     => 'sitemap-menu',
				'items_wrap'     => '<ul id="sitemap-menu" class="%2$s">%3$s</ul>',
				'theme_location' => 'sitemap-menu',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Top_Bar_Walker(),
			));
		}
	}
}