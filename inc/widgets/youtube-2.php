<?php 
class monster_youtube_subscribe_widget_2 extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_youtube_subscribe_widget_2', // Base ID
            '# Youtube Subscribe Widget', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;     
        ?>
        <?php 
            if ($instance['id']!='') {
                $id=$instance['id'];
                $json= file_get_contents("https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$id&key=AIzaSyBrZKih0nq1-y8aOdmYdPllQ5_7Yl0RtW4");
                $statistics=json_decode($json)->items[0]->statistics;
            }
         ?>
        <div class="bg-white inset-3">
            <div class="youtube">
                <?php
                    if ( ! empty( $instance['title'] ) ) {
                        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                    }
                ?>
                <div class="channel-name">
                    <h5 class="txt-heading text-primary"><?php echo $instance['account']; ?></h5>
                    <p><?php echo $statistics->videoCount;?> videos</p>
                    <a href="https://www.youtube.com/<?php echo $instance['account']; ?>" target="_blank" class="icon icon-lg icon-secondary fa fa-3x fa-youtube"></a>
                </div>
                <div class="button-cnt"> <a href="https://www.youtube.com/<?php echo $instance['account']; ?>" target="_blank" class="btn btn-primary"><i class="material-icons">play_circle_outline</i> <em>Subscribe</em></a>
                    <div class="youtube-cnt">
                        <p><?php echo $statistics->subscriberCount;?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $after_widget; ?>
        <?php 
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['account'] = ( ! empty( $new_instance['account'] ) ) ? strip_tags( $new_instance['account'] ) : '';
        if (!empty($new_instance['account'])) {
            $instance['account']=str_replace('https:','',$new_instance['account']);
            $instance['account']=str_replace('http:','',$instance['account']);
            $instance['account']=str_replace('www.','',$instance['account']);
            $instance['account']=str_replace('youtube.com/channel/','',$instance['account']);
            $instance['account']=str_replace('youtube.com/c/','',$instance['account']);
            $instance['account']=str_replace('youtube.com/user/','',$instance['account']);
            $instance['account']=str_replace('youtube.com/','',$instance['account']);
            $instance['account']=str_replace('youtu.be/','',$instance['account']);
            $instance['account']=str_replace('/','',$instance['account']);
            $instance['account']=str_replace(' ','',$instance['account']);
            $instance['account']=trim($instance['account']);
            $instance['account']=strip_tags($instance['account']);
        } else {
            $instance['account']='';
        }
        $instance['id'] = ( ! empty( $new_instance['id'] ) ) ? strip_tags( $new_instance['id'] ) : '';
        return $instance;
    }
    function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title']  :'Subscribe to our channel';
        $account = trim(! empty( $instance['account'] ) ? $instance['account']  :'');
        $id = ! empty( $instance['id'] ) ? $instance['id']  :'';
        $json= file_get_contents("https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$id&key=AIzaSyBrZKih0nq1-y8aOdmYdPllQ5_7Yl0RtW4");
        $statistics=json_decode($json)->items[0]->statistics;
         ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'account' ); ?>"><?php _e( 'Chanel :' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'account' ); ?>" name="<?php echo $this->get_field_name( 'account' ); ?>" type="text" value="<?php echo esc_attr( $account ); ?>">
            <small>ex: <b>https://www.youtube.com/c/TemplateMonsterCo</b> or <b>https://www.youtube.com/user/TemplateMonsterCo</b> or <b>https://www.youtube.com/TemplateMonsterCo</b>
            <br>
            <a href="https://www.youtube.com/account_advanced">View more</a></small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e( 'Id chanel youtuebe:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>">
            <small>
                <a href="https://www.youtube.com/account_advanced#account-form">Get ID chanel</a><br> or viewsorce  https://www.youtube.com/*** and find '<b>channel_id=</b>'
            </small>
        </p>
        <p>
            <small>
                 <table>
                    <tr>
                        <td><i>Account: </i></td>
                        <td><b><?php echo $account; ?></b></td>
                    </tr>
                    <tr>
                        <td><i>Id: </i></td>
                        <td><b><?php echo $id; ?></b></td>
                    </tr>
                    <tr>
                        <td><i>Video Count: </i></td>
                        <td><b><?php echo $statistics->videoCount; ?></b></td>
                    </tr>
                    <tr>
                        <td><i>Subscribes:</i></td>
                        <td> <b><?php echo $statistics->subscriberCount; ?></b></td>
                    </tr>
                </table>
            </small>
        </p>
        <?php 
    }
}
?>