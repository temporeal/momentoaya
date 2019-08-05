<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">
            <nav class="navbar navbarhome navbar-expand-md navbar-light bg-light">
            <?php
                wp_nav_menu(array(
                'theme_location'    => 'left_menu',
                'container'       => 'div',
                'container_id'    => 'left-nav',
                'container_class' => 'navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0 px-5 px-md-0',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav ml-auto mr-auto text-center',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
                <div id="logosmall" class="navbar-brand mx-auto my-2 order-0 order-md-1 position-relative">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url( home_url( '/' )); ?>wp-content/uploads/2019/01/semreservaslogo.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'navbar-collapse collapse w-100 dual-collapse2 order-2 order-md-2  px-5 px-md-0',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav mr-auto ml-auto text-center',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>
        </div>
	</header><!-- #masthead -->
    <?php
        if(is_category() || is_single()){
            get_template_part('template-parts/cat-banner', 'category-banner');
        } elseif(is_page() && !is_front_page() && !is_page('110') /**contact page */) {
            get_template_part('template-parts/page-banner', 'page-banner');
        };
        if(is_page('110')){
            $nopadclass = 'pt-0';
        }

    ?>
	<div id="content" class="site-content <?php if($nopadclass){echo $nopadclass;} ?>">
		<div class="container">
			<div class="row">
                <?php endif; ?>