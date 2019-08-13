<?php
/**
* Template Name: Home
 */
get_header('home'); ?>

<section id="primary" class="content-area col-sm-12">
    <main id="main" class="site-main" role="main">

        <?php
                if ( have_posts() ) :
                           
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
        
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                       the_content();
        
                    endwhile;
                endif;
        
             
        ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();