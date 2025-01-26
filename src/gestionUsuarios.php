
<?php
//require_once '../config/conexion.php';
require_once __DIR__ . '/../config/conexion.php';
$query = "SELECT * FROM usuarios";
$stmt = $conexion->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <a href="../src/indexiniciados.php">
                <img id="logo-img" src="../src/img/LogoSmartwallsAnimado.gif" alt="SmartWalls Logo">
            </a>
            
        </section>

        <div class="divisiones">
            <a href="../src/IndexIniciados.php" class="nav-item nav-link active">Regresar</a>
        </div>
    </header>

    <div class="container">
        <section id= contenedor> 
        <h1>Gestión de Usuarios</h1>
        <a href="../config/crear.php" class="btn btn-primary">Nuevo Usuario</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['idUsuario']; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['apellidoP']; ?></td>
                    <td><?php echo $usuario['apellidoM']; ?></td>
                    <td><?php echo $usuario['telefono']; ?></td>
                    <td><?php echo $usuario['correo']; ?></td>
                    <td><?php echo $usuario['edad']; ?></td>
                    <td><?php echo $usuario['tipo']; ?></td>
                    <td>
                        <a href="../config/editar.php?id=<?php echo $usuario['idUsuario']; ?>" class="btn btn-edit">Editar</a>
                        <a href="../config/borrar.php?id=<?php echo $usuario['idUsuario']; ?>" class="btn btn-delete" onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</a>

                        

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </section>
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
