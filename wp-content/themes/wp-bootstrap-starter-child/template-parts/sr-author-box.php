
<?php
// Handle multiple authors
$authorid = get_the_author_ID();

 /** Start Sem Reservas autor box - Uses ACF autor taxonomy boxes */
	 /** Has the author been marked to be showed to public? */
	
	$authordesc = get_the_author_meta( 'description', $authorid);
	$publicshow = get_field('exibir_este_usuario', 'user_'.$authorid);	
	if ($publicshow == 1):
		$author = get_the_author_meta( 'user_firstname', $authorid);
		$author = $author .' '. get_the_author_meta( 'user_lastname', $authorid);
		$autimgarr = get_field('imagem_do_autor', 'user_'.$authorid);
		$idimagemautor = $autimgarr['ID'];
	?>
		<div class="container">
			<div id="sr-author-box" class="row ">			
				<div class="col-md-10 ml-auto mr-auto">
					<div class="row">
						<div class="sr-auth-img-wrap col-6 col-md-5 col-lg-4 mx-auto  ">
							<?php 
								$authorimage = wp_get_attachment_image_src($idimagemautor,'sr-grid-thumb');
								$authorimage = $authorimage[0];
							?>
							<img class="sr-masked d-block mx-auto mx-md-0" src="<?php echo $authorimage; ?>"/>
						</div>
						<div class="col12 col-md-7 col-lg-8  ">
					
							<hgroup id="sr-author-name">
								<h3 class="author-text text-sm-center text-md-left pt-4 pt-md-0">
									<?php echo $author; ?>
								</h3>
								<?php $srtagline = get_field('tagline', 'user_'.$authorid); 
								if($srtagline): ?>
									<h5 class="author-text text-sm-center text-md-left">
										<?php echo $srtagline; ?>
									</h5>
								<?php endif; ?>
							</hgroup>
							<?php if($authordesc) {
								echo("<div class='author-text text-sm-center text-md-left'><p>".$authordesc."</p></div>");  
								};
							?>
						</div>
					</div>
				</div>		
			</div>
		</div>
	<?php 
	endif;


	/** End WP-Starter-Child-BY-TRCOM autor box */?>