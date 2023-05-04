<?php

/**************************************
 *  THEME SUPORT
 **************************************/
function add_suport_theme(){
    add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme','add_suport_theme');

/**************************************
 * Registro Menu Personalizado
 **************************************/
add_theme_support('menus');
register_nav_menus( array(
    'primary' => __( 'Menu header', 'menu-header' ),
) );

/**************************************
 *  SCRIPTS / CSS
 **************************************/
function wp_responsivo_scripts() {
  // Carregando CSS header
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style( 'style', get_stylesheet_uri() );

  // Carregando Scripts header
  wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery') );

  //Carregando no footer
  //wp_enqueue_script('functions-js', get_template_directory_uri().'/assets/js/functions.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'wp_responsivo_scripts' );

/**************************************
 * Registro Custom Post type Slider
 **************************************/
add_action('init', 'slider_registrer');
function slider_registrer(){
     $labels = array(
        'name' => _x('Slider', 'post type general name'),
        'singular_name' => _x('Slider', 'post type singular name'),
        'add_new' => _x('Adicionar slider', 'slider'),
        'add_new_item' => __('Adicionar slider'),
        'edit_item' => __('Editar slider'),
        'new_item' => __('Novo slider'),
        'view_item' => __('Ver slider'),
        'search_items' => __('Procurar slider'),
        'not_found' =>  __('Nada encontrado'),
        'not_found_in_trash' => __('Nada encontrado no lixo'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-media-code',
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 6,
        'supports' => array('title','thumbnail'),
      );
    register_post_type('slider',$args);
}


/**************************************
 * Registro Custom Post type Serviços
 **************************************/
add_action('init', 'servico_registrer');
function servico_registrer(){
     $labels = array(
        'name' => _x('Serviços', 'post type general name'),
        'singular_name' => _x('Serviço', 'post type singular name'),
        'add_new' => _x('Adicionar Serviço', 'Serviço'),
        'add_new_item' => __('Adicionar Serviço'),
        'edit_item' => __('Editar Serviço'),
        'new_item' => __('Novo Serviço'),
        'view_item' => __('Ver Serviço'),
        'search_items' => __('Procurar Serviço'),
        'not_found' =>  __('Nada encontrado'),
        'not_found_in_trash' => __('Nada encontrado no lixo'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-pressthis',
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug'=>'servico'),
        'menu_position' => 6,
        'supports' => array('title','editor','thumbnail'),
      );
    register_post_type('servico',$args);
}

/**************************************
 * Registro Custom Post type Clientes
 **************************************/
add_action('init', 'cliente_registrer');
function cliente_registrer(){
     $labels = array(
        'name' => _x('Clientes', 'post type general name'),
        'singular_name' => _x('Cliente', 'post type singular name'),
        'add_new' => _x('Adicionar Cliente', 'Cliente'),
        'add_new_item' => __('Adicionar Cliente'),
        'edit_item' => __('Editar Cliente'),
        'new_item' => __('Novo Cliente'),
        'view_item' => __('Ver Cliente'),
        'search_items' => __('Procurar Cliente'),
        'not_found' =>  __('Nada encontrado'),
        'not_found_in_trash' => __('Nada encontrado no lixo'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-pressthis',
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug'=>'cliente'),
        'menu_position' => 7,
        'supports' => array('title','editor','thumbnail'),
      );
    register_post_type('cliente',$args);
}


function onepage_navmenu($menu_name){

	$locations = get_nav_menu_locations();	 //DEBUG: print_r($locations);

	if ( isset( $locations[ $menu_name ] ) ) {

		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		$menu_items = wp_get_nav_menu_items($menu->term_id);

		//DEBUG: print_r($menu_items);

		$menu_list = '<ul id="menu-' . $menu_name . '">';

		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = basename($menu_item->url);
			$menu_list .= '<li><a href="#' . $url . '">' . $title . '</a></li>';
		}

		$menu_list .= '</ul>';

    } else {
		$menu_list = '<ul><li>Menu "' . $menu_name . '" não definido.</li></ul>';
    }

	echo $menu_list;
}

//Ativando Custom Nav Menus
function register_main_menus() {
   register_nav_menus(
	array(
	   'menu-principal' => __( 'Menu Principal' ) //'menu-principal' é o 'menu location' e 'Menu Principal' é o nome do meu menu
	   )
   );
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );


