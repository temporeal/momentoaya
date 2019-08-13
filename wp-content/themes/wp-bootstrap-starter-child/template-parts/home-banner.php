<?php /*************** Sem Reservas -Home page banner
*/
 $args = array(
     'post_type' => 'destaque',
    'numberposts' => 3, 
    'post_status' => 'publish',   
    );
 $srrecent = wp_get_recent_posts( $args );
 $theUids = array();

foreach ($srrecent as $uids) {
    $theUids[] = $uids['ID'];
}
?>  

<div class='sr-home-cycle cycle-slideshow'
    data-cycle-timeout="7000"
    data-cycle-slides="> div"
    data-cycle-swipe=true
    data-cycle-swipe-fx=scrollHorz
    >
  
    <?php
     $i = 0;
     foreach($srrecent as $recent):
            $i++;
            $theid = $recent['ID'];
            $title = $recent["post_title"];
            $thelink = get_the_permalink($theid);
            setup_postdata( $theid);
            $thecontent =  get_the_content($theid);
    ?>
        <div class="home-banner w-100 sr-homemask-<?php echo $i?>" role="banner" >            
                <div class="container justify-content-center">
                    <div class="row mx-auto my-auto">
                           
                                <div class='col-12 img-wrp  mx-auto text-center '>
                                    <a href="<?php echo $thelink; ?>">
                                        <h2 class="text-uppercase"><?php echo $thecontent;?></h2>
                                        <?php echo get_the_post_thumbnail( $theid, 'sr-home-banner' ); ?>
                                    </a>
                                    <div class="overlay "></div>
                                </div>
                                                
                        <?php 
                        wp_reset_query();?>
                    </div>  
                   
                </div>
        </div>
    <?php endforeach;?>
       
    <span class="cycle-pager"></span>

 </div>   
