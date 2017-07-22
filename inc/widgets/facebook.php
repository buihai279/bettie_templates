<?php 

class facebook extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_facebook_page', // Base ID
            '# Facebook', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;     
        wp_enqueue_script('facebook');
        ?>
        <?php 
            if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'].apply_filters('widget_title',$instance['title'] ).$args['after_title'];
        }?>
        <?php if(isset($instance['facebook'])&&$instance['facebook']!=''): ?>
            <div class="fb-page" data-href="<?php echo $instance['facebook'] ?>" data-small-header="false" data-width="380"  data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $instance['facebook'] ?>"><a href="<?php echo $instance['facebook'] ?>">Facebook</a></blockquote></div></div>
        <?php else: ?>
            <p>Not found facebook url </p>
        <?php endif ?>

        <?php echo $after_widget; ?>
        <?php 
    }
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] =$new_instance['title'];
        $instance['facebook']=(!empty($new_instance['facebook']))?$new_instance['facebook']:'';

        return $instance;
    }
    function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] :'Facebook';
        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] :'https://www.facebook.com/TemplateMonster/';
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'facebook url:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
        </p>
        <?php 
    }
}?>