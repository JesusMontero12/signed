<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Sig - ned</h1>
            </div>
            <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Planes</a></li>
                <li><a href="">Nosotros</a></li>
                <li><a href="">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- SECTION PRESENTACIÓN -->
        <section class="containerPresentacion">
            <img src="./assets/img/fondo4.png" alt="">
            <div class="textSlogan">
                <h1>Gestiona tu empresa con <span>Sig-Ned</span></h1>
                <p>El control lo tienes en tus manos.</p>
            </div>
        </section>
        <!-- SECTION PLANES -->
        <section class="containerPlanes">
            <h6>Hechos pensando en ti.</h6>
            <!-- CARD PLAN BÁSICO -->
            <div class="containerCards">
                <div class="card">
                    <img src="./assets/img/basic.png" alt="">
                    <h2>Básico</h2>
                    <ul>
                        <li>Usuario Admin.</li>
                        <li>Registro usuarios.</li>
                        <li>Control asistencia.</li>
                        <li>Soporte especializado.</li>
                        <li>Asesorias en vivo.</li>
                        <li>.</li>
                        <li>1 mes de prueba gratis.</li>
                    </ul>
                    <hr>
                    <div class="footerCard">
                        <div class="precios">
                            <p class="antes">Antes: <span>5$</span>/mes</p>
                            <p class="ahora">Ahora: 2$/mes</p>
                        </div>
                        <a href="./pages/registro-empresa.php" class="btnObtener">Obtener</a>
                    </div>
                    
                </div>
                <!-- CARD PLAN PROFESIONAL -->
                <div class="card">
                    <img src="./assets/img/pro.png" alt="">
                    <h2>Profesional</h2>
                    <ul>
                        <li>Usuario Admin.</li>
                        <li>Registro usuarios.</li>
                        <li>Control asistencia.</li>
                        <li>Modificación y actualización de registros.</li>
                        <li>Automatización de horas faltantes y extras.</li>
                    </ul>
                    <hr>
                    <div class="footerCard">
                        <div class="precios">
                            <p class="antes">Antes: <span>10$</span>/mes</p>
                            <p class="ahora">Ahora: 8$/mes</p>
                        </div>
                        <a href="./pages/registro-empresa.php" class="btnObtener">Obtener</a>
                    </div>
                    
                </div>
                <!-- CARD PLAN PREMIUM -->
                <div class="card">
                    <img src="./assets/img/premium.png" alt="">
                    <h2>Premium</h2>
                    <ul>
                        <li>Usuario Admin.</li>
                        <li>Registro usuarios.</li>
                        <li>Control asistencia.</li>
                        <li>Automatización de horas faltantes y extras.</li>
                        <li>Gestión contable.</li>
                        <li>Automatización de nómina.</li>
                    </ul>
                    <hr>
                    <div class="footerCard">
                        <div class="precios">
                            <p class="antes">Antes: <span>25$</span>/mes</p>
                            <p class="ahora">Ahora: 12$/mes</p>
                        </div>
                        <a href="./pages/registro-empresa.php" class="btnObtener">Obtener</a>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- SECTION NOSOTROS -->
        <section class="containerNosotros">
            <div class="bg-mision">
                <div class="nosotros">
                    <h3>Misión</h3>
                    <p>"En nuestra misión, nos comprometemos a ser la plataforma de gestión de nómina que impulsa el éxito 
                        empresarial a través de la simplificación, eficiencia y confiabilidad en cada transacción salarial. 
                        Nos esforzamos por brindar a empresas de todos los tamaños la herramienta esencial que optimiza sus 
                        procesos de nómina, permitiéndoles centrarse en lo que más importa: su capital humano.
                        <br><br>
                        Nuestro propósito es proporcionar a empleadores y empleados una experiencia sin complicaciones, 
                        donde la administración de la nómina se convierte en un proceso fluido y transparente. Nos comprometemos 
                        a ofrecer soluciones flexibles y personalizadas que se adapten a las necesidades específicas de cada empresa, 
                        independientemente de su estructura o sector."</p>
                </div>
            </div>
            <div class="bg-vision">
                <div class="nosotros">
                    <h3>Visión</h3>
                    <p>"En nuestra visión, aspiramos a ser la plataforma líder en soluciones de nómina, 
                        transformando la experiencia de gestión salarial para empresas y empleados por igual. 
                        Nos visualizamos como la herramienta integral que simplifica y optimiza cada aspecto 
                        del proceso de nómina, ofreciendo precisión, eficiencia y transparencia.
                        <br><br>
                        Nuestra página web se concibe como un espacio donde la complejidad de la gestión salarial 
                        se reduce a pasos simples e intuitivos. Nos esforzamos por ser la referencia en el mercado, 
                        proporcionando a empleadores y colaboradores la confianza de que sus transacciones salariales 
                        se llevan a cabo con exactitud y rapidez."</p>
                </div>
            </div>     
        </section>   
    </main>

    <footer>
        <!-- SECTION CONTACTO -->
        <section class="containerContacto">
            <div class="NavFooter">
                <h6>Información y contacto.</h6>
                <ul>
                    <li><a href="">Tarifas</a></li>
                    <li><a href="">Sobre osotros</a></li>
                    <li><a href="">Preguntas Frecuentes</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
            </div>
            <form action="" method="POST">
                <h5>Contáctanos a través de</h5>
                <!-- CAJA INPUTS ESTILOS GENERALES -->
                <div class="textmailfooter">
                    <div class="inputText1">
                        <input type="text" autocomplete="off" name="name" id="nombre" placeholder="Nombre">                    
                    </div>
                    <!-- CAJA INPUTS ESTILOS GENERALES -->
                    <div class="inputText2">
                        <input type="email" autocomplete="off" name="email" id="correo" placeholder="Correo">                    
                    </div>
                </div>
                <div class="inputText3">
                    <textarea name="comentario" autocomplete="off" id="comentario" placeholder="Comenterio" cols="30" rows="10"></textarea>                    
                </div>
            </form>
        </section>
        <!-- Copyright -->
        <div class="copyright">
                © 2023 Copyright:
                <a class="text-body" href="#">MontCorp.</a>
            </div>
            <!-- Copyright -->
    </footer>
</body>
</html>