<?php /*************** Sem Reservas - Category banners for category page and single
*/
	if(is_category()) {
		$term = get_queried_object();
		// vars
		$image = get_field('banner_da_categoria', $term);
	} elseif(is_single()) {
		$image = get_the_post_thumbnail_url($post->ID, 'full');
		$titulo = get_the_title();
		$tagline = get_field('tagline');
	}
?>
<style type="text/css">	
	.category-banner {
		background-image: url(<?php echo $image; ?>);
	}

	
</style>

<div class="category-banner container-fluid d-flex justify-content-center">
	<header class="page-header d-flex">
		<?php if(is_category()):?>

			<div class="sr-title"><?php	the_archive_title( '<h1 class="page-title text-uppercase">', '</h1>' );?></div>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

		<?php elseif (is_single()):?>

			<div class="sr-title">
				<h1 class="page-title text-uppercase"><?php echo $titulo;?></h1>
				<p><?php echo $tagline;?></p>
			</div>
		

		<?php endif; ?>
	</header><!-- .page-header -->

</div>