<?php
/**
 * @link            https://WPVueCarousel.com
 * @since           1.0.0
 * @package         WP_Scroll_Master
 *
 * Plugin Name: WPScrollMaster
 * Plugin URI: https://WPVueCarousel.com
 * Description: A WPScrollMaster.
 * Version: 1.0.0
 * Author: Donavan Jones
 * Author URI: https://donavanjones.com
 * License: GPL v3
 * Text-Domain: textdomain
 */

if( ! defined( 'ABSPATH' ) ) exit(); // No direct access allowed

/**
 * Require Autoloader
 */
require_once 'vendor/autoload.php';

use wpsm\Api\Api;
use wpsm\Includes\Admin;
use wpsm\Includes\Frontend;

final class WP_Vue_Kickstart {

    /**
     * Define Plugin Version
     */
    const VERSION = '1.0.0';

    /**
     * Construct Function
     */
    public function __construct() {
        $this->plugin_constants();
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        register_deactivation_hook( __FILE__, [ $this, 'deactivate' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Plugin Constants
     * @since 1.0.0
     */
    public function plugin_constants() {
        define( 'wpsm_VERSION', self::VERSION );
        define( 'wpsm_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
        define( 'wpsm_PLUGIN_URL', trailingslashit( plugins_url( '', __FILE__ ) ) );
        define( 'wpsm_NONCE', 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N:GKBkn$piN0.N%N~X91VbCn@.4' );
    }

    /**
     * Singletone Instance
     * @since 1.0.0
     */
    public static function init() {
        static $instance = false;

        if( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * On Plugin Activation
     * @since 1.0.0
     */
    public function activate() {
        $is_installed = get_option( 'wpsm_is_installed' );

        if( ! $is_installed ) {
            update_option( 'wpsm_is_installed', time() );
        }

        update_option( 'wpsm_is_installed', wpsm_VERSION );
    }

    /**
     * On Plugin De-actiavtion
     * @since 1.0.0
     */
    public function deactivate() {
        // On plugin deactivation
    }

    /**
     * Init Plugin
     * @since 1.0.0
     */
    public function init_plugin() {
        // init
        new Admin();
        new Frontend();
        new Api();
    }

}

/**
 * Initialize Main Plugin
 * @since 1.0.0
 */
function wp_vue_kickstart() {
    return WP_Vue_Kickstart::init();
}

// Run the Plugin
wp_vue_kickstart();