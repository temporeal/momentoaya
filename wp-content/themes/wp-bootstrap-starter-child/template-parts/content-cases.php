<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php 
$cliente = get_field('cliente');
$ano = get_field('ano');
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
       

    <div class="entry-content">
                <?php
                if ( is_single() ) : ?>
                <?php /*	<div class="post-thumbnail"> <?php the_post_thumbnail(); ?>  </div>  **/?>
                <?php
                    the_content();
                endif;		
                ?>
            </div><!-- .entry-content -->
	
            <div class='containe p-4 my-4'>
        <div class="row ">

            <div class='col-sm-6 p-4 client-col '>
                <p class="font-weight-light"><span class='font-weight-bold'>Cliente:</span> <?php echo $cliente ?></p>
            </div>
            <div class='col-sm-6 p-4 year-col '>
                <p class="font-weight-light"><span class='font-weight-bold'>Ano:</span> <?php echo $ano ?></p>
            </div>
            
        </div>
    </div>

	

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
