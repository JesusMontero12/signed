<?php

    include './conexion.php';

    $nombre_empresa = $_POST['nombre_empresa'];
    $direccion_empresa = $_POST['direccion_empresa'];
    $telefono_empresa = $_POST['telefono_empresa'];
    $correo_empresa = $_POST['correo_empresa'];
    $administrador_empresa = $_POST['administrador_empresa'];
    //Variables de encriptado y contraseñas
    $contrasena_empresa = $_POST['contrasena_empresa'];
    $contrasena_empresa = hash('sha512', $contrasena_empresa);
    //Recolecion de datos de fecha y hora
    $date = date_create();
    $fecha_registro = date_format($date, 'd-m-y H:i:s');

    $rol_adminstrador = "Administrador";
    $modalidad_adminstrador = "Híbrido";

    //Verifica que solo exista un solo registro por empresa
    $consultaEmpresa = "SELECT * FROM datos_empresa WHERE nombre='$nombre_empresa' AND correo='$correo_empresa'";
    $verificacionEmpresa = mysqli_query($conexion, $consultaEmpresa);

    //Verifica que solo exista un solo registro por usuario
    $consultaUsuario = "SELECT * FROM usuarios WHERE nombre='$administrador_empresa' AND correo='$correo_empresa'";
    $verificacionUsuario = mysqli_query($conexion, $consultaUsuario);

    //condicional para validar inputs no esten vacios
    if(empty($_POST['nombre_empresa']) || empty($_POST['direccion_empresa']) || 
        empty($_POST['telefono_empresa']) || empty($_POST['correo_empresa']) || 
        empty($_POST['administrador_empresa']) || empty($_POST['contrasena_empresa']) ){
        echo '
        <script>
            alert("Debes completar todos los campos");
        </script>
    ';
    } else {
        //Condicional para verificar si ya existe esa empresa
        if(mysqli_num_rows($verificacionEmpresa) > 0){
            echo '
            <script>
                alert("El nombre y/o el correo ya se encuentran registrado");
                window.location = "../pages/registro-empresa.php";
            </script>
        ';
        } else {
             //Condicional para verificar si ya existe esa empresa
            if(mysqli_num_rows($verificacionUsuario) > 0){
                echo '
                <script>
                    alert("El usuario ya se encuentran registrado");
                    window.location = "../pages/registro-empresa.php";
                </script>
            ';
            } else {
                //Insercion de datos de la empresa en la tabla de la base de datos
                $query = "INSERT INTO datos_empresa(nombre, direccion, telefono, correo, administrador, contrasena, fecha_registro)
                VALUES ('$nombre_empresa','$direccion_empresa','$telefono_empresa','$correo_empresa','$administrador_empresa','$contrasena_empresa','$fecha_registro')";
                $ejecutar = mysqli_query($conexion, $query);
                //Insercion de datos del administrador en la tabla de la base de datos
                $query_admin = "INSERT INTO usuarios(nombre, correo, contrasena, direccion, rol, modalidad, fechaReg)
                VALUES ('$administrador_empresa', '$correo_empresa','$contrasena_empresa','$direccion_empresa','$rol_adminstrador','$modalidad_adminstrador','$fecha_registro')";
                $ejecutar_admin = mysqli_query($conexion, $query_admin);
                //verificacion de que se cumpla las querys de registro y redireccionamiento al dashboar
                if($ejecutar && $ejecutar_admin){
                    echo '
                        <script>
                            window.location = "../pages/dashboard-admin.php";
                        </script>
                    ';
                } else {
                }
            }
        }   
    }

    mysqli_close($conexion);
?>