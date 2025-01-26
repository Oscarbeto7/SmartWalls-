<?php
include "../config/conexion.php";
session_start();

if (isset($_GET['id'])) {
    $idNoticia = $_GET['id'];

    // Obtener los datos de la noticia
    $sql = "SELECT * FROM noticias WHERE idNoticias = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idNoticia, PDO::PARAM_INT);
    $stmt->execute();
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$noticia) {
        echo "Noticia no encontrada.";
        exit;
    }
} else {
    echo "ID de noticia no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Agregar el link de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link logos facebook twitter etc-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Los otros links que ya tienes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="..//src/css/style.css">
    <title>SmartWalls</title>
    <link rel="icon" href="../src/img/Minilogo.png" type="image/x-icon">
</head>
<body>
    <header id="main-header">
        <section id="logo">
            <a href="public_html/index.html">
                <img id="logo-img" src="../src/img/LogoSmartwallsAnimado.gif" alt="SmartWalls Logo">
            </a>
        </section>
    
        <!-- Menú de navegación -->
        <div class="divisiones">
            <a href="../src/noticias2.php" class="nav-item nav-link active">Regresar</a>
        </div>
    
        <!-- Botón de menú de hamburguesa -->
        <div class="hamburger-menu" id="hamburger-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>
    <div class="container mt-5">
    <h1 class="my-4 text-center"><?php echo htmlspecialchars($noticia['encabezado']); ?></h1>
    
    <div class="row noticia-container align-items-center">
        <!-- Texto de la noticia -->
        <div class="col-md-6 mb-4">
            <div class="texto">
                <p class="lead"><?php echo nl2br(htmlspecialchars($noticia['texto'])); ?></p>
            </div>
        </div>
        
        <!-- Imagen de la noticia -->
        <div class="col-md-6 mb-4">
            <div class="imagen text-center">
                <?php if (!empty($noticia['imagen'])): ?>
                    <img src="<?php echo htmlspecialchars($noticia['imagen']); ?>" alt="Imagen de la noticia" class="img-fluid rounded shadow">
                <?php else: ?>
                    <p class="text-muted">No hay imagen disponible.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

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
</body>
</html>
