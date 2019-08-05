<?php /** Start Sem Reservas we are what we are (módulo de autores) */
   
   $args = array(       
        'role' => 'editor',
        'orderby' => 'nicename' ,
        'fields' => 'id'
     ); 
    $srauthors = get_users( $args );
    $count = 0;
   
?>

		<div class="container">		
			<div class="row">
                 <div class="col-12 col-md-10 col-lg-10 col-xl-8 mx-auto mb-4 pt-5 sr-sec-title">
					<hgroup>
						<h4> Um pouco de cada um</h4>
						<h6>Quem faz o Sem Reservas?</h6>
                    </hgroup>
                </div>
            </div>
            <div class="row">
                 <div id="sr-author-box" class="col-12 mx-auto mb-4 pt-5">  
                        <?php 
                            foreach ( $srauthors as $userid ):
                                
                                $publicshow = get_field('exibir_este_usuario', 'user_'.$userid);	
                                if ($publicshow == 1):
                                    $count++;
                                    $author = get_the_author_meta('display_name', $userid);	
                                    $authordesc = get_the_author_meta( 'description', $userid);
                                    $autimgarr = get_field('imagem_do_autor', 'user_'.$userid);
                                    $idimagemautor = $autimgarr['ID'];                      
                        ?>  
                                <div class="row pb-5">
                                    <?php if($count % 2 ==0): ?>
                                        <div class="col12 col-sm-5 col-md-6 col-lg-7 order-last order-sm-first ">                                
                                            <hgroup id="sr-author-name">
                                                <h3 class="author-text text-sm-center text-md-right">
                                                    <?php echo $author; ?>
                                                </h3>
                                                <?php $srtagline = get_field('tagline', 'user_'.$userid); 
                                                if($srtagline): ?>
                                                    <h5 class="author-text text-sm-center text-md-right">
                                                        <?php echo $srtagline; ?>
                                                    </h5>
                                                <?php endif; ?>
                                            </hgroup>
                                            <?php if($authordesc) {
                                                echo("<div class='author-text text-sm-center text-md-right'><p>".$authordesc."</p></div>");  
                                                };
                                            ?>
                                        </div>
                                        <div class="sr-auth-img-wrap col-6 col-sm-6 col-md-5 col-lg-4 order-first order-sm-last offset-md-1  mx-auto mr-md-0 ">
                                            <?php 
                                                $authorimage = wp_get_attachment_image_src($idimagemautor,'sr-grid-thumb');
                                                $authorimage = $authorimage[0];
                                            ?>
                                            <img class="sr-masked d-block mx-auto mx-md-0 mb-4 mb-md-2" src="<?php echo $authorimage; ?>"/>
                                        </div>
                                    <?php else:?>
                                        <div class="sr-auth-img-wrap col-6 col-sm-6 col-md-5 col-lg-4 mx-auto  ">
                                            <?php 
                                                $authorimage = wp_get_attachment_image_src($idimagemautor,'sr-grid-thumb');
                                                $authorimage = $authorimage[0];
                                            ?>
                                            <img class="sr-masked d-block mx-auto mx-md-0 mb-4 mb-md-2" src="<?php echo $authorimage; ?>"/>
                                        </div>
                                        <div class="col11 col-sm-5 col-md-6 col-lg-7 offset-md-1 ">                                
                                            <hgroup id="sr-author-name">
                                                <h3 class="author-text text-sm-center text-md-left">
                                                    <?php echo $author; ?>
                                                </h3>
                                                <?php $srtagline = get_field('tagline', 'user_'.$userid); 
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
                                    <?php endif;?>
                                </div>
                        <?php endif;
                            endforeach; ?>
					
                </div>
			</div>
		</div>
<?php 	/** Fim Sem Reservas we are what we are */?>