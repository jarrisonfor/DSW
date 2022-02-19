<?php

/**
 * Plugin Name:  6. Desactivar
 **/

add_action('admin_menu',  'listarPlugins');
function listarPlugins()
{
    add_options_page('Desactivar', 'Desactivar', 'manage_options', 'desactivar', 'desactivarPlugins', 2);
}
/**
 * Display callback for the submenu page.
 */
function desactivarPlugins()
{
    $plugins = get_option('active_plugins');   //devuelve todos los plugins activos
    foreach ($plugins as $plugin) {
        if ($plugin != explode("/plugins/", __FILE__)[1]) {  //si no es el plugin actual desactivarlo
            echo "<h4> Desactivando: $plugin</h4>";
            deactivate_plugins($plugin);   //desactivar un plugin
        }
    }
}
