<?php /*************** Sem Reservas -Home page banner
*/
 $args = array(
    'numberposts' => 3, 
    'post_status' => 'publish',   
    );
 $srrecent = wp_get_recent_posts( $args );
 $theUids = array();

foreach ($srrecent as $uids) {
    $theUids[] = $uids['ID'];
}
foreach ($theUids as $key => $uid):
    $thebgimage = get_the_post_thumbnail_url($uid, 'sr-home-banner');
?>  
    <style type="text/css">
        .sr-<?php echo $uid;?> { 
            background-image:url( <?php echo $thebgimage; ?>);
        }
    </style>
<?php endforeach; ?>
<div class='sr-home-cycle cycle-slideshow'
    data-cycle-timeout="7000"
    data-cycle-slides="> div"
    data-cycle-prev=".sr-cycle-prev"
    data-cycle-next=".sr-cycle-next"
    data-cycle-swipe=true
    data-cycle-swipe-fx=scrollHorz
    >
    <?php foreach($srrecent as $recent):
            $theid = $recent['ID'];
            $title = $recent["post_title"];
            $sectitle = get_field( "complemento", $theid );
            if($sectitle) {
                $titlelen = strlen($title . $sectitle);
            } else {
                $titlelen = strlen($title);
                }
            $estabelecimento = get_field('estabelecimento', $theid);
            $thelink = get_the_permalink($theid);
            setup_postdata( $theid);
            $theexcerpt =  get_the_excerpt($theid);
    ?>
        <div class="home-banner w-100 sr-<?php echo $theid;?>" role="banner" >            
                <div class="container d-flex justify-content-center">
                    <div class="row mx-auto my-auto">
                           
                                <div class='col-12 col-lg-7  mx-auto text-center '>
                                    <a href="<?php echo $thelink; ?>">
                                        <?php if ( $titlelen > 55) { // big post title
                                            echo('<h2 class="  mb-0 small-title"><span>'.$title.'&nbsp;'.$sectitle.'</span></h2>');
                                        } else if($titlelen < 55 && $sectitle) { //Medium post  
                                            echo('<h2 class=" text-center mb-0 small-title"><span>'.$title.'&nbsp;'.$sectitle.'</span></h2>');
                                        }   else  { // Small post title
                                            echo('<h2 class=" text-center sr-nobefore small-title"><span>'.$title.'</span></h2>');
                                        } ?>
                                    </a>
                                </div>
                                <div class='sr-hb-info col-12 col-lg-4 offset-sm-0 offset-lg-1 text-sm-center text-lg-left'>
                                    <?php echo ('<p class="mx-auto">'.$theexcerpt.'</p>')?>
                                    <a class="btn btn-warning px-4 align-middle text-lowercase   " href="<?php echo $thelink; ?>">
                                        Ler mais
                                    </a>
                                </div>                         
                        <?php 
                        wp_reset_query();?>
                    </div>  
                    <a href="<?php echo $thelink; ?>" class="homeban-overlay"> &nbsp; </a> 
                </div>
        </div>
    <?php endforeach;?>
       
        <a href="#" class="sr-cycle-prev"><i class="fas fa-chevron-left"></i></a>  
        <a href="#" class="sr-cycle-next"><i class="fas fa-chevron-right"></i></a>

 </div>   
