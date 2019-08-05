<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); 
?>
	<section id="primary" class="content-area col-sm-10 col-md-12 col-lg-8 mx-auto">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			   
			/*** Not for sem reservas 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; 
			***/

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<section id="secondary" class="content-area col-sm-12 col-md-12 col-lg-10 mx-auto sr-bottom-line">
		<?php
		 get_template_part('template-parts/sr-new-posts', 'New Posts');
		 ?>
	</section><!-- #secondary -->	

<?php

get_footer();
