<?php
    //IMPORTAMOS ARCHIVO DE CONEXION A LA BASE DE DATOS
    include './conexion.php';
    //INICIALIZA SESSION DE USUARIOS
    session_start();
    //DETERMINA LUGAR DE LA ZONA HORARIA
    date_default_timezone_set('Chile/Continental');

    //VARIABLES
    $dni = $_GET['dni'];
    $nombre = $_GET['name'];
    $fecha_firma = date('Y-m-d');

    //FUNCION PARA REGISTRAR SALIDA
    function firma($dni_firma, $nombre_firma){
        //IMPORTAMOS ARCHIVO DE CONEXION A LA BASE DE DATOS
        include './conexion.php';

        //VARIABLES:
        $date_hora_salida = date_create();
        $hora_salida = date_format($date_hora_salida, 'H:i:s');
        echo $hora_salida.$dni_firma.$nombre_firma;
        $fecha_firma = date('Y-m-d');

        //QUERY PARA ACTUALIZAR EL REGISTRO DE LA FIRMA(HORA SALIDA)
        $query = "UPDATE firmas SET hora_salida = '$hora_salida' WHERE dni = '$dni_firma' AND fecha='$fecha_firma'";
        $ejecutar = mysqli_query($conexion, $query);
    };           

    $query_val_firma = "SELECT * FROM firmas WHERE dni='$dni' AND fecha='$fecha_firma'";
    $ejecutar_val_firma = mysqli_query($conexion, $query_val_firma);

    if(mysqli_num_rows($ejecutar_val_firma) > 0){
        while($v = mysqli_fetch_array($ejecutar_val_firma)){
            if($v['fecha'] == $fecha_firma){
                firma($dni,$nombre);
            } 
        }
    } 
    
    session_destroy();
    header("location: ../pages/login.php");
?>