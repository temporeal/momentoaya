<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
	<?php	get_template_part('template-parts/sr-instagram', 'SR Instagram') ;	?>
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer navbar-dark" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; Todos os direitos reservados  <span class="sep"> | </span> <?php echo date('Y'); ?>  <span class="sep"> | </span> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
               

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<div id="searchbar"><a id="open-search" href="#top"><i class="fa fa-search"></i></a> <?php get_search_form(); ?> </div>
<a id="back-to-top" href="#top"><i class="fa fa-chevron-up"></i></a>
</body>
</html>