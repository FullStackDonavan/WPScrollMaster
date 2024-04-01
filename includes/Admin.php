<?php
namespace wpsm\Includes;

class Admin {

    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_scripts_styles' ] );
    }

    public function register_scripts_styles() {
        $this->load_scripts();
        $this->load_styles();
    }

    /**
     * Load Scripts
     *
     * @return void
     */
    public function load_scripts() {
        wp_register_script( 'wpsm-manifest', wpsm_PLUGIN_URL . 'assets/js/manifest.js', [], rand(), true );
        wp_register_script( 'wpsm-vendor', wpsm_PLUGIN_URL . 'assets/js/vendor.js', [ 'wpsm-manifest' ], rand(), true );
        wp_register_script( 'wpsm-admin', wpsm_PLUGIN_URL . 'assets/js/admin.js', [ 'wpsm-vendor' ], rand(), true );

        wp_enqueue_script( 'wpsm-manifest' );
        wp_enqueue_script( 'wpsm-vendor' );
        wp_enqueue_script( 'wpsm-admin' );

        wp_localize_script( 'wpsm-admin', 'wpsmAdminLocalizer', [
            'adminUrl'  => admin_url( '/' ),
            'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
            'apiUrl'    => home_url( '/wp-json' ),
        ] );
    }

    public function load_styles() {
        wp_register_style( 'wpsm-admin', wpsm_PLUGIN_URL . 'assets/css/admin.css' );

        wp_enqueue_style( 'wpsm-admin' );
    }

    /**
     * Register Menu Page
     * @since 1.0.0
     */
    public function admin_menu() {
        global $submenu;

        $capability = 'manage_options';
        $slug       = 'wp-scroll-master';

        $hook = add_menu_page(
            __( 'WPScrollMaster', 'textdomain' ),
            __( 'WPScrollMaster', 'textdomain' ),
            $capability,
            $slug,
            [ $this, 'menu_page_template' ],
            'dashicons-buddicons-replies'
        );

        if( current_user_can( $capability )  ) {
            $submenu[ $slug ][] = [ __( 'Kickstart', 'textdomain' ), $capability, 'admin.php?page=' . $slug . '#/' ];
            $submenu[ $slug ][] = [ __( 'Settings', 'textdomain' ), $capability, 'admin.php?page=' . $slug . '#/settings' ];
        }

        // add_action( 'load-' . $hook, [ $this, 'init_hooks' ] );
    }

    /**
     * Init Hooks for Admin Pages
     * @since 1.0.0
     */
    public function init_hooks() {
        add_action( 'admin_enqueu_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Load Necessary Scripts & Styles
     * @since 1.0.0
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'wpsm-admin' );
        wp_enqueue_script( 'wpsm-admin' );
    }

    /**
     * Render Admin Page
     * @since 1.0.0
     */
    public function menu_page_template() {
        echo '<div class="wrap"><div id="wpsm-admin-app"></div></div>';
    }

}