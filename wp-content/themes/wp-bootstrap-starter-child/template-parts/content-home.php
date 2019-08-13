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
// Sem reservas - ACF - Get the post title complement
$sectitle = get_field( "complemento" );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			echo('<h1 class="entry-title">');
			echo(get_the_title());
			if( $sectitle ) {
				echo('<span>');
					echo $sectitle;
				echo('</span>');
			}
			echo('</h1>');
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		if ( 'post' === get_post_type() ) : ?>
			<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		if ( is_single() ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div> 
		<?php
			the_content();
		endif;		
		?>
	</div><!-- .entry-content -->
	
	<?php get_template_part('template-parts/sr-single-gallery', 'Single Gallery') ?>
	<?php get_template_part('template-parts/sr-author-box', 'Author Box') ?>
	<?php get_template_part('template-parts/sr-picos-urbanos', 'Picos Urbanos') ?>	

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
