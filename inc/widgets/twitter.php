<?php 

class twitter extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_twitter_timeline_widget', // Base ID
            '# Twitter', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;     
        wp_enqueue_script('twitter');
        ?>
        <?php 
            if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'].apply_filters('widget_title',$instance['title'] ).$args['after_title'];
        }?>
        <?php if(isset($instance['twitter'])&&$instance['twitter']!=''): ?>
            <a class="twitter-timeline" 
                    data-widget-id="600720083413962752"
                  height="600"
                  data-chrome="transparent"
                  href="<?php echo $instance['twitter']; ?>" 
                  data-tweet-limit="<?php echo $instance['limit']; ?>">
              </a>
        <?php else: ?>
            <p>Not found twitter url </p>
        <?php endif ?>

        <?php echo $after_widget; ?>
        <?php 
    }
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] =$new_instance['title'];
        $instance['twitter']=(!empty($new_instance['twitter']))?$new_instance['twitter']:'';
        $instance['limit']=(!empty($new_instance['limit']))?$new_instance['limit']:'';

        return $instance;
    }
    function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] :'Twitter';
        $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] :'https://twitter.com/templatemonster';
        $limit = ! empty( $instance['limit'] ) ? $instance['limit'] :'5';
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter url:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'tweet-limit:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $limit ); ?>">
        </p>
        <?php 
    }
}?>