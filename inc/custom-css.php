<style>
	@font-face {
	    font-family: 'Material Icons';
	    font-style: normal;
	    font-weight: 400;
	    src: url("<?php echo get_template_directory_uri ()?>/assets/fonts/MaterialIcons-Regular.eot");
	    src: local('Material Icons'), local('MaterialIcons-Regular'), url("<?php echo get_template_directory_uri ()?>/assets/fonts/MaterialIcons-Regular.woff2") format('woff2'), url("<?php echo get_template_directory_uri ()?>/assets/fonts/MaterialIcons-Regular.woff") format('woff'), url("<?php echo get_template_directory_uri ()?>/assets/fonts/MaterialIcons-Regular.ttf") format('truetype')
	}
	.camera_loader {
	    background: #fff url("<?php echo get_template_directory_uri ()?>/assets/images/camera-loader.gif") no-repeat center;
	    border: 1px solid #fff;
	    border-radius: 18px;
	    height: 36px;
	    left: 50%;
	    overflow: hidden;
	    position: absolute;
	    margin: -18px 0 0 -18px;
	    top: 50%;
	    width: 36px;
	    z-index: 3
	}
	.owl-carousel .owl-video-play-icon {
	    position: absolute;
	    height: 80px;
	    width: 80px;
	    left: 50%;
	    top: 50%;
	    margin-left: -40px;
	    margin-top: -40px;
	    background: url("<?php echo get_template_directory_uri ()?>/assets/css/owl.video.play.png") no-repeat;
	    cursor: pointer;
	    z-index: 1;
	    -webkit-backface-visibility: hidden;
	    transition: scale 100ms ease
	}
</style>

<?php if (is_single()): ?>
	<style>
		article.post.type-post, article.page.type-page, article.not-found_content-wrap{
		    padding: 0px;
		}
		ul.post-categories >li:before{
			content: none;
		}
		ul.post-categories li {
		    font-size: 1rem;
		    list-style-type: none;
		    display: inline-block;
		    vertical-align: middle;
		    margin: 0 3px 0 0;
		}
	</style>
<?php endif ?>
<!-- <?php if (!is_single( )): ?> -->
	<style>
		figure>.thumbnail{
			margin: 0px;
		}
	</style>
<!-- <?php endif ?> -->
