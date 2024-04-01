<?php
namespace wpsm\Includes;

class Frontend {

    public function __construct() {
        add_shortcode( 'wpsm-app', [ $this, 'render_frontend' ] );
    }

    /**
     * Render Frontend
     * @since 1.0.0
     */
    public function render_frontend( $atts, $content = '' ) {
        wp_enqueue_style( 'wpsm-frontend' );
        wp_enqueue_script( 'wpsm-frontend' );

        $content .= '<div id="wpsm-frontend-app"></div>';

        return $content;
    }

}