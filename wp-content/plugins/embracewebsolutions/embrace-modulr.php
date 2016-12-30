<?php
/*
Plugin Name: Embrace - Modulr
Plugin URI: http://www.embracewebsolutions.com
Description: Allows Administrator to structure their homepage around modules.
Version: 1.1
Author: Lee Allen
Author URI: http://www.lee-allen.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
class Modular extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'modular', // Base ID
            __('Modulr', 'text_domain'), // Name
            array( 'description' => __( 'Select a module for use on the homepage of the site.', 'text_domain' ), ) // Args
        );
    }

    /**
     *
     * This is the front end of the widget. It looks to see if a corresponding file is availble for the $instance['module']
     * var and includes this once.
     * TODO: Make this pass errors in the admin if you select the same module twice.
     * @see WP_Widget::widget()
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $module = apply_filters( 'widget_module', $instance['module'] );
        if(file_exists(plugin_dir_path( __FILE__ )."modules/".$module)){
            echo $args['before_widget'];
            if ( ! empty( $title ) ) {echo $args['before_title'] . $title . $args['after_title'];}
            include_once(plugin_dir_path( __FILE__ )."modules/".$module);
            echo $args['after_widget'];
        }
    }


    /**
     * Back-end widget form.
     * @see WP_Widget::form()
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $module = (isset($instance['module']))?$instance['module']: __( 'New', 'text_domain' );
        $title = (isset($instance['title']))?$instance['title']: __( 'New Module', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Display Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'module' ); ?>">Select Module:</label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'module' ); ?>" name="<?php echo $this->get_field_name( 'module' ); ?>">
                <option value="New"<?php echo ($module=='New')?'selected':''; ?>>Select One...</option>
                <option value="blog.ssi.php"<?php echo ($module=='blog.ssi.php')?'selected':''; ?>>Latest Blog</option>
                <option value="latestNews.local.ssi.php"<?php echo ($module=='latestNews.local.ssi.php')?'selected':''; ?>>Local News</option>
                <option value="latestNews.abc.ssi.php"<?php echo ($module=='abc-news')?'selected':''; ?>>ABC News (National)</option>
                <option value="traffic.ssi.php"<?php echo ($module=='raffic.ssi.php')?'selected':''; ?>>Traffic</option>
                <option value="featured.ssi.php"<?php echo ($module=='featured.ssi.php')?'selected':''; ?>>Featured</option>
            </select>
        </p>
    <?php }

    /**
     * Sanitize widget form values as they are saved.
     * @see WP_Widget::update()*
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['module'] = ( ! empty( $new_instance['module'] ) ) ? strip_tags( $new_instance['module'] ) : '';

        return $instance;
    }

}

function register_modular_widget() {
    register_widget( 'Modular' );
}
add_action( 'widgets_init', 'register_modular_widget' );

?>