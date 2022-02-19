<?php
/**
 * Plugin Name:  4. Filter
 **/

add_filter('manage_post_libro_posts_columns', 'set_custom_post_libro_columns');
function set_custom_post_libro_columns($columns)
{
    $columns['num_paginas'] = __('Nº Páginas');
    $columns['f_publicacion'] = __('Fecha Publicación');
    return $columns;
}

add_action('manage_post_libro_posts_custom_column', 'custom_post_libro_column', 10, 2);
function custom_post_libro_column($column, $post_id)
{
    switch ($column) {
        case 'num_paginas':
            echo get_post_meta($post_id, 'num_paginas', true);
            break;
        case 'f_publicacion':
            $date = get_post_meta($post_id, 'f_publicacion', true);
            echo !empty($date) ? date('d/m/Y', strtotime($date)) : '';
            break;
    }
}
