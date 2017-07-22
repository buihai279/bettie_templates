<?php
class monster_instagram_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_instagram_widget', // Base ID
            '# Instagram Widget', // Name
            array( 'description' =>'Get images from Instagram ') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget; 
        ?>
        <?php 
            if ( ! empty( $instance['title'] ) ) {
               echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }?>
        <div class="instagram-widget instagram-widget--mod-1">
            <ul class="instagram-images">
                <?php 
                    if ($instance['id']!='') {
                        require_once get_template_directory().'/libs/Instagram.php';
                        $instagram = new Instagram(array(
                            'apiKey' => 'f055046a9a234727ac7d8103ec2327d4',
                            'apiSecret' => '46a0c765932e4420ac422b1fb3741274',
                            'apiCallback' => ''
                        ));
                        $UserMedia = $instagram->getUserMedia($instance['id'],$instance['total']);
                        $tmp=$UserMedia->data;
                        foreach ($tmp as $value) {
                            echo '<li class="col-xs-4 col-lg-2">';
                            echo '<a class="instagram-img" target="_blank" href="'.$value->link.'"> ';
                            echo  '<img src="'.$value->images->thumbnail->url.'" class="img-responsive">';
                            echo '<span class="inst-overlay"></span> </a>';
                            echo '</li>';
                        }
                        if(count($tmp)==0) echo "No Image";

                    } else {
                        echo 'No Instagram';
                    }
                 ?>
            </ul>
        </div>
        <?php echo $after_widget; ?>
        <?php 
    }
    function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title']=(!empty($new_instance['title']))?strip_tags($new_instance['title']):'';
        $instance['total']=(!empty($new_instance['total']))?strip_tags($new_instance['total']):'';
        if (!empty($new_instance['instagram'])) {
            $instance['instagram']=str_replace('https://www.instagram.com/','',$new_instance['instagram']);
            $instance['instagram']=str_replace('www.instagram.com/','',$instance['instagram']);
            $instance['instagram']=str_replace('instagram.com/','',$instance['instagram']);
            $instance['instagram']=str_replace('/','',$instance['instagram']);
            $instance['instagram']=str_replace(' ','',$instance['instagram']);
            $instance['instagram']=trim($instance['instagram']);
            $instance['instagram']=strip_tags($instance['instagram']);
        } else {
            $instance['instagram']='';
        }
        if ($instance['instagram']!='') {
            $t="http://www.instagram.com/".$instance['instagram'];
            $content= file_get_contents($t);
            $pattern= '#(?<=<script type="text/javascript">window._sharedData =).*(?=;</script>)#imsU';
            preg_match($pattern, $content, $matches);
            $dkm=json_decode($matches[0]);
            $instance['id']= $dkm->entry_data->ProfilePage[0]->user->id;
        }
        return $instance;
    }
    function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Instagram';
        $total = ! empty( $instance['total'] ) ? $instance['total'] : '1';
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>">
                <?php _e( 'Link or name Instagram:' ); ?>
            </label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo $instagram; ?>">
            <small>
                Id: <?php echo $instance['id']; ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'total' ); ?>"><?php _e( 'Total:' ); ?></label> 
            <input list="total" id="<?php echo $this->get_field_id( 'total' ); ?>" name="<?php echo $this->get_field_name('total');?>" value="<?php echo esc_attr( $total ); ?>">
              <datalist id="total">
                  <?php for ($i=1; $i <= 10; $i++) { 
                    $i++;
                      echo "<option value='$i'>";
                  } ?>
              </datalist><br>
              <small>
                Min: 2
            </small>
        </p>
        <?php 
    }
}