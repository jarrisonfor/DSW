<?php
/*
Plugin Name: 2. Generos
*/

function crear_taxonomia_jerarquica()
{

    // Definimos un array para las traducciones de la taxonomía
    $etiquetas = array(
        'name' => __('Géneros'),
        'singular_name' => __('Género'),
        'search_items' =>  __('Buscar géneros'),
        'all_items' => __('Todos los géneros'),
        'parent_item' => __('Género padre'),
        'parent_item_colon' => __('Género padre:'),
        'edit_item' => __('Editar género'),
        'update_item' => __('Actualizar género'),
        'add_new_item' => __('Agregar un nuevo género'),
        'menu_name' => __('Géneros'),
    );


    // Función WordPress para registrar la taxonomía
    register_taxonomy(
        'generos',   //este es el identificador
        array('post_libro'), // Tipos de Post a los que asociaremos la taxonomía
        array(
            'hierarchical' => true, // True para taxonomías del jerarquicas 
            'labels' => $etiquetas, // La variable con las traducciones de las etiquetas
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'genero'),
            'show_in_rest' => true,  //para que funcione con Gutenberg
        )
    );
}
add_action('init', 'crear_taxonomia_jerarquica', 0);
