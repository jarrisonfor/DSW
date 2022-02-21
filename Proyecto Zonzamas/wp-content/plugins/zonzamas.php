<?php

/**
 * Plugin Name:       Zonzamas API
 * Plugin URI:        https://example.com/plugins/pdev
 * Description:       REST API para acceder a los datos del Zonzamas
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      5.6
 * Author:            Saul Exposito
 * Author URI:        https://example.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pdev
 * Domain Path:       /public/lang
 **/

//Con estas líneas de código evitamos que este fichero se pueda llamar directamente
if (!defined('WPINC')) {
    die('No puedes cargar este fichero directamente');
}



//Usamos un hook para registrar el nuevo end-point.
//A diferencia de otras veces en lugar de usr una función estamos poniendo el código directamente en el hook.
add_action('rest_api_init', 'registrarAPIZonzamas');

function registrarAPIZonzamas()
{
    register_rest_route(
        'zonzamas/v1',
        '/ciclos',
        [
            'methods' => 'GET',
            'callback' => 'devolverCiclos',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/grupos',
        [
            'methods' => 'GET',
            'callback' => 'devolverGrupos',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/modulos',
        [
            'methods' => 'GET',
            'callback' => 'devolverGrupos',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/modulos/(?P<ciclo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverModulosCiclo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/competencias/(?P<ciclo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverCompetenciasCiclo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/objetivos/(?P<ciclo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverObjetivosCiclo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/competencias/(?P<ciclo_id>[^/]+)/(?P<modulo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverCompetenciasCicloModulo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/objetivos/(?P<ciclo_id>[^/]+)/(?P<modulo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverObjetivosCicloModulo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/ra/(?P<modulo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverRAModulo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/ce/(?P<ra_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverCERA',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/ra_ce/(?P<ciclo_id>[^/]+)/(?P<modulo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverRACEModulo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/contenidos/(?P<modulo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverContenidoModulo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
    register_rest_route(
        'zonzamas/v1',
        '/horario/(?P<grupo_id>[^/]+)',
        [
            'methods' => 'GET',
            'callback' => 'devolverHorarioCiclo',
            'permission_callback' => function () {
                return true;
            }
        ]
    );
}

//Función Callback que se llama cuando un end-point es coincide con la ruta que hemos registrado
function devolverCiclos()
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $sql = "SELECT * FROM ciclos"; //usamos un parámetro para la consulta
    $ciclos = $db->get_results($sql); //
    return $ciclos;
}

function devolverGrupos()
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $sql = "SELECT * FROM grupos";    //usamos un parámetro para la consulta
    $grupos = $db->get_results($sql); //
    return $grupos;
}

function devolverModulosCiclo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $cicloId = $parametros['ciclo_id'];
    $sql = $db->prepare("SELECT id,modulo FROM ciclo_modulos WHERE ciclo_id = %s", $cicloId);    //usamos un parámetro para la consulta
    $modulos = $db->get_results($sql); //
    return $modulos;
}

function devolverCompetenciasCiclo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $cicloId = $parametros['ciclo_id'];
    $sql = $db->prepare("SELECT * FROM competencias WHERE ciclo_id = %s", $cicloId);    //usamos un parámetro para la consulta
    $competencias = $db->get_results($sql); //
    return $competencias;
}

function devolverObjetivosCiclo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $cicloId = $parametros['ciclo_id'];
    $sql = $db->prepare("SELECT * FROM objetivos WHERE ciclo_id = %s", $cicloId);    //usamos un parámetro para la consulta
    $objetivos = $db->get_results($sql); //
    return $objetivos;
}

function devolverCompetenciasCicloModulo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $cicloId = $parametros['ciclo_id'];
    $ModuloId = $parametros['modulo_id'];
    $sql = $db->prepare("SELECT competencia, ciclo_modulos.modulo FROM competencias, ciclo_modulos WHERE ciclo_modulos.ciclo_id = %s AND ciclo_modulos.id = %s", $cicloId, $ModuloId);    //usamos un parámetro para la consulta
    $competencias = $db->get_results($sql); //
    return $competencias;
}

function devolverObjetivosCicloModulo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $cicloId = $parametros['ciclo_id'];
    $ModuloId = $parametros['modulo_id'];
    $sql = $db->prepare("SELECT objetivo, ciclo_modulos.modulo FROM objetivos, ciclo_modulos WHERE ciclo_modulos.ciclo_id = %s AND ciclo_modulos.id = %s", $cicloId, $ModuloId);    //usamos un parámetro para la consulta
    $objetivos = $db->get_results($sql); //
    return $objetivos;
}

function devolverRAModulo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $ModuloId = $parametros['modulo_id'];
    $sql = $db->prepare("SELECT * FROM ra WHERE modulo_id = %s", $ModuloId);    //usamos un parámetro para la consulta
    $ra = $db->get_results($sql); //
    return $ra;
}

function devolverCERA($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $RAId = $parametros['ra_id'];
    $sql = $db->prepare("SELECT * FROM ce WHERE ra_id = %s", $RAId);    //usamos un parámetro para la consulta
    $ce = $db->get_results($sql); //
    return $ce;
}

function devolverRACEModulo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $ModuloId = $parametros['modulo_id'];
    $CicloId = $parametros['ciclo_id'];
    $sql = $db->prepare("SELECT * FROM ra WHERE modulo_id = %s AND ciclo_id = %s", $ModuloId, $CicloId);    //usamos un parámetro para la consulta
    $ras = $db->get_results($sql); //
    foreach ($ras as $ra) {
        $sql = $db->prepare("SELECT * FROM ce WHERE ra_id = %s", $ra->id);
        $ces = $db->get_results($sql);
        $ra->ces = $ces;
    }
    return $ras;
}

function devolverContenidoModulo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $ModuloId = $parametros['modulo_id'];
    $sql = $db->prepare("SELECT * FROM contenidos WHERE modulo_id = %s", $ModuloId);    //usamos un parámetro para la consulta
    $contenidos = $db->get_results($sql); //
    return $contenidos;
}

function devolverHorarioCiclo($parametros)
{
    $db = new wpdb('educaci2_neptuno', 'neptuno', 'educaci2_neptuno', 'educacioncanarias.org');
    $grupoId = $parametros['grupo_id'];
    $sql = $db->prepare("SELECT * FROM horarios WHERE grupo_id = %s", $grupoId);    //usamos un parámetro para la consulta
    $horarios = $db->get_results($sql); //
    return $horarios;
}
