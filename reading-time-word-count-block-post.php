<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://devsopu.com
 * @since             1.0.0
 * @package           Reading_Time_Word_Count_Block_Post
 *
 * @wordpress-plugin
 * Plugin Name:       Reading Time & Word Count Block for Post
 * Plugin URI:        https://devsopu.com/reading-time-word-count-block-post
 * Description:       Display estimated reading time and word count for posts.
Add it anywhere using a simple shortcode: [reading_time].
Great for improving SEO, content engagement, and readability.
 * Version:           1.0.0
 * Author:            Saif Islam
 * Author URI:        https://devsopu.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       reading-time-word-count-block-post
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'READING_TIME_WORD_COUNT_BLOCK_POST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-reading-time-word-count-block-post-activator.php
 */
function activate_reading_time_word_count_block_post() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-reading-time-word-count-block-post-activator.php';
	Reading_Time_Word_Count_Block_Post_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-reading-time-word-count-block-post-deactivator.php
 */
function deactivate_reading_time_word_count_block_post() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-reading-time-word-count-block-post-deactivator.php';
	Reading_Time_Word_Count_Block_Post_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_reading_time_word_count_block_post' );
register_deactivation_hook( __FILE__, 'deactivate_reading_time_word_count_block_post' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-reading-time-word-count-block-post.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_reading_time_word_count_block_post() {

	$plugin = new Reading_Time_Word_Count_Block_Post();
	$plugin->run();

}
run_reading_time_word_count_block_post();