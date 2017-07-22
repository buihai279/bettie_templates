<?php 

class monster_subscribe_and_social_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_subscribe_and_social_widget', // Base ID
            '# Subscribe and Social Widget Name', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;     
        ?>
        <div class="tm-subscribe-and-share-widget text-center inset-3">
            <?php 
                if ( ! empty( $instance['title'] ) ) {
                    echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                }?>
            <p>Subscribe and receive free eBook with unique recipes you can't find on the web.</p>
            <form novalidate="">
                <input type="hidden" name="action" value="tm-mailchimp-subscribe">
                <input type="hidden" name="api-key" value="">
                <input type="hidden" name="list-id" value="">
                <div class="form-group ">
                    <label data-add-placeholder="" data-add-icon="" for="mailform-input-email1">
                        <input placeholder="Your e-mail" type="email" name="email" class="h6-style">
                        <div class="btn-wrap">
                            <button class="btn btn-primary" type="submit"><em>Get</em> </button>
                        </div>
                    </label>
                    <div class="msg"><span class="message"></span></div>
                    <div class="mfInfo"></div>
                </div>
            </form>
            <ul class="social-list">
                <li><a href="#" class="icon icon-xs icon-default fa fa-facebook"></a></li>
                <li><a href="#" class="icon icon-xs icon-default fa fa-twitter"></a></li>
                <li><a href="#" class="icon icon-xs icon-default fa fa-google-plus"></a></li>
                <li><a href="#" class="icon icon-xs icon-default fa fa-linkedin"></a></li>
                <li><a href="#" class="icon icon-xs icon-default fa fa-pinterest"></a></li>
            </ul>
        </div>
        <?php echo $after_widget; ?>
        <?php 
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }
    function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] :'Sign up for free  eCookbook';
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php 
    }
}?>