<?php
/**
* Template Name: Home
 */
get_header('home'); ?>

<section id="primary" class="content-area col-sm-12">
    <main id="main" class="site-main" role="main">

        <?php
                get_template_part( 'template-parts/home-categories', 'Home Categories' );
                get_template_part( 'template-parts/home-authors', 'Autores Home' );
                get_template_part( 'template-parts/contact', 'Fala com a gente' );
        ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();