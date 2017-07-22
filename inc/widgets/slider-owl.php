<?php 
class owl_slider extends WP_Widget {
    function __construct() {
        parent::__construct(
            'owl_slider', // Base ID
            '# Slider Owl', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        wp_enqueue_script('owl_carousel_js');
        echo $before_widget;        ?>
        <script>
            $(document).ready(function() {
              var owl = $(".owl_widget");
              owl.owlCarousel({
                  items : 1,
                  pagination:true,
                  responsive:true,
                  navigation:true,
                  itemsDesktop:[1199,1],
                  itemsDesktopSmall:[979,1],
                  itemsTablet:[768,1],
                  itemsMobile:[479,1],
                  autoHeight:true
              });
              $(".next").click(function(){
                owl.trigger('owl.next');
              })
              $(".prev").click(function(){
                owl.trigger('owl.prev');
              })
            });
        </script>
        <div class="owl_widget">
         <?php $slideArr=explode(',', get_option('slider_option' )); ?>
         <?php 
         $query = new WP_Query( array( 'post_type'=>'post','orderby'=>'title','order'=>'ASC','post__in' => $slideArr ) );
            if ( $query->have_posts() ):
                while ( $query->have_posts() ):
                    $query->the_post();
                    ?>
                     <?php $thumb_id = get_post_thumbnail_id(); ?> 
                    <div>
                        <img class="img-responsive" src="<?php echo wp_get_attachment_url($thumb_id);?>">
                        <?php wp_get_attachment_image($thumb_id); ?>
                        <div class="camera-post">
                            <h2 class="h1-style"><?php the_title(); ?></h2> 
                              <a href="<?php the_permalink(); ?>" class="btn btn-large btn-primary h5-style">
                                <em>View Recipe</em> 
                                <i class="material-icons">arrow_forward</i>
                              </a>
                        </div>
                    </div>
                    <?php 
                endwhile;
            else: echo "";
            endif;
        ?>
        </div>
        <?php 
        wp_reset_postdata();
        wp_reset_query();
        echo $after_widget;
    }
    function update($new_instance,$old_instance){
        $instance = array();
        return $instance;
    }
    function form( $instance ) {
      echo "<p>";
      echo "<a href='".admin_url('admin.php?page=my-setting-slider')."'>Setting Slide</a>";
      echo "</p>";
    }
}
?>