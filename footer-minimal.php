            </div><!-- .container -->
        </div><!-- #content -->
    <footer id="footer" class="site-footer invert">
        <div class="footer-style-2">
            <div class="footer-widgets footer-widget-bg-color widgets-in-column">
                <div class="container">
                    <div class="row">
                        <?php get_sidebar('minimal-footer'); ?>
                    </div>
                </div>
            </div>
            <section class="footer-content-area footer-bg-color">
                <div class="container">
                    <div class="hr"></div>
                    <div class="row vertical-align__center">
                        <div class="col-xs-12 align-center">
                            <p class="site-info align-center">
                           &copy; <span id="copyright-year"><?php echo date('Y'); ?></span>
                           <?php echo get_option('coppyright'); ?></p>
                            <?php get_template_part('nav/nav-footer' ); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </footer>
    </div><!-- #site-wrapper -->
    <?php get_template_part('layout/back-to-top' ); ?>
    <?php wp_footer(); ?>
    </body>
</html>
