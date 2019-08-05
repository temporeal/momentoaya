	<?php /** Start sr-picos-urbanos */
		//* shall we show this box for this post? **/
		$showinfos = get_field('mostrar_pico');
		if($showinfos == 1):
			$logo = get_field('logotipo_do_estabelecimento');
			$rating = get_field('classificacao');
			$cidade = get_field('cidade');
			$endereco = get_field('endereco');
			$facebook = get_field('urlface');
			$insta = get_field('urlinsta');
			$twitter = get_field('urltwitter');
			$sitepico = get_field('urlsite');
	?>
			<div id="sr-pico-box" class="container">
				<div class="row">			
					<div class="col-12 col-md-10 col-lg-10 col-xl-8 mx-auto mb-4 pt-5 sr-sec-title">
						<hgroup>
							<h4> Onde achar</h4>
							<h6>Em uns pico urbano</h6>
						</hgroup>
					</div>
				</div>
				<div class="row  sr-bottom-line">
				<?php if($logo): 
					$logoimage = wp_get_attachment_image_src($logo,'sr-logotipos-image');	
					else:
						// Use SR logo if there is no logo
					$logoimage = wp_get_attachment_image_src('55','sr-logotipos-image');	
					endif;					
					$logow = $logoimage[1];
					$logoh = $logoimage[2];
					$logoimage = $logoimage[0];	
					$logoext = wp_check_filetype($logoimage);
					$logoext = $logoext['ext'];
				?>
					
					<div class=" col-12 col-md-6 col-lg-8 col-xl-8 px-0 sr-logo-image 
						<?php if($logoext != 'png') {
							echo('logo-white-bg');}; 
							if($logow / $logoh > 1.2 ) { 
							echo(' sr-hor-logo');};
						?>
					">								
							<img class="my-5 mx-auto" src="<?php echo $logoimage; ?>" width="<?php echo $logow; ?>" height="<?php echo $logoh; ?>"/>
					</div>
					<div class="h-review col-12 col-md-6 col-lg-4 col-xl-4 mx-auto pt-5">
						<div class="row">
							<div class="col-12 px-3 px-xl-0 px-lg-0">
								<h2 class="pico-text text-sm-center text-md-left"><?php the_field('estabelecimento');?> </h2>
								<?php if($cidade): ?>
									<h3 class="pico-text text-sm-center text-md-left"><?php echo $cidade;?></h3>
								<?php endif; ?>
								<?php if($rating): ?>
									<p class="pico-text text-sm-center text-md-left "> <data id="post-rating" class="p-rating" data-value="<?php echo $rating; ?>"></data></p>		
								<?php endif; ?>		
								<?php if($endereco): ?>
									<p class="pico-text text-sm-center text-md-left "><?php echo $endereco;?></p>
								<?php endif; ?>	
							</div>
						</div>
						<div class='row'>
								<div class="pico-icon pico-text text-sm-center text-md-left col-12 px-3 px-xl-0 px-lg-0 pt-3">
									<?php if($facebook): ?>
										<a class="py-3 px-4 pt-md-2 pt-lg-2 px-lg-3" target="_blank" href='<?php echo $facebook;?>'> <i class='fab fa-facebook-f' aria-hidden="true"></i> </a>
									<?php endif; ?>	
									<?php if($insta): 
										if(strpos($insta, '@') !== false) {
											$insta = str_replace('@', 'https://www.instagram.com/', $insta);
										} 
									?>
										<a class="py-3 px-4 pt-md-2 pt-lg-2 px-lg-3" target="_blank" href='<?php echo $insta;?>'> <i class='fab fa-instagram' aria-hidden="true"></i> </a>
									<?php endif; ?>	
									<?php if($twitter):
										if(strpos($twitter, '@') !== false) {
											$twitter = str_replace('@', 'https://twitter.com/', $twitter);
										} 
										?>
										<a class="py-3 px-4 pt-md-2 pt-lg-2 px-lg-3" target="_blank" href='<?php echo $twitter;?>'> <i class='fab fa-twitter' aria-hidden="true"></i> </a>
									<?php endif; ?>										
								</div>	
								<?php if($sitepico): ?>
									<div class="pico-text text-sm-center text-md-left col-12 px-3 px-xl-0 px-lg-0 pt-3">
										<a class="btn btn-warning text-lowercase px-4" target="_blank"  href='<?php echo $sitepico;?>'> Visitar site </a>
									</div>
								<?php endif; ?>	
						
						</div>
					</div>			
				
				</div>
			</div>
				
		<?php endif; /*** End Picos Urbanos */?>