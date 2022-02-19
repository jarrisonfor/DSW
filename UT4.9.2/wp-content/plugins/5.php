<?php
/**
 * Plugin Name:  7. Shortcode
 **/

add_action('init', 'crearShortCodeCiclos');

function crearShortCodeCiclos()
{
    add_shortcode('ciclos', 'mostrarCiclos');
}

function mostrarCiclos($atts, $content, $tag)
{
    global $wpdb;
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');

    $tipo = $atts['tipo'];
    $ciclos = $db->get_results("select ciclo from ciclos where tipo='$tipo' order by ciclo");
    $html = '<ol>';
    foreach ($ciclos as $ciclo) {
        $html .= "<li>$ciclo->ciclo</li>";
    }
    $html .= "</o>";
    return $html;
}
