<?php
/**
 * Plugin Name: NEERSOFT BOOKING
 * Description: Advanced booking and appointment plugin with Razorpay integration. UI inspired by LatePoint, using a green color theme.
 * Version: 1.0.0
 * Author: Neersoft
 * Text Domain: neersoft-booking
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'NSB_PATH', plugin_dir_path( __FILE__ ) );
define( 'NSB_URL', plugin_dir_url( __FILE__ ) );
define( 'NSB_VER', '1.0.0' );

require_once NSB_PATH . 'includes/class-nsb-core.php';
require_once NSB_PATH . 'includes/class-nsb-db.php';
require_once NSB_PATH . 'includes/class-nsb-ajax.php';
require_once NSB_PATH . 'includes/class-nsb-admin.php';
require_once NSB_PATH . 'includes/class-nsb-shortcodes.php';
require_once NSB_PATH . 'includes/class-nsb-razorpay.php';
require_once NSB_PATH . 'includes/helpers.php';

register_activation_hook( __FILE__, array( 'NSB_DB', 'install_tables' ) );
register_uninstall_hook( __FILE__, 'nsb_plugin_uninstall' );

function nsb_plugin_uninstall() {
    include_once NSB_PATH . 'uninstall.php';
}

// Load assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('nsb-frontend', NSB_URL . 'assets/css/frontend.css', array(), NSB_VER);
    wp_enqueue_script('nsb-frontend', NSB_URL . 'assets/js/frontend.js', array('jquery'), NSB_VER, true);
});
add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('nsb-admin', NSB_URL . 'assets/css/admin.css', array(), NSB_VER);
    wp_enqueue_script('nsb-admin', NSB_URL . 'assets/js/admin.js', array('jquery'), NSB_VER, true);
});
