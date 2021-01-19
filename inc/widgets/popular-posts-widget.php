<?php
/**
 * Widget class for Dsignfly Popular Posts Widget
 * 
 * @package dsignfly
 */

 class Dsignfly_Popular_Posts_Widget extends WP_Widget {
    public function __construct() {
        $args = array(
            'classname' => 'dsignfly-popular-posts-widget-container',
            'description' => __('Custom widgets to display the popular posts', 'dsignfly')
        );

        parent::__construct('dsingfly_popular_posts_widget', __('Popular Posts', 'dsignfly'), $args);
    }

    public function widget($args, $instance) {
        //Before Widget
        echo $args['before_widget'];

        // Render Popular Posts Widgets
        $loop = new WP_Query(array(
            'post_type' => ['post', 'dsignfly_cpt'],
            'posts_per_page' => 5,
        ));

        echo '<h2 class="widget-title">'. $instance['title'] .'</h2>';
        if ($loop->have_posts()){
            echo '<div class="dsignfly-popular-posts-widget" id="dsignfly-popular-posts-widget">';
            while($loop->have_posts()) : $loop->the_post();

                /**
                 * It calls the template part with name content-widget-popular_posts
                 * where each post is displayed with the same layout
                 */
                get_template_part('template-parts/content', 'widget-popular_posts');
            endwhile;
            echo '</div>';
        } else {
            echo '<div class="no-posts-found">' . __('It looks like there is no post', 'dsignfly') . '</div>';
        }

        //After Widget
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : esc_attr('Popular Posts');

        ob_start(); ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php __('Title', 'dsignfly') ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php esc_attr_e($title); ?>">
        </p>
    <?php
        echo ob_get_clean();
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }
 }