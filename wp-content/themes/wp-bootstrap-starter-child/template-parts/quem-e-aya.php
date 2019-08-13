<?php /** Start Quem é AYA) */
   
   $args = array(       
        'role' => 'editor',
        'order' => 'ASC',
        'meta_key' => 'ordem',
        'orderby' => 'meta_value_num'
        
     ); 

    $srauthors = get_users( $args );
    $count = 0; /** To alternate bootstrap orders */
    $maskindex = 0;
?>

		<div class="container">		
		    <div class="row">
                 <div id="sr-author-box" class="col-12 mx-auto mb-4 pt-5">  
                        <?php 
                            foreach ( $srauthors as $users ):
                                $userid = $users ->ID;
                                
                                $publicshow = get_field('exibir_este_usuario', 'user_'.$userid);	
                                if ($publicshow == 1):
                                    $count++;

                                    /** Mask logic */
                                    $masktypes = ['mask1', 'mask2', 'mask3'];
                                    $maskindex++;
                                    if($maskindex == 1) {
                                        $mask = $masktypes[0];
                                        $maskindex == 2;
                                    } 
                                    if ($maskindex == 2) {
                                        $mask = $masktypes[1];
                                        $maskindex == 3;
                                    } if ($maskindex == 3) {
                                        $mask = $masktypes[2];
                                        $maskindex == 1;
                                    }
                                   
                                    $author = get_the_author_meta('display_name', $userid);	
                                    $authordesc = get_the_author_meta( 'description', $userid);
                                    $authormail = get_the_author_meta( 'user_email', $userid);
                                    $autimgarr = get_field('imagem_do_autor', 'user_'.$userid);
                                    $idimagemautor = $autimgarr['ID'];                      
                        ?>  
                                <div class="row no-gutters pb-7">
                                    <?php if($count % 2 ==0): ?>
                                        <div class="col-sm-12 col-md-6 order-last order-sm-first  bg-white author-txt-wrap ">                                
                                            <hgroup id="sr-author-name">
                                                <h3 class="author-text text-sm-center text-md-left">
                                                    <?php echo $author; ?>
                                                </h3>
                                                <?php $srtagline = get_field('tagline', 'user_'.$userid); 
                                                if($srtagline): ?>
                                                    <h5 class="author-text text-sm-center text-md-left text-uppercase">
                                                        <?php echo $srtagline; ?>
                                                    </h5>
                                                <?php endif; ?>
                                            </hgroup>
                                            <?php if($authordesc) {
                                                echo("<div class='author-text text-sm-center text-md-left'><p>".$authordesc."</p></div>");  
                                                };
                                                echo("<p class='author-email' >".$authormail."</p>");
                                            ?>
                                        
                                        </div>
                                        <div class=" col-sm-12 col-md-6 order-first order-sm-last  mx-auto mr-md-0 sr-auth-img-wrap">
                                            <?php 
                                                $authorimage = wp_get_attachment_image_src($idimagemautor,'sr-autores-image');
                                                $authorimage = $authorimage[0];
                                            ?>
                                            <img class="sr-masked <?php echo $mask;?> d-block mx-auto mx-md-0 mb-4 mb-md-2" src="<?php echo $authorimage; ?>"/>
                                            <?php /** Morphin SVG */?>
                                                   <?php if($mask == '2'):?>
                                                        <svg  viewBox="0 0 600 490" class="snapme-<?php echo $mask;?>"><defs></defs></svg>
                                                    <?php else:?>
                                                         <svg  viewBox="0 0 600 600" class="snapme-<?php echo $mask;?>"><defs></defs></svg>
                                                    <?php endif?>
                                            <?php /** END Morphin SVG */?>
                                        </div>
                                    <?php else:?>
                                        <div class="sr-auth-img-wrap col-sm-12 col-md-6   mx-auto  ">
                                            <?php 
                                                $authorimage = wp_get_attachment_image_src($idimagemautor,'sr-autores-image');
                                                $authorimage = $authorimage[0];
                                            ?>
                                            <img class="sr-masked  <?php echo $mask;?> d-block  mb-4 mb-md-2" src="<?php echo $authorimage; ?>"/>
                                                    <?php if($mask == '2'):?>
                                                        <svg  viewBox="0 0 600 490" class="snapme-<?php echo $mask;?>"><defs></defs></svg>
                                                    <?php elseif($mask =='3'):?>
                                                         <svg  viewBox="0 0 600 400" class="snapme-<?php echo $mask;?>"><defs></defs></svg>
                                                    <?php else:?>
                                                         <svg  viewBox="0 0 600 600" class="snapme-<?php echo $mask;?>"><defs></defs></svg>
                                                    <?php endif?>
                                        </div>
                                        <div class="col-sm-12 col-md-6 bg-white author-txt-wrap ">                                
                                            <hgroup id="sr-author-name">
                                                <h3 class="author-text text-sm-center text-md-left">
                                                    <?php echo $author; ?>
                                                </h3>
                                                <?php $srtagline = get_field('tagline', 'user_'.$userid); 
                                                if($srtagline): ?>
                                                    <h5 class="author-text text-sm-center text-md-left text-uppercase">
                                                        <?php echo $srtagline; ?>
                                                    </h5>
                                                <?php endif; ?>
                                            </hgroup>
                                            <?php if($authordesc) {
                                                echo("<div class='author-text text-sm-center text-md-left'><p>".$authordesc."</p></div>");  
                                                };
                                                echo("<p class='author-email'>".$authormail."</p>");
                                            ?>
                                        </div>                                       
                                    <?php endif;?>
                                </div>
                        <?php endif;
                            endforeach; ?>
					
                </div>
			</div>
		</div>
<?php 	/** Fim Quem é AYA */?>