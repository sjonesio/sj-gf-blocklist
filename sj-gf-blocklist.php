<?php
/**
 * SJ News
 *
 * @package           sj-gf-blocklist
 * @author            sjonesio
 * @copyright         2025 sjones.digital
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       SJ Gravity Forms Blocklist
 * Plugin URI:        https://sjones.digital
 * Description:       Blocks specified website URLs and email addresses from being submitted to Gravity Forms.
 * Version:           1.0.0
 * Author:            sjonesio
 * Author URI:        https://sjones.digital
 * Text Domain:       sj-gf-blocklist
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Set plugin directory path.
if ( ! defined( 'SJGFBLOCKLIST_PLUGIN_DIR' ) ) {
	define( 'SJGFBLOCKLIST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Set plugin directory URL.
if ( ! defined( 'SJGFBLOCKLIST_PLUGIN_URL' ) ) {
	define( 'SJGFBLOCKLIST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin includes.
require SJGFBLOCKLIST_PLUGIN_DIR . 'class-blocker.php';

$sjgfblocklist = new SJGFBLOCKLIST\Blocker();
