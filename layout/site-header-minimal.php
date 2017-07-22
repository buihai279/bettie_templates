<?php get_template_part('layout/loading' ); ?>
<header id="header" class="site-header wide">
    <div class="container-fluid invert">
        <div class="row vertical-align__center">
            <div class="col-xs-12 col-lg-12 col-xl-3">
                <?php get_template_part('layout/branding' ); ?>
            </div>
            <div class="col-xs-12 col-lg-12 col-xl-6 hidden-sm-down">
                <?php get_template_part('nav/nav-main' ); ?>
            </div>
            <div class="col-xs-12 col-lg-12 col-xl-3 hidden-sm-down">
                <ul class="social-list list-header">
                    <?php get_template_part('layout/social' ); ?>
                </ul>
            </div>
        </div>
    </div>
</header>

