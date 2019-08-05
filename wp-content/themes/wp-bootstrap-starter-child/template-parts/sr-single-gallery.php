<?php /** Start - Sem Reservas Custom Gallery - Uses ACF - ACF Photo Gallery extension and Jquery Cycle 2 plugin */
    /**First, this only works on single and if we have gallery images*/
    if(is_single()):
        $srimages = acf_photo_gallery('imagens', $post->ID); 	
        $howmanyphotos = count($srimages);	
        if( count($srimages) ):	
        ?>
            <div id='sr-single-gallery' class="container">
                
                <div class="row">
                    <div id="sr-sing-nav-prev" class="col-sm-1 d-none d-sm-block">
                        <?php if($howmanyphotos > 1):?>
                            <a href="#" class="cycle-prev"><i class="fas fa-chevron-left"></i></a>  
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-sm-10 <?php if($howmanyphotos < 4) {echo('sr-bottom-line');} ?>">
                        <div id="slideshow-1">
                            <div id="cycle-1" class="col-12 cycle-slideshow"
                                data-cycle-slides="> div"
                                <?php if($howmanyphotos <4): ?>
                                    data-cycle-timeout="4000"
                                    data-cycle-pause-on-hover="true"
                                <?php else:?>
                                    data-cycle-timeout="20000"
                                <?php endif;?>
                                data-cycle-prev="#sr-sing-nav-prev .cycle-prev"
                                data-cycle-next="#sr-sing-nav-next .cycle-next"
                                data-cycle-auto-height="calc"
                                data-cycle-swipe=true
                                data-cycle-swipe-fx=scrollHorz
                                data-cycle-center-horz=true
                                data-cycle-center-vert=tru
                            >
                            <?php 	
                                    foreach($srimages as $image):
                                    
                                    $display_image_id=$image['id'];
                                    // Convert strings to array in order to get the desired image
                                    $theimage = wp_get_attachment_image_src($display_image_id,'sr-autores-image');
                                    $theimage = $theimage[0];
                                    $full_image_url= $image['full_image_url'];            
                                    
                            ?>
                                    <div><img src="<?php echo $theimage; ?>"/></div>	
                                            
                            <?php endforeach;  ?>

                            </div>
                        </div>
                        
                    </div>
                    <div id="sr-sing-nav-next" class="col-sm-1 d-none d-sm-block">
                        <?php if($howmanyphotos > 1):?>
                        <a href="#" class="cycle-next"><i class="fas fa-chevron-right"></i></a>
                        <?php endif;?>
                    </div>
                </div> 
                <?php if($howmanyphotos >= 4): 
                    $howmanyphotos = 4;?>				
                    <div class='row'>
                            <div class="col-1">
                            </div>
                            <div id="slideshow-2" class="col-10 sr-bottom-line">
                                <div id="cycle-2"  class=" cycle-slideshow"
                                    data-cycle-slides="> div"
                                    data-cycle-timeout="0"
                                    data-cycle-fx="carousel"								
                                    data-cycle-carousel-visible="<?php echo $howmanyphotos;?>"
                                    data-cycle-carousel-fluid=true
                                    data-allow-wrap="false"
                                    
                                >
                                    <?php 
                                        foreach($srimages as $image):
                                        $thumbnail_image_url= $image['thumbnail_image_url']; 
                                    ?>
                                    <div ><img src="<?php echo $thumbnail_image_url; ?>" width=150 height=150/></div>		
                                    <?php endforeach;  ?>
                                </div>
                            </div>
                            <div class="col-1">
                            </div>
                    </div>
                <?php endif;?>
            </div>
        <?php endif; /**have images */
    endif; /** End if single- Sem Reservas Custom Gallery */ 
?>