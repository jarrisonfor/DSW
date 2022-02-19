<?php
/**
 * Plugin Name:  7. FilterHook
 **/

add_filter( 'the_title', 'cambiarTitulo' );

function cambiarTitulo($content)
{
    if (is_admin()){
        return $content;
    }
    return "<span style='color: red; font-style: italic;' > $content </span>";
}
