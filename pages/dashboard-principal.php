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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | Signed</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
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
</body>
</html>