<?php
    session_start();
    
    if(isset($_SESSION['usuario'])){
        header("location: ./dashboard-admin.php");
        session_destroy();
        die(); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia | Firmas</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <main>
        <div class="ContainerLogin">
            <div class="Intro">
                <h2>Intro de como funciona</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Earum officia accusantium soluta aliquid, quis consequuntur quasi. 
                    Vero veritatis ratione veniam omnis voluptas. Laborum rerum error 
                    harum delectus debitis quia fuga?
                </p>
            </div>
            
            <form action="../php/login_db.php" method="POST" class="ContainerForm">
                <div class="HeaderForm">
                    <h1>Sig - ned</h1>
                </div>
                <!--Input Usuario-->
                <div class="InputsForm">
                    <span><img src="../assets/icons/Icon-Priv.png" alt=""></span>
                    <input type="text" id="name" name="correo_firma" class="InputInsert" placeholder="Correo">                            
                </div>
                <!--Input Contraseña-->
                <div class="InputsForm">
                    <span><img src="../assets/icons/Icon-Key.png" alt=""></span>
                    <input type="password" id="pass" name="contrasena_firma" class="InputInsert" placeholder="Contraseña">                            
                </div>
                <!--Input botón login-->
                <input type="submit" id="inputSend" class="InputSend" name="Login" value="Firmar">
            </form>
        </div>
    </main>
</body>
</html>