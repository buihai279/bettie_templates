<?php 
    if(is_archive()||is_home()||is_tag()||is_category()||is_attachment())
        return '';
 ?>
<div class="row">
    <div class="col-xs-12">
        <div class="breadcrumbs">
            <ol class="breadcrumbs_list">
                <li><a href="<?php bloginfo('url' );?>">Homepage</a></li>
                <?php if (is_single()): ?>
                    <?php 
                        $id=get_the_id();
                        $categories = get_the_category($id);
                     ?>
                    <li>
                        <a href="<?php echo get_category_link($categories[0]->term_id ); ?>"><?php echo $categories[0]->name ?></a>
                    </li>
                    <li class="active">
                        <?php echo  get_the_title() ?>
                    </li>
                <?php endif ?>
                <?php if (is_category()): ?>
                    <li class="active">
                        <?php echo single_cat_title (); ?>
                    </li>
                <?php endif ?>
                <?php if (is_tag()): ?>
                    <li class="active">
                        <?php echo single_cat_title (); ?>
                    </li>
                <?php endif ?>
                <?php if (is_404()): ?>
                    <li class="active">
                        404 Not Found
                    </li>
                <?php endif ?>
                <?php if (is_page()): ?>
                    <li><?php echo get_the_title (); ?></li>
                <?php endif ?>
                <?php if (is_search()): ?>
                    <li>Search results for “<?php echo $_GET['s'] ?>”</li>
                <?php endif ?>

            </ol>
        </div>
    </div>
</div>
