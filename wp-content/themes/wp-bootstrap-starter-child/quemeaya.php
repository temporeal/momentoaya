<?php
/**
* Template Name: Quem é AYA
 */

get_header(); 
?>
	<section id="primary" class="content-area col-sm-12 col-md-12  mx-auto">
		<main id="main" class="site-main" role="main">

		<?php
		 get_template_part('template-parts/quem-e-aya', 'Sobre');
		?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<?php /*** Unmark to show page title and content before the staff 
	<section id="primary" class="content-area col-sm-10 col-md-12 col-lg-8 mx-auto">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'sobre' );

        endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<section id="secondary" class="content-area col-sm-12 col-md-12 col-lg-10 mx-auto ">
		<?php
		 get_template_part('template-parts/quem-e-aya', 'Sobre');
		 ?>
	</section><!-- #secondary -->	*/?>



<?php

get_footer();
