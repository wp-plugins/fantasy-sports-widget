<?php
/**
*Plugin Name: Fantasy Sports Widget
*Plugin URI: http://fantasyknuckleheads.com/subscribe/fantasy-sports-widget/
*Description: Fantasy Sports RSS Network
*Author: Kurt Turner
*Version: 1
*Author URI: http://fantasyknuckleheads.com
*
*Special thanks to Ryan McCue @ rotorised.com for the Wordpress plugin assitance and Simplepie support.
*
*This program is distributed in the hope that it will be useful,
*but WITHOUT ANY WARRANTY; without even the implied warranty of
*MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
add_action( 'widgets_init', 'fantasy_load_widgets' );
function fantasy_load_widgets() {
        register_widget( 'fantasy_Widget' );
}
class Fantasy_Widget extends WP_Widget {
        function Fantasy_Widget() {
                /* Widget settings. */
                $widget_ops = array( 'classname' => 'fantasy', 'description' => __('Displays The Best Fantasy Sports News and Advice from around the web.', 'fantasy') );
                /* Widget control settings. */
                $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'fantasy-widget' );
                /* Create the widget. */
                $this->WP_Widget( 'fantasy-widget', __('Fantasy Sports Widget', 'fantasy'), $widget_ops, $control_ops );
        }
        /**
         * How to display the widget on the screen.
         */
        function widget( $args, $instance ) {
                extract( $args );
                /* Our variables from the widget settings. */
                $show_powered = isset( $instance['show_powered'] ) ? $instance['show_powered'] : false;
                /* Before widget (defined by themes). */
  echo $before_widget . $before_title . 'Fantasy Sports' . $after_title;
                   echo ('<a target="_blank" href="http://fantasyknuckleheads.com/subscribe/fantasy-sports-widget/" title="Get this widget for your website and deliver your readers the best Fantasy Sports content from around the web. This is the hottest Fantasy Sports widget on the market containing fantasy football, fantasy baseball, fantasy hockey and fantasy basketball rankings, news and advice."><small>Get This or Add Your Feed</small></a><iframe longdesc="Home of the one and only Fantasy Sports Widget. Fantasy Knuckleheads is a great source for Fantasy Football, Fantasy Baseball, Fantasy Basketball and Fantasy Hockey Rankings, News and Advice." title="Home of the one and only Fantasy Sports Widget. Fantasy Knuckleheads is a great source for Fantasy Football, Fantasy Baseball, Fantasy Basketball and Fantasy Hockey Rankings, News and Advice." id="Fantasy Football" frameBorder="0" scrolling=no width="100%" frameborder="0" height="304px" src="http://fantasyknuckleheads.com/mashed/feedframecameleon.php"></iframe>'); 
                /* If show powered was selected, display the user's powered. */
                if ( $show_powered )
                        printf( '<p>' . __('<small>Powered By:</small><a target="_blank" href="http://fantasyknuckleheads.com" title="Home of the one and only Fantasy Sports Widget. Fantasy Knuckleheads is a great source for Fantasy Football, Fantasy Baseball, Fantasy Basketball and Fantasy Hockey Rankings, News and Advice."><b>Fantasy Knuckleheads</b></a>', 'fantasy.') . '</p>', $powered );
                /* After widget (defined by themes). */
                echo $after_widget;
        }
        /**
         * Update the widget settings.
         */
        function update( $new_instance, $old_instance ) {
                $instance = $old_instance;
                $instance['powered'] = $new_instance['powered'];
                $instance['show_powered'] = $new_instance['show_powered'];
                return $instance;
        }
        /**
         * Displays the widget settings controls on the widget panel.
         * Make use of the get_field_id() and get_field_name() function
         * when creating your form elements. This handles the confusing stuff.
         */
        function form( $instance ) {
                /* Set up some default widget settings. */
                 $defaults = array( 'title' => __('Fantasy', 'fantasy'), 'powered' => __('true', 'show_powered'), 'powered' => 'true', 'show_powered' => true );
$instance = wp_parse_args( (array) $instance, $defaults ); ?>
                <!-- Show Powered by? -->
                <p>
                        <input class="checkbox" type="checkbox" <?php checked( $instance['show_powered'], true ); ?> id="<?php echo $this->get_field_id( 'show_powered' ); ?>" name="<?php echo $this->get_field_name( 'show_powered' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_powered' ); ?>">Display powered by link?</label> 
</p>
        <?php
        }
}
?>