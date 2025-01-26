<?php
include "../config/conexion.php";
session_start();

if (isset($_GET['id'])) {
    $idNoticia = $_GET['id'];

    // Obtener los datos actuales de la noticia
    $sql = "SELECT * FROM noticias WHERE idNoticias = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idNoticia, PDO::PARAM_INT);
    $stmt->execute();
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$noticia) {
        echo "Noticia no encontrada.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $encabezado = $_POST['encabezado'];
    $texto = $_POST['texto'];
    $uploadDir = 'img/';
    $imagePath = $noticia['imagen'];  // Mantener la imagen actual por defecto

    if (!empty($_FILES['imagen']['name'])) {
        $fileName = basename($_FILES['imagen']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFilePath)) {
            $imagePath = $targetFilePath;
        } else {
            echo "Error al subir la nueva imagen.";
            exit;
        }
    }

    $sql = "UPDATE noticias SET encabezado = :encabezado, texto = :texto, imagen = :imagen WHERE idNoticias = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':encabezado', $encabezado);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':imagen', $imagePath);
    $stmt->bindParam(':id', $idNoticia, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Registrar el cambio en la tabla `cambios`
        $sqlCambio = "INSERT INTO cambios (fecha, pagina) VALUES (NOW(), :pagina)";
        $stmtCambio = $conexion->prepare($sqlCambio);
        $stmtCambio->execute([':pagina' => $idNoticia]);

        header("Location: noticias.php?msg=Noticia actualizada correctamente");
    } else {
        echo "Error al actualizar la noticia.";
    }
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
<body data-bs-spy="scroll" data-bs-target=".divisiones" data-bs-offset="70">
    <header id="main-header">
        <section id="logo">
        <a href="../src/IndexIniciados.php">
                <img id="logo-img" src="../src/img/LogoSmartwallsAnimado.gif" alt="SmartWalls Logo">
            </a>
        </section>
    
        <!-- Menú de navegación -->
        <div class="divisiones">
            <a href="../src/noticias.php" class="nav-item nav-link active">Regresar</a>
        </div>
    
        <!-- Botón de menú de hamburguesa -->
        <div class="hamburger-menu" id="hamburger-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <section id="background-image" style="position: relative; text-align: center;">
    <img src="../src/img/ImagenCasa2.jpg" alt="Remodelaciones" style="width: 100%; height: auto;">

    <section id="register">
    <div class="register-container">
        <div class="form-login">
    <h3>Editar Noticia</h3>
    <form action="" method="post" enctype="multipart/form-data" class="formlogin">
        <label>Encabezado:</label>
        <input type="text" name="encabezado" value="<?php echo htmlspecialchars($noticia['encabezado']); ?>" required>
        <br>
        <label>Texto:</label>
        <textarea name="texto" required><?php echo htmlspecialchars($noticia['texto']); ?></textarea>
        <br>
        <label>Imagen:</label>
        <input type="file" name="imagen">
        <br>
        <img src="<?php echo $noticia['imagen']; ?>" alt="Imagen actual" width="100px">
        <br>
        <button type="submit">Guardar cambios</button>
    </form>
    </form>
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
</body>
</html>
