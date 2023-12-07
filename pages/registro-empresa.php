<?php
    session_start();
    
    if(isset($_SESSION['usuario'])){
        header("location: ./pages/dashboard-admin.php");
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
        <div class="ContainerRegister">
            <div class="Intro">
                <h2>Intro de como funciona</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Earum officia accusantium soluta aliquid, quis consequuntur quasi. 
                    Vero veritatis ratione veniam omnis voluptas. Laborum rerum error 
                    harum delectus debitis quia fuga?
                </p>
            </div>
            
            <form action="../php/registro_empresa_db.php" method="POST" class="ContainerForm">
                <div class="HeaderForm">
                    <h1>Sig - ned</h1>
                </div>
                <!--Input nombre de la empresa-->
                <div class="InputsForm">
                    <span><img src="../assets/icons/Icon-Priv.png" alt=""></span>
                    <input type="text" id="name" name="nombre_empresa" class="InputInsert" placeholder="Nombre de la empresa" required>                            
                </div>
                <!--Input dirección-->
                <div class="InputsForm">
                    <span><img src="../assets/icons/addres.png" alt=""></span>
                    <input type="text" id="direccion" name="direccion_empresa" class="InputInsert" placeholder="Dirección" required>                    
                </div>
                <!--Input Teléfono-->
                <div class="InputsForm">
                    <span><img src="../assets/icons/phone.png" alt=""></span>
                    <input type="text" id="telefono" name="telefono_empresa"  class="InputInsert" placeholder="Teléfono" required>            
                </div>
                <!--Input Correo-->
                <div class="InputsForm">
                    <span><img src="../assets/icons/Icon-Email.png" alt=""></span>
                    <input type="email" id="correo" name="correo_empresa" class="InputInsert" placeholder="Correo" required>                            
                </div>
                <!--Input Administrador-->
                <div class="InputsForm">
                    <span><img src="../assets/icons/Icon-User.png" alt=""></span>
                    <input type="text" id="administrador" name="administrador_empresa" class="InputInsert" placeholder="Administrador" required>                            
                </div>
                <!--Input Contraseña-->
                <div class="InputsForm">
                    <span><img src="../assets/icons/Icon-Key.png" alt=""></span>
                    <input type="password" id="pass" name="contrasena_empresa" class="InputInsert" placeholder="Contraseña" required>                            
                </div>
                <!--Input Botón Registrar-->
                <input type="submit" id="inputSend" class="InputSend" name="registrar" value="Registrar">
                <a href="./login.php" class="linklogin">¿Ya estas registrado?</a>
            </form>

        </div>
    </main>
</body>
</html>