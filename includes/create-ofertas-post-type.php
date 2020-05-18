<?php
/*
post-type creador_ofertas
Author URI: http://www.prolam.cl/
Author: Eduardo Palma López
*/

if ( ! function_exists('creador_ofertas_post_type') ) {

// Register Custom Post Type
function creador_ofertas_post_type() {

$labels = array(
'name'                  => _x( 'creador_ofertas', 'Post Type General Name', 'creador_ofertas_productos' ),
'singular_name'         => _x( 'landing_ofertas', 'Post Type Singular Name', 'creador_ofertas_productos' ),
'menu_name'             => __( 'Landing ofertas', 'creador_ofertas_productos' ),
'name_admin_bar'        => __( 'creador_ofertas', 'creador_ofertas_productos' ),
'archives'              => __( 'Archivo', 'creador_ofertas_productos' ),
'attributes'            => __( 'Atributos', 'creador_ofertas_productos' ),
'parent_item_colon'     => __( 'Item superior', 'creador_ofertas_productos' ),
'all_items'             => __( 'Todos los items', 'creador_ofertas_productos' ),
'add_new_item'          => __( 'Agregar un nuevo item', 'creador_ofertas_productos' ),
'add_new'               => __( 'Agregar nuevo', 'creador_ofertas_productos' ),
'new_item'              => __( 'Nuevo', 'creador_ofertas_productos' ),
'edit_item'             => __( 'Editar', 'creador_ofertas_productos' ),
'update_item'           => __( 'Actualizar', 'creador_ofertas_productos' ),
'view_item'             => __( 'Ver', 'creador_ofertas_productos' ),
'view_items'            => __( 'Ver items', 'creador_ofertas_productos' ),
'search_items'          => __( 'Buscar', 'creador_ofertas_productos' ),
'not_found'             => __( 'No encontrado', 'creador_ofertas_productos' ),
'not_found_in_trash'    => __( 'No hay nada en la papelera', 'creador_ofertas_productos' ),
'featured_image'        => __( 'Imagen destacada', 'creador_ofertas_productos' ),
'set_featured_image'    => __( 'Definir imagen destacada', 'creador_ofertas_productos' ),
'remove_featured_image' => __( 'Eliminar imagen destacada', 'creador_ofertas_productos' ),
'use_featured_image'    => __( 'Usar como imagen destacada', 'creador_ofertas_productos' ),
'insert_into_item'      => __( 'Insertar', 'creador_ofertas_productos' ),
'uploaded_to_this_item' => __( 'Atualizar este producto', 'creador_ofertas_productos' ),
'items_list'            => __( 'listado', 'creador_ofertas_productos' ),
'items_list_navigation' => __( 'Navegación', 'creador_ofertas_productos' ),
'filter_items_list'     => __( 'Filtrar', 'creador_ofertas_productos' ),
);
$args = array(
'label'                 => __( 'creador_ofertas', 'creador_ofertas_productos' ),
'description'           => __( 'creador_ofertas publicados', 'creador_ofertas_productos' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
'hierarchical'          => false,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-cart',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => false,		
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
);
register_post_type( 'landing', $args );

}
add_action( 'init', 'creador_ofertas_post_type', 0 );

}

if ( ! function_exists( 'apk_servicios_taxonomy' ) ) {

     // Register Custom Taxonomy
     function apk_servicios_taxonomy() {
     
          $labels = array(
               'name'                       => _x( 'Servicios', 'Taxonomy General Name', 'apk-cpt-proyectos' ),
               'singular_name'              => _x( 'Servicio', 'Taxonomy Singular Name', 'apk-cpt-proyectos' ),
               'menu_name'                  => __( 'Servicios', 'apk-cpt-proyectos' ),
               'all_items'                  => __( 'Todos los servicios', 'apk-cpt-proyectos' ),
               'parent_item'                => __( 'Servicio superior', 'apk-cpt-proyectos' ),
               'parent_item_colon'          => __( 'Servicio superior:', 'apk-cpt-proyectos' ),
               'new_item_name'              => __( 'Nombre del nuevo servicio', 'apk-cpt-proyectos' ),
               'add_new_item'               => __( 'Agregar nuevo servicio', 'apk-cpt-proyectos' ),
               'edit_item'                  => __( 'Editar servicio', 'apk-cpt-proyectos' ),
               'update_item'                => __( 'Actualizar servicio', 'apk-cpt-proyectos' ),
               'view_item'                  => __( 'Ver servicio', 'apk-cpt-proyectos' ),
               'separate_items_with_commas' => __( 'Separar servicios con coma', 'apk-cpt-proyectos' ),
               'add_or_remove_items'        => __( 'Agregar o quitar servicios', 'apk-cpt-proyectos' ),
               'choose_from_most_used'      => __( 'Selecciona de los más usados', 'apk-cpt-proyectos' ),
               'popular_items'              => __( 'Servicios populares', 'apk-cpt-proyectos' ),
               'search_items'               => __( 'Buscar servicios', 'apk-cpt-proyectos' ),
               'not_found'                  => __( 'No se ha encontrado nada', 'apk-cpt-proyectos' ),
               'no_terms'                   => __( 'No hay servicios', 'apk-cpt-proyectos' ),
               'items_list'                 => __( 'Listado de servicios', 'apk-cpt-proyectos' ),
               'items_list_navigation'      => __( 'Navegación del listado de servicios', 'apk-cpt-proyectos' ),
          );
          $args = array(
               'labels'                     => $labels,
               'hierarchical'               => true,
               'public'                     => true,
               'show_ui'                    => true,
               'show_admin_column'          => true,
               'show_in_nav_menus'          => true,
               'show_tagcloud'              => true,
          );
          register_taxonomy( 'servicios', array( 'landing' ), $args );
     
     }
     add_action( 'init', 'apk_servicios_taxonomy', 0 );
     
     }