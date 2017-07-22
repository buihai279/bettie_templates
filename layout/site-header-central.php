<?php get_template_part('layout/loading' ); ?>
<header id="header" class="site-header wide">
    <div class="container invert header-centered">
        <div class="row vertical-align__center">
            <div class="col-xs-12 col-md-3 hidden-sm-down"></div>
            <div class="col-xs-12 col-md-6">
                <?php get_template_part('layout/branding' ); ?>
            </div>
            <div class="col-xs-12 col-md-3 hidden-sm-down">
                <ul class="social-list list-header">
                    <?php get_template_part('layout/social' ); ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 hidden-sm-down">
                <div class="main-nav-wrap">
                    <?php get_template_part('nav/nav-main' ); ?>
                </div>
            </div>
        </div>
    </div>
</header>
