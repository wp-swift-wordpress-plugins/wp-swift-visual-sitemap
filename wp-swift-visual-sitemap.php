<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://github.com/wp-swift-wordpress-plugins
 * @since             1.0.0
 * @package           Wp_Swift_Visual_Sitemap
 *
 * @wordpress-plugin
 * Plugin Name:       WP Swift: Visual Sitemap
 * Plugin URI:        https://github.com/wp-swift-wordpress-plugins/wp-swift-visual-sitemap
 * Description:       Create html sitemap with a WordPress shortcode for FoundationPress theme.
 * Version:           1.0.0
 * Author:            Gary Swift
 * Author URI:        https://github.com/wp-swift-wordpress-plugins
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-swift-visual-sitemap
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-swift-visual-sitemap-activator.php
 */
function activate_wp_swift_visual_sitemap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-swift-visual-sitemap-activator.php';
	Wp_Swift_Visual_Sitemap_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-swift-visual-sitemap-deactivator.php
 */
function deactivate_wp_swift_visual_sitemap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-swift-visual-sitemap-deactivator.php';
	Wp_Swift_Visual_Sitemap_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_swift_visual_sitemap' );
register_deactivation_hook( __FILE__, 'deactivate_wp_swift_visual_sitemap' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-swift-visual-sitemap.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_swift_visual_sitemap() {

	$plugin = new Wp_Swift_Visual_Sitemap();
	$plugin->run();

}
run_wp_swift_visual_sitemap();