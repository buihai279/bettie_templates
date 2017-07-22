<?php 
class monster_custom_posts_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_custom_posts_widget', // Base ID
            '# Latest Posts Widget', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;     
        ?>
       <div class="latest-post-wrap">
            <?php
                if ( ! empty( $instance['title'] ) ) {
                    echo $args['before_title'].apply_filters('widget_title',$instance['title']).$args['after_title'];
                }
            ?>
            <?php
                $the_query = new WP_Query(array('post_type'=>'post','orderby'=>'modified','order'=>'DESC','posts_per_page'=>$instance['limit'],'ignore_sticky_posts' => 1));
                if ( $the_query->have_posts() ) {
                    echo '<ul class="latest-post-row">';
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                        <li class="latest-post">
                            <h5><em><a class="accent2-color" href="<?php the_permalink() ?>">
                                <?php the_title() ?>
                            </a></em></h5>
                            <div class="media">
                                <div class="media-left">
                                <?php 
                                if ( has_post_thumbnail() ) {
                                    $thumbnail_id = get_post_thumbnail_id($the_query->ID);
                                    the_post_thumbnail('thumbnail-latest');
                                }else echo '<img src="'.get_stylesheet_directory_uri().'/no-image.png">';
                                 ?>
                                </div>
                                <div class="media-body">
                                    <p>
                                    <?php $content=get_the_content(); ?>
                                    <?php $content=fill__content($content);  ?>
                                    <?php echo wp_trim_words( $content,15,' ...'); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="latest-post-meta">
                                <p>
                                    <time datatime="<?php the_date('Y-m-d','',''); ?>"><?php echo get_the_date(); ?></time>
                                </p>
                                <p> 
                                <a href="<?php the_permalink();?>#comments">
                                    <em><?php comments_number( 'No comments', 'One comment', '% comments' ); ?>
                                    </em>
                                </a>
                                </p>
                            </div>
                        </li>   
                            <?php } ?>
                    </ul>
                    <?php 
                } else {
                    echo '';
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </div>
        <?php echo $after_widget; ?>
        <?php 
    }
    function update($new_instance,$old_instance){
        $instance = array();
        $instance['title']=(!empty($new_instance['title']))?strip_tags($new_instance['title']):'';
        $instance['limit']=(!empty($new_instance['limit']))?strip_tags($new_instance['limit']):3;
        return $instance;
    }
    function form( $instance ) {
        $title=!empty($instance['title'])?$instance['title']:'Latest Yummies Posts';
        $limit=!empty($instance['limit'])?$instance['limit']:'3';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit:');?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('limit');?>" name="<?php echo $this->get_field_name('limit');?>" type="text" value="<?php echo esc_attr( $limit ); ?>">
        </p>
        <?php 
    }
}
?>