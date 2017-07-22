<?php 
class monster_posts_slider_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_posts_slider_widget', // Base ID
            '# Slider Widget', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget; 
        ?>
      <style>
      .camera_container .cameraSlide{
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
        position: relative;
      border-radius: 3px;
      text-align: center;
      width: 100%;
    height: auto;
    }
        
    .camera_container .cameraSlide img {
        height: auto;
        max-width: 100%;
        vertical-align: top;
    }
    .camerarelative {
        overflow: hidden;
        position: relative;
    }
    .camera_container {
        position: relative;
    }
</style>  
<script>
  $(document).ready(function() {
  $("#camera").owlCarousel({
    navigation : false,
    items : 1,
    addClassActive : true,
    singleItem : true,
    autoHeight:true,
    pagination:false,
    baseClass: 'camera_wrap' ,
    responsiveBaseWidth:'#camera'
  });
  function resizeImg() {
    $( "div.cameraSlide" ).each(function( index, element ) {
      var widthWindow=$(window).width();
      var heightImg=$( element ).children('img').height();
      var heightWindow=$(window).height();
      var marginTop;
      if (heightImg>heightWindow) {
        marginTop=(heightImg-heightWindow)/2;
        $( element ).children('img').css({'max-height':heightImg});
        $( element ).children('img').css({'width':widthWindow});
        $( element ).children('img').css({'margin-top':-marginTop});
        $( element ).children('img').css({'visibility': 'visible','position': 'absolute','left':0});
        $('div.camerarelative').css({'width':widthWindow});
        $('div.camerarelative').css({'height':heightWindow});
      }else{
        $( element ).children('img').css({'height':heightImg});
        $( element ).children('img').css({'width':widthWindow});
        $('div.camerarelative').css({'width':widthWindow});
        $( element ).children('div.camerarelative').css({'max-height':heightImg});
        $( element ).children('img').css({visibility: 'visible'});
      } 
    });
  }
  resizeImg();
  $( window ).resize(function() {
    resizeImg();
  });
});
</script>
        <div class="camera_container">
            <div id="camera">
                  <div class="cameraSlide">
                    <img src="http://localhost/wp/wp-content/uploads/2016/04/test-1.jpg" alt="">
                    <div class="camerarelative"></div>
                  </div>
                  <div class="cameraSlide">
                    <img src="http://localhost/wp/wp-content/uploads/2016/04/test-1.jpg" alt="">
                    <div class="camerarelative"></div>
                  </div>
                  <div class="cameraSlide">
                    <img src="http://localhost/wp/wp-content/uploads/2016/04/test-1.jpg" alt="">
                    <div class="camerarelative"></div>
                  </div>
                  <div class="cameraSlide">
                    <img src="http://localhost/wp/wp-content/uploads/2016/04/test-1.jpg" alt="">
                    <div class="camerarelative"></div>
                  </div>
            </div>
            <div class="camera_overlayer"></div>
      </div>
        <?php echo $after_widget; ?>
        <?php 
    }
    function update($new_instance,$old_instance){
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
    function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title']  :'Subscribe to our channel';
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php 
    }
}
?>