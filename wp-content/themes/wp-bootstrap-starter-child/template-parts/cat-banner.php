<?php /*************** Sem Reservas - Category banners for category page and single
*/
	if(is_category()) {
		$term = get_queried_object();
		// vars
		$image = get_field('banner_da_categoria', $term);
	} elseif(is_single()) {
		$categories = get_the_category();			
		foreach($categories as $key => $category) {
			$curcatid = $category->term_id;
			$curcatname = $category->name;
			$curcatdesc = $category->description;
			$image = get_field('banner_da_categoria', 'category_'.$curcatid);
		}
		
	}
?>
<style type="text/css">	
	.category-banner {
		background-image: url(<?php echo $image['url']; ?>);
	}

	
</style>

<div class="category-banner container-fluid d-flex justify-content-center">
	<header class="page-header">
		<?php if(is_category()):?>

			<div class="sr-title"><?php	the_archive_title( '<h1 class="page-title">', '</h1>' );?></div>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

		<?php elseif (is_single()):?>

			<div class="sr-title"><h2 class="page-title"><?php echo $curcatname;?></h2></div>
			<div class="archive-description"><?php echo $curcatdesc;?></div>

		<?php endif; ?>
	</header><!-- .page-header -->
	<div class="sr-cat-icon"></div>	
</div>