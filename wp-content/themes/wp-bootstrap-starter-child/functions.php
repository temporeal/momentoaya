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
 	

    wp_register_script('cycle',  get_stylesheet_directory_uri() . '/js/jquery_cycle2.js', 'jquery' , true);
    wp_register_script('cycle_swipe',  get_stylesheet_directory_uri() . '/js/cycle2_swipe.js', Array('jquery', 'cycle'),'1', true);
    wp_register_script('snap', get_stylesheet_directory_uri() . '/js/snap.svg-min.js', '', true);
    wp_register_script('waypoints', get_stylesheet_directory_uri() . '/js/jquery.waypoints.min.js', '', true);
    wp_register_script('owlmin',  get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', Array('jquery'),'2', true);
    wp_register_script('magmin',  get_stylesheet_directory_uri() . '/js/magnific-popup.min.js', Array('jquery'),'2', true);
    
    wp_register_script('home-js',  get_stylesheet_directory_uri() . '/js/home.js', Array('jquery', 'cycle'),'1.123', true);
    wp_register_script('singlejs',  get_stylesheet_directory_uri() . '/js/single.js', Array('jquery', 'magmin'),'1', true);
    wp_register_script('semreservas', get_stylesheet_directory_uri() . '/js/semreservasbr.js' ,Array('jquery', 'snap', 'waypoints', 'owlmin', 'magmin'),'2', true);
    
    wp_enqueue_script('snap');
    wp_enqueue_script('waypoints');
    wp_enqueue_script('semreservas');

    if( is_front_page() ) {
      
        wp_enqueue_script('cycle');        
        wp_enqueue_script('cycle_swipe');
    }
       
    if(is_single() ) {
      wp_enqueue_style( 'owlmincss', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css' ); 
      wp_enqueue_style('magnific', get_stylesheet_directory_uri() . '/css/magnific-popup.css');
      wp_enqueue_script('owlmin'); 
      wp_enqueue_script('magmin');       
     
    }
    if(is_front_page()) {                
          wp_enqueue_script('home-js');
    }
    if(is_page('88')) {
      wp_enqueue_style( 'owlmincss', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css' ); 
      wp_enqueue_style('magnific', get_stylesheet_directory_uri() . '/css/magnific-popup.css');
      wp_enqueue_script('magmin'); 
      wp_enqueue_script('owlmin'); 
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
	add_image_size( 'sr-autores-image', 600, 600, array('center', 'center') );
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
function trcom_show_sharebar(){
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
add_action( 'wp_footer', 'trcom_show_sharebar' );

//Opções do tema - Momento Aya  https://digwp.com/2009/09/global-custom-fields-take-two/
add_action('admin_menu', 'trcom_optionspage');

function trcom_optionspage() {
	add_options_page('Global Custom Fields', 'Opções do Site', '7', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
  // Logo
  $image_attributes = wp_get_attachment_image_src( $attachment_id = 13 );
  ?>
	<div class='wrap'>
  <h1> Opções do site </h1>
    <p>Inclua os dados que são utilizados em diversos lugares do site. </p>
  <hr/>
  <?php if ( $image_attributes ) : ?>
    <img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" />
  <?php endif; ?>

  <hr/>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>
    <h3>Dados globais</h3>
   
	<p><strong>Endereço:</strong><br />
	<input type="text" name="endereco" size="45" value="<?php echo get_option('endereco'); ?>" /></p>
	
	<p><strong>Telefone fixo</strong><br />
    <input type="text" name="telefone" size="45" value="<?php echo get_option('telefone'); ?>" /></p>
    
    <p><strong>Whatsapp</strong><br />
    <input type="text" name="whatsapp" size="45" value="<?php echo get_option('whatsapp'); ?>" /></p>
    
	<p><strong>E-mail:</strong><br />
	<input type="text" name="emaildecontato" size="45" value="<?php echo get_option('emaildecontato'); ?>" /></p>

	<p><strong>Facebook:</strong><br />
    <input type="text" name="facebookurl" size="45" value="<?php echo get_option('facebookurl'); ?>" /></p>
    
    <p><strong>Instagram:</strong><br />
    <input type="text" name="instagramurl" size="45" value="<?php echo get_option('instagramurl'); ?>" /></p>
	<!-- <h3>Layout</h3>
    <label for="home-banner-enable">Na página inicial, exibir</label>
            <select name="home-banner-enable">
                <?php /***
                    $option_values = array(
                        'banners'        => 'os banners cadastrados',
                        'cursos'         => 'os cursos publicados e marcados para aparecer na home',
                        'mixed-cursos'   => 'inclua os 3 cursos e os 2 banners mais recentes (Cursos primeiro)',
                        'mixed-banners'  => 'inclua os 3 banners e os 2 cursos mais recentes (Banners primeiro)'
                    );

                    foreach($option_values as $value => $label) 
                    {
                        if($value == get_option('home-banner-enable'))
                        {
                            ?>
                                <option value="<?php echo $value;?>" selected><?php echo $label; ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                 <option value="<?php echo $value;?>"><?php echo $label; ?></option>
                            <?php
                        }
                    }
               */  ?>
            </select>
            <br> -->


	<p><input type="submit" name="Submit" value="Atualizar" /></p>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="endereco, whatsapp, telefone,emaildecontato,facebookurl, instagramurl" />

	</form>
	</div>
	<?php
}

// Destaques
if ( ! function_exists('destaques_home') ) {

  // Register Custom Post Type
  function destaques_home() {
  
    $labels = array(
      'name'                  => _x( 'destaques', 'Post Type General Name', 'momentoaya' ),
      'singular_name'         => _x( 'destaque', 'Post Type Singular Name', 'momentoaya' ),
      'menu_name'             => __( 'Destaques', 'momentoaya' ),
      'name_admin_bar'        => __( 'Destaques', 'momentoaya' ),
      'archives'              => __( 'Item Archives', 'momentoaya' ),
      'attributes'            => __( 'Item Attributes', 'momentoaya' ),
      'parent_item_colon'     => __( 'Parent Item:', 'momentoaya' ),
      'all_items'             => __( 'All Items', 'momentoaya' ),
      'add_new_item'          => __( 'Add New Item', 'momentoaya' ),
      'add_new'               => __( 'Add New', 'momentoaya' ),
      'new_item'              => __( 'New Item', 'momentoaya' ),
      'edit_item'             => __( 'Edit Item', 'momentoaya' ),
      'update_item'           => __( 'Update Item', 'momentoaya' ),
      'view_item'             => __( 'View Item', 'momentoaya' ),
      'view_items'            => __( 'View Items', 'momentoaya' ),
      'search_items'          => __( 'Search Item', 'momentoaya' ),
      'not_found'             => __( 'Not found', 'momentoaya' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'momentoaya' ),
      'featured_image'        => __( 'Featured Image', 'momentoaya' ),
      'set_featured_image'    => __( 'Set featured image', 'momentoaya' ),
      'remove_featured_image' => __( 'Remove featured image', 'momentoaya' ),
      'use_featured_image'    => __( 'Escolher imagem', 'momentoaya' ),
      'insert_into_item'      => __( 'Insert into item', 'momentoaya' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'momentoaya' ),
      'items_list'            => __( 'Items list', 'momentoaya' ),
      'items_list_navigation' => __( 'Items list navigation', 'momentoaya' ),
      'filter_items_list'     => __( 'Filter items list', 'momentoaya' ),
    );
    $args = array(
      'label'                 => __( 'destaque', 'momentoaya' ),
      'description'           => __( 'Destaques da página inicial', 'momentoaya' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-star-filled',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => false,
      'can_export'            => true,
      'has_archive'           => false,
      'exclude_from_search'   => true,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
    );
    register_post_type( 'destaque', $args );
  
  }
  add_action( 'init', 'destaques_home', 0 );

  if ( ! function_exists('register_momentos') ) {

    // Register Custom Post Type
    function register_momentos() {
    
      $labels = array(
        'name'                  => _x( 'momentos', 'Post Type General Name', 'momentoaya' ),
        'singular_name'         => _x( 'momento', 'Post Type Singular Name', 'momentoaya' ),
        'menu_name'             => __( 'Momentos', 'momentoaya' ),
        'name_admin_bar'        => __( 'Momento', 'momentoaya' ),
        'archives'              => __( 'Arquivo de momentos', 'momentoaya' ),
        'attributes'            => __( 'Atributos do momento', 'momentoaya' ),
        'parent_item_colon'     => __( 'Item pai', 'momentoaya' ),
        'all_items'             => __( 'Todos os momentos', 'momentoaya' ),
        'add_new_item'          => __( 'Adicionar novo momentos', 'momentoaya' ),
        'add_new'               => __( 'Adiconar novo', 'momentoaya' ),
        'new_item'              => __( 'Novo momento', 'momentoaya' ),
        'edit_item'             => __( 'Editar momeneto', 'momentoaya' ),
        'update_item'           => __( 'Atualizar momento', 'momentoaya' ),
        'view_item'             => __( 'Ver item', 'momentoaya' ),
        'view_items'            => __( 'Ver itens', 'momentoaya' ),
        'search_items'          => __( 'Buscar', 'momentoaya' ),
        'not_found'             => __( 'Não encontrado', 'momentoaya' ),
        'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'momentoaya' ),
        'featured_image'        => __( 'Imagem do momento', 'momentoaya' ),
        'set_featured_image'    => __( 'Definir imagem', 'momentoaya' ),
        'remove_featured_image' => __( 'Remover imagem', 'momentoaya' ),
        'use_featured_image'    => __( 'Usar como imagem principal', 'momentoaya' ),
        'insert_into_item'      => __( 'Inserir no momento', 'momentoaya' ),
        'uploaded_to_this_item' => __( 'Adicionado a este item', 'momentoaya' ),
        'items_list'            => __( 'Lista de momenetos', 'momentoaya' ),
        'items_list_navigation' => __( 'Lista de navegação', 'momentoaya' ),
        'filter_items_list'     => __( 'Filtrar momentos', 'momentoaya' ),
      );
      $args = array(
        'label'                 => __( 'momento', 'momentoaya' ),
        'description'           => __( 'Momentos Aya - Ativações e Eventos', 'momentoaya' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'tipo de momento' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-yes',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
      );
      register_post_type( 'momentos', $args );
    
    }
    add_action( 'init', 'register_momentos', 0 );
    
    }
    // Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tipos de momentos', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tipo de momento', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Tipo de momento', 'text_domain' ),
		'all_items'                  => __( 'Todos', 'text_domain' ),
		'parent_item'                => __( 'Item pai', 'text_domain' ),
		'parent_item_colon'          => __( 'Item pai', 'text_domain' ),
		'new_item_name'              => __( 'Nome do novo tipo de momento', 'text_domain' ),
		'add_new_item'               => __( 'Adicionar novo tipo de momento', 'text_domain' ),
		'edit_item'                  => __( 'Editar item', 'text_domain' ),
		'update_item'                => __( 'Atualizar item', 'text_domain' ),
		'view_item'                  => __( 'Ver item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separe os itens com vírgulas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Adicione ou remova tipos de momentos', 'text_domain' ),
		'choose_from_most_used'      => __( 'Escolher entre os mais usados', 'text_domain' ),
		'popular_items'              => __( 'Tipos de momento populares', 'text_domain' ),
		'search_items'               => __( 'Buscar por tipo de momento', 'text_domain' ),
		'not_found'                  => __( 'Não encontrado', 'text_domain' ),
		'no_terms'                   => __( 'Não há items', 'text_domain' ),
		'items_list'                 => __( 'Lista de tipo de momentos', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'tipodemomento', array( 'momentos' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );
  
  }

/** We´re off to the cases */
if ( ! function_exists('register_cases') ) {

  // Register Custom Post Type
  function register_cases() {
  
    $labels = array(
      'name'                  => _x( 'cases', 'Post Type General Name', 'momentoaya' ),
      'singular_name'         => _x( 'case', 'Post Type Singular Name', 'momentoaya' ),
      'menu_name'             => __( 'Cases', 'momentoaya' ),
      'name_admin_bar'        => __( 'Cases', 'momentoaya' ),
      'archives'              => __( 'Arquivo de cases', 'momentoaya' ),
      'attributes'            => __( 'Atributos', 'momentoaya' ),
      'parent_item_colon'     => __( 'Item pai', 'momentoaya' ),
      'all_items'             => __( 'Todos os cases', 'momentoaya' ),
      'add_new_item'          => __( 'Adicionar novo case', 'momentoaya' ),
      'add_new'               => __( 'Adicionar novo', 'momentoaya' ),
      'new_item'              => __( 'Novo item', 'momentoaya' ),
      'edit_item'             => __( 'Editar item', 'momentoaya' ),
      'update_item'           => __( 'Atualizar item', 'momentoaya' ),
      'view_item'             => __( 'Visualizar item', 'momentoaya' ),
      'view_items'            => __( 'Ver items', 'momentoaya' ),
      'search_items'          => __( 'Buscar item', 'momentoaya' ),
      'not_found'             => __( 'Não encontrado', 'momentoaya' ),
      'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'momentoaya' ),
      'featured_image'        => __( 'Imagem do case', 'momentoaya' ),
      'set_featured_image'    => __( 'Definir imagem', 'momentoaya' ),
      'remove_featured_image' => __( 'Remover imagem em destaque', 'momentoaya' ),
      'use_featured_image'    => __( 'Usar como imagem principal', 'momentoaya' ),
      'insert_into_item'      => __( 'Inserir no item', 'momentoaya' ),
      'uploaded_to_this_item' => __( 'Atualizado para este item', 'momentoaya' ),
      'items_list'            => __( 'Lista de cases', 'momentoaya' ),
      'items_list_navigation' => __( 'Lista de navegação de cases', 'momentoaya' ),
      'filter_items_list'     => __( 'Filtras lista de cases', 'momentoaya' ),
    );
    $args = array(
      'label'                 => __( 'case', 'momentoaya' ),
      'description'           => __( 'Cases de sucesso - AYA Live Marketing', 'momentoaya' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'post-formats' ),
      'taxonomies'            => array( 'tipodecase' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-lightbulb',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => true,
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
    );
    register_post_type( 'cases', $args );
  
  }
  add_action( 'init', 'register_cases', 0 );
  
  }

  /** Since we are converting galleries to carousel, no need for inline css */
  add_filter( 'use_default_gallery_style', '__return_false' );
