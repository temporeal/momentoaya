<?php /*************** Sem Reservas - Category banners for category page and single
*/
    // Do we have a subtitle?
    $subtitle = get_field('headline');	
    
		
?>
<style type="text/css">	
	.category-banner {
		background-image: url(<?php echo $image['url']; ?>);
	}

	
</style>

<div class="page-banner container-fluid d-flex justify-content-center">
	<header class="page-header">	
            <div class="sr-title"><?php	the_title( '<h1 class="page-title">', '</h1>' );?></div>
            
            <?php if($subtitle): ?>
                <div class="headline">
                    <?php echo $subtitle;?>
                </div>
            <?php endif;?>
	
	</header><!-- .page-header -->

</div>