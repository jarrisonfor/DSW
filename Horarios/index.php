<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actividad horarios</title>
</head>

<body>

    <div class='contenedor'>
        <?php
        function genColorCodeFromText($text, $min_brightness = 100, $spec = 10)
        {
            // Check inputs
            if (!is_int($min_brightness)) throw new Exception("$min_brightness is not an integer");
            if (!is_int($spec)) throw new Exception("$spec is not an integer");
            if ($spec < 2 or $spec > 10) throw new Exception("$spec is out of range");
            if ($min_brightness < 0 or $min_brightness > 255) throw new Exception("$min_brightness is out of range");


            $hash = md5($text);  //Gen hash of text
            $colors = array();
            for ($i = 0; $i < 3; $i++)
                $colors[$i] = max(array(round(((hexdec(substr($hash, $spec * $i, $spec))) / hexdec(str_pad('', $spec, 'F'))) * 255), $min_brightness)); //convert hash into 3 decimal values between 0 and 255

            if ($min_brightness > 0)  //only check brightness requirements if min_brightness is about 100
                while (array_sum($colors) / 3 < $min_brightness)  //loop until brightness is above or equal to min_brightness
                    for ($i = 0; $i < 3; $i++)
                        $colors[$i] += 10;    //increase each color by 10

            $output = '';

            for ($i = 0; $i < 3; $i++)
                $output .= str_pad(dechex($colors[$i]), 2, 0, STR_PAD_LEFT);  //convert each color to hex and append to output

            return '#' . $output;
        }

        $servername = 'cifpzonzamas.org';
        $username = 'institu3_neptuno';
        $password = 'neptuno';
        $dbname =   'institu3_neptuno';

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset('utf8');

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $result = $conn->query("
            select id, grupo from grupos
        ");

        if ($result->num_rows > 0) {
            $html = "
            <select id='selector' onchange='cambiarGrupo()'>
            <option selected disabled>Elige un grupo</option>
            ";
            while ($fila = $result->fetch_array()) {
                $html .= '<option value="' . $fila['id'] . '">' . $fila['grupo'] . '</option>';
            }
        }
        $html .= "
            </select>
            ";
        echo $html;

        if (isset($_GET['grupoId'])) {
            $grupoId = $_GET['grupoId'] ?? "";
        }
        $result = $conn->query("
            select dia, hora, modulo_id from horarios
            where grupo_id = '$grupoId'
            order by hora, dia
        ");

        if ($result->num_rows > 0) {
            $html = '
                <table>
                <thead>
                    <tr>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                </thead>
                <tbody>
            ';
            $dias = [];
            while ($fila = $result->fetch_object()) {
                if (empty($dias[$fila->hora])) {
                    $dias[$fila->hora] = [
                        $fila->dia => $fila->modulo_id
                    ];
                } else {
                    $dias[$fila->hora][$fila->dia] = $fila->modulo_id;
                }
            }
            foreach (array_keys($dias) as $hora) {
                $html .= '<tr>';
                foreach (array_keys($dias[$hora]) as $dia) {
                    if (!empty($dias[$hora][$dia])) {
                        $html .= '<td style="border: 1px solid black; background-color: ' . genColorCodeFromText($dias[$hora][$dia]) . '">' . $dias[$hora][$dia] . '</td>';
                    }
                }
                $html .= '</tr>';
            }
            $html .= "
                </tbody>
                </table>
            ";
            echo $html;
        } else {
            echo '<h1>No se ha devuelto ningún registro</h1>';
        }
        ?>
    </div>

    <script>
        function cambiarGrupo() {
            var x = document.getElementById("selector").value;
            location.replace("?grupoId=" + x);
        }
    </script>
</body>

</html>