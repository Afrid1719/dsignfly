<?php
/**
 * Widget class for Dsignfly Portoflio Widget
 * 
 * @package dsignfly
 */

 class Dsignfly_Portfolio_Widget extends WP_Widget {
     public function __construct(){
         $args = array(
             'classname' => 'dsignfly-portfolio-widget-container',
             'description' => __('Custom Widget to display the latest custom post types', 'dsignfly')
         );

         parent::__construct('dsignfly_portfolio_widget', __('Portfolio', 'dsignfly'), $args);
     }

     public function widget($args, $instance){
        // Before Widget
        echo  $args['before_widget'];

        // Render Portfolio Widget
        $loop = new WP_Query(array(
            'post_type' => 'dsignfly_cpt',
            'posts_per_page' => 8,
        ));

        if ($loop->have_posts()) {
            $title = isset($instance['title']) ? $instance['title'] : 'Portfolio';
            echo '<h2 class="widget-title">' . esc_html($title) . '</h2>';
            echo '<div class="dsignfly-portfolio-widget-gallery">';
            while($loop->have_posts()) : $loop->the_post();
                $post_link = get_the_permalink(get_the_ID());
                $featured_image_url = get_the_post_thumbnail_url();
                echo '<a href="'.$post_link.'" >';
                echo '<img src="' . $featured_image_url . '" width="80" height="80" />';
                echo '</a>';
            endwhile; 
            echo '</div>';
        }

        echo $args['after_widget'];
     }  

     public function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : esc_attr('Portfolio');

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