<?php 
class monster_advertisement_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_advertisement_widget', // Base ID
            '# Advertisement Widget', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;     
        ?>
        <div class="banner">
            <div class="banner-img invert"> 
            <?php echo wp_get_attachment_image( $instance['id']); ?>
                <a href="<?php echo $instance['link'] ?>">
                    <div class="banner-overlay">
                        <h4 class="widget-title"><?php echo $instance['title']; ?></h4>
                        <?php echo $instance['text']; ?>
                    </div>
                </a>
            </div>
        </div>
        <?php echo $after_widget; ?>
        <?php 
    }
    function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['id']=(!empty($new_instance['id']))?strip_tags($new_instance['id']):'';
        $instance['title']=(!empty($new_instance['title']))?strip_tags($new_instance['title']):'';
        $instance['text']=(!empty($new_instance['text']))?$new_instance['text']:'';
        $instance['link']=(!empty($new_instance['link']))?strip_tags($new_instance['link']):'';
        return $instance;
    }
    function form( $instance ) {
        ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            <?php wp_enqueue_media(); ?>

            $(document).ready(function(e) {
                $("#<?php echo $this->get_field_id('add-media');?>").click(function(e) {
                    e.preventDefault();
                    var frame  = wp.media({ 
                        title: 'Upload Image',
                        multiple: false
                    }).open().on('select', function(e){
                        var uploaded_image = frame.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                        var image_id = uploaded_image.toJSON().id;
                        $("#<?php echo $this->get_field_id('img');?>").html('<img src="'+image_url+'" width="275px">');
                        $("#<?php echo $this->get_field_id('id');?>").attr( "value",image_id );
                    });
                });
            });
        </script>
        <?php 
        $title = ! empty( $instance['title'] ) ? $instance['title']  :'';
        $id = ! empty( $instance['id'] ) ? $instance['id']  :'';
        $link = ! empty( $instance['link'] ) ? $instance['link']  :'#';
        $text = ! empty( $instance['text'] ) ? $instance['text']  :'';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <div id="<?php echo $this->get_field_id('img');?>">
                <?php if ($id!='') {
                    echo wp_get_attachment_image($id);
                } else {
                    echo 'No image';
                }
                 ?>
                 <br>
                <button id="<?php echo $this->get_field_id('add-media');?>" class="btnmedia button" type="button"> Add Media</button>
            </div>
            <input type="text" hidden="hidden" name="<?php echo $this->get_field_name('id');?>" id="<?php echo $this->get_field_id('id');?>"value="<?php echo $instance['id'] ?>">
        </p>
        <p>
            <label><?php _e( 'Link:' ); ?></label> 
            <input type="text" name="<?php echo $this->get_field_name('link');?>" id="<?php echo $this->get_field_id('link');?>" value="<?php echo $link?>">
        </p>
        <p>
            <label><?php _e( 'Text(html):' ); ?></label> 
            <textarea name="<?php echo $this->get_field_name('text');?>" class="textarea" id="" cols="35" rows="6"><?php echo $text ?></textarea>
        </p>
        <?php 
    }
}
?>