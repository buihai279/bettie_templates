<ul class="social-share">
    <li class="facebook"> <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="blank"><i class="fa fa-facebook"></i></a></li>
    <li class="twitter"> <a href="https://twitter.com/intent/tweet?text=<?php the_title();?>url=<?php the_permalink(); ?>" target="blank"><i class="fa fa-twitter"></i></a></li>
    <li class="google-plus"> <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="blank"><i class="fa fa-google-plus"></i></a></li>
    <li class="linkedin"> <a href="https://www.linkedin.com/shareArticle?mini=true url=<?php the_permalink(); ?>title=<?php the_title(); ?>" target="blank"><i class="fa fa-linkedin"></i></a></li>
    <li class="pinterest"> <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>media=<?php the_post_thumbnail_url('thumbnail'); ?>description=<?php echo wp_trim_words(get_the_content(),25,' .....'); ?>" target="blank"><i class="fa fa-pinterest"></i></a></li>
</ul>