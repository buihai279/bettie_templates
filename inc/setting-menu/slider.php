<?php 
if (isset($_POST['submit'])&&isset($_POST['slide'])&&count($_POST['slide'])>0){
    $slide=implode(',', $_POST['slide']);
    update_option('slider_option',$slide );
}
if (get_option('slider_option' )==0) {
    echo "Slide not found";
}
?>
<h1>Social Setting</h1>
<form action="#" method="POST">
    <table class="table">
        <thead>
            <tr>
                <th>Checkbox</th>
                <th>Title</th>
                <th>Post thumbnail</th>
            </tr>
        </thead>
<?php
    $slideArr=explode(',', get_option('slider_option' ));
    $query = new WP_Query( array( 'post_type'=>'post','posts_per_page'=>-1,'orderby'=>'title','order'=>'ASC','post__in' => $slideArr ) );
    if ( $query->have_posts() ):
        while ( $query->have_posts() ):
            $query->the_post();
           ?>
            <label for="slide">
                <tr>
                    <td>
                        <input name="slide[]" type="checkbox" value="<?php the_id(); ?>" checked>
                    </td>
                    <td><?php the_title() ?></td>
                    <td>
                        <?php if (has_post_thumbnail())
                            the_post_thumbnail('thumbnail-latest');
                        else
                            echo "No Thumbnail";
                         ?>
                     </td>
                </tr>
            </label>
        <?php 
        endwhile;
        else: echo "";
    endif;
    wp_reset_postdata();
    wp_reset_query();
    $the_query = new WP_Query(array('post_type'=>'post','posts_per_page'=>-1, 'post__not_in' => $slideArr,'orderby'=>'modified','order'=>'DESC','ignore_sticky_posts' => 1));
    if ( $the_query->have_posts() ):
        while ( $the_query->have_posts() ):
            $the_query->the_post();
           ?>
            <label for="slide">
                <tr>
                    <td>
                        <?php if (!has_post_thumbnail()): ?>
                            No thumbnail <br>
                            <strong>
                                <a href="<?php echo get_edit_post_link(get_the_id()); ?>#postimagediv">Set thumbnail</a>
                            </strong>
                        <?php else: ?>
                        <input name="slide[]" type="checkbox" value="<?php the_id(); ?>">
                        <?php endif; ?>
                    </td>
                    <td><?php the_title() ?></td>
                    <td>
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('thumbnail-latest');
                    } else {
                        echo "No Thumbnail";
                    }
                     ?></td>
                </tr>
            </label>
        <?php 
        endwhile;
        else: echo "";
    endif;
    wp_reset_postdata();
    wp_reset_query();
    ?>
    </table>
     <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
</form>



<style>
table{ border-spacing: 0px; border-collapse: collapse;}
table, th, td { border: 1px solid black;}
th, td { padding: 15px; text-align: left;}
</style>