<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
$endereco = get_option('endereco');
$facebook = get_option('facebookurl');
$instagram = get_option('instagramurl');
$youtube = get_option('youtubeurl');
$wzp = get_option('whatsapp');
if($wzp) {
$wzpgetnum = preg_replace("/[^0-9]/","", $wzp);
$wzpgetnum = '55'.$wzpgetnum;
}
$email = get_option('emaildecontato');
?>
<div class="container pb-4">
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            <h1><?php the_title();?></h1>
        <div class="container p-0 m-0">
            <div class="row">

            <div id="contact" class=" col-sm-12 col-md-6 ">
                <?php  the_content(); ?>
                <?php if($email):?>
                    <p class='font-weight-bold'>
                        <a href="https://wa.me/<?php echo $wzpgetnum?>"><i class="fa fa-envelope"></i> <?php echo $email?></a>     
                    </p>
                <?php endif?>
                <?php if($wzp):?>
                    <p class='font-weight-bold'>
                        <a href="https://wa.me/<?php echo $wzpgetnum?>"><i class="fab fa-whatsapp"></i> <?php echo $wzp?></a>     
                    </p>
                <?php endif;?>

            </div>
            <div class=" col-sm-12 col-md-6 ">
             
            
                <?php  echo do_shortcode('[contact-form-7 id="177" title="Atendemos em todo o Brasil"]');  ?>
            </div>

            </div>
        </div>

        </div>
    </div>
</div>