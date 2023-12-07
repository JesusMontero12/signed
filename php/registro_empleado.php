<?php 

    include './conexion.php';
    //Variables
    $dni_empleado = $_POST['dni_empleado'];
    $nombre_empleado = $_POST['nombre_empleado'];
    $correo_empleado = $_POST['correo_empleado'];
    //Variables de encriptado y contraseñas
    $contrasena_empleado = $_POST['contrasena_empleado'];
    $contrasena_empleado = hash('sha512', $contrasena_empleado);

    $ubicacion_mapa = $_POST['ubicacion_mapa'];
    $rol = $_POST['rol'];
    $modalidad = $_POST['modalidad'];
    //Recolecion de fecha y hora
    $date = date_create();
    $fecha_registro = date_format($date, 'd-m-y H:i:s');
    //CONSULTA CON QUERY PARA VERIFICA QUE LOS USUARIOS NO SE REPITAN ANTES DE HACER EL REGISTRO
    $query_verif = "SELECT * FROM usuarios WHERE dni='$dni_empleado' AND correo='$correo_empleado'";
    $consulta_verif = mysqli_query($conexion, $query_verif);
    //VALIDAR QUE SE HAYA SELECCIONADO MODALIDAD Y ROL
    if(($_POST['rol'] == "Rol") || ($_POST['modalidad'] == "Modalidad")){
        //MENSAJE SI NO SE ELIGIO ROL NI MODALIDAD
        echo '
        <script>
            alert("Debes seleccionar rol y modalidad para continuar");
            window.location = "../pages/dashboard-admin.php";
        </script>';
        //VALIDACIÓN DE INPUTS VACIOS
        if(empty($_POST['dni_empleado']) || empty($_POST['nombre_empleado']) || empty($_POST['correo_empleado']) || 
        empty($_POST['contrasena_empleado']) || empty($_POST['ubicacion_mapa']) || empty($_POST['rol']) || empty($_POST['modalidad'])){
            //MENSAJE SI ESTAN VACIOS LOS INPUTS
            echo '
            <script>
                alert("Debes completar todos los campos");
                window.location = "../pages/dashboard-admin.php";
            </script>';
        }
    } else {
        //VALIDA SI EXISTE UN USUARIO CON LOS DATOS INGRESADOS
        if(mysqli_num_rows($consulta_verif) > 0 ){
            //MENSAJE DE QUE LOS DATOS INGRESADOS YA TIENE UN REGISTRO
            echo '
            <script>
                alert("El numero de dni y/o el correo ya se encuentran registrado");
                window.location = "../pages/dashboard-admin.php";
            </script>';
        } else {
            //query para la insersion de datos a la base de datos
            $query = "INSERT INTO usuarios (dni, nombre, correo, contrasena, direccion, rol, modalidad, fechaReg) 
            VALUES ('$dni_empleado', '$nombre_empleado', '$correo_empleado', '$contrasena_empleado', '$ubicacion_mapa', '$rol', '$modalidad', '$fecha_registro')";
            $ejecutar = mysqli_query($conexion, $query);
            //SI LA CONSULTA DEL QUERY SE EJECUTO CORRECTAMENTE
            if($ejecutar){
                //REDIRECCIONADO DE PAGINA
                echo '
                    <script>
                        alert("Se registró usuario correctamente");
                        window.location = "../pages/dashboard-admin.php";
                    </script>
                ';
            }
        }
    }
?>