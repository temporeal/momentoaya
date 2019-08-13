<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
$htags = ['h1', 'h2'];
?>
<?php if(!is_page('110')):
$htags = ['h4', 'h6'];
?>
<div id="contact" class="content-area col-sm-10 col-md-12 col-lg-8 mx-auto">
<?php endif;?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10 col-xl-8 mx-auto mb-4 pt-5 sr-sec-title">
                <header class="entry-header sr-sec-title">
                    <hgroup>
                            <<?php echo $htags[0];?> class='pb-0'>Fala com a gente</<?php echo $htags[0];?>>
                            <<?php echo $htags[1];?>>Type something funny here</<?php echo $htags[10];?>>
                    </hgroup>
                </header><!-- .entry-header -->
            </div>
        </div>
        
        <div class="pb-5 ">
            <div class='row'>
                <div class="col-md-5 ">
                    <?php
                        if(!is_page('110')) {
                            $contactconten = apply_filters('the_content', get_post_field('post_content', '110'));
                            echo $contactconten;
                        } else {
                            the_content();
                        }
                    ?>
                </div>
                <div class="col-md-6 offset-md-1">
                    <?php
                        echo do_shortcode('[contact-form-7 id="165" title="Fala com a gente"]'); 
                    ?>
                </div>
            </div>
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
<?php if(!is_page('110')):?>
</div>
<?php endif;?>