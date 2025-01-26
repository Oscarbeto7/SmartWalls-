<?php
session_start();
include "../config/conexion.php";

$uploadDir = 'img/';
$imagePath = '';

if (isset($_POST['submit'])) {
    $encabezado = $_POST['encabezado'];
    $texto = $_POST['texto'];
    
    if (!empty($_FILES['imagen']['name'])) {
        $fileName = basename($_FILES['imagen']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (file_exists($targetFilePath)) {
            $imagePath = $targetFilePath;
        } else {
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFilePath)) {
                $imagePath = $targetFilePath;
            } else {
                echo "Error al subir la imagen.";
                exit;
            }
        }
    }

    // Insertar en la tabla noticias
    $sql = "INSERT INTO noticias (encabezado, texto, imagen) VALUES (:encabezado, :texto, :imagen)";
    $stmt = $conexion->prepare($sql);
    
    if ($stmt->execute([':encabezado' => $encabezado, ':texto' => $texto, ':imagen' => $imagePath])) {
        // Obtener el último ID insertado en la tabla noticias
        $lastNoticiaId = $conexion->lastInsertId();
        
        // Insertar en la tabla cambios
        $sqlCambio = "INSERT INTO cambios (fecha, pagina) VALUES ( NOW(), :pagina)";
        $stmtCambio = $conexion->prepare($sqlCambio);
        
        // Ejecutar la consulta con los parámetros
        if ($stmtCambio->execute([':pagina' => $lastNoticiaId])) {
            header("Location: noticias.php?msg=Registro creado con éxito");
        } else {
            echo "Error al insertar en la tabla de cambios.";
        }
    } else {
        echo "Error al insertar en la tabla de noticias.";
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
   
<body>
<header id="main-header">
        <section id="logo">
        <a href="../public/IndexIniciados.php">
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
        <div class="text-center mb-4">
            <h3>Agregar nueva noticia</h3>
        </div>


        <form method="POST" class="formlogin">
                <div class="mb-3">
                    <label class="form-label">Encabezado:</label>
                    <input type="text" class="form-control" name="encabezado" placeholder="Título de la noticia">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Texto:</label>
                    <textarea class="form-control" name="texto" rows="5" placeholder="Contenido de la noticia"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Imagen:</strong></label>
                    <input type="file" class="form-control" id="imagen-input" name="imagen" accept="image/*">
                    <img id="img-preview" src="" alt="Imagen seleccionada" style="display:none; max-width: 200px;">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Guardar</button>
                </div>
            </form>
    </div>
    </section>

    <!-- Script para previsualizar la imagen seleccionada -->
    <script>
        document.getElementById('imagen-input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('img-preview').src = e.target.result;
                    document.getElementById('img-preview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

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