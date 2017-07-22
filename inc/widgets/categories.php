<?php require_once get_template_directory() . '/inc/Walker/wp_category_checklist.php';  ?>
<?php 
class monster_categories_tiles_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_categories_tiles_widget', // Base ID
            '# Categories Tiles Widget', // Name
            array( 'description' =>'Monster Categories Tiles Widget Description')// Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        extract($instance);
        echo $before_widget;     
        ?>
        <div class="tm-grid-2x2-widget">
            <div class="grid-wrap row">
                <?php 
                if (is_array($widget_categories) || is_object($widget_categories)):
                    foreach($widget_categories as $value): 
                        $cat=get_category($value,'','');
                    ?>
                        <div class="col-xs-6 col-sm-6 col-xs-6--mod-1 invert">
                            <a href="<?php echo get_category_link($cat->cat_ID); ?>" class="articles">
                            <?php 
                            $tmp = (array) $cat->term_thumbnail;
                            if(count($tmp)>0)
                                $id_img=get_the_category_data($cat->cat_ID)->id;
                            if (isset($id_img)&&$id_img!='') {
                                echo wp_get_attachment_image($id_img,'thumbnail-category'); 
                                $id_img='';
                            } else {
                                echo '<img src="'.get_stylesheet_directory_uri().'/no-image.png">';
                            }
                             ?>
                                <div class="article-content">
                                    <h4><?php echo $cat->name; ?></h4>
                                    <h6><em><?php echo $cat->category_count; ?> posts</em></h6>
                                </div>
                            </a>
                        </div>
                        <?php 
                    endforeach ;
                endif;?>
            </div>
        </div>
        <?php echo $after_widget; ?>
        <?php 
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['widget_categories'] = $new_instance['widget_categories'];
        return $instance;
    }
    function form( $instance ) {
        $defaults = array( 'widget_categories' => array() );
        $instance = wp_parse_args( (array) $instance, $defaults );
        $walker = new Walker_Category_Checklist_Widget(
            $this->get_field_name( 'widget_categories' ), 
            $this->get_field_id( 'widget_categories' )
        );
        echo '<ul class="categorychecklist">';
        wp_category_checklist( 0, 0, $instance['widget_categories'], FALSE, $walker, FALSE );
        echo '</ul>';
    }
}
?>