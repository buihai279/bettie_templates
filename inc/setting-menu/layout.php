<?php 
    if (isset($_POST['submit'])):
        if (isset($_POST['home'])&&$_POST['home']!='')
            update_option('home_layout',$_POST['home'] );
        if (isset($_POST['sidebar'])&&$_POST['sidebar']!='')
            update_option('sidebar_layout',$_POST['sidebar'] );
        if (isset($_POST['header'])&&$_POST['header']!='')
            update_option('header_layout',$_POST['header'] );
        if (isset($_POST['footer'])&&$_POST['footer']!='')
            update_option('footer_layout',$_POST['footer'] );
    endif;
    $layout=(get_option('home_layout')!='')?get_option('home_layout'):'default';
    $sidebar=(get_option('sidebar_layout')!='')?get_option('sidebar_layout'):'right';
    $header=(get_option('header_layout')!='')?get_option('header_layout'):'minimal';
    $footer=(get_option('footer_layout')!='')?get_option('footer_layout'):'default';
    $check='checked=\'checked\''; 
?>
<h1>Social Layout</h1>
<form action="#" method="POST">
    <table cellpadding="20px">
        <tbody>
            <tr>
                <th scope="row" class="mr">Home Layout</th>
                <td>
                    <fieldset>
                        <label>
                            <input type="radio" name="home" value="default" 
                            <?php echo ($layout=='default') ? $check : '' ; ?> > Home Default 
                        </label><br>
                        <label>
                            <input type="radio" name="home" value="masonry" 
                            <?php echo ($layout=='masonry') ? $check : '' ; ?> > Home Masonry
                        </label><br>
                        <label>
                            <input type="radio" name="home" value="grid" 
                            <?php echo ($layout=='grid') ? $check : '' ; ?> > Home Grid
                        </label><br>
                        <label>
                            <input type="radio" name="home" value="boxed" 
                            <?php echo ($layout=='boxed') ? $check : '' ; ?> > Home boxed layout
                        </label><br>
                        <label>
                            <input type="radio" name="home" value="full" 
                            <?php echo ($layout=='full') ? $check : '' ; ?> > Home full width layout 
                        </label><br>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row" class="mr">Header Layout</th>
                <td>
                    <fieldset>
                        <label>
                            <input type="radio" name="header" value="default" 
                            <?php echo ($header=='default') ? $check : '' ; ?> > Header Default 
                        </label><br>
                        <label>
                            <input type="radio" name="header" value="minimal" 
                            <?php echo ($header=='minimal') ? $check : '' ; ?> > Header Minimal
                        </label><br>
                        <label>
                            <input type="radio" name="header" value="central" 
                            <?php echo ($header=='central') ? $check : '' ; ?> > Header Central
                        </label><br>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row" class="mr">Footer Layout</th>
                <td>
                    <fieldset>
                        <label>
                            <input type="radio" name="footer" value="default" 
                            <?php echo ($footer=='default') ? $check : '' ; ?> > Footer Default 
                        </label><br>
                        <label>
                            <input type="radio" name="footer" value="minimal" 
                            <?php echo ($footer=='minimal') ? $check : '' ; ?> > Footer Minimal
                        </label><br>
                        <label>
                            <input type="radio" name="footer" value="central" 
                            <?php echo ($footer=='central') ? $check : '' ; ?> > Footer Central
                        </label><br>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row" class="mr">Sidebar Layout</th>
                <td>
                    <fieldset>
                        <label>
                            <input type="radio" name="sidebar" value="right" 
                            <?php echo ($sidebar=='right') ? $check : '' ; ?> > Right Sidebar (default) 
                        </label><br>
                        <label>
                            <input type="radio" name="sidebar" value="left" 
                            <?php echo ($sidebar=='left') ? $check : '' ; ?> > Left Sidebar 
                        </label><br>
                        <label>
                            <input type="radio" name="sidebar" value="double" 
                            <?php echo ($sidebar=='double') ? $check : '' ; ?> > Double Sidebar
                        </label><br>
                        <label>
                            <input type="radio" name="sidebar" value="no" 
                            <?php echo ($sidebar=='no') ? $check : '' ; ?> > No Sidebar
                        </label><br>
                    </fieldset>
                </td>
            </tr>
        </tbody>
    </table>
     <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
</form>
<style>
    .mr{padding: 15px;padding-top: 0;}
</style>

