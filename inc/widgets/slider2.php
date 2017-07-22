<?php 
class monster_posts_slider_widget2 extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_posts_slider_widget_2', // Base ID
            '# Slider Widget 2', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget; 
        ?>
   
        <?php wp_enqueue_script('jquery.simpleslider');  ?>
        <?php wp_enqueue_script('custom-slider');  ?>
    <div class="camera_container">
        <div class='cameraContents'>
            <?php $slideArr=explode(',', get_option('slider_option' )); ?>
            <?php 
            $i=1;
            $query = new WP_Query( array( 'post_type'=>'post','orderby'=>'title','order'=>'ASC','post__in' => $slideArr ) );
            if ( $query->have_posts() ):
                while ( $query->have_posts() ):
                    $query->the_post();
                   ?>
                   <div class='cameraContent' id="cameraContent<?php echo $i;?>">
                    <div class="overlayer_bg"></div>
                    <div class="camera-post">
                        <h2 class="h1-style"><?php the_title(); ?></h2> 
                        <a href="<?php the_permalink(); ?>" class="btn btn-large btn-primary h5-style">
                            <em>View Recipe</em> <i class="material-icons">arrow_forward</i>
                        </a>
                    </div>
                    <div class="backstretch">
                        <?php $thumbnail_id = get_post_thumbnail_id(); ?> 
                        <img class="img-responsive" src="<?php echo wp_get_attachment_url($thumbnail_id); ?>">
                    </div>
                </div>
                <?php 
                $i++;
                endwhile;
                else: echo "";
            endif;
    wp_reset_postdata();
    wp_reset_query();
     ?>
        </div>
        <div class="camera_nav">
            <div class="camera_prev"></div>
            <div class="camera_next"></div>
            <div class="camera_index"></div>
        </div>
    </div>
    <?php echo $after_widget; ?>
    <?php 
    }
    function update($new_instance,$old_instance){
        $instance = array();
        return $instance;
    }
    function form( $instance ) {
    }
}
?>