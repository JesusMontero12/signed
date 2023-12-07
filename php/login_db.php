<?php
    //IMPORTAMOS ARCHIVO DE CONEXION A LA BASE DE DATOS
    include './conexion.php';
    //INICIALIZA SESSION DE USUARIOS
    session_start();    
    //DETERMINA LUGAR DE LA ZONA HORARIA
    date_default_timezone_set('Chile/Continental');
    
    $correo = $_POST['correo_firma'];
    $contrasena = $_POST['contrasena_firma'];
    $contrasena = hash('sha512', $contrasena);
    
    //FUNCION QUE INGRESA INFORMACION DE FECHA-HORA DE INGRESO Y SALIDA
    function firma($dni_firma, $nombre_firma){
        //IMPORTAMOS ARCHIVO DE CONEXION A LA BASE DE DATOS
        include './conexion.php';
       
        //VARIABLES:
        $fecha_firma = date('Y-m-d');
        $date_hora_inicio = date_create();
        $hora_inicio = date_format($date_hora_inicio, 'H:i:s');

        //QUERY PARA INSERTAR INFORMACION DE FECHA Y HORA EN LA TABLA FIRMAS
        $query = "INSERT INTO firmas (dni, nombre, fecha, hora_inicio) 
        VALUES ('$dni_firma', '$nombre_firma', '$fecha_firma', '$hora_inicio')";
        $ejecutar = mysqli_query($conexion, $query);
    };
    
    //CONSULTA CON QUERY PARA VALIDAR QUE LOS DATOS INGRESADOS POR EL USUARIO EXISTAN EN LA BASE DE DATOS
    $consulta = "SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena'";
    $query = mysqli_query($conexion, $consulta);

    //CONDICIONAL QUE VERIFICA QUE SI COINCIDE LOS DATOS INGRESADOS CON ALGUN REGISTRO EN LA BASE DE DATOS
    if(mysqli_num_rows($query) > 0){
        $_SESSION['usuario'] = $correo; 
        //DESGLOSAMIENTO DE LOS DATOS DEL REGISTRO
        while($fila = mysqli_fetch_array( $query ) ){

            $dni_firma = $fila['dni'];
            $fecha_firma = date('Y-m-d');

            $query_val_firma = "SELECT * FROM firmas WHERE dni='$dni_firma' AND fecha='$fecha_firma'";
            $ejecutar_val_firma = mysqli_query($conexion, $query_val_firma);

            if(mysqli_num_rows($ejecutar_val_firma) > 0){
                while($v = mysqli_fetch_array($ejecutar_val_firma)){
                    if($v['fecha'] != $fecha_firma){
                        firma($fila['dni'],$fila['nombre']);
                    } 
                }
            } else {
                firma($fila['dni'],$fila['nombre']);
            }

            //CONDICIONAL DE ROL
            if($fila['rol'] == "Administrador"){
                //REDIRIGIMOS DASHBOARD PARA ADMINISTRADOR
                header("location: ../pages/dashboard-admin.php");
            } else {
                //REDIRIGIMOS DASHBOARD PARA OTROS USUARIOS
                header("location: ../pages/dashboard-principal.php");
            }   
        }
    } else {
        //MENSAJE SI NO CUMPLE CON LA CONDICIONAL DE INICIO DE SESION/REDIRECIONA AL LOGIN
        echo '
            <script>
                alert("Los datos ingresados son incorrectos, intente de nuevo");
                window.location = "../pages/login.php";
            </script>
        ';
    }

    
?>