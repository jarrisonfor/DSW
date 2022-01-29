<?php
/**
 * Plugin Name:       Alumnado
 **/


if (!defined('WPINC')) {
    die;
}


function addStyle4()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('datatables', '//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js');
    wp_enqueue_style('datatables-style', '//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css');
}

add_action('admin_enqueue_scripts', 'addStyle4', 2);


function mostrarAlumnos()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('Usted no tiene permisos para esta acción'));
    }

    global $wpdb;

    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');

    $alumnos = $db->get_results("SELECT id, nombre, apellidos, dni, email, telefono from alumnos");
    $html = "<div id='panel'><table id='tabla_alumnos'><thead><tr>
	<th>Código</th>
	<th>Dni</th>
	<th>Alumno</th>
	<th>Email</th>
	<th>Telefono</th>
	</tr></thead><tbody>";
    foreach ($alumnos as $alumno) {
        $html .= "<tr data-id='$alumno->id'>
		<td>$alumno->id</td>
		<td class='dni'>$alumno->dni</td>
		<td class='nombre_alumno'>$alumno->nombre $alumno->apellidos</td>
		<td class='email'>$alumno->email</td>
		<td class='telefono'>$alumno->telefono</td>
		</tr>";
    }

    $html .= "</tbody></table></div>";
?>

    <style>
        #panel {
            margin: 30px;
            padding: 30px;
            border: 3px solid lightblue;
            border-radius: 10px;
        }
    </style>

    <script>
        jQuery(document).ready(function($) {
            $('#tabla_alumnos').DataTable();
        });
    </script>

<?php

    echo $html;
}

function menu_alumnos()
{
    add_menu_page('', 'Alumnado', '', 'menu_alumnos', '', 'dashicons-groups', 1);
    add_submenu_page('menu_alumnos', 'Alumnos', 'Alumnos', 'manage_options', 'alumnos', 'mostrarAlumnos', 0);
}

add_action('admin_menu', 'menu_alumnos');
