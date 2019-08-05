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
	<section id="primary" class="sr-cat-top-pad content-area col-12 mx-auto pb-5">
		<main id="main" class="site-main" role="main">   
            <div class="row">    
                <?php
                
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/cat-display', 'Display de Categoria' );			

                

                endwhile; // End of the loop.
                ?>
            </div> <!--- Row-->
        </main><!-- #main -->
	</section><!-- #primary -->	

<?php

get_footer();
