<?php 
class tag_cloud extends WP_Widget {

    function __construct() {
        parent::__construct(
            'tag_cloud', // Base ID
            '# Tags cloud', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;
        ?>
        <?php 
            if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'].apply_filters('widget_title',$instance['title'] ).$args['after_title'];
        }?>
        <?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
		<div class="tagcloud">
		<?php $args = array(
				'smallest'                  => 1, 
				'largest'                   => 1,
				'unit'                      => 'rem', 
				'number'                    => 45,  
				'format'                    => 'flat',
				'separator'                 => "\n",
				'orderby'                   => 'name', 
				'order'                     => 'ASC',
				'exclude'                   => null, 
				'link'                      => 'view', 
				'taxonomy'                  => 'post_tag', 
				'echo'                      => true,
				'child_of'                  => null, // see Note!
			); ?>
		<?php wp_tag_cloud($args); ?>
		</div >
		<?php endif; ?>

        <?php echo $after_widget;
    }
    function update( $new_instance, $old_instance ) {
    	$instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }
    function form( $instance ) {
    	$title = ! empty( $instance['title'] ) ? $instance['title'] :'';
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php 
    }
}?>