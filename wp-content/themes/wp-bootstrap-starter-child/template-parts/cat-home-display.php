<?php
/**
 * Template part for displaying posts loaded trough home AJAX
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php
//Sem Reservas - 
// Get var from the functions.php file 
$post_id = get_query_var('post_id');
$post_content = get_query_var('post_content');
$counter = get_query_var('post_count');
$permalink = get_the_permalink($post_id);
$cat_id = get_query_var('cat_id');
$cat_url = get_category_link($cat_id);
$cat_name = get_cat_name($cat_id);

$classes = array(    
    'list-module',
    'col-12',
    'col-sm-6',
    'col-md-3',
    'py-5',
    'mx-auto'
);

$title = get_the_title($post_id);
$sectitle = get_field( "complemento", $post_id );
if($sectitle) {
    $titlelen = strlen($title . $sectitle);
} else {
    $titlelen = strlen($title);
}
$estabelecimento = get_field('estabelecimento', $post_id);
$srexcerpt = wp_trim_words( $post_content, 20, '...' );
?>
    
    <article id="post-<?php echo $post_id; ?>" <?php post_class($classes, $post_id); ?>>
    <a name="<?php echo $cat_id?>">&nbsp;</a>
        <div class="col-6 col-sm-12 col-md-12 mb-4  mx-auto">
        <?php if ( has_post_thumbnail($post_id) ) : ?>
            <a href="<?php the_permalink($post_id); ?>" title="<?php the_title_attribute(array('post'=>$post_id)); ?>">
                <?php echo get_the_post_thumbnail( $post_id, 'sr-grid-thumb', ['class' => 'img-responsive responsive--full mx-auto', 'title' => $title] ); ?>
            </a>
        <?php endif; ?>
        </div>
        <header>
            <?php
                // If the post has more then 55 chars show it in small font - Otherwise, big font and local name
                if ( $titlelen > 55) {
                    echo('<h2 class="entry-title sr-sm-title"><a href="'.$permalink.'">'.$title.'<span> '.$sectitle.'</span></a></h2>');
                } else {
                    echo('<h2 class="entry-title"><a href="'.$permalink.'">'.$title.'</a></h2>');
                    if($estabelecimento) {
                        echo('<h4 class="sr-estab-list">'.$estabelecimento.'</h4>');
                    }
                }
            ?>
        </header><!-- .entry-header -->
        <div class="entry-excerpt col-10 col-sm-12 mx-auto">
            <?php echo $srexcerpt; ?>
        </div><!-- .entry-excerpt -->
        <div class="sr-entry-meta">
            <p> <?php echo(get_the_date($post_id)); ?></p>
            <a class="btn btn-warning px-4 align-middle " href="<?php the_permalink($post_id); ?>">
            Quero ler
            </a>
        </div>
    </article>

    <?php /** </div> - Closing div is also in functions.php */ ?>       
<?php if($counter == 3):?>
    </div> <?php /** closes the row tha was opened on functions.php */ ?>
    <div class="row row-sr-archive">
        <div class="w-100 text-center py-5">
             <a class="btn btn-warning px-4 align-middle mx-auto " href="<?php echo $cat_url; ?>">Veja todos os artigos em <?php echo $cat_name; ?> </a>
        </div>
    <?php /** </div> - Closing div is also in functions.php */ ?>
<?php endif;?>