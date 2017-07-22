<div class="top-panel_container">
    <div class="container-fluid">
        <div class="row vertical-align__center">
            <div class="col-xs-12 col-md-6 col-md-5 top-panel_first-col hidden-sm-down">
                <?php get_template_part('nav/nav-top' ); ?>
            </div>
            <div class="col-xs-12 col-md-6 top-panel_second-col align-right hidden-sm-down">
                <?php get_template_part('layout/search-panel' ); ?>
            </div>
        </div>
        <div class="row vertical-align__center">
            <div class="col-xs-12 hidden-md-up hamburger-container">
                <div class="row vertical-align__center">
                    <div class="col-xs-3">
                        <div class="hamburger-toggle align-left"><a href="#" id="hamburger-button"><i class="fa fa-bars"></i></a></div>
                    </div>
                    <div class="col-xs-9">
                    	<?php get_template_part('layout/search-panel') ?>
                    </div>
                </div>
                <div class="hamburger-area" style="display: none;">
	                <?php get_template_part('nav/nav-main' ); ?>
	                <?php get_template_part('nav/nav-top' ); ?>
                    <ul class="social-list list-header">
                    	<?php get_template_part('social' ); ?>
                    </ul>
                </div>
            </div> <!-- .hamburger-container -->
    	</div><!--  .row vertical-align__center -->
	</div> <!-- .container-fluid -->
</div><!--  .top-panel_container -->