<div class="container-fluid cases-aya">		
	<div class="row">
        <div class="col-12 col-md-10 col-lg-10 col-xl-8 mx-auto mb-4 pt-5 sr-sec-title">
			<hgroup>
				<h4 class="text-lowercase text-center text-blue font-weight-bold"> Cases de sucesso</h4>
				
            </hgroup>
        </div>
	</div>
	<div class='row mais-cases'>
			
					<?php 	
						$excludethis = get_the_ID();
						global $post;
						$the_query = new WP_Query( array(
							'post__not_in' => array($excludethis), //Exclude current
							'post_type' => 'cases',
							'posts_per_page' => 4,
						) );		
						if ($the_query->have_posts() ) : ?>							

							<?php
							
							/* Start the Loop */
							while ($the_query->have_posts() ) : $the_query->the_post();							
						
                            $size = 'sr-grid-thumb';	
                            $link = get_the_permalink();
							$title = get_the_title();					
							$tagline = get_field('tagline');
							?>
							
								<div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch  ">
                                    <div class="card">
                                      
                                        <a href='<?php echo $link;?>'>
                                            <div class="card-img">
                                              <?php the_post_thumbnail($size) ?>
                                            </div> 
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $title;?></h5>
                                                <p class="card-text"><?php echo $tagline;?></p>
                                        </a>
                                        </div>
                                    </div>                                  
								</div>
							
							<?php 							

							endwhile;
							wp_reset_postdata();
						endif;
					?>

				</div>
</div>