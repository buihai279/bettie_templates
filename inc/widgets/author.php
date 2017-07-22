<?php 
class monster_about_author_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'monster_about_author_widget', // Base ID
            '# Author', // Name
            array( 'description' =>'A Foo Widget') // Args
        );
    }
    function widget( $args, $instance ) {
        extract($args);
        extract($instance);
        echo $before_widget;
        ?>
        <div class="text-center inset-3">
            <?php echo wp_get_attachment_image($id,array(300,300),false,array('class'=>'round','width'=>'220')); ?>
            <h4><?php echo $name ?></h4>
            <p>
                <?php  
                    $admin_option=get_option('admin_description');
                    if (isset($admin_option)&&$admin_option!='')
                        echo $admin_option; 
                ?>
            </p>
            <a href="<?php  echo $user_url ?>" class="btn btn-primary h5-style">
                <em>Read more</em> 
                <i class="material-icons">arrow_forward</i>
            </a>
        </div>
        <?php echo $after_widget;
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['login'] = $new_instance['login'];
        $instance['id'] = $new_instance['id'];

        $login=get_super_admins();
        $the_user = get_user_by('login',$login[0]);
        $id = $the_user->ID;
        $data=get_userdata($id);
        $instance['name']=$data->user_login;

        update_option('admin_description',$data->description );
        $instance['user_url']=get_author_posts_url( $id);

        return $instance;
    }
    function form( $instance ) {
        extract($instance);
        $arr=get_super_admins();
        ?>
        <p>
            <label>Select super admin</label>
            <select class="superadmin">
                <?php foreach ($arr as $value): ?>
                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label>Custom avatar</label>
            <?php $id = ! empty( $instance['id'] ) ? $instance['id']  :''; ?>
            <div class="<?php echo $this->get_field_id('img');?>">
                <?php 
                if (isset($id)&&$id!=''):
                    $configArr=array('style'=>'border-radius: 50%','width'=>150);
                    echo wp_get_attachment_image ($id,array(300,300),false,$configArr);
                else:
                    echo 'No image';
                endif;
                 ?>
                 <br>
                <button id="<?php echo $this->get_field_id('add-media');?>" class="btnmedia button" type="button"> Add Media</button>
            </div>
            <input type="text" hidden="hidden" name="<?php echo $this->get_field_name('id');?>" id="<?php echo $this->get_field_id('id');?>"value="<?php echo $instance['id'] ?>">
        </p>
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
                        $(".<?php echo $this->get_field_id('img');?>").html('<img src="'+image_url+'" class="round" width="150">');
                        $("#<?php echo $this->get_field_id('id');?>").attr( "value",image_id );
                    });
                });
            });
        </script>
        <p>
            <label><strong>Description:</strong></label><br>
            <?php 
            $admin_option=get_option('admin_description');
            if (isset($admin_option)&&$admin_option!='')
                echo $admin_option;
            else echo  'admin description empty';?>
        </p>
        <p>
            <label><a href="<?php echo get_admin_url() ?>/profile.php#description">Custom Description</a></label><br>
        </p>
       
        <?php 
    }
}
?>