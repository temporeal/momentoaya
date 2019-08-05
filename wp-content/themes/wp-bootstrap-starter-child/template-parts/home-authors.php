<?php /*************** Sem Reservas - Authors home section
*/
$args = array(       
    'role' => 'editor',
    'orderby' => 'nicename' ,
    'fields' => 'id'
 ); 
$srauthors = get_users( $args );
?>
<div id="authors" class="container content-area col-sm-10 col-md-12 col-lg-8 mx-auto sr-t-line">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-10 col-xl-8 mx-auto mb-4 pt-5 sr-sec-title">
            <header class="entry-header sr-sec-title">
                <hgroup>
                    <h4 class='pb-0'>Sobre nois</h4>
                    <h6>Quer saber quem toma conta disso tudo?</h6>
                </hgroup>
             </header><!-- .entry-header -->
            </div>
    </div>
</div>
<div class="sr-full-width">
    <a href="#" class="sr-author-cycle-next"><i class="fas fa-chevron-right"></i></a>
   
    <div class='cycle-slideshow '
            data-cycle-timeout="10000"
            data-cycle-slides="> div"
            data-cycle-next=".sr-author-cycle-next"
            data-cycle-pager=".author-pager"
            data-cycle-swipe=true
            data-cycle-swipe-fx=scrollHorz
        > 
        
        <?php 
            foreach ( $srauthors as $userid ):                                    
                $publicshow = get_field('exibir_este_usuario', 'user_'.$userid);	
                if ($publicshow == 1):
                    $author = get_the_author_meta('display_name', $userid);	
                    $authordesc = get_the_author_meta( 'description', $userid);
                    $autimgarr = get_field('imagem_do_autor', 'user_'.$userid);
                    $idimagemautor = $autimgarr['ID'];                      
        ?>  
                <div class="container w-100 sr-author-cycle home-author ">
                    <div class="row">     
                        <div class='col-6 col-sm-4 offset-sm-1 col-md-7 offset-md-0 my-auto mx-auto mx-md-0 pl-0'>
                        <?php 
                            $authorimage = wp_get_attachment_image_src($idimagemautor,'sr-autores-image');
                            $authorimage = $authorimage[0]; ?>
                            <img class="sr-masked d-block w-100" src="<?php echo $authorimage; ?>"/>
                        </div>
                        <div class='col-7 col-sm-6 offset-sm-1 col-md-4 offset-md-1 my-auto mx-auto pl-lg-5 pt-4 pt-md-0'>
                                <hgroup id="sr-author-name">
                                    <h3 class="author-text text-center text-sm-left">
                                <?php echo $author; ?>
                                    </h3>
                                    <?php $srtagline = get_field('tagline', 'user_'.$userid); 
                                    if($srtagline): ?>
                                    <h5 class="author-text  text-center text-sm-left"> <?php echo $srtagline; ?></h5>
                                    <?php endif; ?>
                                </hgroup>
                                <?php if($authordesc) {
                                echo("<div class='author-text  text-center text-sm-left'><p>".$authordesc."</p></div>");  
                                }; ?>
                                <div class="author-pager text-center text-sm-left"></div>      
                        </div>   
                    </div>
                </div>
                <?php
                endif; 
            endforeach; ?>
            
    </div>
   
</div>