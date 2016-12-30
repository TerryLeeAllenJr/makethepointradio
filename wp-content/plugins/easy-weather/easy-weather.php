<?php
/*
Plugin Name: EasyWeather
Plugin URI: http://www.robert-herring.com
Description: A simple jQuery Weather Module.
Version: 1.0
Author: Robert Herring
Author URI: http://www.robert-herring.com
License: Creative Commons Attribution-ShareAlike

//Other terms and conditions

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.


*/
/* Start Adding Functions Below this Line */

// Creating the widget
class easyweather_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
            'easyweather_widget',

// Widget name will appear in UI
            __('EasyWeather Module', 'easyweather_widget_domain'),

// Widget description
            array( 'description' => __( 'A simple jQuery Weather Module.', 'easyweather_widget_domain' ), )
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
        //Add the stylesheet into the header
        wp_enqueue_style("jquery.easyweather", WP_PLUGIN_URL."/easy-weather/css/jquery.easyweather-1.0.css",false,"1.0");

        //Add the scripts in the footer
        wp_enqueue_script("jquery");
        wp_enqueue_script("jquery.simpleWeather", WP_PLUGIN_URL."/easy-weather/scripts/jquery.simpleWeather.js",array("jquery"), "",1);
        wp_enqueue_script("jquery.cookie", WP_PLUGIN_URL."/easy-weather/scripts/jquery.cookie.js",array("jquery"), "",1);
        wp_enqueue_script("jquery.easyweather", WP_PLUGIN_URL."/easy-weather/scripts/jquery.easyweather-1.0.js",array("jquery"), "1.0",1);

        echo __( '<div id="weather"><div class="data"></div></div>', 'easyweather_widget_domain' );
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'easyweather_widget_domain' );
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class easyweather_widget ends here

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'easyweather_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );


/* Stop Adding Functions Below this Line */
?>
