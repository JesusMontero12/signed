<?php
    //IMPORTAMOS ARCHIVO DE CONEXION A LA BASE DE DATOS
    include './conexion.php';

    $columns = ['dni', 'nombre', 'fecha', 'hora_inicio', 'hora_salida'];
    $table = "firmas";

    $campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;
    $where = '';

    if ($campo != null) {
        $where = "WHERE (";

        $cont = count($columns);
        for ($i = 0; $i < $cont; $i++) {
            $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }

    $query = "SELECT " . implode(", ", $columns) . "
    FROM $table
    $where ";
    $resultado = $conexion->query($query);
    $num_rows = $resultado->num_rows;

    $html = '';

    if($num_rows > 0) {
        while($row = $resultado->fetch_assoc()){
            $html .= '<tr>';
                $html .= '<td>' . $row['dni'] . '</td>';
                $html .= '<td>' . $row['nombre'] . '</td>';
                $html .= '<td>' . $row['fecha'] . '</td>';
                $html .= '<td>' . $row['hora_inicio'] . '</td>';
                $html .= '<td>' . $row['hora_salida'] . '</td>';
            $html .= '</tr>';
        }
    } else {
        $html .= '<tr>';
        $html .= '<td colspan="5">Sin resultados.</td>';
        $html .= '</tr>';
    }

    echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>