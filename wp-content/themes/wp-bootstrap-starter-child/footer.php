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

    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer navbar-dark" role="contentinfo">
		<div id="aya-footer" class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-2 offset-md-3 text-sm-center">
					<?php 
						$image_attributes = wp_get_attachment_image_src( $attachment_id = 21, 'full' );
						if ( $image_attributes ) : ?>
							<img class='foot-logo text-sm-center' src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" />
					<?php endif; ?>
				</div>
				<div class="col-sm-12 col-md-3 offset-md-1 my-auto ">
					<?php 
					// Variáveis do painel de opções do sir
					$endereco = get_option('endereco');
					$facebook = get_option('facebookurl');
					$instagram = get_option('instagramurl');
					$youtube = get_option('youtubeurl');

					if(isset($endereco)):
					?> 
						<p class="address"><?php echo $endereco; ?></p>

					<?php
					endif;

					if(isset($facebook) || isset($instagram)):
					?> 
						<p class="social">
							<?php if(isset($facebook)):?>
								<a target="_blank" href="<?php echo($facebook);?>" title="Facebook Momento Aya"> <i class="fab fa-facebook-square"></i> </a>
							<?php endif;?>
							<?php if(isset($instagram)):?>
								<a target="_blank" href="<?php echo($instagram);?>" title="Instagram Momento Aya"> <i class="fab fa-instagram"></i> </a>
							<?php endif;?>
							<?php if(isset($youtube)):?>
								<a target="_blank" href="<?php echo($youtube);?>" title="Youtube Momento Aya"> <i class="fab fa-youtube"></i> </a>
							<?php endif;?>
						</p>

					<?php endif;?>

					<p class="site-info"> &copy; Todos os direitos reservados  <span class="sep"> | </span> <?php echo date('Y'); ?>  <span class="sep"> | </span> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?></p>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<a id="back-to-top" href="#top"><i class="fa fa-chevron-up"></i></a>
</body>
</html>