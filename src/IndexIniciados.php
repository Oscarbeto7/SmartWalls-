<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Agregar el link de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link logos facebook twitter etc-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Los otros links que ya tienes -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="..//src/css/style.css">
    <title>SmartWalls</title>
    <link rel="icon" href="../src/img/Minilogo.png" type="image/x-icon">
    
</head>

<body data-bs-spy="scroll" data-bs-target=".divisiones" data-bs-offset="70">
<header id="main-header">
        <section id="logo">
            <a href="../public/indexiniciados.php">
                <img id="logo-img" src="../src/img/LogoSmartwallsAnimado.gif" alt="SmartWalls Logo">
            </a>
        </section>
    
        <!-- Menú de navegación -->
        <div class="divisiones">
            <a href="#" class="nav-item nav-link active">Inicio</a>
            <a href="#acerca_de" class="nav-item nav-link">Acerca de</a>
            <a href="#servicios" class="nav-item nav-link">Servicios</a>
            <a href="../src/noticias.php" class="nav-item nav-link">Noticias</a>
            <a href="../src/Miperfil.html" class="nav-item nav-link">Perfil</a>
            <a href="../public/index.html" class="nav-item nav-link">Salir</a>
        </div>
    
        <!-- Botón de menú de hamburguesa -->
        <div class="hamburger-menu" id="hamburger-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <section id="main-content">

        <section id="contenedor">
            <section id="hero-image" >
                <img src="../src/img/ImagenCasa1.png" alt="Remodelaciones" style="width: 100%; height: auto;">
                <div class="text-container">
                    <h1 class="main-title animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">Remodelaciones y</h1>
                    <h1 class="main-title animate__animated animate__fadeInUp" style="animation-delay: 0.6s;">renovaciones</h1>
                    <h1 class="main-title animate__animated animate__fadeInUp" style="animation-delay: 0.8s;">domésticas</h1>
                    <h3 class="sub-title animate__animated animate__fadeInUp" style="animation-delay: 1s;">Usa nuestra app para controlar tus paredes y tu casa</h3>
                    <a href="#acerca_de2">
                        <button id="btn-more-info" class="animate__animated animate__fadeInUp" style="animation-delay: 1.2s;" title="Mas informacion">Ubicanos</button>
                    </a>
                    
                </div>
            </section>
            
            <section id="acerca_de" class="hidden" style="animation-delay: 0.4s;">
                <div class="container">
                    <div class="row">
                        <div class="col izquierda">
                            <h2 class="hidden" style="animation-delay: 0.8s;">Nosotros</h2>
                            <h4 class="hidden" style="animation-delay: 1s;">SmartWalls, el control de tu hogar en la palma de tu mano.</h4>
                            <p class="hidden" style="animation-delay: 1s;">
                                SmartWalls es sistema residencial dedicado a la remodelación y construcción de casas inteligentes con tecnología IoT desarrollado por Code OPS.
                            </p>
                        </div>
                        <div class="col derecha hidden" style="animation-delay: 0.8s;">
                            <iframe width="315" height="560" src="https://www.youtube.com/embed/ThYd7xpzCic" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>
            


            <section id="servicios" class="hidden" style="animation-delay: 0.4s;">
                <div class="container2 my-5">
                    <h2 class="hidden" style="animation-delay: 0.1s;">Nuestros servicios</h2>
                    <div class="info-cards">
                        <div class="info-card hidden"  style="background-image: url('../src/img/lucesInteligentes.webp'); animation-delay: 0.4s;">
                            <div class="card-bg"></div>
                            <div class="card-content">
                                <h3>Luces inteligentes</h3>
                                <p>Descripción de las luces inteligentes.</p>
                            </div>
                        </div>
                        <div class="info-card hidden"  style="background-image: url('../src/img/ParedesInteligentes.jpg'); animation-delay: 0.6s;">
                            <div class="card-bg"></div>
                            <div class="card-content">
                                <h3>Paredes moviles</h3>
                                <p>Descripción de las paredes moviles.</p>
                            </div>
                        </div>
                        <div class="info-card hidden" style="background-image: url('../src/img/ImagenCalefaccion.jpg'); animation-delay: 0.8s;">
                            <div class="card-bg"></div>
                            <div class="card-content">
                                <h3>Control de temperatura</h3>
                                <p>Descripción del control de temperatura.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
            <section id="acerca_de2" class="hidden" style="animation-delay: 0.4s;">
                <div class="container">
                    <div class="row">
                        <!-- Parte izquierda: Texto -->
                        <div class="col izquierda hidden" style="animation-delay: 0.8s;">
                            <h2 class="hidden" style="animation-delay: 0.8s;">Ubicanos</h2>
                            <h4 class="hidden" style="animation-delay: 0.8s;">SmartWalls, el control de tu hogar en la palma de tu mano.</h4>
                            <p class="hidden" style="animation-delay: 0.8s;">
                                Encuentra nuestras oficinas generales en Av. Fray. A. Alcalde 10 44100 Guad., Jal., México
                            </p>
                        </div>
            
                        <!-- Parte derecha: Mapa de Google Maps -->
                        <div class="col derecha hidden" style="animation-delay: 0.8s;" >
                            <div id="map" style="height: 400px; width: 100%;"></div>
                            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=iniciarMap" async defer></script>
                            <script src="scriptmaps.js"></script>
                        </div>
                    </div>
                </div>
            </section>
            

<footer>
    <div class="prefootercontainer" style="margin-top: 90px;">
        <div class="row pt-5">
            <!-- Columna 1: SmartWalls y descripción -->
            <div class="col-lg-3 col-md-6 mb-5 text-md-left">
                    <img id="logo-img" src="../src/img/LogoSmartwallsAnimado.gif" alt="SmartWalls Logo">
                <p>SmartWalls, el control de tu hogar en la palma de tu mano.</p>
            </div>
            
            <!-- Columna 2: Our Services -->
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros servicios
                </h5>
                <ul class="list-unstyled">
                    <li><a class="text-white-50 mb-2" href="#">Remodelación</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Construcción</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Asesorias bienes raíces</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Créditos</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Objetos extras</a></li>
                </ul>
            </div>
            
            <!-- Columna 3: Useful Links -->
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Paquetes</h5>
                <ul class="list-unstyled">
                    <li><a class="text-white-50 mb-2" href="#">Iluminacion inteligente</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Paredes moviles</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Control de temperatura</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Sensores</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Ilumiacion y temperatura</a></li>
                    <li><a class="text-white-50 mb-2" href="#">Paquete todo incluido</a></li>
                </ul>
            </div>
            
             <!-- Columna 4: Síguenos en y contacto -->
             <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px; text-align: center;">Síguenos en</h5>
                <div class="d-flex justify-content-center mb-3">
                    <a class="btn btn-outline-primary btn-square mr-2" href="https://www.facebook.com/profile.php?id=61567807195638"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2"  href="https://twitter.com/@ops_code27460" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="https://youtube.com/@CODEOPS-j9m" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
                <p class="text-center">+526681502707<br>codeops2023s@gmail.com<br>Av. Fray. A. Alcalde 10<br>44100 Guad., Jal., México</p>
            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
            <p class="m-0 text-white-50">Copyright &copy; CODE OPS. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 text-center text-md-right">
            <p class="m-0 text-white-50">
                Designed by CODE OPS
                <img id="logo-footer" src="../src/img/LogoCodeOpsanimadosinbucle.gif" alt="CODE OPS Logo">
            </p>
        </div>
    </div>
</footer>

    <!-- Botón de volver al inicio -->
     
    <div id="backToTopBtn" title="Volver al inicio">
        <img src="../src/img/flecha-hacia-arriba.png" alt="Volver al inicio" />
    </div>
    </section>
    <script src="../src/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
</body>
</html>