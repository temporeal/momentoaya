<?php 
// Start Sem Reservas - A "WP Bootstrap Starter" derivated child theme - Tempo Real

// ACTIVATE THIS WHEN IN FULL PRODUCTIONRemove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Rremove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
// enqueue the child theme stylesheet and other styles and scripts

Function semreservas_child_theme_enqueue_scripts() {
    // Update font awesome to a recent version
    wp_dequeue_style('wp-bootstrap-pro-fontawesome-cdn');
    wp_deregister_style('wp-bootstrap-pro-fontawesome-cdn');
    wp_enqueue_style( 'sr-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.7.0/css/all.css' );       
    // Now go...
 	  wp_register_script('semreservas', get_stylesheet_directory_uri() . '/js/semreservasbr.js' ,'jquery','2', true);
    wp_enqueue_script('semreservas');

    if(is_single() || is_front_page()) {
        wp_register_script('cycle',  get_stylesheet_directory_uri() . '/js/jquery_cycle2.js', 'jquery' , true);
        wp_enqueue_script('cycle');
        wp_register_script('cycle_swipe',  get_stylesheet_directory_uri() . '/js/cycle2_swipe.js', Array('jquery', 'cycle'),'1', true);
        wp_enqueue_script('cycle_swipe');
    }
       
    if(is_single()) {
        wp_register_script('cycle_carousel',  get_stylesheet_directory_uri() . '/js/jquery_cycle2_carousel.js', Array('jquery', 'cycle'),'1', true);
        wp_enqueue_script('cycle_carousel');
        wp_register_script('cycle_center',  get_stylesheet_directory_uri() . '/js/jquery_cycle2_center.js', Array('jquery', 'cycle'),'1', true);
        wp_enqueue_script('cycle_center');   
        wp_register_script('singlejs',  get_stylesheet_directory_uri() . '/js/single.js', Array('jquery', 'cycle', 'cycle_carousel', 'cycle_center'),'1', true);
        wp_enqueue_script('singlejs');
    }
    if(is_front_page()) {
          /**See AJAX request - line 104 */
          wp_register_script( 'secure-ajax-access', esc_url( add_query_arg( array( 'js_global' => 1 ), site_url() ) ) );
          wp_enqueue_script( 'secure-ajax-access' );
          wp_register_script('home-js',  get_stylesheet_directory_uri() . '/js/home.js', Array('jquery', 'cycle'),'1.123', true);
          wp_enqueue_script('home-js');
    }
    
}
add_action( 'wp_enqueue_scripts', 'semreservas_child_theme_enqueue_scripts', 11);

// Register a new menu
register_nav_menus( array(
	'left_menu' => 'Menu à esquerda do logotipo',
) );

// Thumbnails according to the layoutc
add_action( 'after_setup_theme', 'semreservas_theme_setup' );
function semreservas_theme_setup() {
	// Tamanho de foto autores
	add_image_size( 'sr-home-banner', 1920, 1440); // Used as background at the home page
    add_image_size( 'sr-grid-thumb', 334, 339, array( 'center', 'center' ) ); 
	add_image_size( 'sr-gallery-thumb', 150, 120, array( 'center', 'center' ) ); 
	add_image_size( 'sr-autores-image', 500, 376, array('center', 'center') );
	add_image_size('sr-logotipos-image', 210, 210);
}

// Get rid of the words before the archives and category titles
function sem_reservas_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'sem_reservas_archive_title' );

// Add category class to single posts in order to show the banners
function sr_add_category_to_single($classes) {
    if (is_single() ) {
      global $post;
      foreach((get_the_category($post->ID)) as $category) {
        // add category slug to the $classes array
        $classes[] = $category->category_nicename;
      }
    }
    // return the $classes array
    return $classes;
  }
add_filter('body_class','sr_add_category_to_single');

/** Change excerpt only for front end */
function sr_excerpt_length( $length ) {
    if ( is_admin() ) {
            return $length;
    }
    return 20;
}
add_filter( 'excerpt_length', 'sr_excerpt_length', 999 );

function sr_excerpt_more( $more) {
    return '...';
}
add_filter( 'excerpt_more', 'sr_excerpt_more', 999);

/*** AJAX requests for home page categories modules */
//Joga o nonce e a url para as requisições para dentro do Javascript criado no enquee inicial
add_action( 'template_redirect', 'javascript_variaveis' );
function javascript_variaveis() {
  if ( !isset( $_GET[ 'js_global' ] ) ) return;

  $nonce = wp_create_nonce('sr_loadposts_nonce');

  $variaveis_javascript = array(
    'sr_loadposts_nonce' => $nonce, //Esta função cria um nonce para nossa requisição para buscar mais notícias, por exemplo.
    'xhr_url'             => admin_url('admin-ajax.php') // Forma para pegar a url para as consultas dinamicamente.
  );
  $new_array = array();
  foreach( $variaveis_javascript as $var => $value ) $new_array[] = esc_js( $var ) . " : '" . esc_js( $value ) . "'";
  header("Content-type: application/x-javascript");
  printf('var %s = {%s};', 'js_global', implode( ',', $new_array ) );
  exit;
}

add_action('wp_ajax_nopriv_load_posts', 'sr_load_posts');
add_action('wp_ajax_load_posts', 'sr_load_posts');

function sr_load_posts() {
  if( ! wp_verify_nonce( $_POST['sr_loadposts_nonce'], 'sr_loadposts_nonce' ) ) {
    echo '401'; // Caso não seja verificado o nonce enviado, a requisição vai retornar 401
    die();
  }
  //Busca os dados que queremos
  $cat_id = $_POST['cat'];
  $args = array(
    'post_type' => 'post',
    'category__in' => $cat_id,
    'post_per_page' => 3,
    'post_status' => 'publish',
    'no_found_rows' => true
  );
  $wp_query = new WP_Query( $args );

  //Caso tenha os dados, retorna-os / Caso não tenha retorna 402 para tratarmos no frontend
  $counter = 0;
  if( $wp_query->have_posts() ) {
    $category_link = get_category_link( $cat );
    $posts = $wp_query->posts;   
    foreach($posts as $post){
        $post_id = $post->ID;
        $post_content = $post->post_content;
        $counter++;
        if($counter == 1) {
            echo('<div id="row-latest" class="row">');
        }
        set_query_var( 'post_id', absint( $post_id ) );
        set_query_var( 'post_content', $post_content );
        set_query_var( 'post_count', absint( $counter ) );
        set_query_var( 'cat_id', absint( $cat_id ) );
        get_template_part('template-parts/cat-home-display');
        wp_reset_postdata();
    }
  } else {
    echo 402;
  }
 
  exit; 
}
function sr_header_metadata() {
?>

  <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
  <link rel="manifest" href="/favicons/site.webmanifest">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#f5be16">
  <link rel="shortcut icon" href="/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#ffc40d">
  <meta name="msapplication-config" content="/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

<?php

}
add_action( 'wp_head', 'sr_header_metadata' );

// Related posts, modify query for single to show specific number of posts
function sr_single_custom( $query ) {
  if ( is_admin() || ! $query->is_main_query() )
      return;

  if ( is_single() ) {
      // Display only 1 post for the original blog archive
      $query->set( 'posts_per_page', 5 );
      return;
  }
 
}
add_action( 'pre_get_posts', 'sr_single_custom', 1 );


// Sharebar
function bp_show_sharebar(){
	/** Is this a course page? (Child of any of the 3 top courses pages) */
	if(is_single()) { 
		?>
		<div id="sharebar">
			<a href="whatsapp://send?text=Veja <?php the_title_attribute(); ?> - <?php the_permalink();?>" data-action="share/whatsapp/share" title="Compartilhe no Whatsapp" class="wzp-share">Compartilhe no Whatsapp</a>
			<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title_attribute(); ?>" target="blank"" title="Compartilhe no Facebook" class="face-share">Compartilhe no Facebook</a>
			<a href="http://twitter.com/share?text=<?php the_title_attribute(); ?>&url=<?php the_permalink();?>" target="_blank" title="Compartilhe no Twitter" class="twit-share">Compartilhe no Twitterk</a>
		</div>
	<?php 
	
	}
}
add_action( 'wp_footer', 'bp_show_sharebar' );