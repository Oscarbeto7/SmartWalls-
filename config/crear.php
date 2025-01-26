
<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Encriptar contraseña
    $tipo = $_POST['tipo'];

    $query = "INSERT INTO usuarios (nombre, apellidoP, apellidoM, telefono, correo, edad, pass, tipo) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);

    try {
        $stmt->execute([$nombre, $apellidoP, $apellidoM, $telefono, $correo, $edad, $pass, $tipo]);
        header("Location: ../public/index.php");
        exit();
    } catch (PDOException $e) {
        $error = "Error al crear usuario: " . $e->getMessage();
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
        <a href="../src/indexiniciados.php">
                <img id="logo-img" src="../src/img/LogoSmartwallsAnimado.gif" alt="SmartWalls Logo">
            </a>
            
        </section>

        <div class="divisiones">
            <a href="../src/gestionusuarios.php" class="nav-item nav-link active">Regresar</a>
        </div>
    </header>

    <section id="background-image" style="position: relative; text-align: center;">
    <img src="../src/img/ImagenCasa2.jpg" alt="Remodelaciones" style="width: 100%; height: auto;">

    <section id="register">
    <div class="register-container">
        <div class="form-login">
            <h1>Crear Nuevo Usuario</h1>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST" class="form-login">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label>Apellido Paterno:</label>
                    <input type="text" name="apellidoP" required>
                </div>
                <div class="form-group">
                    <label>Apellido Materno:</label>
                    <input type="text" name="apellidoM" required>
                </div>
                <div class="form-group">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" required>
                </div>
                <div class="form-group">
                    <label>Correo:</label>
                    <input type="email" name="correo" required>
                </div>
                <div class="form-group">
                    <label>Edad:</label>
                    <input type="number" name="edad" required>
                </div>
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="pass" required>
                </div>
                <div class="form-group">
                    <label>Tipo:</label>
                    <input type="text" name="tipo" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            </div>
    </div>
    </section>

    </body>
    </html>
