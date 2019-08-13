<div class="container">		
	<div class="row">
        <div class="col-12 col-md-10 col-lg-10 col-xl-8 mx-auto mb-4 pt-5 sr-sec-title">
			<hgroup>
				<h4> +</h4>
				<h6>Cases de sucesso</h6>
            </hgroup>
        </div>
	</div>
	<div id="aindafome" class='row align-items-center justify-content-center '>
					<?php 	
						$excludethis = get_the_ID();
						global $post;
						$the_query = new WP_Query( array(
							'post__not_in' => array($excludethis), //Exclude current
							'post_type' => 'post',
							'posts_per_page' => 5,
						) );		
						if ($the_query->have_posts() ) : ?>							

							<?php
							$i = 0;
							/* Start the Loop */
							while ($the_query->have_posts() ) : $the_query->the_post();
							$i++;
						
							$size = 'sr-grid-thumb';
							$commonclass = 'col-6 col-md-3 col-lg-2 align-self-center mx-0 px-0 order-md-';
							$commonclasss2 = 'col-3 col-md-1 col-lg-1 align-self-center mx-0 px-0 order-md-'; 
							$link = get_the_permalink();
							$title = get_the_title();

							if($i==1) {								
								$srclass = 'col-12 col-md-4 mx-0 px-0 text-center align-self-center order-md-3';								
							} elseif ($i ==2 ) {								
								$srclass = $commonclass.$i;							
							} elseif ($i ==5 ) {								
								$srclass = $commonclasss2.$i;							
							} 
							 elseif ($i ==3 ) {
								$srclass = $commonclass.'4';
							} else {
								$srclass = $commonclasss2.'1';
							}
							
							?>
							
								<div class="<?php echo $srclass;?> ">
									<a href='<?php echo $link;?>' title='<?php echo $title;?>'>
										<?php 
											the_post_thumbnail($size) 
										?>
									</a>
								</div>
							
							<?php 							

							endwhile;
							wp_reset_postdata();
						endif;
					?>

				</div>
</div>