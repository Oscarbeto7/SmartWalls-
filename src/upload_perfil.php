<?php
// Ruta donde se almacenarán las fotos subidas
$uploadDir = '../src/img/';
$defaultImage = $uploadDir . 'fotoperfil.jpeg';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_photo'])) {
    $file = $_FILES['profile_photo'];
    $fileName = basename($file['name']);
    $targetFilePath = $uploadDir . $fileName;

    // Validar que el archivo sea una imagen
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $validTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $validTypes)) {
        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            // Guardar la nueva ruta de la imagen en la sesión o base de datos
            session_start();
            $_SESSION['profile_photo'] = $targetFilePath;
            header('Location: perfil.php'); // Redirige al perfil tras la subida
            exit;
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Solo se permiten archivos de imagen.";
    }
} else {
    header('Location: perfil.php');
    exit;
}
?>