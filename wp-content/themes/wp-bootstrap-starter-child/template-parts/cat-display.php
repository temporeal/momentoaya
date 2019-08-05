<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php
//Sem Reservas - 
$classes = array(    
    'list-module',
    'col-12',
    'col-sm-6',
    'col-md-3',
    'mx-auto',
    'pb-5'    
);

$title = get_the_title();
$permalink = get_the_permalink();
$sectitle = get_field( "complemento" );
if($sectitle) {
    $titlelen = strlen($title . $sectitle);
} else {
    $titlelen = strlen($title);
}
$estabelecimento = get_field('estabelecimento');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <div class="col-6 col-sm-12 col-md-12 mb-4  mx-auto">
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('sr-grid-thumb', ['class' => 'img-responsive responsive--full mx-auto', 'title' => $title]); ?>
        </a>
    <?php endif; ?>
    </div>
	<header class="entry-header">
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
        <?php the_excerpt(); ?>
    </div><!-- .entry-excerpt -->
    <div class="sr-entry-meta">
        <p> <?php echo(get_the_date()); ?></p>
        <a class="btn btn-warning px-4 align-middle " href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
           Quero ler
        </a>
    </div>
    

</article><!-- #post-## -->
