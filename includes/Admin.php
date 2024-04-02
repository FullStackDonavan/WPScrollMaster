<?php
namespace wpsm\Includes;

class Admin {

    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        // add_action( 'admin_menu', 'add_custom_page_submenu' );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_scripts_styles' ] );
        add_action('init', array($this, 'register_post_types'));
        add_filter('manage_slideshow_posts_columns', [$this, 'custom_slideshow_columns']); // Updated callback to use $this
        add_action('manage_slideshow_posts_custom_column', [$this, 'custom_slideshow_column_content'], 10, 2); // Updated callback to use $this
        
    }

// Add custom column named "Shortcode" to the slideshow post type
function custom_slideshow_columns($columns) {
    // Add a new column with the heading 'Shortcode'
    $custom_columns['shortcode'] = 'Shortcode';
    // Merge your custom columns with the default columns
    $columns = array_merge($columns, $custom_columns);

    return $columns;
}
// Display shortcode content in the "Shortcode" column for the slideshow post type
function custom_slideshow_column_content($column, $post_id) {
    // Check if the column is the 'Shortcode' column
    if ($column == 'shortcode') {
        // Generate shortcode content
        $shortcode_content = '[slideshow_shortcode_here]';
        // Display the shortcode content
        echo $shortcode_content;
    }
}

    /**
         * Register ML Slider post type
         */
        public function register_post_types()
        {
            $labels = array(
                'name'                  => _x( 'Slideshows', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Slideshow', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Slideshows', 'text_domain' ),
                'name_admin_bar'        => __( 'Slideshow', 'text_domain' ),
                'archives'              => __( 'Slideshow Archives', 'text_domain' ),
                'attributes'            => __( 'Slideshow Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Slideshow:', 'text_domain' ),
                'all_items'             => __( 'All Slideshows', 'text_domain' ),
                'add_new_item'          => __( 'Add New Slideshow', 'text_domain' ),
                'add_new'               => __( 'Add New', 'text_domain' ),
                'new_item'              => __( 'New Slideshow', 'text_domain' ),
                'edit_item'             => __( 'Edit Slideshow', 'text_domain' ),
                'update_item'           => __( 'Update Slideshow', 'text_domain' ),
                'view_item'             => __( 'View Slideshow', 'text_domain' ),
                'view_items'            => __( 'View Slideshows', 'text_domain' ),
                'search_items'          => __( 'Search Slideshow', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into slideshow', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this slideshow', 'text_domain' ),
                'items_list'            => __( 'Slideshows list', 'text_domain' ),
                'items_list_navigation' => __( 'Slideshows list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter slideshows list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Slideshow', 'text_domain' ),
                'description'           => __( 'Custom post type for slideshows', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => false,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-images-alt2',
                'show_in_admin_bar'     => false,
                'show_in_nav_menus'     => false,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'slideshow', $args );
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
            $submenu[ $slug ][] = [ __( 'Slidshows', 'textdomain' ), $capability, 'edit.php?post_type=slideshow' ];
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
        echo '<div id="wpsm-admin-app"></div>';
    }

}