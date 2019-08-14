<?php
/**
* Template Name: Momento Aya
 */
get_header();

$yt = get_field('destaque_youtube');
if($yt) {
$yt = str_replace('watch?v=', 'embed/', $yt); // Convert from watch to embed
$yt = $yt.'?color=white&controls=0?rel=0';
}
$bgimage = get_the_post_thumbnail_url($post, 'full');
if ($bgimage) : 
?>
<style type="text/css">
    .momento-aya-head {
        background-image: url(<?php echo $bgimage ?>)
    }
</style>
<?php endif?>
<section id="primary" class="content-area col-sm-12 p-0">
    <main id="main" class="site-main" role="main">
        <!--Cabecalho da pagina -->
        <div class="momento-aya-head container-fluid d-flex h-100">	         
                <div class="row w-100 justify-content-center align-self-center">
                    <div class="col-12 m-auto">
                        <h2 class='text-center text-lowercase text-white'><?php the_title();?></h2>
                    </div>
                </div>
        </div>
        <?php
                if ( have_posts() ) :
                           
                    /* Start the Loop */
                    while ( have_posts() ) : the_post(); ?>
                    <div class="momento-aya-content container-fluid d-flex h-100">	         
                        <div class="row w-100 justify-content-center align-self-center">
                            <div class="col-sm-12 col-md-6 m-auto text-center">
                                <?php  the_content();?>
                            </div>
                        </div>
                    </div>
        <?php
                    endwhile;
                endif;        
             
        ?>
        <!-- VIDEO
	================================================== -->
    <?php if($yt):?>
		<div class="container-fluid m-0 p-0 video-destaque">
			<div class="row no-gutters">
				<div class="col-sm-12 col-md-10 content offset-md-1 ">								
						<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="<?php echo $yt;?>" allowfullscreen frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
						</div>				
				</div>
			</div>
		</div>      
            <?php endif;?>
      <?php
      get_template_part('template-parts/cases', 'cases');
       get_template_part('template-parts/eventos', 'eventos');
      get_template_part('template-parts/ativacoes', 'ativacoes');    
      ?>

 

      
      <?php   get_template_part('template-parts/sr-instagram', 'instagram');?>

     

    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();