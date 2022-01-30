<?php

/**
 * Plugin Name:       zonzamas
 **/

if (!defined('WPINC')) {
    die;
}

function addStyle7()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('sweetalert2', '//cdn.jsdelivr.net/npm/sweetalert2@11');
    wp_enqueue_script('datatables', '//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js');
    wp_enqueue_style('datatables-style', '//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css');
}

add_action('admin_enqueue_scripts', 'addStyle7', 2);

function mostrarCiclos2()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('Usted no tiene permisos para esta acción'));
    }

    global $wpdb;

    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');

    $ciclos = $db->get_results("SELECT id, ciclo from ciclos");
    $html = "<div id='panel'><table id='tabla_ciclos'><thead><tr>
    <th>Código</th>
    <th>Ciclo</th>
    </tr></thead><tbody>";
    foreach ($ciclos as $ciclo) {
        $html .= "<tr data-id='$ciclo->id'>
        <td>$ciclo->id</td>
        <td class='nombre_ciclo'><a href='#'>$ciclo->ciclo</a></td>
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
            $('#tabla_ciclos').DataTable();
            $("#tabla_ciclos").on("click", ".nombre_ciclo", function() {
                const cicloId = $(this).closest("tr").data("id");
                let html = '';
                $.ajax({
                    url: "<?php echo get_home_url(); ?>/index.php?rest_route=/zonzamas/v1/ciclo/" + cicloId,
                    success: function(modulos) {
                        html += "<ol>";
                        for (let i = 0; i < modulos.length; i++) {
                            html += `<li style='text-align: left;'>${modulos[i].modulo} (<b>${modulos[i].id}</b>)</li>`;
                        }
                        html += "</ol>";
                        Swal.fire({
                            title: `<strong>Módulo del ciclo ${cicloId}</strong>`,
                            html: html,
                            showCloseButton: true,
                            showCancelButton: true,
                            focusConfirm: false,
                        });
                    },

                });

            });

        });
    </script>

<?php

    echo $html;
}

function mostrarAulas()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('Usted no tiene permisos para esta acción'));
    }

    global $wpdb;

    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');

    $aulas = $db->get_results("SELECT id, aula from aulas");
    $html = "<div id='panel'><table id='tabla_aulas'><thead><tr>
	<th>Código</th>
	<th>Aula</th>
	</tr></thead><tbody>";
    foreach ($aulas as $aula) {
        $html .= "<tr data-id='$aula->id'>
		<td>$aula->id</td>
		<td class='nombre_aula'>$aula->aula</td>
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
            $('#tabla_aulas').DataTable();
        });
    </script>

<?php

    echo $html;
}

function mostrarGrupos()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('Usted no tiene permisos para esta acción'));
    }

    global $wpdb;

    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');

    $grupos = $db->get_results("SELECT id, grupo from grupos");
    $html = "<div id='panel'><table id='tabla_grupos'><thead><tr>
	<th>Código</th>
	<th>Grupo</th>
	</tr></thead><tbody>";
    foreach ($grupos as $grupo) {
        $html .= "<tr data-id='$grupo->id'>
		<td>$grupo->id</td>
		<td class='nombre_grupo'>$grupo->grupo</td>
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
            $('#tabla_grupos').DataTable();
        });
    </script>

<?php

    echo $html;
}

function devolverModulosCiclo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');

    $cicloId = $parametros['ciclo_id'];
    $sql = $db->prepare("SELECT id, modulo FROM ciclo_modulos WHERE ciclo_id = %s order by curso, modulo", $cicloId);
    $modulos = $db->get_results($sql);

    return $modulos;
}

add_action('rest_api_init', function () {
    register_rest_route(
        'zonzamas/v1',
        '/ciclo/(?P<ciclo_id>.+)',
        ['methods' => 'GET', 'callback' => 'devolverModulosCiclo']
    );
});

function menu_zonzamas()
{
    add_menu_page('', 'Zonzamas', '', 'menu_zonzamas', '', 'dashicons-groups', 1);
    add_submenu_page('menu_zonzamas', 'Ciclos', 'Ciclos', 'manage_options', 'zonzamas-ciclos', 'mostrarCiclos2', 0);
    add_submenu_page('menu_zonzamas', 'Grupos', 'Grupos', 'manage_options', 'zonzamas-grupos', 'mostrarGrupos', 0);
    add_submenu_page('menu_zonzamas', 'Aulas', 'Aulas', 'manage_options', 'zonzamas-aulas', 'mostrarAulas', 0);
}

add_action('admin_menu', 'menu_zonzamas');
