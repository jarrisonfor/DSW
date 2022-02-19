<?php
/*
Plugin Name: 1. Libros
*/

function post_tipo_libro()
{
    $labels = array(
        'name'                  => _x('Libros', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Libro', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Libros', 'text_domain'),
        'name_admin_bar'        => __('Libros', 'text_domain'),
        'archives'              => __('Listado de libros', 'text_domain'),
        'attributes'            => __('Atributos del libro', 'text_domain'),
        'parent_item_colon'     => __('Parent Item:', 'text_domain'),
        'all_items'             => __('Todos los libros', 'text_domain'),
        'add_new_item'          => __('Añadir nuevo libro', 'text_domain'),
        'add_new'               => __('Añadir libro', 'text_domain'),
        'new_item'              => __('Nuevo libro', 'text_domain'),
        'edit_item'             => __('Editar libro', 'text_domain'),
        'update_item'           => __('Actualizar libro', 'text_domain'),
        'view_item'             => __('Ver libro', 'text_domain'),
        'view_items'            => __('Ver libros', 'text_domain'),
        'search_items'          => __('Buscar libro', 'text_domain'),
        'not_found'             => __('Libro no encontrado', 'text_domain'),
        'not_found_in_trash'    => __('Libro no encontrado en la papelera', 'text_domain'),
        'featured_image'        => __('Imagen del libro', 'text_domain'),
        'set_featured_image'    => __('Propiedades de la imagen', 'text_domain'),
        'remove_featured_image' => __('Borrar propiedad de imagen', 'text_domain'),
        'use_featured_image'    => __('Utilizar imagen', 'text_domain'),
        'insert_into_item'      => __('Insertar en el libro', 'text_domain'),
        'uploaded_to_this_item' => __('Subir un libro', 'text_domain'),
        'items_list'            => __('Lista de libros', 'text_domain'),
        'items_list_navigation' => __('Lista de libros', 'text_domain'),
        'filter_items_list'     => __('Filtrar libros', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Libro', 'text_domain'),
        'description'           => __('Tipos de libro', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('author', 'title', 'editor', 'custom-fields', 'thumbnail'),
        'taxonomies'            => array('generos', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-book', //ponemos icono de un libro
        'show_in_rest'          => 'true',   //con esto funciona Gutenberg
    );
    register_post_type('post_libro', $args);
}
add_action('init', 'post_tipo_libro', 0);
