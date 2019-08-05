<?php
/**
* Template Name: Fala com a gente
 */

get_header(); 
?>
	<section id="primary" class="content-area col-sm-10 col-md-12 col-lg-8 mx-auto">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/contact', 'Fala com a gente' );

        endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();