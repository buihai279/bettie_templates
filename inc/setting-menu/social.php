 <?php 
 if (isset($_POST['submit'])) {
    update_option('facebook_url',$_POST['fanpage'] );
    update_option('gplus_url',$_POST['gplus'] );
    update_option('twitter_url',$_POST['twitter']);
    update_option('instagram_url',$_POST['instagram'] );
    update_option('linked_in_url',$_POST['linked_in'] );
    update_option('dribbble_url',$_POST['dribbble'] );
 }
$facebook = esc_attr( get_option( 'facebook_url' ) );
$gplus = esc_attr( get_option( 'gplus_url' ) );
$twitter = esc_attr( get_option( 'twitter_url' ) );
$instagram = esc_attr( get_option( 'instagram_url' ) );
$linked_in = esc_attr( get_option( 'linked_in_url' ) );
$dribbble = esc_attr( get_option( 'dribbble_url' ) );

 ?>
 <?php if( isset($_POST['submit']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
<?php } ?>
<h1>Social Setting</h1>
<form action="#" method="POST">
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="fanpage">Fanpage Facebook</label>
                </th>
                <td>
                    <input type="text" name="fanpage" value="<?php echo $facebook ?>" class="regular-text" placeholder="Facebook Fanpage" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="twitter">Twitter</label>
                </th>
                <td>
                    <input type="text" name="twitter" id="twitter" class="regular-text"  value="<?php echo $twitter;?>" placeholder="Twitter handler" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="gplus">Gplus</label>
                </th>
                <td>
                    <input type="text" name="gplus" value="<?php echo $gplus ?>" class="regular-text" placeholder="Google+ handler" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="instagram">Instagram</label>
                </th>
                <td>
                    <input type="text" name="instagram" value="<?php echo $instagram ?>" class="regular-text" placeholder="Instagram" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="linked_in">Linked in</label>
                </th>
                <td>
                    <input type="text" name="linked_in" value="<?php echo $linked_in ?>" class="regular-text" placeholder="Linked in" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="dribbble">Dribbble</label>
                </th>
                <td>
                    <input type="text" name="dribbble" value="<?php echo $dribbble ?>" class="regular-text" placeholder="Dribbble" />
                </td>
            </tr>
        </tbody>
    </table>
    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
</form>
