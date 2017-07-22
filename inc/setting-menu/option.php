<?php wp_enqueue_script('jquery_min'); ?>
 <?php if (isset($_POST['img'])!=''&&is_numeric($_POST['img'])) {
 	update_option('img404' ,$_POST['img']);
 } ?>
<?php $img=wp_get_attachment_image_src(get_option('img404' ),'thumbnail-category');?>
<p><h3>Setting 404 page image <a href="<?php echo site_url('404'); ?>">View</a></h3></p>
<?php 
    if (isset($_POST['submit'])):
        if (isset($_POST['coppyright']))
            update_option('coppyright',$_POST['coppyright'] );
    endif;
    $coppyright=(get_option('coppyright')!='')?get_option('coppyright'):'';
?>
<div class="img">
 <img src="<?php echo $img[0]; ?>" alt="" width='329'>
</div>
<button id="btnmedia" class="btnmedia button" type="button"> Change Media</button>
<form action="#" method="POST">

    
	<input type="text" name="img" id="img404" hidden value="">
Coppyright
<input type="text" name="coppyright" id="coppyright" class="regular-text"  value="<?php echo $coppyright;?>" placeholder="Coppyright" />
     <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
</form>



<script >
    <?php wp_enqueue_media(); ?>
        (function($){
        $("#btnmedia").click(function(e) {
            e.preventDefault();
            var frame  = wp.media({ 
                title: 'Upload Image',
                multiple: false
            }).open().on('select', function(e){
                var uploaded_image = frame.state().get('selection').first();
                var image_url = uploaded_image.toJSON().url;
                var image_id = uploaded_image.toJSON().id;
                $(".img").html('<img src="'+image_url+'" width="300">');
                $("#img404").val(image_id);
            });
        });

})(jQuery);
</script>

<style>
    .mr{padding: 15px;padding-top: 0;}
</style>