<?php 

class monster_posts_carousel_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_posts_carousel_widget', // Base ID
            '# Posts Carousel Widget', // Name
            array( 'description' =>'Get posts frome a categories') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;  
        ?>
        <div class="tm-posts-carousel-widget" id="<?php echo $this->get_field_id('posts'); ?>">
            <?php
            $catid=$instance['cat'];
                $the_query = new WP_Query(array('cat'=>$catid,'orderby'=>'date','order'=>'DESC','posts_per_page'=>-1));
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                    ?>
                    <div class="owl-item">
                        <a href="<?php the_permalink() ?>">
                            <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail(array(300,300));
                            }else echo '<img src="'.get_stylesheet_directory_uri().'/no-image.png">';
                             ?>
                        </a>
                        <div class="owl-item-content">
                            <div class="category"><a href="<?php echo get_category_link($catid) ?>"><em><?php echo get_cat_name($catid);?></em></a></div>
                            <h5><a href="<?php the_permalink() ?>"><em><?php the_title() ?></em></a></h5>
                            <time class="h6-style accent2-color" datetime="<?php the_date('Y-m-d','',''); ?>"><em><?php echo get_the_date(); ?></em></time>
                        </div>
                    </div>
                        <?php } ?>
                    <?php 
                } else {
                    echo '';
                }
                wp_reset_postdata();
                wp_reset_query();
            ?>
        </div>
        <script>
        	  var res ="#<?php echo $this->get_field_id('posts');  ?>";
        	  var tmp='';
			  if ($(res).width()>300) {tmp=window}else tmp=res;
			  $(res).owlCarousel({
			    items : 4,
			    itemsCustom : false,
			    itemsDesktop : [1199,4],
			    itemsDesktopSmall : [980,3],
			    itemsTablet: [768,2],
			    itemsTabletSmall: false,
			    itemsMobile : [479,1],
			    singleItem : false,
			    itemsScaleUp : true,
			    slideSpeed : 200,
			    paginationSpeed : 800,
			    rewindSpeed : 1000,
			    autoPlay : true,
			    stopOnHover : false,
			    responsive: true,
			    pagination : true,
			    navigation : true,
			    rewindNav : false,
			    scrollPerPage : false,
			    paginationNumbers: false,
			    responsiveRefreshRate : 200,
			    baseClass : "owl-carousel owl-loaded ",
			    responsiveBaseWidth: tmp,
			    theme : "owl-theme",
			    dragBeforeAnimFinish : true,
			    mouseDrag : true,
			    touchDrag : true,
			    transitionStyle : false,
			    addClassActive : false,
			    afterAction : afterAction
			});
            var owl = $(".tm-posts-carousel-widget").data('owlCarousel');
            function afterAction(){
                var tmp = this.owl.visibleItems;
                var i;
                    $(".owl-stage-outer .owl-stage>.owl-item .owl-item" ).addClass( "invert" );
                for (i = 0; i < tmp.length; i++ ) {
                    $(".owl-stage-outer .owl-stage>.owl-item" ).eq(tmp[i]).addClass( "active" );
                }
            }
        </script>
        <?php echo $after_widget; ?>
        <?php 
    }
    function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['cat'] = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';
        return $instance;
    }
    function form( $instance ) {
        ?>
        <?php 
        $name= $this->get_field_name('cat');
        $instance['cat'] = ! empty( $instance['cat'] ) ? $instance['cat'] : 0;
        $instance['posts_per_page'] = ! empty( $instance['posts_per_page'] ) ? $instance['cat'] : '';
        $sel=$instance['cat']; 
        ?>
        <p><?php wp_dropdown_categories("hierarchical=true&selected=$sel&name=$name&show_count=1&hide_empty=1&orderby=count&order=DESC"); ?></p><br>
    <?php 
    }
}

 ?>