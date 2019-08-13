<?php
    global $post;
    $args = array(
        'post_type' => 'momentos',
        'posts_per_page' => 8,
        'tax_query' => array(
            array(
                'taxonomy' => 'tipodemomento',
                'field' => 'slug',
                'terms' => 'eventos',
            )
            ),

    );
    $ativaquery = new WP_Query($args);
if ($ativaquery->have_posts() ):
?>
     <section class="pb-1 no-overflow eventos-aya">
      <div class="container">
        <div class="row gutter-1">
          <div class="col-md-6 col-lg-4 level-1">
            <div class="card card-equal bg-light-blue text-white">
             
              <div class="card-footer p-4">
                <h2 class="card-title fs-30 w-75 mx-auto text-lowercase text-center text-blue">Eventos </h2>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-8">
            <div class="do-owl owl-carousel owl-carousel-alt visible owl-loaded owl-drag">
            <?php                      
                        while ($ativaquery->have_posts() ) : $ativaquery->the_post(); 
                            $link = get_the_post_thumbnail_url($post, 'full');
                            $titulo = get_the_title($post);
                            $cliente = get_field('cliente');
                            $ano = get_field('ano');
                       ?> 
                        <figure class="equal"><a class="image image-fade">
                                
                                <a class='image image-fade' href='<?php echo $link;?>' title='<?php echo $titulo;?>'> 
                                <div class='add-info'>
                                    <p class='font-weight-bold text-uppercase'><?php echo $titulo;?></p>
                                    <?php if($cliente): ?>
                                      <p class="cliente-momento text-lowercase" ><?php echo ('<span class="font-weight-bold"> Cliente </span> ' . $cliente);?></p>
                                      <p class="ano-momento text-lowercase" ><?php echo ('<span class="font-weight-bold"> Ano </span> ' . $ano);?></p>
                                    <?php endif;?>
                                </div>
                                <?php the_post_thumbnail('sr-autores-image') ;?>
                                </a>
                            </figure>
                            
                            
                            <?php 
                         
                        endwhile;                       
                    
                    wp_reset_postdata();?>
          </div>
        </div>
      </div>
    </section>
     
<?php endif; ?>