<?php 

    include '../php/conexion.php';
    session_start();

    if(!isset($_SESSION['usuario'])){
        header("location: ./login.php");
        session_destroy();
        die();
    } 
    $correo = $_SESSION['usuario'];

    $query_session = "SELECT * FROM usuarios WHERE correo='$correo'";
    $ejecutar_session = mysqli_query($conexion, $query_session);
    
    //consulta de modalidades
    $query_modalidad = "SELECT * FROM modalidad";
    $ejecutar = mysqli_query($conexion, $query_modalidad);
    //consulta de roles
    $query_rol = "SELECT * FROM rol";
    $ejecutar_rol = mysqli_query($conexion, $query_rol);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | Signed</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/tabs.js"></script>
</head>
<body onload="javascript:cambiarPestanna(pestanas,pestana1);">
    <header class="headerDash">
        <nav class="navDash">
            <div class="logoDash">
                <h1>Signed</h1>
            </div>
            <ul class="ulDash">
                <li><a href="">Soporte</a></li>
                <li><a href="">Contacto</a></li>
                <li><a href="">Nosotros</a></li>
                <?php
                    while ($session = mysqli_fetch_array($ejecutar_session)) {
                        $dni = $session['dni'];
                        $name = $session['nombre'];
                        echo "<li>";
                            echo '<a href="../php/cerrar_session.php?dni='.$dni.'&name='.$name.'">';
                                echo "Salir";
                            echo "</a>";
                        echo "</li>";
                    };
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="contenedor">
            <div id="pestanas">
                <ul id=lista>
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Empleados</a></li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Firmas</a></li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>Nominas</a></li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>Informes</a></li>
                    <li id="pestana5"><a href='javascript:cambiarPestanna(pestanas,pestana5);'>Configuración</a></li>
                </ul>
            </div>          
        
            <div id="contenidopestanas">
                <!-- PESTAÑA DE EMPLEADOS -->
                <div id="cpestana1"  class="tabsEmpleados">
                    <form action="../php/registro_empleado.php" method="POST" class="">
                            <p>Regístrar Empleado</p>                            
                            <div class="InputsGroup">
                              <input type="text" class="InputsForm" name="dni_empleado" placeholder="N° Documento" required>
                            </div>
                            <div class="InputsGroup">
                                <input type="text" class="InputsForm"  name="nombre_empleado" placeholder="Nombre" required>
                            </div>
                            <div class="InputsGroup">
                                <input type="email" class="InputsForm"  name="correo_empleado" placeholder="Correo" required>
                            </div>
                            <div class="InputsGroup">
                                <input type="password" class="InputsForm" name="contrasena_empleado" placeholder="Contraseña" required>
                            </div>
                            <div class="InputsGroup">
                                <input type="text" class="InputsForm" name="ubicacion_mapa" placeholder="Ubicacion en el mapa" required>
                            </div> 
                            <select class="FormSelect" name="modalidad" required>
                                <option selected>Modalidad</option>
                                <?php
                                    while ($modalidad = mysqli_fetch_array($ejecutar)) {
                                        echo "<option value=".$modalidad['modalidad_empleo'].">".$modalidad['modalidad_empleo']."   </option>";
                                    };
                                ?>
                            </select>
                            <select class="FormSelect" name="rol" required>
                                <option selected>Rol</option>
                                <?php
                                    while ($rol = mysqli_fetch_array($ejecutar_rol)) {
                                        echo "<option value=".$rol['rol_empleado'].">".$rol['rol_empleado']."   </option>";
                                    };
                                ?>
                            </select>                            
                            <button type="submit" class="BtnEmpleados">Registrar</button>
                    </form>
                    <p>Listado Empleados</p>
                    <table class="TableEmpleados">
                        <thead>
                            <tr>
                                <th scope="col">N° Documento</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Modalidad</th>
                                <th scope="col">*</th>
                                <th scope="col">*</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../php/conexion.php';
                            $query_usuarios = "SELECT * FROM usuarios";
                            $ejecutar_usuarios = mysqli_query($conexion, $query_usuarios); 

                                while ($usuarios = mysqli_fetch_array($ejecutar_usuarios)) {
                                    echo "<tr>";
                                        echo "<td scope='row'>" . $usuarios['dni'] . "</td>";
                                        echo "<td>" . $usuarios['nombre'] . "</td>";
                                        echo "<td>" . $usuarios['rol'] . "</td>";
                                        echo "<td>" . $usuarios['modalidad'] . "</td>";
                                        echo "<td> <a class='editar' href=''>Editar</a> </td>";
                                        echo "<td> <a class='eliminar' href=''>Eliminar</a> </td>";
                                    echo "</tr>";
                                };
                            ?>
                        </tbody>
                    </table> 
                </div>

                <!-- PESTAÑA DE FIRMAS -->
                <div id="cpestana2" class="tabsFirmas">
                    <div class="firmas" tabindex="0">
                        <p>Lista de firmas</p>
                        <form action="" method="POST">
                            <span><img src="../assets/icons/Search.png" alt=""></span>
                            <input type="text" name="campo" id="campo" placeholder="Buscar">
                        </form>
                        <table class="TableFirmas">
                            <thead>
                                <th>N° Documento</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>H. Inicio</th>
                                <th>H. Salida</th>
                            </thead>
                            <tbody id="content">
                                <!-- AQUI SE AGREGAN VALORES EN TIEMPO REAL A TRAVES DE JSON -->
                            </tbody>
                        </table>   
                    </div>
                </div>





                <div id="cpestana3" class="tabsNominas">
                    Nominas.
                </div>
                <div id="cpestana4" class="tabsInformes">
                    Informes.
                </div>
                <div id="cpestana5" class="tabsConfig">
                    Configuración.
                </div>
            </div>
        </div>
    </main>
    <script>
        getData()
        
        document.getElementById("campo").addEventListener("keyup", getData)

        function getData(){
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "../php/search.php";
            let formData = new FormData()
            formData.append('campo', input)

            fetch(url,{
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data
            }).catch(err => console.log(err))
        }
    </script>
</body>
</html>